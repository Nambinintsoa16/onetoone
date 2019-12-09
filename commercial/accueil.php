<?php
include_once('../include/include.php');
$pages=scandir('../commercial');
$sql="SELECT `lieu` FROM `mission` WHERE `idMission` LIKE ?";
$lieu=$main->query($sql,array($_SESSION['idMission']));
if(isset($_GET['page']) AND in_array($_GET['page'].'.php',$pages)){
  $page=$_GET['page'];
}else{
  $page='badge';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../image/Icon/logo.ico">
    <title>MAGESTI</title>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/jquery-ui-1.10.4.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   
    <link rel="stylesheet" href="../css/lightbox.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
   
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="../css/adminlte.min.css">
 

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-primary navbar-light" style="background: linear-gradient(#ff0000, #ff4420);">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
<div class="container-fluide" style="width:80%;">
    <div class="row"> 
         <div class="text-center col-md-12">
               <h3 style="color: #fff;font-size: 12px;margin-top:5px;"><?=strtoupper($main->filigramme($page));?></h3>
         </div>
       
    </div>
</div>    
    
  
  
   <ul class="navbar-nav ml-auto">
      <?php if($page!="badge" && $page!="moncompte"): ?>
       <a href="?page="><img style="height:35px;width:35px;margin-top:-10px;overflow:hidden;" src="../image/personnel/<?=$_SESSION['matricule']?>.jpg" alt="User Avatar" class="mr-3 img-circle ">
      <?php endif;?>
    </ul>
 
  </nav>
 
  <aside class="main-sidebar sidebar-bg-primary  elevation-4" style="background-color:#fff;">
 
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item has-treeview">
            <a href="?page=badge" class="nav-link">
              <i class="fa fa-home"></i>
              <p>
                Accueil     
              </p>
            </a>
            
          </li>
          
           <li class="nav-item has-treeview">
            <a href="?page=moncompte" class="nav-link">
              <i class="fa fa-vcard-o"></i>
              <p>
                Mon compte    
              </p>
            </a>
            
          </li>
          
          
             <li class="nav-item has-treeview">
               <a href=" ?page=liste_des_produits" class="nav-link">
                <i class="fa fa-cubes" aria-hidden="true"></i> Mes produits   
                </a>
             </li>
          
          

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-shopping-cart fa-1x"></i>
              <p>
               Mes Ventes
                <i class="fa fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview" style="background: #ddd;">
              <li class="nav-item">
                  
                <a href="?page=enregistrement_de_vente" class="nav-link">
                  <i class="fa fa-shopping-basket"></i>
                  <p>Enregistrement</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="?page=mes_vente" class="nav-link">
                  <i class="fa fa-list"></i>
                  <p>vente du jour</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=suivi_des_ventes" class="nav-link">
                  <i class="fa fa-list-alt"></i>
                  <p>Calendrier</p>
                </a>
              </li>
            </ul>
          </li>
 
 
 
     <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
                Mes clients
                <i class="fa fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview" style="background: #ddd;">
              <li class="nav-item">
                  
                <a href="?page=liste_des_facebook" class="nav-link">
                  <i class="fa fa-shopping-basket"></i>
                  <p>Mes clients Facebook</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="?page=liste_des_clients_sur_terrain" class="nav-link">
                  <i class="fa fa-list"></i>
                  <p>Mes clients sur Terrain</p>
                </a>
              </li>
            </ul>
          </li>
 

 
                    <li class="nav-item has-treeview">
                       <a href="?page=privilege" class="nav-link">
                      <i class="fa fa-info-circle" aria-hidden="true"></i> Mes Privilèges 
                     </a>
                    
 
                     <li class="nav-item has-treeview">
                       <a href="../fonction/deconnection.php" class="nav-link">
                      <i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter   
                     </a>
                    </li>
        </ul>
        
        
        
      </nav>
 
    </div>
  
  </aside>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-info"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
<div class="content-wrapper">
    <div class="content-corp">
         <div class="container-fluid">
 <main role="main">

     <?php
       include_once $page.'.php';
      ?>

    </main>
</div>
  </div>
    </div>
    

 <footer class="main-foote page-footer text-center" style="fixed:bottom;font-size:11px;padding-bottom:20px;margin-top:20px;">
    <strong>Copyright &copy; 2019 <a href="#">Gestion Commerciale</a>.</strong>
   Tous droits réservés
    
  </footer>

 
</div>
<script type="text/javascript" src="../js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.10.4.min.js"></script>
    <script type="text/javascript" src="../js/lightbox.js"></script>
    <script type="text/javascript" src="../js/main-menu.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script src="../js/controlleur/adminlte.js"></script>
    <script src='../js/custom-file-input.js'></script>
    <script src='../js/bootbox/bootbox.js'></script>
    <script src='../js/bootbox/bootbox.locales.js'></script>
    <script src="../js/jquery.number.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
 <?php if($page=="liste_des_produits"){
       echo '<script type="text/javascript" src="../js/tableProduit.js"></script>';
 }else if($page=="detail_point"){
       echo '<script type="text/javascript" src="../js/tablePoint.js"></script>';
       echo '<script type="text/javascript" src="../js/tableJr.js"></script>';
 }else if($page=="detail_vente_sur_terrain"){
     echo '<script type="text/javascript" src="../js/filtreDetailVente.js"></script>';
 }else if($page=="detail_vente_facebook"){
      echo '<script type="text/javascript" src="../js/filtreDetailVentefb.js"></script>';
 }else if($page=="moncompte"){
      echo '<script type="text/javascript" src="../js/monca.js"></script>';
 }else if($page=="suivi_des_ventes"){
      echo '<script type="text/javascript" src="../js/suivi_des_ventes.js"></script>';
 }  
  
 
 ?>
</body>
</html>

   



