<?php 
    require_once("connect.php");
    session_start();

    $rdescodprofessor = $_SESSION['UserId'];
    $rdesmateria = $_POST["desmateria"];
    $rdescolor = $_POST["descolor"];
    //$rdessala = $_POST["dessala"];

	$query = "INSERT INTO tb_matprofessor (idmateria, idprofessor, descolor) VALUES ('$rdesmateria', '$rdescodprofessor', '$rdescolor')";

    //var_dump($query);
    //exit();

	$insert = mysqli_query($conexao, $query);

    if ($insert) {      
		echo "<script language='javascript' type='text/javascript'> alert('Cadastrado com Sucesso!');window.location.href='minhasmaterias.php'</script>";

    } else {
		echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possivel executar tal operação');window.location.href='formcadclass.php'</script>";             
    }
    
    mysqli_close($conexao);	
?>