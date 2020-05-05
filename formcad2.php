<?php 
    require_once("header.php");
?>
	<br>
	
	<form action="inserttbprofessor.php" method="POST" enctype="multipart/form-data">
		<div class="form-group col-sm-4">

			<p> <label for="Inputusername">Matrícula: </label> <input type="text" value="<?=utf8_encode($_SESSION['UserDesmatricula'])?>" class="form-control" id="username" name="username" tabindex="1" placeholder="Matrícula" readonly></p>

			<p> <label for="Inputdesemail">E-mail: </label> <input type="email" value="<?=utf8_encode($_SESSION['UserEmail'])?>" class="form-control" id="email" name="email" tabindex="2" placeholder="Email" required=""></p>

			<!-- Alterar Senha -->

			<p> <label for="Inputusername">Nome: </label> <input type="text" value="<?=utf8_encode($_SESSION['UserName'])?>" class="form-control" id="nameuser" name="nameuser" tabindex="3" placeholder="Nome" required=""></p>


			<p> <label for="Inputusername">Whatsapp: </label> <input type="text" value="<?=utf8_encode($_SESSION['UserWhatsapp'])?>" class="form-control" id="phone" name="phone" tabindex="4" placeholder="Whatsapp" required=""></p>

			<p> <input type="submit" value="Gravar" class="btn btn-primary btn-md btn-block"> </p>


		</div>
	</form>
	
<?php 
    require_once("footer.php");
?> 