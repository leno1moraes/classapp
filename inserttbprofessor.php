<?php 
    require_once("connect.php");

    //echo "Aqui 1 <br";

    
    $rdesmatricula = $_POST["username"];/*matricula*/
    $rdesemail = $_POST["email"];
    $rdespassword = $_POST["password"];
    $rdesname = $_POST["nameuser"];

    $rdeswhatsapp = $_POST["phone"];
    $rdeswhatsapp = str_replace('(', '', $rdeswhatsapp);
    $rdeswhatsapp = str_replace(')', '', $rdeswhatsapp);
    $rdeswhatsapp = str_replace('-', '', $rdeswhatsapp);
    $rdeswhatsapp = str_replace(' ', '', $rdeswhatsapp);

    if (!isset($_SESSION["UserId"])){
        $ridprofessor = 0;
    }else{
        $ridprofessor = $_SESSION['UserId'];
    }

    $query = "CALL sp_tb_professor_save($ridprofessor, '$rdesname', '$rdesemail', '$rdeswhatsapp', '$rdespassword', 3, '$rdesmatricula')";

	$insert = mysqli_query($conexao, $query);

    $campos = mysqli_fetch_assoc($insert);

    /*var_dump($campos["idprofessor"]);
    exit();*/

    if ((int)$campos["idprofessor"] > 0) {  

        if (!isset($_SESSION)) 
            session_start();

        $_SESSION['UserId'] = $campos['idprofessor'];
        $_SESSION['UserName'] = $campos['desname'];
        $_SESSION['UserEmail'] = $campos['desemail'];
        $_SESSION['UserWhatsapp'] = $campos['deswhatsapp'];
        $_SESSION['UserHierarchy'] = $campos['hierarchy'];
        $_SESSION['UserDesmatricula'] = $campos['desmatricula'];        

		echo "<script language='javascript' type='text/javascript'> alert('Cadastrado com Sucesso!');window.location.href='menuprincipal3.php'</script>";

    } else {
		echo "<script language='javascript' type='text/javascript'> alert('Erro na operação');window.location.href='login.php'</script>";             
    }
    
    //echo "Aqui 4 <br";
    
    mysqli_close($conexao);	
?>