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

  	<link rel="stylesheet" href="open-iconic-master/font/css/open-iconic-bootstrap.css">

  	<title>Class App - Cadastrar Materia</title>
	
	<style>
		.oi-pencil {
		    color: 	#4d4d4d;
		}

		.oi-delete {
		    color: 	#4d4d4d;
		}	

		.borderless{
		    border-collapse: separate;
		}

		.borderless td, .borderless th {
		    border: none;
		}	
	</style>	
	
</head>
<body>

<?php
	//echo "Usuario: ".$_SESSION['UserId'];
?>
	<br>	

	<button class="btn btn-secondary btn-sm" onclick="location.href='formcadclass.php'">Adicionar</button>

	<hr>	

	<div class="col-sm-4">
	<table class="table borderless ">

        <?php          
        	$query = "SELECT a.idmatprofessor, a.idmateria, b.desmateria, a.idclassroom, c.desclassroom, a.idprofessor, a.descolor  FROM tb_matprofessor a left join tb_materia b on b.idmateria = a.idmateria left join tb_classroom c on c.idclassroom = a.idclassroom where idprofessor = ".$_SESSION['UserId'];
            $listadados=mysqli_query($conexao, $query); 
            while ($dados=mysqli_fetch_array($listadados)){
        ?>         
		<tr>
			<td class="rounded" bgcolor="<?=$dados["descolor"]?>" align="center">
				<?=utf8_encode($dados["desmateria"])?>

			</td>
			
			<!--
			<td width="25%" class="rounded" bgcolor="#4d4d4d" align="center">
				<font color="white"><?=$dados["desclassroom"]?></font>
			</td>
			-->
			
			<td width="15%" align="right">
				<span class="oi oi-pencil"></span>
			</td>

			<td width="15%" align="right">
				<span class="oi oi-delete"></span>
			</td>
		</tr>

        <?php 
        	}
        ?>
	</table>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="bootstrap/node_modules/jquery/dist/jquery.js"></script>
    <script src="bootstrap/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>