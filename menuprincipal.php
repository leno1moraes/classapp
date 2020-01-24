<?php 
    require_once("verifyauth.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">  	

  	<link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/bootstrap.css">
  	<link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/style.css">

  	<title>Class App - Menu Principal</title>
	
<style>

</style>	
	
</head>
<body>

<br>	

<button class="btn btn-danger" onclick="location.href='logingoout.php'">Sair</button>

<hr>

	<table class="table table-bordered col-sm-3">
		<tr>
			<td>
				<button class="btn btn-info col-sm" onclick="location.href='formcad.php'">Minhas Informações</button>
			</td>
		</tr>
		<tr>
			<td>
				<button class="btn btn-info col-sm" onclick="location.href='minhasmaterias.php'">Minhas Matérias</button>
			</td>
		</tr>
		<tr>
			<td>
				<button class="btn btn-info col-sm" onclick="location.href=''">Solicitar Aula</button>
			</td>
		</tr>
		<tr>
			<td>
				<button class="btn btn-info col-sm" onclick="location.href='quadrohorario.php'">Ver horários</button>
			</td>
		</tr>
	</table>
	

	<?php

	?>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="bootstrap/node_modules/jquery/dist/jquery.js"></script>
    <script src="bootstrap/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>