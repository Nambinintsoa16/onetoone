
<div class="container">
    <div class="row">
            <div class="form-group col-lg-12">
              <label for="produit">Produit</label>
                    <input type="text" class="form-control produitModif" id="produit">
                  </div>
                  <div class="form-group col-lg-12">
                    <label for="modif">Modifier</label>
                    <select class='form-control selectModif' >
                        <option value="ingredient">Ingredient</option>
                        <option value="modedutilisation">Mode d'utilisation</option>
                        <option value="argumentaire">Argumentaire</option>
                        <option value="presentation">Présentation</option>
                    </select>
                  </div>
        <div class="form-group col-lg-12">
            <textarea class="form-control ckeditor" name="editor1" rows="6"></textarea>
        </div> 
        <div class="form-group col-lg-12">
          <button class="btn btn-info valideModif form-control" type="submit" ><i class="fa fa-save"></i> Enregistrer</button>
        </div>
    </div>
</div>

