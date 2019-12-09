<?php
include_once('../include/include.php');
$sql="SELECT * FROM `cvp` WHERE `MATRICULE` LIKE '".$_SESSION['vp']."'";
$matricule=$main->query($sql);
$pages=scandir('../admin');

if(isset($_GET['page']) AND in_array($_GET['page'].'.php',$pages)){
  $page=$_GET['page'];
}else{
  $page='moncompte';
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
    <link rel="stylesheet" href="../css/style3.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/lightbox.css">

</head>

<body>

    <header>
     
       <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="margin-top:0;">
  <a class="navbar-brand" href="?page">Gestion des produits</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?page=nouveau_produit">Nouveau produit</a>
          <!--<a class="dropdown-item" href="?page=modifier_produit">Modifier produit</a>-->
          <a class="dropdown-item" href="?page=modifier_photo_produit">Modifier photo produit</a>
          <a class="dropdown-item" href="?page=liste_des_produits">Consulter la liste des produits</a>
          <a class="dropdown-item" href="?page=modif_produit">Modification attribution</a>
      </li>
      
      
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Prix
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?page=nouveau_prix">Nouveau Prix</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="../fonction/deconnection.php" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i>Déconnexion</a>
    </form>
  </div>
</nav>
    </header>

    <main role="main" style="margin-top:70px;">

     <?php
       include_once $page.'.php';
      ?>

    </main>

          <footer id="footer" class="py-4 bg-dark text-white-50" style="margin-top:50px;fixed:bottom;">
            <div class="container text-center">
              <small>Copyright &copy; One To One Marketing <?= date("Y")?></small>
            </div>
          </footer>
    

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body details">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn_modal" data-dismiss="modal">Fermer</button>
        <div class="enregistrement_produit" id="details"></div>
      </div>
    </div>
  </div>
</div>


    <script type="text/javascript" src="../js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.10.4.min.js"></script>
    <script type="text/javascript" src="../js/lightbox.js"></script>
    <script src='../js/ckeditor/ckeditor.js'></script>
    <script type="text/javascript" src="../js/main-menu.js"></script>
    <?php if($page=="nouveau_prix") echo '<script type="text/javascript" src="../js/adminPrix.js"></script>';
    ?>

</body>

</html>