<?php 
    require_once("header.php");
?>
	<br>

	<div class="col-sm-4">

		<form class="form-group" action="insertrequestclass.php" method="POST" enctype="multipart/form-data">


			<p> <label for="iddessala">Sala</label> 
				<select id="iddessala" name="dessala"class="form-control btn-block rounded">
					<option value="0" selected>Escolher</option>

			        <?php          
        				$query = "SELECT idclassroom, desclassroom FROM tb_classroom order by idclassroom asc";
			            $listadados=mysqli_query($conexao, $query); 
			            while ($dados=mysqli_fetch_array($listadados)){
			        ?> 					
					<option value="<?=$dados["idclassroom"]?>"><?=utf8_encode($dados["desclassroom"])?></option>
			        <?php 
			        	}
			        ?>	
				</select>
			</p>

			<p> <label for="iddesday">Dia</label> 
				<select id="iddesday" name="desday" class="form-control btn-block rounded">
					<option value="0" selected>Escolher</option>
			        <?php          
        				$query = "SELECT idday, desday, flag FROM tb_day where flag = 1 order by idday";
			            $listadados=mysqli_query($conexao, $query); 
			            while ($dados=mysqli_fetch_array($listadados)){
			        ?>s
					<option value="<?=$dados["idday"]?>"><?=utf8_encode($dados["desday"])?></option>
			        <?php 
			        	}
			        ?>						
				</select>
			</p>


			<p> <label for="iddeshour">Horário</label> 
				<select id="iddeshour" name="deshour" class="form-control btn-block rounded">
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



			<p> <label for="iddesmateria">Matéria</label>
				<select id="iddesmateria" name="desmateria" class="form-control btn-block rounded">
					<option value="0" selected>Escolher</option>
			        <?php          
        				$query = "SELECT a.idmatprofessor, a.idmateria, b.desmateria, a.idclassroom, c.desclassroom, a.idprofessor, a.descolor  FROM tb_matprofessor a left join tb_materia b on b.idmateria = a.idmateria left join tb_classroom c on c.idclassroom = a.idclassroom where idprofessor = ".$_SESSION['UserId'];
			            $listadados=mysqli_query($conexao, $query); 
			            while ($dados=mysqli_fetch_array($listadados)){
			        ?>   					
					<option value="<?=$dados["idmatprofessor"]?>"><?=utf8_encode($dados["desmateria"])?></option>
			        <?php 
			        	}
			        ?>					
				</select>
			</p>
			
			<p> <label for="iddesjustify">Justificativa</label>
				<textarea id="iddesjustify" name="desjustify" class="form-control btn-block rounded" rows="3"></textarea>
			</p>
			
			<p> <input type="submit" value="Solicitar" class="btn btn-primary btn-md btn-block"> </p>

		</form>	
    </div>
    
<?php 
    require_once("footer.php");
?> 