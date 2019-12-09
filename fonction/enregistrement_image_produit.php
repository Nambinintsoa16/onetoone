<?php
     if(isset($_FILES['image']) AND isset($_POST['idproduit'])){
        if(!empty($_POST['idproduit']) AND !empty($_FILES['image'])){
            $chemin_image = '../image/produit/';
            $tmp_name = $_FILES['image']['tmp_name'];
            $name = basename($_FILES["image"]["name"]);

            $extension_autorise=array("jpg","jpeg","png","JPG","PNG");
            $tab=explode(".", $name);//séparer string par '.'
            $extension = $tab[count($tab)-1];
            $test=false;//test si l'extension est autorisé
            foreach($extension_autorise as $extension_autorise){
                if($extension==$extension_autorise){
                    $test=true;
                    break;
                }
            }
           // $idproduit=explode("|",$_POST['idproduit']);
           // $name=$idproduit[0].".".$extension;
           $name=$_POST['idproduit'].".".$extension;
            //test si l'image du produit est déjà présent
            if($test AND !file_exists($chemin_image.$name)){ 
                move_uploaded_file($tmp_name, "$chemin_image/$name");
                header('location:../admin/accueil.php?page=nouveau_produit&&erreur=1');
            }else{
                header('location:../admin/accueil.php?page=nouveau_produit&&erreur="0"');
            }            
        }else{
            header('location:../admin/accueil.php?page=nouveau_produit&&erreur="0"');
         }
     }else{
        header('location:../admin/accueil.php?page=nouveau_produit&&erreur="0"');
     }
?>
