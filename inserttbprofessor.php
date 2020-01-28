<?php 
    require_once("connect.php");

    //echo "Aqui 1 <br";

    $rdesname = $_POST["desname"];     
    $rdesemail = $_POST["desemail"];

    $rdeswhatsapp = $_POST["deswhatsapp"];
    $rdeswhatsapp = str_replace('(', '', $rdeswhatsapp);
    $rdeswhatsapp = str_replace(')', '', $rdeswhatsapp);
    $rdeswhatsapp = str_replace('-', '', $rdeswhatsapp);
    $rdeswhatsapp = str_replace(' ', '', $rdeswhatsapp);

    $rdespassword = $_POST["despassword"];
    

	$query = "INSERT INTO tb_professor (desname, desemail, deswhatsapp, despassword, hierarchy)
	VALUES ('$rdesname', '$rdesemail', '$rdeswhatsapp', '$rdespassword', 3)";

	$insert = mysqli_query($conexao, $query);

    if ($insert) {  

        if (!isset($_SESSION)) 
            session_start();
        
        $_SESSION['UserWhatsapp'] = $rdeswhatsapp;

		echo "<script language='javascript' type='text/javascript'> alert('Cadastrado com Sucesso!');window.location.href='login.php'</script>";

    } else {
		echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possivel executar tal operação');window.location.href='formcad.php'</script>";             
    }
    
    //echo "Aqui 4 <br";
    
    mysqli_close($conexao);	
?>