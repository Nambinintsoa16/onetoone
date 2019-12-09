<?php
include_once('main.php');
$main = new main();

if (isset($_POST['codeproduit'])  && isset($_POST['quantite']) && isset($_POST['lieu'])){
  if (!empty($_POST['codeproduit'])  && !empty($_POST['quantite']) && !empty($_POST['lieu']))
		  {
		   $sql="INSERT INTO `vente`(`codeproduit`, `quantite`, `lieu`) VALUES (?,?,?)";
		   $main->query($sql,array($_POST['codeproduit'],$_POST['quantite'],$_POST['lieu']));
		   echo "true";
		   


		  } else{
		     echo "false";

		}
}

?>
 ?>