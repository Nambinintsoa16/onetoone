 $(document).ready(function () {

 monCa();
  setInterval(monCa,1000);
      function monCa (){
        var catotal=$('.catotal').val();
        
        $.post('../fonction/caDuJour.php',function(data){
                   $('.catotal').empty().append(' ' + data.CA +' '+'Ar');
              },'json');
    }

 });