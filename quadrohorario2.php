
<?php 
    require_once("header.php");
?>
	<hr>
    <?php       
    	/*
		0 - domingo
		1 - segunda
		2 - terça
		3 - quarta
		4 - quinta
		5 - sexta
		6 - sabado
    	*/

    	$dayweek = date('w');

    	if ($dayweek == 0 || $dayweek == 6){
    		$dayweek = 5;
    	}

    	$dayweek = 5;

    	$query = "select a.idquadrodehorario, a.idday, b.desday, a.idhourrangeclass, 
					   d.hour_inicio, d.hour_fim, a.idmatprofessor, f.desmateria, e.descolor, g.desname, a.idclassroom, h.desclassroom
				from tb_quadrodehorario a
					left join tb_day b on a.idday = b.idday
				    left join tb_hourrangeclass c on a.idhourrangeclass = c.idhourrangeclass
				    left join tb_hour d on c.idhour = d.idhour
				    left join tb_matprofessor e on  a.idmatprofessor = e.idmatprofessor
				    left join tb_materia f on e.idmateria = f.idmateria
				    left join tb_professor g on e.idprofessor = g.idprofessor
				    left join tb_classroom h on a.idclassroom = h.idclassroom
				where b.idday = ".$dayweek." and a.idclassroom = 1 and a.flag in (0, 5)
				order by a.idhourrangeclass asc";
				/*order by a.idquadrodehorario asc*/
        $listadados=mysqli_query($conexao, $query);

        $dado = mysqli_fetch_array($listadados);

    ?> 	
	<table class="bordercustomizado meustilo table-no-bordered col-md-5 table-bordered">
		<tr>
			<td class="border border-secondary rounded-top" colspan="2" align="center" bgcolor="#262626">
				<font color="white" style="font-size:2em"><?=utf8_encode($dado["desclassroom"])?><!--1º A--></font>
			</td>
		</tr>		
		<tr>
			<td class="border border-secondary rounded" colspan="2" bgcolor="#262626">
				<font color="white" style="font-size:1.5em"><?=utf8_encode($dado["desday"])?><!--Segunda-Feira--></font>
			</td>
		</tr>
 
		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dado["hour_inicio"]?><!--07:15--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dado["descolor"]?>">
				<?=utf8_encode($dado["desmateria"])?><!--Aula 1-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dado["hour_fim"]?><!--08:05--></font>
			</td>			
		</tr>

    <?php
    	$i = 0;

        while ($dados = mysqli_fetch_array($listadados)){

        	$i = $i + 1;

        	if ($i == 2) {
    ?>
    
		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dados["hour_inicio"]?><!--08:55--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dados["descolor"]?>">
				<?=utf8_encode($dados["desmateria"])?><!--Aula 3-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dados["hour_fim"]?><!--09:45--></font>
			</td>			
		</tr>		

		<tr>
			<td colspan="2" align="center" valign="middle" bgcolor="#000000">
				<font color="white">INTERVALO</font>
			</td>					
		</tr>

	<?php
        	} elseif ($i == 4) {

    ?>

		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dados["hour_inicio"]?><!--10:50--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dados["descolor"]?>">
				<?=utf8_encode($dados["desmateria"])?><!--Aula 5-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dados["hour_fim"]?><!--11:40--></font>
			</td>			
		</tr>

		<tr>
			<td colspan="2" align="center" valign="middle" bgcolor="#000000">
				<font color="white">INTERVALO (AL)</font>
			</td>					
		</tr>

	<?php
        	} elseif ($i == 6) {

    ?>
		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dados["hour_inicio"]?><!--14:20--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dados["descolor"]?>">
				<?=utf8_encode($dados["desmateria"])?><!--Aula 7-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dados["hour_fim"]?><!--15:10--></font>
			</td>			
		</tr>		

		<tr>
			<td colspan="2" align="center" valign="middle" bgcolor="#000000">
				<font color="white">INTERVALO</font>
			</td>					
		</tr>

	<?php
        	}else{

    ?>
		<tr>
			<td class="border border-secondary rounded-top" width="30%" align="center" bgcolor="#262626">
				<font color="white"><?=$dados["hour_inicio"]?><!--07:15--></font>
			</td>
			<td class="rounded-right" rowspan="2" width="70%" align="center" valign="middle" bgcolor="<?=$dados["descolor"]?>">
				<?=utf8_encode($dados["desmateria"])?><!--Aula 2-->
			</td>			
		</tr>
		<tr>
			<td class="border border-secondary rounded-bottom" align="center" bgcolor="#000000">
				<font color="white"><?=$dados["hour_fim"]?><!--08:05--></font>
			</td>			
		</tr>

    <?php 
        	}/*if*/

    	}/*while*/
    ?> 

	</table>
<?php 
    require_once("footer.php");
?>  