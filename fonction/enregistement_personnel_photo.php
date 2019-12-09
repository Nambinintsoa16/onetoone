
<?php
include_once('../include/include.php');

if(isset($_GET['Matricule']) AND isset($_GET['data']) ){
   if(!empty($_GET['Matricule']) AND !empty($_GET['data'])){

  
    $pass="";    
	$characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
	for($i=0;$i<8;$i++)
	{
		$pass.= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
	}
	
	

	

$filename = $_FILES['file']['name'];
$nom=$_GET['Matricule'];
$data=$_GET['data'];    
    
$data_info_personnel=json_decode($data);

$sql="INSERT INTO `personnel`(`id`,`mode_de_pass_login` ,`matricule`, `date_d_embauche`, `Nom`, `Prenom`, `date_de_naissance`, `lieu_de_naissance`, `situation_Matrimoniale`, `nombre_d_enfant`, `sexe`, `CIN_COM`, `Date_CIN_COM`, `Fait_a_COM`, `Duplicata_du_COM`, `Lieu_de_Duplicatat_COM`, `Adresse`, `Contact`, `Contact_flotte`, `personne_a_contacter`, `Mode_de_Paymemnt_salaire`, `Contact_Telephonique`, `Adresse_paret`, `Numero_CIN_personne_a_contacter`, `Date_de_son_CIN`, `Lieu_d_enregistrementPr`, `Duplicata_du_CIN_pr`, `Lieu_de_duplicatat_pr`, `Fonction_a_l_embauche`, `Fonction_Acutelle`, `Lien_de_Parente`, `numero_de_compte`, `Statut`) VALUES (null,'". $pass."','".$_GET['Matricule']."','".$data_info_personnel[0]."','".$data_info_personnel[1]."','".$data_info_personnel[2]."','".$data_info_personnel[3]."','".$data_info_personnel[4]."','".$data_info_personnel[5]."','".$data_info_personnel[6]."','".$data_info_personnel[7]."','".$data_info_personnel[8]."','".$data_info_personnel[9]."','".$data_info_personnel[10]."','".$data_info_personnel[11]."','".$data_info_personnel[12]."','".$data_info_personnel[13]."','".$data_info_personnel[14]."','".$data_info_personnel[15]."','".$data_info_personnel[16]."','".$data_info_personnel[17]."','".$data_info_personnel[18]."','".$data_info_personnel[19]."','".$data_info_personnel[20]."','".$data_info_personnel[21]."','".$data_info_personnel[22]."','".$data_info_personnel[23]."','".$data_info_personnel[24]."','".$data_info_personnel[25]."','".$data_info_personnel[26]."','".$data_info_personnel[27]."','".$data_info_personnel[28]."','".$data_info_personnel[29]."')";
$main->query($sql);
$location = "../image/personnel/".$nom.".jpg";

$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
$valid_extensions = array("jpg","jpeg","png");
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      echo $location;
   }else{
      echo 0;
   }
 }
 echo $location;
   } else{
      echo 0;  
   }
}else{
    echo 0; 
}
?>