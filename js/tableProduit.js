$(document).ready(function () {

retourProduit("Tout","Tout");


$('.fammille').on('change',function(){
    var famille=$(this).val();
    $.post('../fonction/groupeProduit.php',{famille:famille},function(data){
        $('.groupe').html('').append(data);
    });
    retourProduit("Tout",famille);
});

$('.groupe').on('change',function(){
   var famille=$('.fammille').val();
   var groupe=$(this).val();
   
   retourProduit(groupe,famille);
   
});



function retourProduit(groupe,famille){
 $.ajax({
        url: "../fonction/listeProduit.php",
        async: true,
        type :"GET",
        dataType: 'json',
        data:"groupe="+groupe+"&famille="+famille,
        success: function (data) {
                 $('#emp_body').html('');
                  for (var i = 0; i < data.length; i++) {
                    tr = $('<tr/>');
                    tr.append("<td style='padding:5px 0px 0px 0px;'><ul class='list-group'><li class='list-group-item d-flex justify-content-between align-items-center'> <a href='?page=information_sur_produit&codeProduit="+data[i].idProduit+"'><p style='font-size:11px;'><strong>" + data[i].idProduit +"</strong><br/>"+ data[i].designation+"<br/>"+ data[i].quantite +"</a></p><div class='image-parent' style='margin-left:15px;'><a href='../image/produit/"+data[i].idProduit +".jpg' data-lightbox='roadtrip' title='"+data[i].designation+"'><img id='myImg' class='img-thumbnail img-fluid img-produit' src='../image/produit/"+data[i].idProduit +".jpg' alt=Snow' style='width: 71px; height: 71px; padding: 3px;'></a></td> </div></li></ul></td>");
                    $('#emp_body').append(tr);
                    demo();  
                } 
                    
        
                  
        }
  });
   
   
 function demo(){
$("#demo").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#emp_body tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
}
demo();  
   
}                    










});

