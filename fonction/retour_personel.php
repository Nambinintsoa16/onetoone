<?php
include_once('../include/include.php');
$mot=$_GET['term'];
$array=array();
$sql="SELECT `idMission`,`date`,`ville`,`province`,`quartier`,`IdEquipe`,`Panier` FROM `planing` WHERE `IdEquipe` LIKE ? Order by `date` desc";
$data=$main->queryAll($sql,array($mot));
if($data):
  foreach ($data as $key => $data) :
?>
 <tr>
   <td><?=$data['date']?></td>
   <td><?=$data['province']?></td>
   <td><?=$data['ville']?></td>
   <td><?=$data['quartier']?></td>
   <td><?=$data['Panier']?></td>
 </tr>
<?php
  endforeach;
  endif;
?>






