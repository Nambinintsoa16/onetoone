<?php 

include_once('../include/include.php');

$sql="SELECT `Nom`,`Prenom`,`Fonction_Acutelle` FROM `personnel` WHERE `matricule` LIKE '".$_SESSION['matricule']."'";
$matricule=$main->query($sql);?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CONTROLLEUR  COMMERCIALE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../css/font-awesome.min.css">
 <link rel="stylesheet" href="../css/jquery-ui-1.10.4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <link rel="stylesheet" href="../css/coach.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../coach/css/styleCoach.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="../css/lightbox.css">
  
  <style type="text/css">
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light" style="background: linear-gradient(#00b9f9, #0062eb);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      
    </ul>
    <h3  class="text-center" style="color: #fff;font-size: 16px;text-transform: uppercase;padding-top:7px;text-align:center">
   <?php echo $titre;?></h3>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../images/user4-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Fy
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Bonjour, mis vente speciale any, mba confirmeo azafady</p>
                <p class="text-sm text-muted"><i class="fa fa-clock mr-1"></i>Il y a 8h </p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
             <img src="../images/user8-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Lucien
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Bonjour, misaotra amin ilay confirmation</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Il y a 4</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
             <img src="../images/user3-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Fanja
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Bonjour Mr le Controleur</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Il y a 2</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Tous les messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 3 nouveaux messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 ventes spéciales à confirmées
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i>4 Produit Hors planning 
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Toutes les notifications</a>
        </div>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-bg-primary  elevation-4">
    <!-- Brand Logo -->
   
    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="fa fa-home"></i>
              <p>
                Accueil     
              </p>
            </a>
          </li>
          
           <li class="nav-item has-treeview">
            <a href="moncompte.php" class="nav-link">
              <i class="fa fa-user"></i>
              <p>
                Mon Compte     
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-tasks"></i>
              <p>
               Mon Planning
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="background: #ddd;padding-left:15px">
              <li class="nav-item">
                <a href="mamission.php" class="nav-link">
                 <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                  <p>Ma mission</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="mesaccompagnements.php" class="nav-link">
                  <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                  <p>Mes accompagnements</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="mespaniers.php" class="nav-link">
                   <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                  <p>Mon Panier</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="mesterain.php" class="nav-link">
                   <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                  <p>Terrain</p>
                </a>
              </li>
            </ul>
          </li>
 
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-line-chart"></i>
              <p>
               Mes performances
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="background: #ddd;padding-left:15px">
              <li class="nav-item">
                <a href="vente_accompagnement.php" class="nav-link">
                  <i class="fa fa-money"></i>
                  <p>Ventes d'accompagnement</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="chiffreAffaire.php" class="nav-link">
                 <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <p>Chiffres d'affaires</p>
                </a>
              </li>
            </ul>
          </li>
          
          
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-money"></i>
              <p>
               A propos des avantages
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="background: #ddd;padding-left:15px">
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-edit"></i>
                  <p>Statut et avantages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-edit"></i>
                  <p>Gagner des points?</p>
                </a>
              </li>
              
              
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-edit"></i>
                  <p>Gagner des bonus?</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="privilege.php" class="nav-link">
                  <i class="fa fa-info-circle"></i>&nbsp;
                  <p>Mes privileges?</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="fa fa-vcard-o"></i>
              <p>
               Rapport
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="background: #ddd;padding-left:15px">
              <li class="nav-item">
                <a href="rapport_vente.php" class="nav-link">
                  <i class="fa fa-edit"></i>
                  <p>Vente</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="depense_sur_terrain.php" class="nav-link">
                  <i class="fa fa-edit"></i>
                  <p>Dépenses sur terrain</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="rapport_manque.php" class="nav-link">
                  <i class="fa fa-edit"></i>
                  <p>Manques</p>
                </a>
              </li>
            </ul>
          </li>
          
         <li class="nav-item has-treeview">
               <a href="../fonction/deconnection.php" class="nav-link">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter   
                </a>
          </li>
        </ul>
        
        
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
