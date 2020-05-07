<?php 
    require_once("connect.php");
    session_start();
?>  

<!DOCTYPE html>
<!-- saved from url=(0047)https://adminlte.io/themes/AdminLTE/index2.html -->
<html style="height: auto; min-height: 100%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Troca de Horários</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="AdminTLEFiles/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminTLEFiles/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="AdminTLEFiles/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="AdminTLEFiles/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminTLEFiles/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="AdminTLEFiles/_all-skins.min.css">

  <link rel="stylesheet" href="open-iconic-master/font/css/open-iconic-bootstrap.css">

  <link rel="stylesheet" href="AdminTLEFiles/bootstrap-datepicker.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="AdminTLEFiles/css">
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
</style>

<style type="text/css">
	.bordercustomizado{
		border-collapse: separate;
	}		

	.meustilo{
		font-family: Arial, Helvetica, sans-serif;
	}

	.oi-pencil {
		color: 	#4d4d4d;
	}

	.oi-delete {
		color: 	#4d4d4d;
	}	

	.borderless{
		border-collapse: separate;
	}

	.borderless td, .borderless th {
		border: none;
	}		

  .DateField{
    font-family: Arial, Helvetica, sans-serif;
  }

  .tableMaster tr{
    background-color: #CCCCFF;
    color: black;
  }

</style>

</head>
<body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">

<div class="wrapper" style="height: auto; min-height: 100%;">

  <header class="main-header">

    <!-- Logo -->
    <!--<a href="http://lrv.ifmt.edu.br/inicio/" class="logo">-->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LRV</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>IFMT</b> LRV</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="https://adminlte.io/themes/AdminLTE/index2.html#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="https://adminlte.io/themes/AdminLTE/index2.html#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">

              <li class="header">You have 4 messages</li>

              <li class="footer"><a href="https://adminlte.io/themes/AdminLTE/index2.html#">See All Messages</a></li>
            </ul>
          </li>

          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="https://adminlte.io/themes/AdminLTE/index2.html#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>

              <li class="footer"><a href="https://adminlte.io/themes/AdminLTE/index2.html#">View all</a></li>
            </ul>
          </li>

          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="https://adminlte.io/themes/AdminLTE/index2.html#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>

              </li>
              <li class="footer">
                <a href="https://adminlte.io/themes/AdminLTE/index2.html#">View all tasks</a>
              </li>
            </ul>
          </li>

        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="AdminTLEFiles/user-logo-now3.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=utf8_encode($_SESSION['UserName'])?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">


        <li><a href="quadrohorario2.php"><i class="fa fa-archive"></i> <span>Quadro de Horário</span></a></li>
        
        <li><a href="myrequests.php"><i class="fa fa-archive"></i> <span>Minhas Solicitações</span></a></li>
        
        <!--<li><a href="requestclass2.php"><i class="fa fa-edit"></i> <span>Solicitar Aula</span></a></li>-->

        <li><a href="quadrohorario-stage-a.php"><i class="fa fa-edit"></i> <span>Solicitar Aula</span></a></li>


        <li><a href="myauthorize2.php"><i class="fa fa-laptop"></i> <span>Autorizações</span></a></li>
        
        <li><a href="formcad2.php"><i class="fa fa-th"></i> <span>Minhas Informações</span></a></li>   
        
        <li><a href="minhasmaterias2.php"><i class="fa fa-tags"></i> <span>Minhas Matérias</span></a></li>

		<li><a href="login.php"><i class="fa fa-sign-out"></i> <span>Sair</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sistema Troca de Horários
        <small>V 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="https://adminlte.io/themes/AdminLTE/index2.html#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>    
    <!-- ABRI AQUI O PAGINA PRINCIPAL -->    
    <!-- Main content -->
    <!--aqui-->
