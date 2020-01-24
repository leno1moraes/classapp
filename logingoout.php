<?php
    session_start();
    
    unset($_SESSION['validateauthenticate']);

    unset($_SESSION['UserId']);
    unset($_SESSION['UserName']);
    unset($_SESSION['UserEmail']);
    unset($_SESION['UserWhatsapp']);   
    
    session_destroy();
    
    header('Location: login.php');
?>
