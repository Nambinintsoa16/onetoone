<?php
$sql="SELECT `codeClient`,`Nom`,`Prenom`,`codevp`,`contact`,`ville`,`quartier` FROM `clientTr` WHERE `codevp` LIKE ?";
$client=$main->queryAll($sql,array($_SESSION['matricule']));
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:10px"><a href="?page">Accueil</a></li>
     <li class="breadcrumb-item" style="font-size:10px"><a href="#">Mes clients</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:10px">Mes clients sur terrain</li>
  </ol>
</nav>
 <input class = "form-control" id = "demo" type = "text" placeholder = "Cherche..."  style="font-size:9px;height:31.2px;">
 <table class="table table-bordered table-striped" style="font-size:10px; margin-top: 10px;">
                   <thead>
                    </thead>
                    <tbody id = "test">
                        <?php
                        if($client):
                         foreach ($client as $client):
                    
                        ?>
                                    <tr>
                                        <td class="text-center" style="padding:0px;">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">                
                                            
                                            
                                            <?php if(file_exists("../image/client/".$client['codeClient'].".jpg")){ ?>
                                                <a href="../image/client/<?=$client['codeClient']?>.jpg" data-lightbox="roadtrip" title="
                                                <div class='text-center'>
                                                    
                                                    <p class='text-center' style='font-size:12px;'>
                                                        <span class='text-center'><?=$client['codeClient']." ";?></span><br/><hr/>
                                                        <span class='text-info'>Nom  et Prénom <?=" : ".$client['Nom']." "?><?=" ".$client['Prenom']." "?></span><br/>
                                                        Contact : <?php 
                                                        $contact=str_split($client['contact']);
                                                        echo "+261"." ".$contact[1].$contact[2]." ".$contact[3].$contact[4]." ".$contact[5].$contact[6].$contact[7]." ".$contact[8].$contact[9];
                                                        
                                                        ?><br/>
                                                        Quartier:<?= $client['quartier'];?><br/>
                                                        Ville <?= " : ".$client['ville']." "?>
                                                    </p>
                                                </div> 
                                                ">
                           
                                                        
                                                    <img src="../image/client//<?=$client['codeClient']?>.jpg" alt="Photo client sur terrain" class="img-thumbnail" style="width:100px;height:100px;">
                                                </a>
                                            <?php } else { ?>
                                                <a href="http://magesty.in-expedition.com/img/photoclient/CLT-pardefaut.jpg" data-lightbox="roadtrip" title="
                                                <div class='text-center'>
                                                    
                                                    <p class='text-center' style='font-size:12px;'>
                                                        <span class='text-center'><?= " ".$client['codeClient']." ";?></span><br/>
                                                        <a href='#'><span class='text-info'>Nom  et Prénom <?=" : ".$client['Nom']." "?><?=" ".$client['Prenom']." "?></span></a><br/>
                                                        Contact : <?php 
                                                        $contact=str_split($client['contact']);
                                                        echo "+261"." ".$contact[1].$contact[2]." ".$contact[3].$contact[4]." ".$contact[5].$contact[6].$contact[7]." ".$contact[8].$contact[9];
                                                        
                                                        ?><br/>Quartier:<?= $client['quartier'];?><br/>
                                                        Ville <?= " : ".$client['ville']." "?>
                                                    </p>
                                                </div>">
                                                    <img src="http://magesty.in-expedition.com/img/photoclient/CLT-pardefaut.jpg" alt="Photo client sur terrain" class="img-thumbnail" style="width:100px;height:100px;">
                                                </a>
                                                 <div class="image-parent">
                                                     
                                                    
                                                
                                           <?=$client['codeClient']?><br/>
                                           <a href="?page=detailClientSurTerrain&codeClient=<?=$client['codeClient']?>"><?=$client['Nom'] ?> <?=" ".$client['Prenom']." "?></a><br/>
                                           <?=$client['ville']?><br/>
                                           <?= $client['quartier'];?><br/>
                                           <?php
                                                $contact=str_split($client['contact']);
                                                        echo "+261"." ".$contact[1].$contact[2]." ".$contact[3].$contact[4]." ".$contact[5].$contact[6].$contact[7]." ".$contact[8].$contact[9];
                                           ?>
                                          
                                           </div>
                                                 </li>
                                                </ul>
                              
                                            <?php } ?>    
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


