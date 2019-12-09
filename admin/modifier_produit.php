
<div class="container">
<div class="alertProduit">
  <!--alert du produit-->
  
</div>
      <div class="card card-warning">
              <div class="card-header bg-info" style="color:white;">
                <h3 class="card-title">Modifier Produit</h3>
              </div>
              <form action="" method="post">
              <div class="card-body">
                <form role="form">
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
                        <input type="text" name="idproduit" id="idproduit" class="form-control produit produitModifAffich" placeholder="Entrer le code du produit">
                    </div>
                 </div>
                 <div class="col-sm-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <p class="description-p collapse"></p>
                        <textarea class="form-control description " rows="3" placeholder="Enter la description" name="description" id="description"></textarea>
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
                         <button class="btn btn-success modifierProduit pull-right btn-block"><i class="fa fa-edit" aria-hidden="true"></i> Modifier</button>
                      </div>
                 </div>
              </div>
</div>