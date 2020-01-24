<?php 
    require_once("connect.php");

    //echo "Aqui 1 <br";

    $rdesname = $_POST["desname"];     
    $rdesmateria = $_POST["desmateria"];
    $rdescolor = $_POST["descolor"];
    $rdesemail = $_POST["desemail"];
    $rdeswhatsapp = $_POST["deswhatsapp"];
    $rdespassword = $_POST["despassword"];


	//echo "Aqui 2 <br>";

	$query = "INSERT INTO tb_professor (desname, desemail, deswhatsapp, despassword)
	VALUES ('$rdesname', '$rdesemail', '$rdeswhatsapp', '$rdespassword')";

	//echo "Aqui 3 <br>";


	$insert = mysqli_query($conexao, $query);

    if ($insert) {  

        if (!isset($_SESSION)) 
            session_start();
        
        $_SESSION['UserWhatsapp'] = $rdeswhatsapp;

		echo "<script language='javascript' type='text/javascript'> alert('Cadastrado com Sucesso!');window.location.href='menuprincipal.php'</script>";

    } else {
		echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possivel executar tal operação');window.location.href='formcad.php'</script>";             
    }
    
    //echo "Aqui 4 <br";
    
    mysqli_close($conexao);	
?>