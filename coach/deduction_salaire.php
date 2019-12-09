<?php 
$titre = "DEDUCTION SUR SALAIRE";
include "header.php";
include_once('../include/include.php');

$coach=$_SESSION['matricule'];


?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">
          <div class="row" style="margin-top:-10px">
              <div class="col-md-12" style="background:#fff;padding:5px 5px">
                  <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px" >
                  <li style="padding:0px 5px"><a href="moncompte.php" title="Accueil">Mon compte  &nbsp;&nbsp;&nbsp;></a></li>
                  <li class="active" style="padding:0px 5px" > Déduction sur salaire  <b>  <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo utf8_encode(strftime(" %B %Y")); ?>  </b> </li>
                </ol>
              </div>
          </div>
        
    <div class="row" style="margin-top:5px">
        <div class="col-md-12" style="background:#fff">
            <table class="table table-hover   table-bordered " style="font-size:13px;margin-top:5px; ">
               <thead>
                  
                   <tr>

                        <td class="text-center">Description</td>
                        <td class="text-center">Montant</td>
                    </tr>
                   
                  
               </thead>
               <tbody>

                    <tr>
                        <td><a href="detail-deduction.php?description=Telephone">Télephone</a></td>
                        <td style="font-size:10px;text-align:center;"><p><?php 
                        $tel=$main_function->malus('Telephone',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($tel,2,","," ");
                        ?> Ar</p></td>
                    </tr>
                    
                    <tr>
                        <td><a href="detail-deduction.php?description=Absence">Absence</a> </td>
                        <td style="font-size:10px;text-align:center;"><p> <?php 
                        $Abs=$main_function->malus('Absence',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($Abs,2,","," ");
                        ?> Ar</p></td>
                    </tr>
                    
                    <tr>
                        <td><a href="detail-deduction.php?description=Autre">Autre déduction</a> </td>
                        <td style="font-size:10px;text-align:center;"><p><?php 
                        $Aut=$main_function->malus('Autre',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($Aut,2,","," ");
                        ?> Ar</p></td>
                    </tr>
                    
                    <tr>
                        <td><a href="detail-deduction.php?description=Manque">Manque</a></td>
                        <td style="font-size:10px;text-align:center;"><p><?php 
                        $Man=$main_function->malus('Manque',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($Man,2,","," ");
                        ?> Ar</p></td>
                    </tr>
                    
                    <tr>
                        <td><a href="detail-deduction.php?description=Malus">Malus</a></td>
                        <td style="font-size:10px;text-align:center;"><p><?php 
                        $Mal=$main_function->malus('Malus',$_SESSION['matricule'],date('Y-m'));
                        echo number_format($Mal,2,","," ");
                        ?> Ar</p></td>
                    </tr>
                    

                  

                </tbody>
            </table>
            
            
            
            <table class="table table-hover   table-bordered " style="font-size:13px;margin-top:20px; ">
               <thead>
                  
                   <tr>

                        <td class="text-center">Total : </td>
                        <td class="text-center">
                        <?php
                          $total=$tel+$Abs+$Aut+$Man+$Mal;
                          echo  number_format($total,2,","," "); 
                          ?>Ar</td>
                    </tr>
                   
                  
               </thead>
               <tbody>

                </tbody>
            </table>
        </div>
         
    </div>
  </div>
</div>

  </div>
</div>

  </div>

<?php include "footer.php";?>