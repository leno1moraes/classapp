<?php 
    require_once("connect.php");
    session_start();

    $ridprofessor    = $_SESSION['UserId'];
    $ridmatprofessor = $_GET["idmatprofessor"];

    /*var_dump($ridprofessor);
    var_dump($ridmatprofessor);
    exit();*/

    $query = "call sp_minhamaterias_delete($ridmatprofessor, $ridprofessor)";

    $resultado = mysqli_query($conexao, $query);
    
    if ($resultado == 1) {      
        echo "<script language='javascript' type='text/javascript'> alert('Registro deletado');window.location.href='minhasmaterias2.php'</script>";

    } else {
        echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possível deletar');window.location.href='minhasmaterias2.php'</script>";             
    }   

    mysqli_close($conexao); 
?>