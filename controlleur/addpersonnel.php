<?php include "header.php";?>
 <div class="content-wrapper">
 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-md-12">
                <img src="images/personnel.jpg" class="bann_accueil" height="400px" width="100%">
           </div>
        </div>
        <div class="row" style="padding-left:7px;padding-right:7px">
            <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-60px;padding-top:13px">
                <h4 style="opacity:1;color:white">Créer nouveau profil </h4>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">
                 <blockquote>
                      <h4 class="text-left py-2" style="font-size:20px;color:#000"> Veillez completer  tous les chanps
           </h4>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputnom">Nom </label>
              <input type="text" class="form-control Nom" placeholder="nom">
            </div>
            <div class="form-group col-md-6">
              <label for="Prenom">Prenom</label>
              <input type="text" class="form-control Prenom"  placeholder="Prénom comerciale">
            </div>
             
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
              <label for="date_de_naissance">Matricule</label>
              <input type="text" class="form-control date_de_naissance"  placeholder="Date de naissance">
            </div>
             <div class="form-group col-md-6">
              <label for="lieu_de_naissance">Fonction</label>
              <select class="form-control">
                  <option>Controleur</option>
                  <option>Chef controleur</option>
                  <option>Coach</option>
                  <option>Magasinier</option>
                  <option>Responsable logiciel</option>
              </select>
            </div>
        
        </div>
         <div class="form-row">
             <div class="form-group col-md-4">
                <label for="situation_Matrimoniale">Login</label>
                <input type="text" class="form-control situation_Matrimoniale"  placeholder="Choissez votre login">
              </div>
            <div class="form-group col-md-4">
              <label for="inputnom">Mot de passe </label>
              <input type="password" class="form-control" placeholder="Entrez votre mot de passe">
            </div>
            <div class="form-group col-md-4">
              <label for="Prenom">Confirmez Mot de Passe</label>
              <input type="password" class="form-control" placeholder="Confirmez votre mot de passe">
            </div>
         </div>
          <div class="form-row">
             <div class="form-group col-md-4">
                <label for="situation_Matrimoniale">Adresse</label>
                <input type="text" class="form-control"  placeholder="Adresse domicile">
              </div>
            <div class="form-group col-md-4">
              <label for="inputnom">Téléphone </label>
              <input type="password" class="form-control"  placeholder="Entrez numéro de téléphone">
            </div>
            <div class="form-group col-md-4">
              <label for="Prenom">Email</label>
              <input type="password" class="form-control"  placeholder="Entrez adresse email">
            </div>
         </div>
    </blockquote>
    
    
             <blockquote style="min-height:60px">
                 <button type="submit" class="btn btn-success pull-right enregistre">Ajouter le Personnel </button>  
        </blockquote>
            </div>
            </div>
        </div>
    </div> 
</div>


</div>