<?php 
    require_once("connect.php");
    session_start();

    $rdesmateria = $_POST["desmateria"];
    $rdessala = $_POST["dessala"];
    $rdesday = $_POST["desday"];

    /*var_dump($rdesmateria);
    var_dump($rdessala);
    var_dump($rdesday);
    exit();*/

	$query = "INSERT INTO tb_matprofessor (idmateria, idprofessor, descolor) VALUES ('$rdesmateria', '$rdescodprofessor', '$rdescolor')";

    //var_dump($query);
    //exit();

	$insert = mysqli_query($conexao, $query);

    if ($insert) {      
		echo "<script language='javascript' type='text/javascript'> alert('Cadastrado com Sucesso!');window.location.href='formcadclass.php'</script>";

    } else {
		echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possivel executar tal operação');window.location.href='formcadclass.php'</script>";             
    }
    
    mysqli_close($conexao);	
?>