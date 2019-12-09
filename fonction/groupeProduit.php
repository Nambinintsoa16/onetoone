<?php 
include_once("../include/include.php");
if(isset($_POST['famille']) AND !empty($_POST['famille'])):
  if($_POST['famille']=="Tout"){
$sql="SELECT `type` FROM `categorie` WHERE 1";
$groupe=$main->queryAll($sql);
  }else {
    $sql="SELECT `type` FROM `categorie` WHERE `famille` LIKE ?";
    $groupe=$main->queryAll($sql,array($_POST['famille']));  
  }
?>
<option disabled selected hidden>Groupe</option>
<option>Tout</option>
<?php
if($groupe):
 foreach($groupe as $groupe):
?>
 <option><?=$groupe['type']?></option>
<?php
 endforeach;
  endif;
   endif;
?>