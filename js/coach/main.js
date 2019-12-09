$(document).ready(function(){

  
   ca_coach();
     setInterval(ca_coach,10000);
     statutBimestre();
     
     //heure par minute
     heure_coach();
     setInterval(heure_coach,1000);
   // heure
    function heure_coach(){
        var now_heure = new Date(); 
        var heure=now_heure.getHours();
        var minute=now_heure.getMinutes();
        var seconde=now_heure.getSeconds();
        
        if(heure<12 && minute<30){
            $('.num_rapport').empty().append('Rapport numéro 1');
        }else if(heure<17){
            $('.num_rapport').empty().append('Rapport numéro 2');
        }else{
            $('.num_rapport').empty().append('Pas de rapport');
        }
        
        $('.ora').attr('placeholder',heure+':'+minute+':'+seconde);
    }
    
    $('.reset_modal').on('click',function(){
       
       $('.desc_rap').val("");
    });
    
    $('.redirect_rapport').on('click',function(){
       window.location.replace('http://gestion-commerciale.in-expedition.com/coach/mes_rapport.php'); 
    });
     //calcul ca du coach
    function ca_coach(){
        
        $.post('../fonction/caCoach.php',function(data){
            $('.cacoach').empty().append(data);
        });
    }
    
    
    
  $('#privilege2').on('click',function(event){
        event.preventDefault();
        var statut=$('.statAnnuelle').html();
           
               
               if(statut=='Natural'){
                   var text=$('.nat').html();
                $('.privStatAnnuelle').empty().append(text);    
               }else if(statut=='Bronze'){
                     text=$('.br').html();
                    $('.privStatAnnuelle').empty().append(text); 
               }else if(statut=='Silver'){
                  text=$('.sil').html();
                    $('.privStatAnnuelle').empty().append(text);                    
               }else if(statut =='Gold'){
                   text=$('.gold').html();
                    $('.privStatAnnuelle').empty().append(text);                   
               }
               
          
    });
    
/*
        $('.privilege').on('click',function(event){
            event.preventDefault();
            if($(this).hasClass('active')){
                 $(this).removeClass('active');
                var parametre1=$(this).html();
                   
            }else{
                $(this).addClass('active');
                $(this).html();
                
            }
        });
        
*/   
/*
    $('.privilege').on('click',function(event){
           var privilege=$(this).html();
           
          if(privilege=='Annuelle'){
       event.preventDefault();
       if($(this).hasClass('active')){
           var statut=$('.statAnnuelle').html();
               
               if(statut=='Natural'){
                   var text=$('.nat').html();
                $('.privStatAnnuelle').empty().append(text);    
               }else if(statut=='Bronze'){
                    var text=$('.br').html();
                    $('.privStatAnnuelle').empty().append(text); 
               }else if(statut=='Silver'){
                    var text=$('.sil').html();
                    $('.privStatAnnuelle').empty().append(text);                    
               }else if(statut='Gold'){
                    var text=$('.gold').html();
                    $('.privStatAnnuelle').empty().append(text);                   
               }
               
           }
           else if(privilege=="Bi-mestriel"){
                statutBimestre();
           }
       }
    });
*/
    function statutBimestre(){
        var statBim=$('.statutBimestre').html();
        if(statBim=='Beginner'){
            var text=$('.big').html();
            $('.privStatBim').empty().append(text);
        }else if(statBim=='Intermediate'){
        text=$('.inter').html();
            $('.privStatBim').empty().append(text);
        }else if(statBim=='Advanced1'){
            text=$('.adv1').html();
            $('.privStatBim').empty().append(text);
        }else if(statBim=='Advanced2'){
            text=$('.adv2').html();
            $('.privStatBim').empty().append(text);
        }
    }
    
    
    
    //detail panier avec modal
    $('.detailPaniercoach').on('click',function(){
        var panier=$(this).attr("id");
        $('#exampleModalCenter .modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
        $.post("../../fonction/retourPanier.php",{panier:panier},function(data){
           $('#exampleModalCenter .modal-body').empty().append(data); 
           
        });
        $('#exampleModalCenter .modal-title').empty().append('<p class="text-enter">Panier: '+ panier +'</p>');
        $('#exampleModalCenter').modal('show');
       
    });
    //Depense du jour
               var j=1;
               var designation=[],cout=[];
    $('.ajout_dps').on('click',function(e){
        e.preventDefault();
       if($('.designation').val()==='' || $('.cout').val()==='' ){
            alert("Veuillez remplir les champs vides");
        }else{
       designation[j]=$('.designation').val(),cout[j]=$('.cout').val();
       $('.designation').val(' ');
       $('.cout').val(' ');
        $('.tbody').append("<tr class='depenseTot'><td>"+j+"</td><td class='motif'>"+designation[j]+"</td><td>"+cout[j]+" Ar</td><td><i class='close deleDep'>&times;</i></td></tr>");
            j+=1;
        }
        deletetable();
   });
    $('.sauver').on('click',function(event){
        event.preventDefault();
        var val = confirm("Voulez-vous enregistrer?");
        if(val === true){
          ajouter_depense();  
           $('.tbody').html(' ');
        }else{
            alert('Revoir votre document');
        }
       
       /* $('.motif').each(function(){
           console.log($(this).html()); 
           console.log($(this).next().html());
           var motif=$(this).html();
           var cout=$(this).next().html();
           $.post('../fonction/ajout_depense_total.php',{motif:motif,cout:cout},function(data){
           });
        });*/
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

   
    //EVALUATION DU VENTE ACCOMPAGNEMENT COACH
    //CALCUL MOYENNE
    //test si tous les champs est rempli
    $('.note').on('change',function(e){
       e.preventDefault();
       if($(this).val()<0 || $(this).val()>5){
           alert('valeur doit etre inférieur à 5');
           $(this).val('');
       }else if(!$.isNumeric($(this).val())){
           alert('Veuillez entrer un chiffre');
           $(this).val('');
       }else{
           var total=0;
           var moyenne =0;
           $('.note').each(function(){
              total+=Number($(this).val()); 
           });
           moyenne=total/4;
           $('.note_moyenne').attr('placeholder',moyenne);
           $('.note_moyenne_aff').empty().append(moyenne);
       }
    });
    //enregistre note evaluation
    $('.clear_note').on('click',function(e){
      $('.note').each(function(){
              $(this).val(''); 
       });
       $('.note_moyenne').attr('placeholder',0);
       $('.note_moyenne_aff').empty().append('0');
      /*
       $('#exampleModalCenter .modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
       var note=0,i=0;
       var presentation=$('.note_presentation').val();
       var argumentaire=$('.note_argumentaire').val();
       var cible =$('.note_cible').val();
       var comportement=$('.note_comportement').val();
        
        $.post("../../fonction/ajoutEvaluation.php",{presentation:presentation,argumentaire:argumentaire,cible:cible,comportement:comportement},function(data){
              $('#exampleModalCenter .modal-body').empty().append(data); 
        });
        
        $('#exampleModalCenter .modal-title').empty().remove();
        $('#exampleModalCenter').modal('show');*/
    });
    
   
    //FIN CALCUL MOYENNE
    
    $('.save_accomp').on('click',function(e){
        e.preventDefault();
            var commercial=$('.comm').val();
            var evaluation=$('.evaluation').val();
            var Nom=$('.Nom').val();
            var Prenom=$('.Prenom').val();
            var sexe=$('.sexe').val();
            var jour=$('.jour').val();
            var mois=$('.mois').val();
            var anne=$('.anne').val();
            var contact=$('.contact').val();
            var ville=$('.ville').val();
            var codeClient=$('.codeClient').val();
            var quartier=$('.quartier').val();
            var produit=Array();
            var quantite=Array();
            var note_evaluation=Array();
            var idPrix=Array();
            var i=0;
            var t=0;
            var j=0;
            var p=0;
            var inputfile =$('.inputfile').val();
            var contPro=$('.codeprod').val();
            
       
            
        
            if(ville=="" || quartier=="" || typeof(contPro)=='undefined' || commercial=="Mes accompagnement" || evaluation=="Evaluation"){
             // bootbox.alert("Veuillez remplir les champs obligatoires.");
             $('#exampleModalCenter .modal-title').empty().append('<span style="font-size:15px">Information.</span>');
              $('#exampleModalCenter .modal-body').empty().append('<span style="font-size:12px">Veuillez remplir les champs obligatoires.</span>');
              $('#exampleModalCenter .modal-footer').empty().append('<button type="button" class="btn btn-warning btn-xs" data-dismiss="modal">Fermer</button>');
              $('#exampleModalCenter').modal('show');
            }else{
              if(Nom!="" && Prenom!=""  && sexe!="" ){
            
                $('.codeprod').each(function() {
                  produit[i] = $(this).html();
                   i++;
                      });
               $('.quant').each(function() {
                  quantite[t] = $(this).find('.Qua').val();
                   t++;
               });
               
               //NOTE ACCOMP 
                   $('.note').each(function(){
                      note_evaluation[j] = $(this).val();
                      j++;
                   });
                   $('.idPrix').each(function(){
                      idPrix[p]= $(this).html();
                      p++;
                   });
            
            
                  var content_quantite=JSON.stringify(quantite);
                  var content_produit=JSON.stringify(produit);
                  var content_note=JSON.stringify(note_evaluation);
                  var idPrix=JSON.stringify(idPrix);
                  //reinitialisation du note
                   $('.note').each(function(){
                       $(this).val('');
                   });
                   $('.note_moyenne').attr('placeholder',0);
              
            
              var fd="test";
               
               
                $('#exampleModalCenter .modal-body').empty().append('<div class="spinner-border text-center" role="status"><span class="sr-only">Loading...</span></div>');
                $('#exampleModalCenter .modal-footer .btn').remove();
                $('#exampleModalCenter').modal('show');
            $.ajax({
                    url: '../fonction/enregistrement_accomp_avec_client.php?idPrix='+idPrix+'&com='+commercial+'&content_note='+content_note+'&anne='+anne+'&mois='+mois+'&jour='+jour+'&quartier='+quartier+'&ville='+ville+'&nom='+Nom+'&Prenom='+Prenom+'&sexe='+sexe+'&contact='+contact+'&content_quantite='+content_quantite+'&content_produit='+content_produit,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response != 0){
                     $('.tbody tr').remove();
                     $('.Nom').val("");
                     $('.Prenom').val("");
                     $('.jour').val("");
                     $('.quartier').val("");
                     $('.contact').val("");
                     $('.ville').val("");
                    
            
                        }else{
                          $(' #exampleModalCenter .modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
                          $('#exampleModalCenter .modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
                          $('#exampleModalCenter').modal('show');
                          $('#exampleModalCenter').modal('hide');
                          $('.tbody tr').remove();
                          $('.Nom').val("");
                          $('.Prenom').val("");
                          $('.jour').val("");
                          $('.quartier').val("");
                          $('.contact').val("");
                          $('.ville').val("");
                          $('.soustotal').empty().append("00 Ar");
                          $('.collapse').collapse('hide');
                        }
                    }
                });
            
                
               }else if(codeClient!=""){//vente client qui existe déjà
                   $('.codeprod').each(function() {
                      produit[i]= $(this).html();
                       i++;
                          });
                   $('.quant').each(function() {
                      quantite[t]=$(this).find('.Qua').val();
                       t++;
                   });
                   
                   //NOTE ACCOMP 
                   $('.note').each(function(){
                      note_evaluation[j] = $(this).val();
                      j++;
                   });
                     $('.idPrix').each(function(){
                      idPrix[p]=$(this).html();
                      p++;
                   });
                      var content_quantite=JSON.stringify(quantite);
                      var content_produit=JSON.stringify(produit);
                      var content_note=JSON.stringify(note_evaluation);
                      var idPrix=JSON.stringify(idPrix);
                      //reinitialisation du note
                           $('.note').each(function(){
                               $(this).val('');
                           });
                           $('.note_moyenne').attr('placeholder',0);
                      
                      var idClient=codeClient.split('|');
                      
                    $('#exampleModalCenter .modal-body').empty().append('<div class="spinner-border text-center" role="status"><span class="sr-only">Loading...</span></div>');
                    $('#exampleModalCenter .modal-footer .btn').remove();
                    $('#exampleModalCenter').modal('show');
                     $.post('../fonction/enregistrement_accomp_client_exist.php',{idPrix:idPrix,content_note:content_note,com:commercial,evaluation:evaluation,content_produit:content_produit,content_quantite:content_quantite,ville:ville,quartier:quartier,codeClient:idClient[0]},function(data){
                         
                         if(!data){
                             $('#exampleModalCenter .modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
                             $('#exampleModalCenter .modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
                             $('.tbody tr').remove();
                              $('.quartier').val("");
                              $('.ville').val("");
                              $('.soustotal').empty().append("00 Ar");
                              $('.collapse').collapse('hide');
                         }
                     },'json');
                 
               }else{
                bootbox.confirm({
                  size: "small",
                  message: "<p>Etes-vous sûre d'enregistrer cette vente d'accompagnement sans client ?</p>",
                  locale: 'fr',
            
                  callback: function(result){
                     
                    $('.codeprod').each(function() {
                      produit[i] = $(this).html();
                       i++;
                          });
                   $('.quant').each(function() {
                      quantite[t] = $(this).find('.Qua').val();
                       t++;
                   });
                   
                   //NOTE ACCOMP 
                   $('.note').each(function(){
                      note_evaluation[j] = $(this).val();
                      j++;
                   });
                   var idPrix=Array();
                    $('.idPrix').each(function(){
                     idPrix[p]=$(this).html();
                      p++;
                   });
                   
                      var content_quantite=JSON.stringify(quantite);
                      var content_produit=JSON.stringify(produit);
                      var content_note=JSON.stringify(note_evaluation);
                      var idPrix=JSON.stringify(idPrix);
                   //reinitialisation du note
                   $('.note').each(function(){
                       $(this).val('');
                   });
                   $('.note_moyenne').attr('placeholder',0);
                    
              /* $('.modal-body').empty().append('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
                $('.modal-footer .btn').remove();
                $('.modal').modal('show');*/
                 $.post('../fonction/enregistrement_accomp_sans_client.php',{idPrix:idPrix,content_note:content_note,com:commercial,content_produit:content_produit,content_quantite:content_quantite,ville:ville,quartier:quartier},function(data){
                     
                     var codeClient=$('.codeClient').val();
                     
                     if(data.Message =="false"){
                         $('#exampleModalCenter .modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
                         $('#exampleModalCenter .modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
                         $('.tbody tr').remove();
                         $('.Nom').val("");
                         $('.Prenom').val("");
                         $('.jour').val("");
                         $('.quartier').val("");
                         $('.contact').val("");
                         $('.ville').val("");
                     }else if(data.Message =="0"){
                           $('#exampleModalCenter .modal-body').empty().append('Veuillez remplir les champs obligatoires.');
                           $('#exampleModalCenter').modal('show');
                     }else{
                           $('#exampleModalCenter .modal-body').empty().append('Veuillez remplir les champs obligatoires.');
                           $('#exampleModalCenter').modal('show');
                     }
                 },'json');
            
                     if(result){
                         $('#exampleModalCenter .modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
                         $('#exampleModalCenter .modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
                         $('#exampleModalCenter').modal('show');
                         $('.tbody tr').remove();
                         $('.soustotal').empty().append("00 Ar");
                         $('.Nom').val("");
                         $('.Prenom').val("");
                         $('.jour').val("");
                         $('.quartier').val("");
                         $('.contact').val("");
                         $('.ville').val("");
                         $('.codeClient ').val("");
                         $('.collapse').collapse('hide');
                     }else{
                         $('#exampleModalCenter').modal('hide')
                     }
                        
                
                   }
              });
            
              }
            }
            
            });    

    
 /*   
$('.matricule').on('change',function(){
  tabledataPlaning();
});


function tabledataPlaning(){
  var term=$('.matricule').val();
    $.get('../fonction/retour_personel.php',{term:term},function(data){
            $('.tbody').empty().append(data);
    });  
}

$('#myTable').DataTable();



$('.savePlaning').on('click',function(){
var idMission=$('.idMission').val(),date=$('.date').val(),ville=$('.ville').val(), province=$('.province').val(),quartier=$('.quartier').val(),IdEquipe=$('.IdEquipe').val(),Panier=$('.Panier').val();
if(date=="" || ville=="" || province==""|| quartier==""){
    $("#monModal").modal('show');
}else{
 $.post('../fonction/fonctiontPlaning.php',{idMission:idMission,date:date,ville:ville,province:province,quartier:quartier,IdEquipe:IdEquipe,Panier:Panier},function(data){
 tabledataPlaning();
 if(data.error=='true'){
     alert("Erreur")
 }else{
     alert('Succès');
 }
 });
   
}*/
$('.trajet').on('click',function(e){
         e.preventDefault();
        var ville=$(this).text();
        var date=$(this).parent().parent().find('.daty').text();
        $('.modal-title').empty().append("Chargement...");
        $('.modal-body').empty().append('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
        $.post("../../fonction/retourTrajet.php",{ville:ville,date:date},function(data){
            $('.modal-title').empty().append("Trajet");
            $('.modal-body').empty().append(data);
            $('.modal').modal('show');
        });
         
    });
    
$('.save_rapport').on('click',function(e){
    e.preventDefault();
    var heure=$('.ora').attr('placeholder');
    var description = $('.desc_rap').val();
    var tab;    
        tab=heure.split(':');
        if((tab[0]>11 && tab[1]>30) && (tab[0]<12 && tab[1]<30)){
            $('#exampleModalCenter .modal-title').empty().append("Chargement...");
            $('#exampleModalCenter .modal-body').empty().append('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
            $('#exampleModalCenter .modal-footer').remove();
            $('#exampleModalCenter').modal('show');
            $.post("../../fonction/ajoutRapport.php",{heure:heure,description:description},function(data){
                $('#exampleModalCenter .modal-header').remove();
                $('#exampleModalCenter .modal-body').empty().append(data);
                $('#exampleModalCenter .modal-footer').remove();
                $('#exampleModalCenter').modal('show');
            });
            
        }else{
            $('#exampleModalCenter .modal-header').remove();
            $('#exampleModalCenter .modal-body').empty().append('<span class="text-danger">Rapport 1</span> doit etre redigé le midi (11h30 à 12h30) &nbsp;&nbsp;<i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>');
            $('#exampleModalCenter .modal-footer').remove();
            $('#exampleModalCenter').modal('show');
        }
        if(tab[0]>16 && tab[0]<17){
            $('#exampleModalCenter .modal-title').empty().append("Chargement...");
            $('#exampleModalCenter .modal-body').empty().append('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
            $('#exampleModalCenter .modal-footer').remove();
            $('#exampleModalCenter').modal('show');
            $.post("../../fonction/ajoutRapport.php",{heure:heure,description:description},function(data){
                $('#exampleModalCenter .modal-header').remove();
                $('#exampleModalCenter .modal-body').empty().append(data);
                $('#exampleModalCenter .modal-footer').remove();
                $('#exampleModalCenter').modal('show');
            });
        }else{
            $('#exampleModalCenter .modal-header').remove();
            $('#exampleModalCenter .modal-body').empty().append('<span class="text-danger">Rapport 2</span> doit etre redigé le soir (17h à 18h) &nbsp;&nbsp;<i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>');
            $('#exampleModalCenter .modal-footer').remove();
            $('#exampleModalCenter').modal('show');
        }
});



  /******FIN COACH*****/  
    
});