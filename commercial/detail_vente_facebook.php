<?php
include_once('../fonction/main.php');
$dbfacebook=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
$sql="SELECT DISTINCT facture.NumFact FROM `client`,`facture` WHERE facture.datedefacture LIKE '".date("Y-m-")."%'  AND  facture.idclient LIKE client.idclient AND client.idVP LIKE '".$_SESSION['matricule']."'";
$resultat=$dbfacebook->queryAll($sql);
$montant=0;
$qunatite=0;
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page">Accueil</a></li>
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page=moncompte">Mon compte</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Detail vente sur facebook</li>
  </ol>
</nav>
<div class="form-group text-center">
<button class="btn btn-outline-primary nbProduit" type="button" style="font-size:11px;" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>
<button class="btn btn-outline-primary nbPrix" type="button" style="font-size:11px;" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>

<select class="browser-default custom-select Pro" style="font-size:11px; width:100px; height:31.2px;" >
  <option selected value="1">Client</option>
  <option value="3">Produit</option>
  <option value="4">Montant</option>
</select>
</div>
<div class="form-group">
    <input type="text" class="form-control inputiltre" style="font-size:9px;" placeholder="chercher..." >
</div>
 

            <table class="table display" style="width:100%" style="font-size:9px;" id="tableTrier">
               <thead>
                  
                   <tr>

                        <td  class="text-center" style="font-size:9px;width:100px;">Client(s)</td>
                        <td  class="text-center" style="font-size:9px;">Produit(s)</td>
                        <td  class="text-center" style="font-size:9px;">Montant</td>
                    </tr>
                   
                  
               </thead>
               <tbody class="tbody">
                    <?php if($resultat): foreach($resultat as $resultat): 
                        $produitClientMontant=0;
                        $sql="SELECT client.Nom,client.liensurfacebook,client.photo,client.idclient,client.contact FROM `facture`,`client` WHERE facture.idclient LIKE client.idclient AND facture.NumFact LIKE ?";
                        $client=$dbfacebook->query($sql,array($resultat['NumFact']));
                        $sql="SELECT produit.designation,produit.prix,produit.quantite,comande.codeproduit,comande.quantite FROM `facture`,`comande`,`produit` WHERE comande.idcomand LIKE facture.idcomande AND comande.codeproduit LIKE produit.codeproduit  AND facture.NumFact LIKE '".$resultat['NumFact']."'";
                        $produit=$dbfacebook->queryAll($sql);
                    ?>
                    <tr>
                       
                       
         <td style="font-size:10px;"><a class="profile" href="http://magesty.in-expedition.com/img/photoclient/<?=$client['photo']?>" data-lightbox="roadtrip" title="<div class='text-center' style='font-size:10px;'> <a href='?page=detailsClientsFB&codeClient=<?=$client['idclient']?>'><?=$client['Nom']?></a>  <br/><a href='<?=$client['liensurfacebook']?>'><i class='fa fa-facebook'></i> Facebook</a> </br> Contact : <?=$client['contact']?></div> "><?=$client['Nom']?></a>
         </td>                   
                            
               
                        <td style="font-size:10px;">
                        <?php
                        $toataQuantUP=0;
                        foreach($produit as $produit):
                          $qunatite+=$produit["quantite"];  
                          $produitClientMontant=$produit["prix"]*$produit["quantite"];
                          $montant+=$produitClientMontant;
                          $toataQuantUP+=$produit["quantite"];
                          $product=explode("-",$produit["codeproduit"]);
                         ?> 
                         
 <a class="profile" href="http://magesty.in-expedition.com/img/produit/<?=$produit['codeproduit']?>.jpg" data-lightbox="roadtrip" title="<div class='text-center' style='font-size:10px;'><a  href='?page=information_sur_produit&codeProduit=<?=$product[0]?>'><?=$produit['designation']?></a> <br/>Code produit : <?=$product[0]?> <br/> Prix : <?=number_format($produit["prix"],2,',',' ')?>Ar </div>"><?=$product[0]." : ".$produit["quantite"]?></a><br/>                        
                         

                      <?php
                      
                   
                      endforeach; 
                      
                      ?></td>
                        <td class="quantProduit collapse"><?=$toataQuantUP?></td>
                        <td class="prixTotal" style="font-size:9px;">
                    <?=number_format($produitClientMontant,2,',',' ')?>Ar  
                         
                        </td>

                    </tr>
                    <?php endforeach;endif; ?>

                 

                </tbody>
            </table>
                 
            <table class="table text-center table-bordered " style="font-size:13px; ">
              <thead>
                
                </thead>
                <tbody>
                    <tr>
                     <td style="font-size:10px;width:150px;">Total prévisionnel : <br/>  <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo strftime(" %B %Y"); ?> </td>
                     <td style="font-size:10px;" class="nbProduit"></td>
                     <td style="font-size:10px;" class="nbPrix"></td>

                 </tr>
                <tr style="background-color:#ff0000;color:#fff;">
                    <td style="font-size:10px;">Commission selon le CA : </td>
                    <td style="font-size:10px;" colspan="2"><?= number_format(($montant*15)/100,2,',',' ')?> Ar</td>
                </tr>
                </tbody>
            </table>



