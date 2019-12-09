<?php 
include_once("../include/include.php");
include "header.php";
$sql="SELECT * FROM `fonction` WHERE 1";
$fonction=$main->queryAll($sql);
$fonctionActuel=$main->queryAll($sql);
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="text-transform: uppercase;"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a>Ajouter un commerciaux</li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <form>
               <h4 class="text-left px-4"> Informations du Commercial
           </h4>
           
           
           
           
             <blockquote>
          <div class="form-row">
              <div class="col-md-4">
                         <div class="file-field">
                            
         <div class="row justify-content-center">
         <div class="col-md-8 imgUp">
        <div class="imagePreview text-center" ></div>
        <label class="btn btn-primary">
         Photo<input type="file" class="uploadFile img" name="image" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
         </div>

          </div>
                           
                          </div>
              </div>
              
               <div class="col-md-8">
                 <h3 class="text-left px-3" style="text-transform: uppercase;color:#000">Fiche individuel de renseigment</h3>
                   <div class="form-row px-4">
                          
                        <div class="form-group col-md-8">
                          <label for="inputEmail4">N° Matricule</label>
                          <input type="text" class="form-control matricule" id="inputnom" placeholder="Matricule comerciale">
                        </div>
                        <div class="form-group col-md-8">
                          <label for="date_d_embauche">Date d'embauche</label>
                          <input type="date" class="form-control date_d_embauche" id="date_d_embauche" placeholder="Date d'embauche comerciale">
                        </div>
                      </div>
                  
              </div>
              
          </div>       
              <hr>  
          <div class="form-row">
              
            <div class="form-group col-md-3">
              <label for="inputnom">Nom</label>
              <input type="text" class="form-control Nom" id="inputnom" placeholder="Nom comerciale">
            </div>
            <div class="form-group col-md-3">
              <label for="Prenom">Prénom</label>
              <input type="text" class="form-control Prenom" id="Prenom" placeholder="Prénom comerciale">
            </div>
            
             <div class="form-group col-md-3">
              <label for="date_de_naissance">Date de naissance</label>
              <input type="date" class="form-control date_de_naissance" id="date_de_naissance" placeholder="Date de naissance">
            </div>
            
             <div class="form-group col-md-3">
              <label for="lieu_de_naissance">lieu de naissance</label>
              <input type="text" class="form-control lieu_de_naissance" id="lieu_de_naissance" placeholder="lieu de naissance">
            </div>
          </div>
          
          <div class="form-row">
              <div class="form-group col-md-4">
                <label for="situation_Matrimoniale">Situation Matrimoniale</label>
                
                <select class="form-control situation_Matrimoniale" >
                    <option>célibataire</option>
                     <option>Marié</option>
                </select>
                <!--<input type="text" id="situation_Matrimoniale" placeholder="Celbataire, marié..">-->
              </div>
              <div class="form-group col-md-4">
                <label for="inputnbrenfant">Nombre d'enfant</label>
                <input type="number" class="form-control nombre_d_enfant" id="inputnbrenfant" placeholder="1,2,3...">
              </div>
           
                <div class="form-group col-md-4">
                  <label for="inputsexe">Sexe</label>
                  <select id="inputsexe" class="form-control sexe">
                    <option selected>Homme</option>
                    <option>Femme</option>
                  </select>
                </div>
            </div>
            
             <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputCIN">Numéro CIN</label>
                <input type="text" class="form-control CIN_COM" id="inputCIN" placeholder="N° CIN">
              </div>
              <div class="form-group col-md-4">
                <label for="Date_CIN_COM">Date CIN</label>
                <input type="date" class="form-control Date_CIN_COM" id="Date_CIN_COM" placeholder="Date d'enregistrement CIN">
              </div>
           
                <div class="form-group col-md-4">
                  <label for="Fait_a_COM">Fait à </label>
            
                <input type="text" class="form-control Fait_a_COM" id="Fait_a_COM" placeholder="Lieu d'enregistrement">
                </div>
            </div>
            
             <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Duplicata_du_com" >Duplicata du</label>
                <input type="date" class="form-control Duplicata_du_com" id="Duplicata_du_com" placeholder="Date de Duplicatat">
              </div>
           
                <div class="form-group col-md-6">
                  <label for="Lieu_de_Duplicatat"> Fait à </label>
            
                <input type="text" class="form-control Lieu_de_Duplicatat_COM" id="Lieu_de_Duplicatat" placeholder="Lieu de Duplicatat">
                </div>
            </div>
            
             <div class="form-row">
              <div class="form-group col-md-4">
                <label for="Adresse">Adresse employé</label>
                <input type="text" class="form-control Adresse" id="Adresse" placeholder="Adresse de employé">
              </div>
           
                <div class="form-group col-md-4">
                  <label for="Contact"> Contact personnel employé</label>
            
                <input type="text" class="form-control Contact" id="Contact" placeholder="Contact employé">
                </div>
                
                <div class="form-group col-md-4">
                  <label for="Contact_flotte"> Contact flotte Professionnel</label>
            
                <input type="text" class="form-control Contact_flotte" id="Contact_flotte" placeholder="Contact flotte Preofessionelle">
                </div>
            </div>
            </blockquote>
                 
               
                 <h4 class="text-left px-4"> Informations de  Personne à contacter en cas d'urgence
           </h4>
            <blockquote>
               
             <div class="form-row">
              <div class="form-group col-md-3">
                <label for="personne_a_contacter">Personne à contacter</label>
                <input type="text" class="form-control personne_a_contacter" id="personne_a_contacter" placeholder="Nom du personne à contacter">
              </div>
           
                <div class="form-group col-md-3">
                  <label for="inputsexe"> Lien de Parenté </label>
            
                <input type="text" class="form-control Lien_de_Parente" id="Lien_de_Parente" placeholder="Rélation parentale">
                </div>
                
                <div class="form-group col-md-3">
                  <label for="Contact_Telephonique"> Contact Téléphonique</label>
            
                <input type="text" class="form-control Contact_Telephonique" id="Contact_Telephonique" placeholder="N° téléphone">
                </div>
                
                 <div class="form-group col-md-3">
                  <label for="Adresse_paret"> Adresse</label>
            
                <input type="text" class="form-control Adresse_paret" id="Adresse_paret" placeholder="Adresse">
                </div>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="Numéro_CIN_personne_a_contacter" >Numéro CIN personne à contacter</label>
                <input type="text" class="form-control Numero_CIN_personne_a_contacter" id="Numéro_CIN_personne_a_contacter" placeholder="N° CIN">
              </div>
              <div class="form-group col-md-4">
                <label for="Date_de_son_CIN">Date de son CIN</label>
                <input type="date" class="form-control Date_de_son_CIN" id="Date_de_son_CIN" placeholder="Date d'enregistrement">
              </div>
           
                <div class="form-group col-md-4">
                  <label for="Lieu_d_enregistrement">Fait à </label>
            
                <input type="text" class="form-control Lieu_d_enregistrementPr" id="Lieu_d_enregistrement" placeholder="Lieu d'enregistrement">
                </div>
            </div>
            
             
             <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Duplicata_du_pr">Duplicata du</label>
                <input type="date" class="form-control Duplicata_du_pr" id="Duplicata_du_pr" placeholder="Date de duplicatat">
              </div>
           
                <div class="form-group col-md-6">
                  <label for="Lieu_de_duplicatat"> Fait à </label>
            
                <input type="text" class="form-control Lieu_de_duplicatat_pr" id="Lieu_de_duplicatat" placeholder="Lieu de duplicatat">
                </div>
            </div>
         </blockquote>
         
               <h4 class="text-left px-4"> Information Pour la société
           </h4>
         <blockquote>
               <div class="form-row">
              
            <div class="form-group col-md-3">
              <label for="Num_matricule">Num matricule</label>
              <input type="text" class="form-control Num_matricule" id="Num_matricule" placeholder="N° matricule">
            </div>
            <div class="form-group col-md-3">
              <label for="Date_d_embauche">Date d'embauche</label>
              <input type="date" class="form-control Date_d_embauche" id="Date_d_embauche" placeholder="Date d'embauche">
            </div>
            
             <div class="form-group col-md-3">
              <label for="Fonction_a_l_embauche">Fonction à l'embauche</label>
              <select  class="form-control Fonction_a_l_embauche" placeholder="Fonction à l'embauche">
              <?php if($fonction):
                  foreach($fonction as $fonction):
               ?>      
                <option value="<?=$fonction['id']?>"><?=$fonction['DesFonction']?></option>
            <?php
              endforeach;endif;
              ?>    
              </select>
               <!--<input type="text" class="form-control Fonction_a_l_embauche" id="Fonction_a_l_embauche" placeholder="Fonction à l'embauche">-->
            </div>
            
             <div class="form-group col-md-3">
              <label for="Fonction_Acutelle">Fonction Acutelle</label>
              <select class="form-control Fonction_Acutelle" placeholder="Fonction actuelle">
                  <?php 
                  if($fonctionActuel):
                  foreach($fonctionActuel as $fonctionActuel):
                  ?>      
                      <option value="<?=$fonctionActuel['id']?>"><?=$fonctionActuel['DesFonction']?></option>
                   <?php
                     endforeach;endif;
                   ?>    
              </select>
              <!--<input type="text" class="form-control Fonction_Acutelle" id="Fonction_Acutelle" placeholder="Fonction actuelle">-->
            </div>
          </div>
          
          <div class="form-row">
              
               <div class="form-group col-md-4">
                  <label for="Mode_de_Paymemnt_salaire">Mode de Paymemnt salaire</label>
                  <select id="Mode_de_Paymemnt_salaire" class="form-control Mode_de_Paymemnt_salaire">
                    <option selected>Espèce</option>
                    <option>Cheque</option>
                      <option>Banque</option>
                  </select>
                </div>
              <div class="form-group col-md-4">
                <label for="numero_de_compte">Banque et N° compte</label>
                <input type="text" class="form-control numero_de_compte" id="numero_de_compte" placeholder="Votre numero de compte">
              </div>
              <div class="form-group col-md-4">
                <label for="Statut">Statut</label>
                <input type="number" class="form-control Statut" id="Statut" placeholder="statut">
              </div>
           
               
            </div>
          
             
         </blockquote>
         <blockquote style="min-height:60px">
                 <button type="submit" class="btn btn-success pull-right enregistre-personnel">Enregistrez</button>  
        </blockquote>
        </form>
      </div><!-- /.container-fluid -->
    </div>
  </div>
  
  
  
  
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>
 