<?php
include_once('../include/fonction/main.php');
$main=new main();
session_start();
if (!$_SESSION['matricule']){
	header('Location:index.php');
}
$sql="SELECT * FROM `cvp` WHERE `MATRICULE` LIKE '".$_SESSION['matricule']."'";
$matricule=$main->query($sql);
?>


<link rel='stylesheet' type='text/css' href='ressource/fullcalendar/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='ressource/fullcalendar/fullcalendar/fullcalendar.print.css' media='print'/>
<link href="./Jumbotron Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
<style type='text/css'>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		margin-top: 100px;
		}

</style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="accueil.php">MAGESTI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
	  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
	  <li class="nav-item">
            <a class="nav-link" href="accueil.php"><?=$matricule['matricule'];?> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link calendar" href="calendriervente.php">Calendrier de ventes</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="fonction/deconnection.php">Déconnexion</a>
          </li>
</ul>
</div>
    </nav>
    
<div id='calendar'></div>




