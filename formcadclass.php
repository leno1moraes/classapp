<?php 
	require_once("connect.php");
	require_once("verifyauth.php");
	
	ini_set('default_charset','ISO-8859-1');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">  	

  	<link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/bootstrap.css">
  	<link rel="stylesheet" href="bootstrap/node_modules/bootstrap/compiler/style.css">

  	<title>Class App - Cadastrar Materia</title>
	
<style>

</style>	
	
</head>
<body>
	
	<form action="inserttbmatprofessor.php" method="POST" enctype="multipart/form-data">
		<div class="form-group col-sm-4">

			<p> <label for="Selectdesmateria">Materia: </label>
				<select class="form-control" name="desmateria">
					<option value="0" selected>Escolher</option>
                    <?php          
                    	$queryp = "SELECT idmateria, desmateria FROM tb_materia order by idmateria";
                        $listadadosp=mysqli_query($conexao, $queryp); 
                        while ($campop=mysqli_fetch_array($listadadosp)){
                    ?>  
					<option value="<?=$campop["idmateria"]?>"><?=$campop["desmateria"]?></option>

                    <?php 
                    	}
                    ?> 
				</select>
			</p>

			<p> <label for="Selectdescor">Cor: </label> 
				<input type="color" class="form-control" name="descolor"  list="">
			</p>

			<p> <input type="submit" value="Gravar" class="btn btn-primary btn-md btn-block"> </p>
		</div>
	</form>


	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="bootstrap/node_modules/jquery/dist/jquery.js"></script>
    <script src="bootstrap/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>