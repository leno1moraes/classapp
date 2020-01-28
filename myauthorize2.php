<?php 
    require_once("header.php");
?>
	<hr>

    <?php

    	if ($_SESSION['UserHierarchy'] == '2'){
    		//echo "Coordenador: ".$_SESSION['UserName'];
	    	$query = "select a.idquadrodehorario, a.idday, b.desday, a.idhourrangeclass,  i.desrangeclass,
						d.hour_inicio, d.hour_fim, a.idmatprofessor, f.desmateria, e.descolor, 
						g.desname, a.idclassroom, h.desclassroom, a.flag, a.desjustify
				from tb_quadrodehorario a
					left join tb_day b on a.idday = b.idday
				    left join tb_hourrangeclass c on a.idhourrangeclass = c.idhourrangeclass
				    left join tb_hour d on c.idhour = d.idhour
				    left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
				    left join tb_materia f on e.idmateria = f.idmateria
				    left join tb_professor g on e.idprofessor = g.idprofessor
				    left join tb_classroom h on a.idclassroom = h.idclassroom
                    left join tb_rangeclass i on c.idrangeclass = i.idrangeclass
				where  a.flag = 4
                order by a.idquadrodehorario desc";    		

    	}else{
    		//echo "Professor: ".$_SESSION['UserName'];
	    	$query = "select a.idquadrodehorario, a.idday, b.desday, a.idhourrangeclass,  i.desrangeclass,
							 d.hour_inicio, d.hour_fim, a.idmatprofessor, f.desmateria, e.descolor, 
							 g.desname, a.idclassroom, h.desclassroom, a.flag, a.desjustify
					from tb_quadrodehorario a
						left join tb_day b on a.idday = b.idday
					    left join tb_hourrangeclass c on a.idhourrangeclass = c.idhourrangeclass
					    left join tb_hour d on c.idhour = d.idhour
					    left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
					    left join tb_materia f on e.idmateria = f.idmateria
					    left join tb_professor g on e.idprofessor = g.idprofessor
					    left join tb_classroom h on a.idclassroom = h.idclassroom
	                    left join tb_rangeclass i on c.idrangeclass = i.idrangeclass
					where a.flag = 1 and a.idquadrodehorario in (	select a.solicitacao
													from tb_quadrodehorario a
														left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
													where e.idprofessor = ".$_SESSION['UserId']."
														  and a.solicitacao <> 0)
	                order by a.idquadrodehorario desc";

    	}
      	$listadados = mysqli_query($conexao, $query);

      	$row_count = mysqli_num_rows($listadados);

      	if ($row_count > 0) {
    ?>  

    <div class="col-sm-8">
		<table class="table table-bordered-top">
			<!--
			<thead>
				<tr>
					<th>
						idquadrodehorario
					</th>
					<th>
						desname
					</th>					
					<th>
						desclassroom
					</th>					
					<th>
						desday
					</th>
					<th>
						desrangeclass
					</th>
					<th>
						desmateria
					</th>	
					<th>
						desjustify
					</th>						
					<th>
						Autorizar
					</th>
					<th>
						Negar
					</th>						
				</tr>
			</thead>
			-->
			<tbody>

	    <?php
	    	$i = 0;
	        while ($dados = mysqli_fetch_array($listadados)){
	        	$i = $i + 1;
	    ?>
				<tr>
					<td  class="font-weight-bold" align="middle">
						<?=$i?>
					</td>
					<td align="middle">
						<?=utf8_encode($dados["desname"])?>
					</td>					
					<td align="middle">
						<?=utf8_encode($dados["desclassroom"])?>
					</td>					
					<td align="middle">
						<?=utf8_encode($dados["desday"])?>
					</td>
					<td align="middle">
						<?=$dados["desrangeclass"]?>
					</td>
					<td align="middle">
						<?=utf8_encode($dados["desmateria"])?>
					</td>
					<td align="middle">
						<?=utf8_encode($dados["desjustify"])?>
					</td>					
					<td>
	    <?php
	    				if ($_SESSION['UserHierarchy'] == '2'){
	    ?>
						<button type="button" class="btn btn-success btn-block" onclick="window.location='myauthorizeprocesscoordenator.php?idquadrodehorario=<?=$dados["idquadrodehorario"]?>&setflag=1';">Autorizar (c)</button>	 
	    <?php
	    				}else{
	    ?>
						<button type="button" class="btn btn-success btn-block" onclick="window.location='myauthorizeprocess.php?idquadrodehorario=<?=$dados["idquadrodehorario"]?>&setflag=1';">Autorizar</button>	    
	    <?php
	    				}
	    ?>
					</td>	
					<td>
	    <?php
	    				if ($_SESSION['UserHierarchy'] == '2'){
	    ?>
						<button type="button" class="btn btn-danger btn-block" onclick="window.location='myauthorizeprocesscoordenator.php?idquadrodehorario=<?=$dados["idquadrodehorario"]?>&setflag=2';">Negar (c)</button>	 
	    <?php
	    				}else{
	    ?>
						<button type="button" class="btn btn-danger btn-block" onclick="window.location='myauthorizeprocess.php?idquadrodehorario=<?=$dados["idquadrodehorario"]?>&setflag=2';">Negar</button>    
	    <?php
	    				}
	    ?>
					</td>																												
				</tr>
	    <?php
	        }        	
	    ?>
			</tbody>			
		</table>
	</div>

<?php 
		}else{
			echo '<strong>&nbsp;&nbsp;&nbsp;&nbsp;Não há autorizações</strong>';

		}

    require_once("footer.php");
?> 