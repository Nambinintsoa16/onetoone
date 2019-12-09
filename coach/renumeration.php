<?php 
$titre = "bonus et prime";
include "header.php";
include_once('../include/include.php');

$coach=$_SESSION['matricule'];


?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
        <div class="container-fluid">
             <div class="row" style="padding:0px 5px">
                  <div class="col-md-12" style="background:#fff;padding:5px 0px">
                        <ol class="breadcrumb" style="font-size:14px!important;padding:0px 5px;background:#fff" >
                          <li ><a href="moncompte.php" title="Accueil">Mon compte  &nbsp;&nbsp;&nbsp;></a></li>
                          <li class="active" style="padding:0px 5px" >
                          Renumeration   <b>  <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo strftime(" %B %Y"); ?>  </b> </li>
                        </ol>
                  </div>
            </div>
           <div class="row" style="margin-top:-15px; padding:0px 0px">
            <div class="col-md-12" style="background:#fff">    
            <table class="table table-hover   table-bordered " style="font-size:13px;">
               <thead>
                   <tr>
                        <td class="text-center">Description</td>
                        <td class="text-center">Montant</td>
                    </tr>
                     <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
               </thead>
               <tbody>
                    
                </tbody>
            </table>
            <table class="table table-hover   table-bordered " style="font-size:13px;margin-top:10px; ">
               <thead>
                   <tr>
                        <td class="text-center">Total : </td>
                        <td class="text-center">
                        <?php
                          $total=$tel+$Abs+$Aut+$Man+$Mal;
                          echo  number_format($total,2,",","."); 
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

<?php include "footer.php";?>