<?php 
	require_once("connect.php");
	require_once("verifyauth.php");

	ini_set('default_charset','ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/style.css">  

  <title>Class App - Solicitar Aula</title>
	
<style>
	label.padrao {
	    /*display: inline-block;
	    width: 70px;*/		
	}

	.body{
		font-family: Arial, Helvetica, sans-serif;
	}	
</style>

</head>
<body>
	<br>

	<div class="col-sm-4">

		<form class="form-group" action="insertrequestclass.php" method="POST" enctype="multipart/form-data">


			<p> <label class="padrao">Sala</label> 
				<select name="dessala"class="btn-block rounded">
					<option value="0" selected>Escolher</option>

			        <?php          
        				$query = "SELECT idclassroom, desclassroom FROM tb_classroom order by idclassroom asc";
			            $listadados=mysqli_query($conexao, $query); 
			            while ($dados=mysqli_fetch_array($listadados)){
			        ?> 					
					<option value="<?=$dados["idclassroom"]?>"><?=$dados["desclassroom"]?></option>
			        <?php 
			        	}
			        ?>	
				</select>
			</p>

			<p> <label class="padrao">Dia</label> 
				<select name="desday" class="btn-block rounded">
					<option value="0" selected>Escolher</option>
			        <?php          
        				$query = "SELECT idday, desday, flag FROM tb_day where flag = 1 order by idday";
			            $listadados=mysqli_query($conexao, $query); 
			            while ($dados=mysqli_fetch_array($listadados)){
			        ?>s
					<option value="<?=$dados["idday"]?>"><?=$dados["desday"]?></option>
			        <?php 
			        	}
			        ?>						
				</select>
			</p>


			<p> <label class="padrao">Horario</label> 
				<select name="desday" class="btn-block rounded">
					<option value="0" selected>Escolher</option>
			        <?php          
        				$query = "SELECT a.idhourrangeclass, a.idhour, b.hour_inicio, b.hour_fim , a.idrangeclass, c.desrangeclass FROM tb_hourrangeclass a left join tb_hour b on a.idhour = b.idhour left join tb_rangeclass c on a.idrangeclass = c.idrangeclass";
			            $listadados=mysqli_query($conexao, $query); 
			            while ($dados=mysqli_fetch_array($listadados)){
			        ?>s
					<option value="<?=$dados["idhourrangeclass"]?>"><?=$dados["desrangeclass"].": ".$dados["hour_inicio"]." - ".$dados["hour_fim"]?></option>
			        <?php 
			        	}
			        ?>						
				</select>
			</p>



			<p> <label class="padrao">Materia</label>
				<select name="desmateria" class="btn-block rounded">
					<option value="0" selected>Escolher</option>
			        <?php          
        				$query = "SELECT a.idmatprofessor, a.idmateria, b.desmateria, a.idclassroom, c.desclassroom, a.idprofessor, a.descolor  FROM tb_matprofessor a left join tb_materia b on b.idmateria = a.idmateria left join tb_classroom c on c.idclassroom = a.idclassroom where idprofessor = ".$_SESSION['UserId'];
			            $listadados=mysqli_query($conexao, $query); 
			            while ($dados=mysqli_fetch_array($listadados)){
			        ?>   					
					<option value="<?=$dados["idmateria"]?>"><?=$dados["desmateria"]?></option>
			        <?php 
			        	}
			        ?>					
				</select>
			</p>

			<p> <input type="submit" value="Solicitar" class="btn btn-primary btn-md btn-block"> </p>

		</form>	
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="bootstrap/node_modules/jquery/dist/jquery.js"></script>
    <script src="bootstrap/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>
</html>