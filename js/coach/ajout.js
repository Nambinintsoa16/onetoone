$(document).ready(function(){
    
    //Depense du jour
               var j=1;
               var designation=[],cout=[];
    $('.ajout_dps').on('click',function(e){
        e.preventDefault();
        console.log($('.motif').val());
     /*  if($('.Description').val()==='' || $('.cout').val()==='' && $('.motif').val()==='' ){
            alert("Veuillez remplir les champs vides");
        }else{
       designation[j]=$('.designation').val(),cout[j]=$('.cout').val();
       $('.designation').val(' ');
       $('.cout').val(' ');
        $('.tbody').append("<tr class='depenseTot'><td>"+j+"</td><td class='motif'>"+designation[j]+"</td><td>"+cout[j]+" Ar</td><td><i class='close deleDep'>&times;</i></td></tr>");
            j+=1;
        }
        deletetable();
  */ });
    $('.sauver').on('click',function(event){
        event.preventDefault();
        var val = confirm("Voulez-vous enregistrer?");
        if(val === true){
          ajouter_depense();  
           $('.tbody').html(' ');
        }else{
            alert('Revoir votre document');
        }
    });
    function ajouter_depense(){
       $('.motif').each(function(){
           var motif=$(this).html();
           var cout=$(this).next().html();
          $.post('../fonction/ajout_depense_total.php',{motif:motif,cout:cout},function(data){
          });
        }); 
    }
function deletetable(){
     $('.deleDep').on('click',function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
    });
} 
    
    
    
});