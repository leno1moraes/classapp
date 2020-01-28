<?php 
    require_once("connect.php");
    session_start();

    $rdesname = $_POST["desname"];
    $rdesemail = $_POST["desemail"];
    $rdeswhatsapp = $_POST["deswhatsapp"];

    /*var_dump($rdesname);
    var_dump($rdesemail);
    var_dump($rdesemail);
    var_dump($_SESSION['UserId']);
    exit();*/

	//echo "Aqui 2 <br>";

	$query = "update tb_professor set desname = '$rdesname', desemail = '$rdesemail', deswhatsapp = '$rdeswhatsapp' where idprofessor = ".$_SESSION['UserId'];

    /*var_dump($query);
    exit();*/


	$update = mysqli_query($conexao, $query);

    if ($update) {

        $_SESSION['UserName'] = $rdesname;
        $_SESSION['UserEmail'] = $rdesemail;
        $_SESSION['UserWhatsapp'] = $rdeswhatsapp;        

		echo "<script language='javascript' type='text/javascript'> alert('Atualizado com Sucesso!');window.location.href='formcad2.php'</script>";

    } else {
		echo "<script language='javascript' type='text/javascript'> alert('Erro, não foi possivel executar tal operação');window.location.href='formcad2.php'</script>";             
    }
    
    mysqli_close($conexao);	
?>