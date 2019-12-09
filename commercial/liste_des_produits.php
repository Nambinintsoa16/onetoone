
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:10px"><a href="?page">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:10px">Mes produits</li>
  </ol>
</nav>   

<div class="input-group">
    <select class="browser-default custom-select fammille" style="font-size:11px; width:50px; height:31.2px;" >
     <option disabled selected hidden>Fammille</option>
     <option>Tout</option>
<?php
$sql="SELECT DISTINCT `famille` FROM `categorie` WHERE 1";
$famille=$main->queryAll($sql);
if($famille):
 foreach( $famille as $famille ):
?>        
  <option><?=$famille['famille']?></option>
<?php
 endforeach;
  endif;
?>
</select>
<select class="browser-default custom-select groupe" style="font-size:11px; width:50px; height:31.2px;" >
     <option disabled selected hidden>goupe</option>
     <option>Tout</option>
</select>
    <input class = "form-control" id = "demo" type ="text" placeholder = "Désignation" style="font-size:9px;height:31.2px;">
</div>




    
   <table class="table text-center " style="font-size:12px;margin-top:5px;" id="myTable">
             <thead>
               <tr>
               <th style="font-size:10px;">Les produits disponibles en stock</th>
               </tr>
            </thead>

  <tbody id ="emp_body"  style="font-size:13px;">


 </tbody>

</tfooter>

            </table>

<div class="col-lg-8 text-center" style="font-size:12px;margin-bottom:20px;">
  <ul class="pagination justify-content-end pagination" id="pagination"></ul>
</div>  
            


