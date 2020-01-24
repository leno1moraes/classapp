<?php 

    require_once("connect.php");

	$login = $_POST["deswhatsapp"];
	$login = str_replace('(', '', $login);
	$login = str_replace(')', '', $login);
	$login = str_replace('-', '', $login);
	$login = str_replace(' ', '', $login);
	$password = $_POST["despassword"];

	$query = "select idprofessor, desname, desemail, deswhatsapp, despassword from tb_professor where deswhatsapp = '$login' and despassword = '$password'";

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

        header("Location: menuprincipal.php");

	}else{

		echo "<script language='javascript' type='text/javascript'> alert('Não foi possível login ou usuário não encontrado');window.location.href='login.php'</script>";  		
	}

?>