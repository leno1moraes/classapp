<?php 

    require_once("connect.php");

	$login 		= $_POST["username"];
	$password 	= $_POST["password"];

	$query = "select idprofessor, desname, desemail, deswhatsapp, despassword, hierarchy, desmatricula from tb_professor where desmatricula = '$login' and despassword = '$password'";

	$resultt = mysqli_query($conexao, $query);
	$total = mysqli_num_rows($resultt);
	$dados = mysqli_fetch_assoc($resultt);

    /*var_dump($dados['idprofessor']);
    echo "<br>";
    var_dump($dados['desname']);
    echo "<br>";
    var_dump($dados['desemail']);
    exit();*/	
	
	if($total > 0){

    	if (!isset($_SESSION)) 
        	session_start();

        $_SESSION['UserId'] = $dados['idprofessor'];
        $_SESSION['UserName'] = $dados['desname'];
        $_SESSION['UserEmail'] = $dados['desemail'];
        $_SESSION['UserWhatsapp'] = $dados['deswhatsapp'];
        $_SESSION['UserHierarchy'] = $dados['hierarchy'];
        $_SESSION['UserDesmatricula'] = $dados['desmatricula'];

        header("Location: main.php");

	}else{

		echo "<script language='javascript' type='text/javascript'> alert('Não foi possível login ou usuário não encontrado');window.location.href='login.php'</script>";  		
	}

?>