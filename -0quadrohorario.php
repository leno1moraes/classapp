<?php 
	require_once("connect.php");
	require_once("verifyauth.php");

	ini_set('default_charset','UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
	<!--
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">  	
	-->

  	<link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/bootstrap.css">
  	<link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/style.css">
  	<link rel="stylesheet" href="open-iconic-master/font/css/open-iconic-bootstrap.css">

  <title>Class App - Quadro de Horario</title>
	
	<style type="text/css">
		.bordercustomizado{
		    border-collapse: separate;
		}		

		.meustilo{
			font-family: Arial, Helvetica, sans-serif;
		}
	</style>	
</head>
<body>

    <?php       
    	/*
		0 - domingo
		1 - segunda
		2 - terça
		3 - quarta
		4 - quinta
		5 - sexta
		6 - sabado
    	*/

    	$dayweek = date('w');

    	if ($dayweek == 0 || $dayweek == 6){
    		$dayweek = 5;
    	}

    	$dayweek = 5;

    	$query = "select a.idquadrodehorario, a.idday, b.desday, a.idhourrangeclass, 
					   d.hour_inicio, d.hour_fim, a.idmatprofessor, f.desmateria, e.descolor, g.desname, a.idclassroom, h.desclassroom
				from tb_quadrodehorario a
					left join tb_day b on a.idday = b.idday
				    left join tb_hourrangeclass c on a.idhourrangeclass = c.idhourrangeclass
				    left join tb_hour d on c.idhour = d.idhour
				    left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
				    left join tb_materia f on e.idmateria = f.idmateria
				    left join tb_professor g on e.idprofessor = g.idprofessor
				    left join tb_classroom h on a.idclassroom = h.idclassroom
				where b.idday = ".$dayweek." and a.idclassroom = 1 and a.flag in (0, 5)
				order by a.idhourrangeclass asc";
				/*order by a.idquadrodehorario asc*/
        $listadados=mysqli_query($conexao, $query);

        $dado = mysqli_fetch_array($listadados);

    ?> 	
	<table class="bordercustomizado meustilo table-sm-4 table-no-bordered col-sm-4">
		<tr>
			<td class="border border-secondary rounded-top" colspan="2" align="center" bgcolor="#262626">
				<font color="white" style="font-size:2em"><?=utf8_encode($dado["desclassroom"])?><!--1º A--></font>
			</td>
		</tr>		
		<tr>
			<td class="border border-secondary rounded" colspan="2" bgcolor="#262626">
				<font color="white" style="font-size:1.5em"><?=utf8_encode($dado["desday"])?><!--Segunda-Feira--></font>
			</td>
		</tr>
 
		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dado["hour_inicio"]?><!--07:15--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dado["descolor"]?>">
				<?=utf8_encode($dado["desmateria"])?><!--Aula 1-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dado["hour_fim"]?><!--08:05--></font>
			</td>			
		</tr>

    <?php
    	$i = 0;

        while ($dados = mysqli_fetch_array($listadados)){

        	$i = $i + 1;

        	if ($i == 2) {
    ?>
    
		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dados["hour_inicio"]?><!--08:55--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dados["descolor"]?>">
				<?=utf8_encode($dados["desmateria"])?><!--Aula 3-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dados["hour_fim"]?><!--09:45--></font>
			</td>			
		</tr>		

		<tr>
			<td colspan="2" align="center" valign="middle" bgcolor="#000000">
				<font color="white">INTERVALO</font>
			</td>					
		</tr>

	<?php
        	} elseif ($i == 4) {

    ?>

		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dados["hour_inicio"]?><!--10:50--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dados["descolor"]?>">
				<?=utf8_encode($dados["desmateria"])?><!--Aula 5-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dados["hour_fim"]?><!--11:40--></font>
			</td>			
		</tr>

		<tr>
			<td colspan="2" align="center" valign="middle" bgcolor="#000000">
				<font color="white">INTERVALO (AL)</font>
			</td>					
		</tr>

	<?php
        	} elseif ($i == 6) {

    ?>
		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dados["hour_inicio"]?><!--14:20--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dados["descolor"]?>">
				<?=utf8_encode($dados["desmateria"])?><!--Aula 7-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dados["hour_fim"]?><!--15:10--></font>
			</td>			
		</tr>		

		<tr>
			<td colspan="2" align="center" valign="middle" bgcolor="#000000">
				<font color="white">INTERVALO</font>
			</td>					
		</tr>

	<?php
        	}else{

    ?>
		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dados["hour_inicio"]?><!--07:15--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dados["descolor"]?>">
				<?=utf8_encode($dados["desmateria"])?><!--Aula 2-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dados["hour_fim"]?><!--08:05--></font>
			</td>			
		</tr>

    <?php 
        	}/*if*/

    	}/*while*/
    ?> 

	</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="bootstrap/node_modules/jquery/dist/jquery.js"></script>
    <script src="bootstrap/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>	
</body>
</html>