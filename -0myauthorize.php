<?php 
	require_once("connect.php");
	require_once("verifyauth.php");
	
	ini_set('default_charset','UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!--
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">  	
	-->

  	<link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/bootstrap.css">
  	<link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/style.css">

  	<title>Class App - Cadastrar Materia</title>
	
	<style type="text/css">
		.bordercustomizado{
		    border-collapse: separate;
		}
	</style>	
	
</head>
<body>

    <?php

    	if ($_SESSION['UserHierarchy'] == '2'){
    		//echo "Coordenador: ".$_SESSION['UserName'];
	    	$query = "select a.idquadrodehorario, a.idday, b.desday, a.idhourrangeclass,  i.desrangeclass,
						d.hour_inicio, d.hour_fim, a.idmatprofessor, f.desmateria, e.descolor, 
						g.desname, a.idclassroom, h.desclassroom, a.flag, a.desjustify
				from tb_quadrodehorario a
					left join tb_day b on a.idday = b.idday
				    left join tb_hourrangeclass c on a.idhourrangeclass = c.idhourrangeclass
				    left join tb_hour d on c.idhour = d.idhour
				    left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
				    left join tb_materia f on e.idmateria = f.idmateria
				    left join tb_professor g on e.idprofessor = g.idprofessor
				    left join tb_classroom h on a.idclassroom = h.idclassroom
                    left join tb_rangeclass i on c.idrangeclass = i.idrangeclass
				where  a.flag = 4
                order by a.idquadrodehorario desc";    		

    	}else{
    		//echo "Professor: ".$_SESSION['UserName'];
	    	$query = "select a.idquadrodehorario, a.idday, b.desday, a.idhourrangeclass,  i.desrangeclass,
							 d.hour_inicio, d.hour_fim, a.idmatprofessor, f.desmateria, e.descolor, 
							 g.desname, a.idclassroom, h.desclassroom, a.flag, a.desjustify
					from tb_quadrodehorario a
						left join tb_day b on a.idday = b.idday
					    left join tb_hourrangeclass c on a.idhourrangeclass = c.idhourrangeclass
					    left join tb_hour d on c.idhour = d.idhour
					    left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
					    left join tb_materia f on e.idmateria = f.idmateria
					    left join tb_professor g on e.idprofessor = g.idprofessor
					    left join tb_classroom h on a.idclassroom = h.idclassroom
	                    left join tb_rangeclass i on c.idrangeclass = i.idrangeclass
					where a.flag = 1 and a.idquadrodehorario in (	select a.solicitacao
													from tb_quadrodehorario a
														left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
													where e.idprofessor = ".$_SESSION['UserId']."
														  and a.solicitacao <> 0)
	                order by a.idquadrodehorario desc";

    	}
      	$listadados = mysqli_query($conexao, $query);


    ?>  

    <div class="col-sm-8">
		<table class="table bordercustomizado">
			<thead>
				<tr>
					<th>
						<!--idquadrodehorario-->
					</th>
					<th>
						<!--desname-->
					</th>					
					<th>
						<!--desclassroom-->
					</th>					
					<th>
						<!--desday-->
					</th>
					<th>
						<!--desrangeclass-->
					</th>
					<th>
						<!--desmateria-->
					</th>	
					<th>
						<!--desjustify-->
					</th>						
					<th>
						<!--Autorizar-->
					</th>
					<th>
						<!--Negar-->
					</th>						
				</tr>
			</thead>
			<tbody>

	    <?php
	    	$i = 0;
	        while ($dados = mysqli_fetch_array($listadados)){
	        	$i = $i + 1;
	    ?>
				<tr>
					<td  class="font-weight-bold" align="middle">
						<?=$i?>
					</td>
					<td align="middle">
						<?=utf8_encode($dados["desname"])?>
					</td>					
					<td align="middle">
						<?=utf8_encode($dados["desclassroom"])?>
					</td>					
					<td align="middle">
						<?=utf8_encode($dados["desday"])?>
					</td>
					<td align="middle">
						<?=$dados["desrangeclass"]?>
					</td>
					<td align="middle">
						<?=utf8_encode($dados["desmateria"])?>
					</td>
					<td align="middle">
						<?=utf8_encode($dados["desjustify"])?>
					</td>					
					<td>
	    <?php
	    				if ($_SESSION['UserHierarchy'] == '2'){
	    ?>
						<button type="button" class="btn btn-success btn-block" onclick="window.location='myauthorizeprocesscoordenator.php?idquadrodehorario=<?=$dados["idquadrodehorario"]?>&setflag=1';">Autorizar (c)</button>	 
	    <?php
	    				}else{
	    ?>
						<button type="button" class="btn btn-success btn-block" onclick="window.location='myauthorizeprocess.php?idquadrodehorario=<?=$dados["idquadrodehorario"]?>&setflag=1';">Autorizar</button>	    
	    <?php
	    				}
	    ?>
					</td>	
					<td>
	    <?php
	    				if ($_SESSION['UserHierarchy'] == '2'){
	    ?>
						<button type="button" class="btn btn-danger btn-block" onclick="window.location='myauthorizeprocesscoordenator.php?idquadrodehorario=<?=$dados["idquadrodehorario"]?>&setflag=2';">Negar (c)</button>	 
	    <?php
	    				}else{
	    ?>
						<button type="button" class="btn btn-danger btn-block" onclick="window.location='myauthorizeprocess.php?idquadrodehorario=<?=$dados["idquadrodehorario"]?>&setflag=2';">Negar</button>    
	    <?php
	    				}
	    ?>
					</td>																												
				</tr>
	    <?php
	        }        	
	    ?>
			</tbody>			
		</table>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="bootstrap/node_modules/jquery/dist/jquery.js"></script>
    <script src="bootstrap/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>