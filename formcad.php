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

  <title>Class App - Cadastro de Usuário</title>
	
<style>

</style>	
	
</head>
<body>
	
	<form action="inserttbprofessor.php" method="POST" enctype="multipart/form-data">
		<div class="form-group col-sm-4">
			<p> <label for="Inputdeswhatsapp">Whatsapp: </label> <input type="tel" class="form-control phone-mask" name="deswhatsapp" placeholder="Whatsapp" data-mask="(00) 00000-0000" required autofocus>	</p>

			<p> <label for="Inputdespassword">Senha: </label> <input type="password" class="form-control" name="despassword" placeholder="Obrigatório" required></p>	

			<p> <label for="Inputdesname">Nome: </label> <input type="text" class="form-control" name="desname"></p>

			<p> <label for="Inputdesemail">E-mail: </label> <input type="email" class="form-control" name="desemail"></p>	
			
			<p> <input type="submit" value="Gravar" class="btn btn-primary btn-md btn-block"> </p>
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