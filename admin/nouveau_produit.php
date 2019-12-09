
<div class="container">
      <?php
    if(isset($_GET['erreur']) AND !empty($_GET['erreur'])){
        if($_GET['erreur']=="1"){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Succés !</strong> Le produit est ajouté.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
       <?php }else{ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erreur !</strong> Le produit n'est pas ajouté.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
  <?php       
       }
  ?>
          
    <?php }
  ?>
  
  
  
<div class="alertProduit">
  <!--alert du produit-->
  
</div>
      <div class="card card-warning">
              <div class="card-header bg-info" style="color:white;">
                <h3 class="card-title">Nouveau Produit</h3>
              </div>
              <!--<form action="" method="post">-->
              <div class="card-body">
                <form role="form" action="../fonction/enregistrement_image_produit.php" method="post" enctype = "multipart/form-data">
                  <div class="row">
                  <div class="col-sm-12">
                      <div class="row justify-content-center">
                        <div class="col-md-2 imgUp">
                          <div class="imagePreview text-center" ></div>
                                <label class="btn btn-primary">
                          Image<input type="file" class="uploadFile img" name="image" id="image" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                  </label>
                          </div>
                        </div>
                      </div>
                 </div>
                 <div class="col-sm-12">
                      <div class="form-group">
                        <label for="idproduit">Code produit</label>
                        <input type="text" name="idproduit" id="idproduit" class="form-control input-n-produit" placeholder="Entrer le code du produit">
                    </div>
                 </div>
                 <div class="col-sm-12">
                      <div class="form-group">
                        <label for="designation">Désignation</label>
                        <input type="text" name="designation" id="designation" class="form-control designation" placeholder="Entrer la désignation">
                    </div>
                 </div>
                 <div class="col-sm-12">
                      <div class="form-group">
                        <label>Catégorie</label>
                        <div class="form-inline">
                          <label class="col-sm-2">Famille: 
                 
                          
                          </label>

                          <select name="famille" id="famille" class="famille form-control col-sm-3">
                            <?php
                                  $main=new main();
                                  $sql="SELECT `famille` FROM `categorie`;" ;
                                  $resultat=$main->queryAll($sql);
                                  foreach ($resultat as $resultat) {
                            ?>
                              <option value="<?= $resultat['famille']; ?>"><?= $resultat['famille']; ?></option>
                            <?php } ?>
                          </select>

                          <label class="col-sm-2">Type: </label>
                          <select name="type" id="type" class="type form-control col-sm-3 offset-sm-1 type">
                            
                          </select>

                        </div>
                    </div>
                 </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                        <label for="quantite">Quantité</label>
                        <input type="text" class="form-control quantite" name="quantite" id="quantite" placeholder="Entrer la quantité">
                    </div>
                 </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control description" rows="3" placeholder="Enter la description" name="description" id="description"></textarea>
                    </div>
                 </div>
                <div class="col-sm-12">
                      <div class="form-group">
                        <label for="ingredient">Ingrédients</label>
                        <textarea class="form-control ingredient" rows="3" placeholder="Enter les ingrédients" name="ingredient" id="ingredient"></textarea>
                      </div>
                 </div>
                 <div class="col-sm-12">
                      <div class="form-group">
                        <label for="modedutilisation">Mode d'utilisation</label>
                        <textarea class="form-control modedutilisation" rows="3" placeholder="Enter le mode d'utilisation" name="modedutilisation" id="modedutilisation"></textarea>
                      </div>
                 </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                        <label for="presentation">Présentation</label>
                        <textarea class="form-control presentation" rows="3" placeholder="Enter la présentation" name="presentation" id="presentation"></textarea>
                      </div>
                 </div>
                 <div class="col-sm-12">
                      <div class="form-group">
                        <label for="argumentaire">Argumentaires</label>
                        <textarea class="form-control argumentaire" rows="3" placeholder="Enter l'argumentaire" name="argumentaire" id="argumentaire"></textarea>
                      </div>
                 </div>
                   </div>
             
               </div>
               <div class="col-sm-12">
                      <div class="form-group">
                         <button type="submit" class="btn btn-success ajoutProduit pull-right btn-block"><i class="fa fa-check-square envoye" aria-hidden="true"></i> Valider</button>
                      </div>
                 </div>
                 </form>
              </div>
              </div>
</div>