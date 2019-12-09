<?php
    include_once("../include/include.php");
    if(isset($_POST['motif']) && isset($_POST['cout'])){
        if(!empty($_POST['motif']) && !empty($_POST['cout'])){
            $cout=explode(" ",$_POST['cout']);
            $designation=$_POST['motif'];
            $sql="INSERT INTO `rapport`(`idr`, `type`, `date`, `heure`, `description`, `ca_journaliere`, `id_coach`) VALUES (?,?,?,?,?,?,?)";
            $rapport=$main->query($sql,array(null,'DEPENSE',date('Y-m-d'),date('H:m:s'),$designation,$cout[0],$_SESSION['matricule']));
        }
    }