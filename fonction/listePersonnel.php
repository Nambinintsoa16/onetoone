<?php
   include_once('main.php');
    $sql="SELECT `matricule`,`Nom`,`Prenom`,`Contact` FROM `personnel`";
    $main=new main();

    if($_POST['test']){
        $sql="SELECT `matricule`,`Nom`,`Prenom`,`Contact` FROM `personnel` WHERE `Statut` LIKE 1 ";
    }
    $resultat = $main->queryAll($sql);
?>
<table class="table"> 
        <thead class="">
            <tr>
                <th class="text-center" style="font-size:12px;">Matricule</th>
                <th class="text-center" style="font-size:12px;">Nom</th>
                <th class="text-center" style="font-size:12px;">Prénom</th>
                <th class="text-center" style="font-size:12px;">Contact</th>
            </tr>
        </thead>
        <tbody id="test" style="font-size:12px!important">
            <?php foreach($resultat as $resultat):
            ?>
            <tr>
              <td class="text-center">
                  <?= $resultat['matricule']; ?>
              </td>    
              <td>
                <?= $resultat['Nom']; ?>
              </td>    
              <td>
                <?= $resultat['Prenom']; ?>
              </td>    
              <td>
                <?= $resultat['Contact']; ?>
              </td>    
            </tr>
            <?php endforeach; ?>
            
        </tbody>
        <tfoot></tfoot>
</table>
