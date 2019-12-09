<?php
/* Getting file name */
$filename = $_FILES['file']['name'];
$idproduit=$_GET['idproduit'];
/* Location */
$location = "../image/produit/".$idproduit.".jpg";
$uploadOk = 1;
//$photopro=explode(".","../image/produit/".$idproduit.".jpg",PATHINFO_BASENAME);
     if(file_exists($location)){
        unlink($location);}
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
  $uploadOk = 0;
};
 if($uploadOk == 0){
  echo 0;
}else{
   /* Upload file */
  if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
   }else{
      echo 0;
   }
}
?>