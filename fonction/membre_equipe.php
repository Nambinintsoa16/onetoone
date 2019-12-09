<?php
    include_once("../include/include.php");
    $sql="SELECT * FROM `planing_equipe` WHERE `mtrP` LIKE 'VP%' AND `designationEquipe` LIKE ?";
    $membre_equipe=$main->queryAll($sql,array($_POST['nom_equipe']));
?>


              <!-- Tab content -->
              <div id="commerciaux" class="tabcontent">
               	<p><h3 class="text-center" style="font-size:12px!important">CHEF DE MISSION</3> 
               	    <h4 class="text-center col-md-4 offset-4" style="font-size:12px!important;background:#33b5e5;padding:10px 10px;border-radius:5px; min-widht:300px;color:#fff">NAVAL</h4>
               	</p>
               	<hr>
                <p><h3 class="text-center" style="font-size:12px!important">COACH</h3> 
                <div class="row">
                     <div class="text-center col-md-4 offset-2" style="font-size:12px!important;background:#ffbb33;padding:10px 10px;border-radius:5px; min-widht:300px;color:#fff;margin-right:10px">SANTATRA</div>
               	    <div class="text-center col-md-4" style="background:#ffbb33;padding:10px 10px;border-radius:5px; min-widht:300px;color:#fff">NATACHA</div>
                </div>
               	   
               
               	</p>
               	<hr>
                <p><h3 class="text-center" style="font-size:12px!important">MAGASINIER</h3> 
                <div class="row">
                     <div class="text-center col-md-4 offset-2" style="font-size:12px!important;background:#9933CC;padding:10px 10px;border-radius:5px; min-widht:300px;color:#fff;margin-right:10px">DANNY</div>
               	    <div class="text-center col-md-4" style="font-size:12px!important;background:#9933CC;padding:10px 10px;border-radius:5px; min-widht:300px;color:#fff">NANTENAINA</div>
                </div>
               	   
               
               	</p>
               	<hr>
               	  <p><h3 class="text-center" style="font-size:12px!important">COMMERCIAUX</h3> </p>
               	<div class="row">
               	      
               	    	 <table class="table">
               	    	     
                          <thead style="font-size:12px!important">
                            <tr>
                              <th scope="col">Photos</th>
                              <th scope="col">Matricule</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Point</th>
                              <th scope="col">Contact</th>
                              <th scope="col">C A</th>
                              <th scope="col">Pénalité</th>
                              <th scope="col">Salaire</th>
                              <th scope="col">Plus</th>
                            </tr>
                          </thead>
                          <tbody style="font-size:12px!important">
                              <?php 
                                foreach($membre_equipe as $membre_equipe): 
                                    $sql_person="SELECT `Nom`,`Prenom` FROM `personnel` WHERE `matricule` LIKE ?";
                                    $person=$main->query($sql_person,array($membre_equipe['mtrP']));
                              ?>
                            <tr>
                                 <td><img src="../images/user8-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                             
                              <td scope="row"><?= $membre_equipe['mtrP'] ?></td>
                              <td><?= $person['Nom']." ".$person['Prenom'] ?></td>
                               <td>2000</td>
                              <td>0345048306 </td>
                              <td>400,000 Ar</td>
                              <td>70,000 Ar</td>
                              <td>330,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>
                            </tr>
                              <?php endforeach; ?>
                            <tr>
                                 <td><img src="../images/user3-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                               <td scope="row">VP19002</td>
                              <td>Rindra</td>
                                <td>2000</td>
                             <td>0345048306 </td>
                              <td>800,000 Ar</td>
                              <td>20,000 Ar</td>
                              <td>780,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>

                            </tr>
                            <tr>
                                <td><img src="../images/user8-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                                <td scope="row">VP19003</td>
                                 <td>Lova</td>
                                 <td>2000</td>
                                 <td>0345048306 </td>
                                  <td>600,000 Ar</td>
                                  <td>50,000 Ar</td>
                                  <td>550,000 Ar</td>
                                  <td><a href="info-produit.php"> 
                                     <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                                  </a></td>
                            </tr>
                            <tr>
                                 <td><img src="../images/user4-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                               <td scope="row">VP19004</td>
                              <td>Michel</td>
                                <td>2000</td>
                             <td>0345048306 </td>
                              <td>200,000 Ar</td>
                              <td>20,000 Ar</td>
                              <td>180,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>
                            </tr>
                          </tbody>
                        </table>
               	</div>
              </div>
              <div id="coatch" class="tabcontent">
                <h3>Listes  coach </h3>
                  <div class="table-responsive">
                         <table class="table">
               	    	     
                          <thead style="font-size:12px!important">
                            <tr>
                            <th scope="col">Photos</th>
                              <th scope="col">Matricule</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Point</th>
                              <th scope="col">Contact</th>
                              <th scope="col">C A</th>
                              <th scope="col">Pénalité</th>
                              <th scope="col">Salaire</th>
                              <th scope="col">Plus</th>
                            </tr>
                          </thead>
                          <tbody style="font-size:12px!important">
                            <tr>
                              <td><img src="../images/user8-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                              <td scope="row">COPTN19001</td>
                              <td>Natacha</td>
                              <td>1500</td>
                             <td>0345048306 </td>
                              <td>400,000 Ar</td>
                              <td>70,000 Ar</td>
                              <td>330,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>
                            </tr>
                            <tr>
                                 <td><img src="../images/user3-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                               <td scope="row">COPTN19002</td>
                              <td>Onja</td>
                              <td>2000</td>
                             <td>0345048306 </td>
                              <td>800,000 Ar</td>
                              <td>20,000 Ar</td>
                              <td>780,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>

                            </tr>
                          </tbody>
                        </table>
                   </div>
              </div>

              <div id="magasinier" class="tabcontent">
                <h3>Listes Commerciaux </h3>
                    <div class="table-responsive">
                        <table class="table">
               	    	     
                          <thead style="font-size:12px!important">
                            <tr>
                              <th scope="col">Photos</th>
                              <th scope="col">Matricule</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Point</th>
                              <th scope="col">Contact</th>
                              <th scope="col">C A</th>
                              <th scope="col">Pénalité</th>
                              <th scope="col">Salaire</th>
                              <th scope="col">Plus</th>
                            </tr>
                          </thead>
                          <tbody style="font-size:12px!important">
                            <tr>
                                 <td><img src="../images/user8-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                             
                              <td scope="row">VP19001</td>
                              <td>FY</td>
                               <td>2000</td>
                              <td>0345048306 </td>
                              <td>400,000 Ar</td>
                              <td>70,000 Ar</td>
                              <td>330,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>
                            </tr>
                            <tr>
                                 <td><img src="../images/user3-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                               <td scope="row">VP19002</td>
                              <td>Rindra</td>
                                <td>2000</td>
                             <td>0345048306 </td>
                              <td>800,000 Ar</td>
                              <td>20,000 Ar</td>
                              <td>780,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>

                            </tr>
                            <tr>
                                <td><img src="../images/user8-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                                <td scope="row">VP19003</td>
                                 <td>Lova</td>
                                 <td>2000</td>
                                 <td>0345048306 </td>
                                  <td>600,000 Ar</td>
                                  <td>50,000 Ar</td>
                                  <td>550,000 Ar</td>
                                  <td><a href="info-produit.php"> 
                                     <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                                  </a></td>
                            </tr>
                            <tr>
                                 <td><img src="../images/user4-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                               <td scope="row">VP19004</td>
                              <td>Michel</td>
                                <td>2000</td>
                             <td>0345048306 </td>
                              <td>200,000 Ar</td>
                              <td>20,000 Ar</td>
                              <td>180,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>
                            </tr>
                          </tbody>
                        </table>
                   </div>
              </div>

              <div id="chauffeur" class="tabcontent">
                <h3>Liste magasinier</h3>
                  <div class="table-responsive">
                        <table class="table">
               	    	     
                          <thead style="font-size:12px!important">
                            <tr>
                              <th scope="col">Photos</th>
                              <th scope="col">Matricule</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Contact</th>
                              <th scope="col">C A</th>
                              <th scope="col">Pénalité</th>
                              <th scope="col">Salaire</th>
                              <th scope="col">Plus</th>
                            </tr>
                          </thead>
                          <tbody style="font-size:12px!important">
                            <tr>
                                <td><img src="../images/user8-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                              
                              <td scope="row">MAGTN19001</td>
                              <td>Nantenaina</td>
                              <td>0345048306 </td>
                              <td>400,000 Ar</td>
                              <td>70,000 Ar</td>
                              <td>330,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>
                            </tr>
                            <tr>
                                <td><img src="../images/user3-128x128.jpg" width="80px" style="border-radius: 50%;border:solid 2px #ccc; width: 50px; height: 50px;"></td>
                               <td scope="row">MAGTN19002</td>
                              <td>Danny</td>
                              <td>0345048306 </td>
                              <td>800,000 Ar</td>
                              <td>20,000 Ar</td>
                              <td>780,000 Ar</td>
                              <td><a href="info-produit.php"> 
                                 <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                              </a></td>

                            </tr>
                          </tbody>
                        </table>
                   </div>
              </div>

            
