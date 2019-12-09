<?php
include "qrcode.php";  
$qc = new QRCODE(); 
if (isset($_GET['idpersonnel'])) {
   if(!empty($_GET['idpersonnel'])){
   	$qc->TEXT($_GET['idpersonnel']);
   	$qc->QRCODE(400,$_GET['idpersonnel']);
   	echo '0';
   }
}
?>