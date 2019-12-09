<div class="container">

<div class="md-form form-sm">
<div class="row">
  
</div>
<div class="md-form form-sm">
  <div class="row">
  <div class="col-1">
<label for="IdEquipe">Equipe</label>
  </div>
  <div class="col-5">
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



     <div class="col-1">
     <label for="date">Date</label>
     </div>

     <div class="col-5">
     <input type="date" id="date" class="form-control form-control-sm date">
     </div>
  </div>
</div>

<div class="md-form form-sm">
  <div class="row">
  <div class="col-1">
      <label for="province">Province</label>
    </div>

    <div class="col-5">
        <input type="text" id="province" class="form-control form-control-sm province">
    </div>
    <div class="col-6">
        <select name="Prix" id="Prix" class="form-control form-control-sm idmission idMission" placeholder="Prix appliquer">
         
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

<div class="md-form form-sm">

<div class="row">
  <div class="col-1">
  <label for="inputSMEx">Ville</label>
    </div>
    <div class="col-11">
    <input type="text" id="ville" class="form-control form-control-sm ville">
    </div>
</div>

<div class="md-form form-sm">
<div class="row">
  <div class="col-1">
  <label for="quartier">Quartier</label>
  </div>
  <div class="col-11">
  <input type="text" id="quartier" class="form-control form-control-sm quartier">
</div>
</div>

<div class="md-form form-sm">
<div class="row">
  <div class="col-1">
<label for="IdEquipe">Panier</label>
  </div>
  <div class="col-11">
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
</div>
<button class="btn btn-success savePlaning">Valider</button>
<div class="form-group" style="margin-top:20px;">

<table class="table table-bordered table-striped">
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

</div>