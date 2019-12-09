
<?php
include_once("../include/include.php");
$sql="SELECT `activite`,`date`,`heure`,`point` FROM `historique_personnel` WHERE `date` LIKE ? AND `personnel` LIKE ?  ORDER BY `date` ASC";
$point_du_jour=$main->queryAll($sql,array(date("Y-m-d"),$_SESSION['matricule']));
echo json_encode($point_du_jour);
?>
