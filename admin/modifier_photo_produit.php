<div class="container">
   <div class="row text-center justify-content-md-center">
     <div class="col-md-12 text-center">

  <form class="form-validate form-horizontal "  method="post" action="../fonction/modifier_photo_produit.php" enctype="multipart/form-data">



         <div class="row justify-content-center">
         <div class="col-md-3 imgUp">
        <div class="imagePreview text-center" ></div>
              <label class="btn btn-primary">
         Cliquez ici<input type="file" class="uploadFile imag" name="image" id="file" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
         </div>
          </div>
          <center class="nom" style="font-weight: bold; font-size: 0.9em;"></center>
          <hr>
        <div class="modal fade mn" tabindex="-1" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Zone de texte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="color: skyblue;">Veuillez remplir le champ</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12">
<div class="form-group">
    <input type="text" class="form-control produit" name="codeproduit" placeholder="Entrez le nom du produit">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-danger form-control ModifierPhoto">Modifier</button>
</div>
</div>
</form>
  </div>
</div>
</div>