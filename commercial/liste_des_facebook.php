<?php
$main_gest=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
$sql="SELECT * FROM `client` WHERE `idVP` LIKE '".$_SESSION['matricule']."'";
$client=$main_gest->queryAll($sql);
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page">Accueil</a></li>
    <li class="breadcrumb-item" style="font-size:9px"><a href="#">Mes clients</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Mes clients sur facebook</li>
  </ol>
</nav> 

<div class="container">
        <div class="row">
        <div class="col-md-12 img-container">

   <div class="col-md-8 col-sm-8 col-xs-8 col-xs-offset-2 col-md-offset-2  col-sm-offset-2" style="margin:auto auto; ">
      <!--<h2  style="text-align:center;width=100%;margin-top:15px;font-size:15px;">
          <b>Mes clients Facebook</b>
          
     </h2>-->
 
     <input class = "form-control" id = "inputcherchetab" type = "text" placeholder = "Cherche ici,.." style="font-size:9px;height:31.2px;">
   </div>

</div>

 <table class="table" style="font-size:13px; margin-top: 10px;">
    <thead>
    </thead>
    <tbody id = "test">
    <?php
    if($client):
     foreach ($client as $client):

    ?>
                <tr>
                    
                    <td style="font-size:11px;padding:0px;">
                        
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="?page=detailsClientsFB&codeClient=<?=$client['idclient']?>">
                                      <?=$client['idclient']?><br/>
                                      <?= $client['identifientsurfacebook']?><br/>
                                      <?= $client['contact']?><br/>
                                      <?= $client['ville']?><br/>
                                      (<?=" ".$client['quartier']." "?>)</a>
                                <div class="image-parent">
                                    
                                    
                     <a href="http://magesty.in-expedition.com/img/photoclient/<?=$client['photo']?>" data-lightbox="roadtrip" title="<div class='text-center '><h4 class='text-center'><?=$client['idclient']?></h4><h3 class='text-center' style='font-size:12px;'><a href='<?=$client['liensurfacebook']?>'>  Nom facebook : <?= " ".$client['identifientsurfacebook']." "?></a></br>Contact : <?= " ".$client['contact']." "?> </br>Ville : <?= " ".$client['ville']." "?> </br>Quartier:<?= " ".$client['quartier']." "?></h3></div>">
                    
                     <img style="max-min: 90px;max-width: 90px;max-height:90px;min-height:90px;overflow:hidden;border:solid 2px #dfdfddf;" class="col-lg-2 image " src="http://magesty.in-expedition.com/img/photoclient/<?= $client['photo']?>" ></a>
                                    
                                    
                                    
                                </div>
                                </li>
                            </ul>
                        
                        
                    </td>
            
                    
                <tr>
<?php
      endforeach;
    endif;
?>
    </tbody>

 </table>








        <hr>

      </div>


        </div>

        <hr>

      </div>


