$(document).ready(function(){
    $('.savePrice').on('click',function(event){
         event.preventDefault();
         console.log($('.Obs').val());
         if($('.produit').val() ==='' || $('.mission').val()===''|| $('.prixdet').val() ==='' || $('.prixgros').val() ==='' || $('.Obs').val() ===''){
            $('.mn').modal('show');
         }else{
         var produit=$('.produit').val(),mission=$('.mission').val(),prixdet=$('.prixdet').val(), prixgros=$('.prixgros').val(),observation=$('.Obs').val();
        
      $.post("../fonction/newPrice.php",{produit:produit,mission:mission,prixdet:prixdet,prixgros:prixgros,observation:observation},function(data){
            if(data.error=="true"){
                $('.mn').modal('show');
            }else{
                 var valeur= $( ".produit" ).val();
                 $.post('../fonction/retourInfoPrixProduit.php',{valeur:valeur},function(data){
                  $('.tbody').empty().append(data);
                  $('.modal-title').empty().append('Nouveau Prix');
                  $('.modal-body').empty().append('Prix modifié avec succès').css('color','green');
                  $('.mn').modal('show');
                 });
            }  
       },'json');
      
         }
    
});
 
$( ".produit" ).autocomplete({
  source:'../fonction/retourProduit.php',
  select: function( request, response ) {
     $.post('../fonction/retourInfoPrixProduit.php',{valeur:response.item['label']},function(data){
       $('.tbody').empty().append(data);
     });
  }
});    
    
    
    
});