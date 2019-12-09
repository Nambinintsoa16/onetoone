 $(document).ready(function () {
       var date=new Date();
       var month=date.getMonth()+1;
       var Years=date.getFullYear();
       dataSuiviDesVentes(month);
       
 $('.select-mois').on('change',function(){
   $('.TR').empty().append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp; Loading...');
   $('.FB').empty().append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp; Loading...');  
  var mois=$(this).val();
  dataSuiviDesVentes(mois,Years);
});


function totaL(){
    var ventefb=0;
    var venteTr=0;
     $('.ventefb').each(function(){
        var cont=$(this).children().text(); 
        var text=cont.split(",");
        var fb=text[0].replace(/\s/g,'');
        ventefb+=Number(fb);
     });
     
      $('.venteTr').each(function(){
        var contTR=$(this).children().text(); 
        var textTr=contTR.split(",");
        var tr=textTr[0].replace(/\s/g,'');
        venteTr+=Number(tr);
     });
  
    $('.TR').empty().append($.number(venteTr, 1, ',', ' ' )+"&nbsp; Ar");
    $('.FB').empty().append($.number( ventefb, 1, ',', ' ' )+"&nbsp; Ar");
}





function dataSuiviDesVentes(mois,Years){
    $('.tableau').addClass('text-center');
    $('.tableau').empty().append("<div class='spinner-border text-danger' role='status'><span class='sr-only'>Loading...</span></div>");
  $.post('../fonction/vente_du_mois_d.php',{mois:mois},function(data){
     $('.tableau').removeClass('text-center');
     $('.tableau').empty().append(data);
    var date=$('.select-mois option:selected').text();
    $('.date').empty().append(date +' '+ Years);
     totaL();
  });
}
 });