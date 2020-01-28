<?php 
    require_once("header.php");
?>
	<br>
	
	<form action="inserttbmatprofessor.php" method="POST" enctype="multipart/form-data">
		<div class="form-group col-sm-4">

			<p> <label for="Selectdesmateria">Matéria: </label>
				<select class="form-control" name="desmateria">
					<option value="0" selected>Escolher</option>
                    <?php          
                    	$queryp = "SELECT idmateria, desmateria FROM tb_materia order by idmateria";
                        $listadadosp=mysqli_query($conexao, $queryp); 
                        while ($campop=mysqli_fetch_array($listadadosp)){
                    ?>  
					<option value="<?=$campop["idmateria"]?>"><?=utf8_encode($campop["desmateria"])?></option>

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

<?php 
    require_once("footer.php");
?> 