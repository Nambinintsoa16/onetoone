$(document).ready(function(){
    /*$('.btn-login').on('click',function(event){
        event.preventDefault();
         var idVP=$('.input-user').val();
         var pass=$('.input-mot-pass').val();
     if (idVP=="" || pass=="") {
          $('.alert-login').slideDown();
     }else{
        $.post('fonction/login.php',{idVP:idVP,pass:pass},function(data){
              if(data=="false"){
                $('.alert-login-false').slideDown();
              }
         });
     }
});*/
     $('.input-login').on('focus',function(){
        $('.alert-login').slideUp();
        $('.alert-login-false').slideUp();
        $(this).val("");
     });
     
/*******************PRIVILEGE**********************************/
statutBimestiel();

function statutBimestiel(){
    var statutBimestriel=$('.statutBimestriel').text();
    if(statutBimestriel=='Beginner'){
         text=$('.beg').html();
        $('.privStatBimestriel').empty().append(text);
        
    }else if(statutBimestriel=='Intermediate'){
         text=$('.inter').html();
        $('.privStatBimestriel').empty().append(text);
    }else if(statutBimestriel=='Advance 1'){
          text=$('.adv1').html();        
         $('.privStatBimestriel').empty().append(text);
    }else if(statutBimestriel=='Advance 2'){
         text=$('.adv2').html();
        $('.privStatBimestriel').empty().append(text);
    }else if(statutBimestriel=='Professionnelle'){
         text=$('.pro').html();
        $('.privStatBimestriel').empty().append(text);
    }else if(statutBimestriel=='Expert'){
        text=$('.exp').html();
        $('.privStatBimestriel').empty().append(text);
    }
}

$('#privilege2').on('click',function(event){
    event.preventDefault();
     var statAn=$('.statAnnuelle').text();
     console.log(statAn);
    if(statAn=='Natural'){
         text=$('.nat').html();
        $('.privStatAnnuelle').empty().append(text);
        
    }else if(statAn=='Bronze'){
         text=$('.br').html;
        $('.privStatAnnuelle').empty().append(text);
        
    }else if(statAn=='Silver'){
         text=$('.sil').html();
        $('.privStatAnnuelle').empty().append(text);
    }else if(statAn=='Gold'){
         text=$('.gold').html();
        $('.privStatAnnuelle').empty().append(text);
    }
});
/*********************/


});
