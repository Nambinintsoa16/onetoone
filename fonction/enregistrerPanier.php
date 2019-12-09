  <?php  
  include_once("../include/include.php");
    
       if(isset($_POST['designation']) AND isset($_POST['code_produit'])){
           if(!empty($_POST['designation']) AND !empty($_POST['code_produit'])){
                  $sql="INSERT INTO `panier`(`id`, `desigbation`, `IdProduit`, `date`, `status`) VALUES (?,?,?,?,?)";
                  $date = date("Y-m-d");
                  $resultat=$main->query($sql,array(NULL,$_POST['designation'],$_POST['code_produit'],$date,'Actif'));
                   echo '<h4 class="text-success text-center">Nouveau panier ajouté</h4>';
           }else{
               echo '<h4 class="text-danger text-center">Veuillez complete tous les champs</h4>';
           }
       }else{
           echo '<h4 class="text-danger text-center">Erreur d`\' insertion</h4>';
       }
?>