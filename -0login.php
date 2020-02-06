<?php 
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

  <title>Class App - Login</title>
	
<style>
</style>

</head>
<body class="text-center">

	<form class="form-signin" action="logingo.php" method="POST" enctype="multipart/form-data">>
		<div class="col-sm-3">	
			<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">

			<label for="inputdeswhatsapp" class="sr-only">Whatsapp</label> 
			<input type="tel" class="form-control phone-mask" name="deswhatsapp" placeholder="Whatsapp" data-mask="(00) 00000-0000" required autofocus>		
			

			<label for="inputdespassword" class="sr-only">Senha</label> 
			<input type="password" class="form-control" placeholder="Senha" name="despassword" required>

			<br>

			<button class="btn btn-lg btn-primary btn-sm col-sm-4" type="submit">Entrar</button>

			<button class="btn btn-lg btn-secondary btn-sm col-sm-4" onclick="location.href='formcad.php'">Cadastrar</button>

			
		</div>
	</form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="bootstrap/node_modules/jquery/dist/jquery.js"></script>
    <script src="bootstrap/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery_mask/dist/jquery.mask.min.js"></script>

</body>
</html>