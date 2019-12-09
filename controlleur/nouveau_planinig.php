<style>
    label{
        font-weight: normal!important;
        font-size:12px!important;
    }
</style>
<?php 
include_once("../include/include.php");
include_once("header.php");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
                        </div>
<blockquote>
            <div class="md-form form-sm mb-2">
                <div class="row">
                    <div class="col-2">
                        <label for="IdEquipe">Equipe</label>
                    </div>
                    <div class="col-4">
                        <select class="form-control col-md-12 matricule form-control-sm IdEquipe">
                            <option hidden selected>Equipe</option>
                                <?php
                                $sql="SELECT * FROM `equipe`";
                                $variable=$main->queryAll($sql);
                                 foreach ($variable as $variable ):
                                ?>
                            <option><?=$variable['IdEquipe']?></option>
                                <?php endforeach;?>
                           </select>
                    </div>
                    <div class="col-2">
                        <label for="date">Province</label>
                    </div>
                     <div class="col-4">
                        <input type="text" id="province" class="form-control form-control-sm province">
                    </div>
                   
                </div>
            </div>

            <div class="md-form form-sm mb-2">
                <div class="row">
                      <div class="col-2">
                        <label for="province">Mission</label>
                    </div>
                    <div class="col-10">
                        <select name="Prix" id="Prix" class="form-control form-control-sm idmission idMission" placeholder="Prix appliquer">
                            <option blocked> choisissez votre mission</option>
                            <?php
                            $sql="SELECT `idMission`,`lieu` FROM `mission` WHERE 1";
                            $misson=$main->queryAll($sql);
                                if($misson):
                                  foreach($misson as $misson ):
                            ?>
                               <option value="<?=$misson['idMission']?>"><?=$misson['lieu']?></option>
                            
                            <?php
                                 endforeach;
                                   endif;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
</blockquote>

<blockquote>
            <div class="md-form form-sm mb-2">
                <div class="row">
                  <div class="col-2">
                  <label for="inputSMEx">Ville</label>
                    </div>
                    <div class="col-4">
                    <input type="text" id="ville" class="form-control form-control-sm ville">
                    </div>
                     <div class="col-2">
                  <label for="quartier">Quartier</label>
                  </div>
                  <div class="col-4">
                  <input type="text" id="quartier" class="form-control form-control-sm quartier">
                </div>
                </div>
            </div>

            <div class="md-form form-sm mb-2">
            <div class="row">
              <div class="col-2">
            <label for="IdEquipe">Panier</label>
              </div>
              <div class="col-4">
            <select class="form-control col-md-12 matricule form-control-sm Panier">
                    <option hidden selected>Panier</option>
                    <?php
                    $sql="SELECT DISTINCT `desigbation` FROM `panier` WHERE 1";
                    $panier=$main->queryAll($sql);
                     foreach ($panier as $panier ):
                    ?>
                      <option><?=$panier['desigbation']?></option>
                    <?php endforeach;?>
               </select>
            </div>
            <div class="col-2">
            <label for="IdEquipe">Date</label>
              </div>
             <div class="col-4">
                        <input type="date" id="date" class="form-control form-control-sm date">
                    </div>
            </div>
    </blockquote>
          
            <button class="btn btn-success savePlaning pull-right m-2">Valider</button>
            <br>
            <br>
            <hr>
            <div class="form-group" style="margin-top:20px;">
            <div class="table-responsive">
            <table class="table table-bordered table-striped display" id="myTable">
            <thead class=" table-dark">
              <tr>
                 <th>Date</th>
                 <th>Ville</th>
                 <th>Province</th>
                 <th>Quartier</th>
                 <th>Panier</th>
              </tr>
            </thead>
                <tbody class="tbody">
                </tbody>
            </table>
            </div>
<div id="monModal" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Champ vide</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            </div>
	            <div class="modal-body">
	                <p class="text-warning text-lg">Remplir les champs vides</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
	            </div>
	        </div>
	    </div>
	</div>
</div>
</div>
</div>
</div>

<?php include "footer.php";?>