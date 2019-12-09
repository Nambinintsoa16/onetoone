<?php 
    include 'header.php';
    include_once("../include/include.php");
    $sql="SELECT `designation` FROM `produit` WHERE `idProduit` LIKE ? ";
    $resultat=$main->queryAll($sql,array($_GET['Idproduit']));
?>
 <div class="content-wrapper">
 	<div class="row m-3">
 			<div class="col-md-4">
			 	<div class="row">
			 		<div class="col-md-12" style="padding: 20px 20px">
			 			<img src="../image/produit/<?= $_GET['Idproduit'] ?>.jpg" width="100%" height="auto">
			 			
			 		</div>
			 	</div>
			 	<div class="row">
			 		<div class="col-md-6" style="">
			 			<img src="../image/produit/<?= $_GET['Idproduit'] ?>.jpg" width="100%" height="auto">
			 		</div>
			 		<div class="col-md-6">
			 			<img src="../image/produit/<?= $_GET['Idproduit'] ?>.jpg" width="100%" height="auto">
			 		</div>

			 	</div>
		</div>
		<div class="col-md-8"  style="padding: 20px 20px">
			block description
			<p><?=$resultat['designation'] ?></p>
			<?= var_dump($_GET['Idproduit'])?>
		</div>		
 	</div>
</div>


<?php include 'footer.php';?>