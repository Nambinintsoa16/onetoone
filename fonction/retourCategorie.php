<?php
    include_once 'main.php';
    $main= new main();
    $array=array();
    if(isset($_GET['famille']) AND !empty($_GET['famille'])){
        $famille = $_GET['famille'];
        $sql="SELECT `type` FROM `categorie` WHERE `famille` LIKE '%".$famille."%'";
        

        $result=$main->queryAll($sql);
        foreach ($result as $result) {
 ?>  
 <option><?= $result['type']?></option>

 <?php           
        }
    }
    
?>