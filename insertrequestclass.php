<?php 
    require_once("connect.php");
    session_start();

    $rdessala    = $_POST["dessala"];
    $rdesday     = $_POST["desday"];
    $rdeshour    = $_POST["deshour"];
    $rdesmateria = $_POST["desmateria"];
    $rdesjustify = $_POST["desjustify"];

    /*
        echo "rdessala: ";
        var_dump($rdessala);
        echo "<br>";
        echo "rdesday: ";
        var_dump($rdesday);
        echo "<br>";
        echo "rdeshour: ";
        var_dump($rdeshour);
        echo "<br>";
        echo "rdesmateria: ";
        var_dump($rdesmateria);
        echo "<br>";
        var_dump($rdesjustify);
        echo "<br>";*/

    /*
        var_dump($query);
        exit();*/        

    /* 
    Parametros
        pidday - int 
        pidhourrangeclass - int
        pidmatprofessor - int
        pidclassroom - int
        pdesjustify - varchar(45)
    */

	$query = "call sp_quadrohorarios_save($rdesday, $rdeshour, $rdesmateria, $rdessala, '$rdesjustify');";

	$insert = mysqli_query($conexao, $query);

    if ($insert == 1) {      
		echo "<script language='javascript' type='text/javascript'> alert('Solicitação realizada com sucesso - Aguardando autorização do(a) professor(a)');window.location.href='requestclass2.php'</script>";

    } else {
		echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possível executar operação');window.location.href='requestclass2.php'</script>";             
    }
    
    mysqli_close($conexao);
?>