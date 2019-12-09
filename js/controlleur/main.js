$(document).ready(function(){
    
    

    
/*************/    
        
    $(".uploadFile").on("change", function(){
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;
        if (/^image/.test( files[0].type)){
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function(){
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }

    });
    
$(".inputiltre").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $(".tbode tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});   
    
    
    
$('.enregistre-fonction').on('click',function(event){
    event.preventDefault();
   var designation=$('.Nom-fonction').val();
   $.post('../../fonction/enregistre_fonction.php',{fonction:designation},function(data){
      if(data!==0){
        $('.text-info').empty().append("Fonction  a été enregistré avec succès.")
        $('.fade').modal('show');  
      }else if(data=='1'){
         $('.text-info').empty().append("Cette fonction existe déjà.")
         $('.fade').modal('show');   
      }else{
         $('.text-info').empty().append("Veuillez remplir tout les informations correctement.")
         $('.fade').modal('show');   
      } 
       
   });
});     


$('.autoCompletePersonnel').autocomplete({
  source:'../fonction/retourPersonnel.php',
  minLength: 3,
  selectFirst:true,
  minChars: 3,

});
    
    
  
    
   $('.chefaddinput').on('click',function(){
       
       var dataTablePers=$('.Chef').val();
       var data=dataTablePers.split("|");
       var test_unique=true;
       
       $('.matricule_chef').each(function(){
           var matricule="";
           matricule=$(this).html();
           if(data[0]==matricule){
               test_unique=false;
               return false;
           }
       });
       if(test_unique){ // si le  n'existe pas dans chef donc insere
           $('.infoEquipe tbody:last').append('<tr><th scope="row" class="matricule matricule_chef">'+ data[0]+'</th><td>'+data[1]+'</td><td>'+data[2]+'</td><td><i class="fa fa-minus-square" style="font-size:40px;color:#33b5e5;cursor:pointer"></i></td></tr>');
       }
       moin();
    }); 
    
     $('.coach-add-input').on('click',function(){
       var dataTablePers=$('.Coach').val();
       var data=dataTablePers.split("|");
       var test_unique=true;
       
       $('.matricule_coach').each(function(){
           var matricule="";
           matricule=$(this).html();
           if(data[0]==matricule){
               test_unique=false;
               return false;
           }
       });
       if(test_unique){ // si le  n'existe pas dans chef donc insere
           $('.infoCoach tbody:last').append('<tr><th scope="row" class="matricule matricule_coach">'+ data[0]+'</th><td>'+data[1]+'</td><td>'+data[2]+'</td><td><i class="fa fa-minus-square" style="font-size:40px;color:#33b5e5;cursor:pointer"></i></td></tr>');
       }
       moin();
    }); 
    
    
     $('.infoCom').on('click',function(){
       var dataTablePers=$('.Commerciaux').val();
       var data=dataTablePers.split("|");
        var test_unique=true;
       
       $('.matricule').each(function(){
           var matricule="";
           matricule=$(this).html();
           if(data[0]==matricule){
               test_unique=false;
               return false;
           }
       });
       if(test_unique){ // si le  n'existe pas dans chef donc insere
           $('.infoCommerc tbody:last').append('<tr><th scope="row" class="matricule matricule_com">'+ data[0]+'</th><td>'+data[1]+'</td><td>'+data[2]+'</td><td><i class="fa fa-minus-square" style="font-size:40px;color:#33b5e5;cursor:pointer"></i></td></tr>');
       }
     moin();
    }); 
    
    
  function moin(){  
   $('tr .fa-minus-square').on('click',function(){
      $(this).parent().parent().remove();
   }); 
   
  }   
 moin();  
   
    
$('.enregistre-personnel').on('click',function(event){
event.preventDefault();
var dataPHP=[];
dataPHP.push();

var date_d_embauche=$('.date_d_embauche').val();
var Nom=$('.Nom').val();
var Prenom=$('.Prenom').val();
var date_de_naissance=$('.date_de_naissance').val();
var lieu_de_naissance=$('.lieu_de_naissance').val();
var situation_Matrimoniale=$('.situation_Matrimoniale').val();
var nombre_d_enfant=$('.nombre_d_enfant').val();
var sexe=$('.sexe').val();
var CIN_COM=$('.CIN_COM').val();
var Date_CIN_COM=$('.Date_CIN_COM').val();
var Fait_a_COM=$('.Fait_a_COM').val();
var Duplicata_du_com=$('.Duplicata_du_com').val();
var Lieu_de_Duplicatat_COM=$('.Lieu_de_Duplicatat_COM').val();
var Adresse=$('.Adresse').val();
var Contact=$('.Contact').val();
var Contact_flotte=$('.Contact_flotte').val();
var personne_a_contacter=$('.personne_a_contacter').val();
var Lien_de_Parente=$('.Lien_de_Parente').val();
var Contact_Telephonique=$('.Contact_Telephonique').val();
var Adresse_paret=$('.Adresse_paret').val();
var Numero_CIN_personne_a_contacter=$('.Numero_CIN_personne_a_contacter').val();
var Date_de_son_CIN=$('.Date_de_son_CIN').val();
var Lieu_d_enregistrementPr=$('.Lieu_d_enregistrementPr').val();
var Duplicata_du_pr=$('.Duplicata_du_pr').val();
var Lieu_de_duplicatat_pr=$('.Lieu_de_duplicatat_pr').val();
var Fonction_a_l_embauche=$('.Fonction_a_l_embauche').val();
var Fonction_Acutelle=$('.Fonction_Acutelle').val();
var Mode_de_Paymemnt_salaire=$('.Mode_de_Paymemnt_salaire').val();
var numero_de_compte=$('.numero_de_compte').val();
var Statut=$('.Statut').val();
var matricule=$('.matricule').val();

if(matricule===" " || Lieu_d_enregistrementPr=== " " || Date_de_son_CIN==="" || Numero_CIN_personne_a_contacter==="" || Adresse_paret==="" || Contact_Telephonique==="" ||  Lien_de_Parente==="" || personne_a_contacter===" " || date_d_embauche===" " || Nom===" " || Prenom===" " || date_de_naissance ===" " || lieu_de_naissance===" " || CIN_COM===" " || nombre_d_enfant=== " " || Date_CIN_COM===" " || Fait_a_COM===" "  || Adresse===" " || Contact==="" || Contact_flotte===" "){
    $('.text-info').empty().append("Veuillez remplir tout les informations obligatoire.")
    $('.fade').modal('show');
}else{
    
  dataPHP.push(date_d_embauche,Nom,Prenom,date_de_naissance,lieu_de_naissance,situation_Matrimoniale,nombre_d_enfant,sexe,CIN_COM,Date_CIN_COM,Fait_a_COM,Duplicata_du_com,Lieu_de_Duplicatat_COM,Adresse,Contact,Contact_flotte,personne_a_contacter,Mode_de_Paymemnt_salaire,Contact_Telephonique,Adresse_paret,Numero_CIN_personne_a_contacter,Date_de_son_CIN,Lieu_d_enregistrementPr,Duplicata_du_pr,Lieu_de_duplicatat_pr,Fonction_a_l_embauche,Fonction_Acutelle,Lien_de_Parente,numero_de_compte,Statut);
     
       var donne=JSON.stringify(dataPHP);
       var fd = new FormData();
       $.get('../../image/QRCode/generateur.php',{idpersonnel:matricule},function(data){});
            
       
        var files = $('.uploadFile')[0].files[0];
        fd.append('file',files);
        $.ajax({
            url: '../../fonction/enregistement_personnel_photo.php?Matricule='+matricule+"&data="+donne,
            type: 'post',
            data:fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response !== 0){
                    $('.text-info').empty().append("Personnel  a été enregistré avec succès.")
                    $('.fade').modal('show');
                    $('.date_d_embauche').val("");
                    $('.Nom').val("");
                    $('.Prenom').val("");
                    $('.date_de_naissance').val("");
                    $('.lieu_de_naissance').val("");
                    $('.situation_Matrimoniale').val("");
                    $('.nombre_d_enfant').val("");
                    $('.sexe').val("");
                    $('.CIN_COM').val("");
                    $('.Date_CIN_COM').val("");
                    $('.Fait_a_COM').val("");
                    $('.Duplicata_du_com').val("");
                    $('.Lieu_de_Duplicatat_COM').val("");
                    $('.Adresse').val("");
                    $('.Contact').val("");
                    $('.Contact_flotte').val("");
                    $('.personne_a_contacter').val("");
                    $('.Lien_de_Parente').val("");
                    $('.Contact_Telephonique').val("");
                    $('.Adresse_paret').val("");
                    $('.Numero_CIN_personne_a_contacter').val("");
                    $('.Date_de_son_CIN').val("");
                    $('.Lieu_d_enregistrementPr').val("");
                    $('.Duplicata_du_pr').val("");
                    $('.Lieu_de_duplicatat_pr').val("");
                    $('.Date_d_embauche').val("");
                    $('.Fonction_a_l_embauche').val("");
                    $('.Fonction_Acutelle').val("");
                    $('.Mode_de_Paymemnt_salaire').val("");
                    $('.numero_de_compte').val("");
                    $('.Statut').val("");
                    $('.matricule').val("");
                    
                }else{
                     $('.text-info').empty().append("Veuillez remplir tout les informations correctement.")
                    $('.fade').modal('show');
                }
            },
        });
   }
});
    
   //AddPanier envoyer equipe
    $('.enregistre').on('click',function(e){
        e.preventDefault();
        var nom_equipe = $('.nom_equipe').val();
        var code_mission=$('.code_mission').val();
        var destination_equipe=$('.destination_equipe').val();
        var date_depart = $('.date_depart').val();
        var date_retour = $('.date_retour').val();
        var panier = $('.Nom').val();
        
        $.post("../../fonction/dateMission.php",{nom_equipe:nom_equipe,date_depart:date_depart,date_retour:date_retour},function(){
            console.log(data);
        });
        
       $('.matricule').each(function(){
           var matricule="";
           matricule=$(this).html();
            $.post("../fonction/nouveau_equipe.php",{nom_equipe:nom_equipe,code_mission:code_mission,matricule:matricule},function(){
            });
       });
        
        $('.modal-title').empty().append("Chargement...");
        $('.modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
        
        $.post("../../fonction/nouveau_planing.php",{panier:panier,date_depart:date_depart,date_retour:date_retour,destination:destination_equipe,code_mission:code_mission,nom_equipe:nom_equipe},function(data){
            $('.modal-title').empty().append("Nouvelle equipe");
            $('.modal-body').empty().append(data);
        });

      $(".fade").modal('show');
      
    });
    //ajout panier
    $('.enregistre_panier').on('click',function(e){
        e.preventDefault();
        
        var designation=$('.designation').val();
        var code_produit=$('.code_produit').val();
        var date = $('.date').val();
        var id_produit=code_produit.split("|");
        
        if (confirm("Est tu sûr de vouloir enregistrer?")) {
            $('.modal-title').empty().append("Chargement...");
            $('.modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
            
            $('.id_produit_tableau').each(function(){
               var idpro="";
               idpro=$(this).html();
                $.post("../../fonction/enregistrerPanier.php",{designation:designation,code_produit:idpro},function(data){
                        $('.modal-title').empty().append("Ajout panier");
                        $('.modal-body').empty().append(data);
                });
            });
            
            $(".fade").modal('show');
        } else {
             console.log("You pressed Cancel!");
        }
        
       /*
        $.post("../../fonction/enregistrerPanier.php",{designation:designation,code_produit:id_produit[0]},function(data){
            $('.modal-title').empty().append("Ajout panier");
            $('.modal-body').empty().append(data);
        });
        $(".fade").modal('show');
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        */
    });
    
    //affiche tableau par produit lors du click action
    $('.action_ajout').on('click',function(){
       
       var code_produit=$('.code_produit').val();
       var id_produit=code_produit.split("|");
       var test_unique=true;
       
       $('.id_produit_tableau').each(function(){
           var idpro="";
           idpro=$(this).html();
           if(id_produit[0]==idpro){
               test_unique=false;
               return false;
           }
       });
       if(test_unique){ // si le  n'existe pas dans chef donc insere
           $('.infoProduit tbody:last').append('<tr><th scope="row" class="id_produit_tableau">'+ id_produit[0]+'</th><td>'+id_produit[1]+'</td><td>'+id_produit[2]+'</td><td><i class="fa fa-minus-square" style="font-size:40px;color:#33b5e5;cursor:pointer"></i></td></tr>');
       }
       moin();
    }); 
    
    //cliquez sur boutton panier->nouveau equipe
    $('.produit_panier1').on('click',function(e){
        e.preventDefault();
       var panier = $(this).parent().html();
       var tab=panier.split('&');
      
       $('#modaltitlePanier').empty().append("Chargement...");
      /* $('#modalbodyPanier').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');*/
       $.post("../../fonction/Gerer_EquipePanier.php",{panier:tab[0]},function(data){
            $('.modal-title').empty().append("Panier "+ tab[0]);
           $('#modalbodyPanier').find('#tbodyPanier').empty().append(data);
       });
    });
    
    //affiche membre des equipes (coach,commerciale,...)
    $('.membre_equipe').on('click',function(){
       var lieu_mission = $(this).attr('id');
       var nom_equipe = $(this).parent().parent().find('.nom_equipe').text();
       console.log(nom_equipe);
       $('.modal-title').empty().append("Chargement...");
      // $('.modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
       $.post("../../fonction/membre_equipe.php",{nom_equipe:nom_equipe},function(data){
            $('.modal-title').empty().append("Tous les membres du  Mission "+lieu_mission);
            $('.body-modal').append(data);
       });
    });
    
    //Ajout PRODUIT DANS PANIER
        $('.ajoutProduit_panier').on('click',function(e){
        e.preventDefault();
        var codeProduit=$('.produit_panier').val();
        var panier=$('.panier_id').html().split(' ');
        //alert(panier);
        
        var idProduit=codeProduit.split("|");
        $.post("../../fonction/ajoutProduitDansPanier.php",{idProduit:idProduit[0],designation:panier[1]}, function(data) {
                location.reload();
        });
       
    });
    
    
    //AJOUT DEDUCTION COACH
   /* $('.description_coach').on('change',function(e){
        e.preventDefault();
        var description=$('.description_coach').val();
       
        if(description=="Autre déduction"){
           $( ".change_observation" ).after('<div class="form-group col-md-3 obs"><input type="text" class="form-control observation" name="observation"  placeholder="Observation"></div>');
       }else{
           $(".obs").remove();
       }
    });*/
    $('.ajoutdeduction_coach').on('click',function(e){
       e.preventDefault();
       var coach=$('.coach').html();
       var description=$('.description_coach').val();
       var montant=$('.montant_deduction_coach').val();
       var controller=$('.controlleur').html();
       var observation=$('.observation').val();
       var date=$('.date_deduction_coach').val();
       var heure=$('.time_deduction_coach').val();
   
       if(observation===undefined){
           observation='vide';
       }
       
       if(description!="Déscription"){
           $('.modal-header').remove();
           $('.modal-footer').remove();
           
           if(montant=='' || isNaN(Number(montant))){
               $('.modal-body').empty().append('Veuillez complétez tous les champs ou choisir un montant valide.&nbsp;&nbsp;<i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>');
                $('.modal').modal('show');
           }else{
               $('.modal-body').addClass('text-center');
               $('.modal-body').empty().append('<div class="spinner-border text-center" role="status"><span class="sr-only">Loading...</span></div>');
               $('.modal').modal('show');
               $.post('../../fonction/ajoutDeductionCoach.php',{date:date,heure:heure,observation:observation,coach:coach,controller:controller,description:description,montant:montant},function(data){
                  $('.modal-body').empty().append(data);
                  $('.modal').modal('show');
               });
           }
           
       }else{
           $('.modal-body').empty().append('Veuillez choisir la déscription.&nbsp;&nbsp;<i class="fa fa-exclamation-triangle text-warning" aria-hidden="true"></i>');
           $('.modal').modal('show');
       }
    });
    
    $('.ajoutbonus_coach').on('click',function(e){
       e.preventDefault();
       var motif = $('.motif').val();
       var coach=$('.coach').html();
       var montant=$('.montant_bonus_coach').val();
       var controller=$('.controlleur').html();
       var date=$('.date_bonus_coach').val();
       var heure=$('.time_bonus_coach').val();
       console
       if(motif===undefined){
           motif='vide';
       }
       
           $('.modal-header').remove();
           $('.modal-footer').remove();
           
           if(montant=='' || isNaN(Number(montant))){
               $('.modal-body').empty().append('Veuillez complétez tous les champs ou choisir un montant valide.&nbsp;&nbsp;<i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>');
                $('.modal').modal('show');
           }else{
               $('.modal-body').addClass('text-center');
               $('.modal-body').empty().append('<div class="spinner-border text-center" role="status"><span class="sr-only">Loading...</span></div>');
               $('.modal').modal('show');
               $.post('../../fonction/ajoutBonusCoach.php',{date:date,heure:heure,motif:motif,coach:coach,controller:controller,montant:montant},function(data){
                  $('.modal-body').empty().append(data);
                  $('.modal').modal('show');
               });
           }
         
    });
    
      
  $('.enregistreEquipe').on('click',function(event){
      event.preventDefault();
      var mon_equipe=$('.nom_equipe').val();
     
      function addData(matricule,equipe,fonction){
        $.post('../../fonction/addEquipe.php',{matricule:matricule,equipe:equipe,fonction:fonction},function(data){
        });  
      }
     /*$('.matricule').each(function(){
          addData($(this).html(),mon_equipe);
      });  */
      $('.matricule').each(function(){
          if($(this).hasClass('matricule_chef')){
                addData($(this).html(),mon_equipe,5);   
          }else if($(this).hasClass('matricule_coach')){
              addData($(this).html(),mon_equipe,2);
          }else if($(this).hasClass('matricule_com')){
              addData($(this).html(),mon_equipe,1);
          }else{
              addData($(this).html(),mon_equipe,0);
          }
      });

  });
  
  //SAUVEGARDE DE PLANING
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
}

});

//DEDUCTION ET PRIME COACH AVEC SELECT
$('.choix_deduc_bon').on('change',function(e){
   e.preventDefault();
   var choix=$(this).val();
   
   if(choix=='deduction'){
       $('.titre').empty().append('Déduction ');
       $('.deduction_de_coach').removeClass('d-none');
       $('.bonus_de_coach').addClass('d-none');
   }else{
       $('.titre').empty().append('Prime et bonus ');
       $('.bonus_de_coach').removeClass('d-none');
       $('.deduction_de_coach').addClass('d-none');
   }
});
$('.choix_coach').on('change',function(){
    var coach = $(this).val(),remarque;
    if(coach=='0'){
        remarque ="* choisissez un coach";
        $('.remarque').empty().append(remarque);
        $('.coach').empty();
    }else{
        $('.remarque').empty();
         $('.coach').empty().append(coach);
    }
});
//FIN COACH

//FIN DE READY  
});

   

