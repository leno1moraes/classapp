<?php 
    require_once("connect.php");
    session_start();

    $rdescodprofessor   = $_SESSION['UserId'];
    $ridquadrodehorario = $_GET["idquadrodehorario"];
    $rsetflag           = $_GET["setflag"];

    /*
    var_dump($rdescodprofessor);
    var_dump($ridquadrodehorario);
    var_dump($rsetflag);
    exit();*/

    /*
    rsetflag
        1 - autorizar | atribuir 4
        2 - negar | atribuir 3
    */

    if ($rsetflag == 1){
        $query = "update tb_quadrodehorario set flag = 4 where idquadrodehorario = ".$ridquadrodehorario;

    }elseif ($rsetflag == 2) {
        $query = "update tb_quadrodehorario set flag = 3 where idquadrodehorario = ".$ridquadrodehorario;

    }

    $update = mysqli_query($conexao, $query);

    header('Location: myauthorize2.php');      

    mysqli_close($conexao);	
?>