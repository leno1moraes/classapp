CREATE DATABASE  IF NOT EXISTS `databaseclassapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `databaseclassapp`;
-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: databaseclassapp
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping events for database 'databaseclassapp'
--

--
-- Dumping routines for database 'databaseclassapp'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_minhamaterias_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_minhamaterias_delete`(
	pidmatprofessor int,
    pidprofessor int
)
begin
	declare vflag int;
    declare vsuccess int;
    
	select a.idmatprofessor into vflag
	from tb_quadrodehorario a
		inner join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
	where a.idmatprofessor = pidmatprofessor
	limit 1;
    
    if vflag > 0 then
		set vsuccess = 0;
        
	else
		delete from tb_matprofessor where idmatprofessor = pidmatprofessor;
		set vsuccess = 1;
        
    end if;
    
     select vsuccess;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_my_authorize` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_my_authorize`(
	pidprofessor int(11), 
	pflag int(11)
)
begin
	declare id_das_solcitacoes int;
    declare vsolicitacao int;
	declare v_solicitacao integer default 0;
	declare v_finished integer default 0;
    
    
	declare vsolicitacao cursor for	select	a.solicitacao
									from tb_quadrodehorario a
										left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
									where e.idprofessor = pidprofessor and a.solicitacao <> 0;
                                    
	declare CONTINUE handler for not found set v_finished = 1; 
                                    
	open vsolicitacao;
    get_solicitacao: LOOP
    
    FETCH vsolicitacao INTO v_solicitacao;
		
        set id_das_solcitacoes = v_solicitacao;
        
        select id_das_solcitacoes;
        
		if v_finished = 1 then 
		 leave get_solicitacao;
		end if;  
        
    end loop get_solicitacao;
    close vsolicitacao;  
    
    select id_das_solcitacoes;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_quadrohorarios_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_quadrohorarios_save`(
pidday int(11), 
pidhourrangeclass int(11), 
pidmatprofessor int(11),
pidclassroom int(11),
pdesjustify varchar(45)
)
begin

/*	returns:
		1 = success | aguardando autorizacao do professor
        4 = success | aguardando autorizacao do cordenador do coordenador 
*/
        
/*	leganda do processo
		0 = aparecer
        1 = não aparecer | aguardando autorizacao do professor
        4 = não aparecer | aguardando autorizacao do coordenador
        2 = não aparecer | invalidar as solicitacoes antigas
        3 = não aparecer | solicitacoes negadas */

	declare vidquadrodehorario int;
    declare vorigin int;
    declare vsuccess int;
	
	select a.idquadrodehorario, a.origin into vidquadrodehorario, vorigin 
	from tb_quadrodehorario a
		left join tb_day b on a.idday = b.idday
		left join tb_hourrangeclass c on a.idhourrangeclass = c.idhourrangeclass
		left join tb_hour d on c.idhour = d.idhour
		left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
		left join tb_materia f on e.idmateria = f.idmateria
		left join tb_professor g on e.idprofessor = g.idprofessor
		left join tb_classroom h on a.idclassroom = h.idclassroom
	where a.idclassroom = pidclassroom
		and a.idday = pidday
		and a.idhourrangeclass = pidhourrangeclass
		and a.flag = 0;
	
    if vorigin = 1 then
    
		INSERT INTO tb_quadrodehorario (idday, idhourrangeclass, idmatprofessor, idclassroom, flag, origin, desjustify)
		VALUES (pidday, pidhourrangeclass, pidmatprofessor, pidclassroom, 1, 0, pdesjustify);
        
        update tb_quadrodehorario a
        set a.solicitacao = last_insert_id()
		where a.idclassroom = pidclassroom
			and a.idday = pidday
			and a.idhourrangeclass = pidhourrangeclass
			and a.flag = 0;     
            
        set vsuccess = 1;
    end if;
    
    select vsuccess;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-28  1:58:31
