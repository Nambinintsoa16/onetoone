<?php 
    include "header.php";

?>
<style>
        .produit{
        	background:white;
        	border-radius: 5px; 
        	min-height: 100;
        }

</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <img src="../images/image_panier.jpg" class="bann_accueil" height="400px" width="100%">
            </div>
            <div class="row">
                <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-60px;padding-top:13px">
                    <h4 style="opacity:1;color:white">Ajouter un panier</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <blockquote>
                          <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="">Désignation</label>
                                  <input type="text" class="form-control designation"  placeholder="Désignation du panier">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="">Code produit</label>
                                  <input type="text" class="form-control code_produit produit"  placeholder="Code du produit">
                                </div>
                                <div class="form-group col-md-1">
                                     <label for="inputnom">Action</label>
                                    <i class="fa fa-plus-square action_ajout" style="font-size:40px;color:#33b5e5;cursor:pointer"></i>
                                </div>
                          </div>
                          
                    </blockquote>
                </div>
            </div>
            <blockquote>
                <table class="table infoProduit">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Code produit</th>
                      <th scope="col">Désignation</th>
                      <th scope="col">Quantité</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  </tbody>
                </table>
            </blockquote>
            <blockquote style="min-height:60px">
                 <button type="submit" class="btn btn-success pull-right enregistre_panier">Enregistrez</button>  
            </blockquote>
            
        </div>
    </div>
</div>


   <?php include "footer.php";?>
