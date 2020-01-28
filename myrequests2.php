<?php 
    require_once("header.php");
?>
	<hr>

    <?php          
    	$query = "select a.idquadrodehorario, a.idday, b.desday, a.idhourrangeclass,  i.desrangeclass,
					   d.hour_inicio, d.hour_fim, a.idmatprofessor, f.desmateria, e.descolor, 
                       g.desname, a.idclassroom, h.desclassroom, a.flag,
                       case when a.flag = 1 then 'Aguardando autorização do(a) professor(a)'
                            when a.flag = 4 then 'Aguardando autorização do(a) coordenador(a)'
                            when a.flag = 3 then 'Solicitação negada'
                       end as statussol
				from tb_quadrodehorario a
					left join tb_day b on a.idday = b.idday
				    left join tb_hourrangeclass c on a.idhourrangeclass = c.idhourrangeclass
				    left join tb_hour d on c.idhour = d.idhour
				    left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
				    left join tb_materia f on e.idmateria = f.idmateria
				    left join tb_professor g on e.idprofessor = g.idprofessor
				    left join tb_classroom h on a.idclassroom = h.idclassroom
                    left join tb_rangeclass i on c.idrangeclass = i.idrangeclass
				where e.idprofessor = ".$_SESSION['UserId']."
					  and a.flag in (1, 3, 4)
                order by a.idquadrodehorario desc;";
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
						statussol
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
					<td  class="font-weight-bold">
						<?=$i?>
					</td>
					<td>
						<?=utf8_encode($dados["desclassroom"])?>
					</td>					
					<td>
						<?=utf8_encode($dados["desday"])?>
					</td>
					<td>
						<?=$dados["desrangeclass"]?>
					</td>
					<td>
						<?=utf8_encode($dados["desmateria"])?>
					</td>
	    <?php
	        /*
	        flag
	        	1 = azul
	        	4 = verde
	        */
	    	
	    	if ($dados["flag"] == '1') {
	    		echo "<td class=\"rounded border border-primary bg-primary btn-block font-weight-bold\">";

	    	}elseif ($dados["flag"] == '4') {
	    		echo "<td class=\"rounded border border-success bg-success btn-block font-weight-bold\">";

	    	}elseif ($dados["flag"] == '3') {
	    		echo "<td class=\"rounded border border-secondary bg-secondary btn-block font-weight-bold\">";	    		

	    	}else{
	    		echo "<td>";

	    	}
	    ?>										
						<?=$dados["statussol"]?>
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
			echo '<strong>&nbsp;&nbsp;&nbsp;&nbsp;Não há solicitação</strong>';

		}

    require_once("footer.php");
?> 