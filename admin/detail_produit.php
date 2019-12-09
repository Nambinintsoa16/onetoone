<?php 
    include_once('../fonction/main.php');
    $sql="SELECT * FROM `produit` WHERE `idProduit` LIKE ?";
    $resultat=$main->query($sql,array($_GET['idProduit']));

?>

<div class="container">
	
		<div class="alertproduit">
		
		</div>
		<div class="card card-warning" >
			<div class="card_header bg-info text-center" style="color:white; fonts:Times New Romans;"  >
				<h3 class="card-title text-title">Detail produit</h3>
			</div>
			<form action="" method="post">
				<div class="card-body">
					<form role="form">
						<div class="row">
							<div class="col-sm-4 col-md-4">
								<div class="col-md-12 imgUp">
								        <div class="imagePreview text-center"  ></div>
	
								        	<div class="info">
								        	    <label class="btn" style="background-color:rgba(64,64,64);opacity:0.1px;width:100%;color:#fff">
                                                 <?=$resultat['idProduit']; ?><input type="file" class="uploadFile img" name="image" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                                 </label>
								        	     
								        	</div> 
								  </div> 
							</div>

							<div class="col-sm-8 col-md-8">
								<div class="form-group">
									<label for="idproduit" class="text text-info">Code produit:</label>
									<p class="idproduitmodal"><?=$resultat['idProduit'];?></p>
								</div>
								<div class="form-group">
									<label for="designation" class="text text-info" >Designation:</label>
									<p><?=$resultat['designation'];?></p>
								</div>								
								<div class="form-group">
									<label for="quantite" class="text text-info">Quantité :</label>
									<p><?=$resultat['quantite'];?></p>
									
								</div>

								<div class="form-group">
									<table class="table table-responsive">
									    <thead>
									        <?php
									        $sql="SELECT * FROM `mission` WHERE 1";
									        $mission=$main->queryAll($sql);
									        $tabMission=array();
									        ?>
									        <tr><th></th>
									           <?php if($mission) : foreach($mission as $key=>$mission): array_push($tabMission,$mission['idMission']);?>
									            <th><?=$mission['lieu']?></th>
									           <?php endforeach;endif;?> 
									        </tr>
									        
									    </thead>
									    <tbody>
									        <tr><td>Prix detail <br/> Prix gros</td>
									           <?php if($mission) : foreach( $tabMission as $key=>$tabMission):
									            $sql="SELECT  `prixdetail`, `prixgros` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?";
									            $prix=$main->query($sql,array($tabMission,$_GET['idProduit']));
									            if($prix):?>
									            <td><?=$prix['prixdetail']?><br/>
									            <?=$prix['prixgros']?></td>
									           <?php endif;endforeach;endif;?> 
									        </tr>
									        
									        
									    </tbody>
									    <tfoot></tfoot>
									</table>
									
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-md-4 table-responsive">
								<table class="table text-center ajuste-table table-border">
									<thead>
										<tr class="bg-info blanc"></tr>
									</thead>
								</table>
							</div>
						</div>
					</form>
				</div>
			</form>

		</div>
		<div class="row">
			<div class="col-md-12">
				
				<div class="form-group">
				    <div class="text text-primary editeutilisation">
				        <h4> Mode d'utilisation :&nbsp;<a href="#" class="btn_edit" id="utilisation"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h4> 
				   
				        <div class="utilisation jumbotron">
				            <?=$resultat['modedutilisation'];?>
				        </div>
				    </div>     
				</div>    
				<div class="form-group">
				    <div class="text text-primary editeutilisation">
				        <h4>Argumentaire:&nbsp;<a href="#" class="btn_edit" id="argumentaire"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h4>
				        
				    
				        <div class="argumentaire jumbotron">
				            <?=$resultat['argumentaire'];?>
				        </div>
				     </div>      
				</div> 
				
				
				
                <div class="form-group">
                    <div class="text text-primary">
                        <h4>Présentation :&nbsp; <a href="#" class="btn_edit" id="presentation"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h4>
                    <div class="presentation jumbotron">
                        <?=$resultat['presentation'];?>
                    </div>
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="text text-primary">
                        <h4>Ingerédient :&nbsp;<a href="#" class="btn_edit" id="ingredient"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h4>
                        
                    
                    <div class="ingredient jumbotron">
                        <?=$resultat['ingredient'];?>    
                    </div>
                    </div>
                    
                </div>

				
				</table>
			</div>		
		</div>

</div>


