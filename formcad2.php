<?php 
    require_once("header.php");
?>
	<br>
	
	<form action="inserttbprofessor.php" method="POST" enctype="multipart/form-data">
		<div class="form-group col-sm-4">
			<p> <label for="Inputdeswhatsapp">Whatsapp: </label> <input type="text" class="form-control" name="deswhatsapp" placeholder="Obrigatório" required></p>

			<p> <label for="Inputdespassword">Senha: </label> <input type="password" class="form-control" name="despassword" placeholder="Obrigatório" required></p>	

			<p> <label for="Inputdesname">Nome: </label> <input type="text" class="form-control" name="desname"></p>

			<p> <label for="Inputdesemail">E-mail: </label> <input type="email" class="form-control" name="desemail"></p>	
			
			<p> <input type="submit" value="Gravar" class="btn btn-primary btn-md btn-block"> </p>
		</div>
	</form>
	
<?php 
    require_once("footer.php");
?> 