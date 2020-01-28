<?php 
    require_once("header.php");
?>
	<br>
	<div class="col-sm-4">
		<button class="btn btn-primary" onclick="location.href='formcadclass2.php'">Adicionar</button>
	</div>
	<br>	
	<br>
	<br>

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

<?php 
    require_once("footer.php");
?> 