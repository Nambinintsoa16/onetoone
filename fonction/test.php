<?php
$dateDepart="2019-10-30";
$dateArriver="2019-11-05";
$dt=new dateTime("2019-10-30");
$date=$dt->format("Y-m-d");
$dtTemp=$dateDepart;

do{
  
  $dt=new dateTime($dtTemp);
  $dt->modify("+1 day");
  $date=$dt->format("Y-m-d"); 
  echo $date.'<br/>';  
  $dtTemp="";
  $dtTemp=$date;
   
}while($date!=$dateArriver);
?>