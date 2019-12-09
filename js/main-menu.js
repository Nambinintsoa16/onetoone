 $(document).ready(function () {
    var date=new Date();
    var month=date.getMonth()+1;
     quante();

    
     category();
     

$('.li-menu').on('click',function(){
    $('.li-menu').removeClass('active');
    $(this).addClass('active');
});

 //EVENEMENT APPUYER SUR LE BOUTON MODIFIER
$(".ModifierPhoto").click(function(event){
        event.preventDefault();
        ms=$('.produit').val();
        if(ms ===''){
            $('.mn').modal('show');
        }else{
        var fd = new FormData();
        var idtemp=$('.produit').val();
        var idproduit=idtemp.split("|");
        var files = $('.imag')[0].files[0];
        fd.append('file',files);
     $('.modal-title').empty().append('Modification en cours ...'); 
     $('.modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
     $('.fade').modal("show");
        $.ajax({
            url: '../fonction/photo_produit.php?idproduit='+ idproduit[0],
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response !==0){
                    $('.modal-title').empty().append('<b>Résultat</b>');  
                     $('.modal-body').empty().append("<b>Modification réussi</b>").css('color','green');
                }else{
                     $('.modal-title').empty().append('Erreur...'); 
                     $('.modal-body').empty().append("<b>Erreur de modification</b>").css('color','red');
                }
            }
        });
        }
    });


$('.produitModif').autocomplete({
  source:'../fonction/retourProduit.php',
  minLength: 0,
  selectFirst:true,
  minChars: 0,
  select: function( request, response ) {
      var modif=$('.selectModif').val();
       $.post('../fonction/retourProduitEditeur.php',{valeur:response.item['label'],modif:modif},function(data){
          CKEDITOR.instances.editor1.setData(data);
     });
  }

});

$('.selectModif').on('change',function(){
     var valtemp=$('.produitModif').val().split("|");
     var valeur=valtemp[0];
     modif=$(this).val();
     $.post('../fonction/retourProduitEditeur.php',{valeur:valeur,modif:modif},function(data){
          CKEDITOR.instances.editor1.setData(data);
     });
});

$('.valideModif').on('click',function(event){
        event.preventDefault();
       
     var valtemp=$('.produitModif').val().split("|");
     var valeur=valtemp[0];    
     var data = CKEDITOR.instances.editor1.getData();    
     var modif=$('.selectModif').val();
     $('.modal-title').empty().append('Chargement...'); 
     $('.modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
     $('.fade').modal("show");
     $.post('../fonction/retourProduitEdit.php',{valeur:valeur,modif:modif,data:data},function(data){
           CKEDITOR.instances.editor1.setData(data);
           $('.modal-title').empty().append('Message de confirmation'); 
           $('.modal-body').empty().append("Modification éffectue!!");
        
     });
});





$('.input-produit').autocomplete({
    source:'../fonction/retour_produit_par_panier.php',
    minLength: 0,
    selectFirst:true,
    minChars: 0,
    disabled: false
});

$('.produit').autocomplete({
  source:'../fonction/retourProduit.php',
  minLength: 0,
  selectFirst:true,
  minChars: 0,

});

$( ".produitModifAffich" ).autocomplete({
  source:'../fonction/retourProduit.php',
  select: function( request, response ) {
     $.post('../fonction/retourProduitModif.php',{valeur:response.item['label']},function(data){
         $('.description').val(data.description);
         $('.ingredient').val(data.ingredient);
         $('.modedutilisation').val(data.modedutilisation);
         $('.presentation').val(data.presentation);
         $('.argumentaire').val(data.argumentaire);
         //$('.description-p').empty().html(data.description);
     },'json');
  }
});





$('.codeClient').autocomplete({
  source:'../fonction/retour_client_commerciel.php',
  minLength: 0,
  selectFirst:true,
  minChars: 0,

});



    

$('.lieu').on('change', function() {
  $('.quantite').removeAttr('disabled');
  $('.codeproduit').removeAttr('disabled');
});

$('.select-mois option').each(function(){
  var mois;
  if($(this).val()<10){
       mois=0 + date.getMonth()+1;

  }else{
   mois=date.getMonth()+1;
  }
    if($(this).val()==date.getMonth()+1){
        $(this).attr("selected","selected");
    }

});


function geo_success(position) {
  do_something(position.coords.latitude, position.coords.longitude);
}

function geo_error() {
  alert("Sorry, no position available.");
}

var geo_options = {
  enableHighAccuracy: true, 
  maximumAge        : 30000, 
  timeout           : 27000
};

//var wpid = navigator.geolocation.watchPosition(geo_success, geo_error, geo_options);

    
//alert(wpid);

$('.codeproduit').on('focus',function(){
    $(this).val(""); 
});
$('.codeClient').on('focus',function(){
    $(this).val("");
});

 
$('.valider-produit').on('click',function(event){
  event.preventDefault();

  if (typeof($('.prod').html()) == 'undefined') {
    detailproduit();


} else {
    var prod = $('.prod');
    var table =[];
    prod.each(function() {
        table.push($(this).html());
    });

    var codeproduit = $('.codeproduit').val();
    var produitcode = codeproduit.split("|");
    var textProduit='<input style="margin-top:-0.2px;" type="checkbox" class="form-check-input delcheck">'+' '+'<a href="../image/produit/'+produitcode[0]+'.jpg" class="codeprod" data-lightbox="roadtrip" style="font-size:13px;">'+produitcode[0]+'</a>';
    if ($.inArray(textProduit, table) != -1) {
          $('.modal-body-erreur').empty().append('Ce produit existe déjà dans votre bon de commande. Veuillez modifier la quantité pour ajouter une autre commande.');
            $('.erreur').modal('show');

    } else {
        detailproduit();
        quante();
     
    }
}
});

function detailproduit() {
  var code = $('.codeproduit').val();
  var tri = code.split("|");
  var codeproduit = tri[0];
  if (codeproduit !=="") {
      $.post('../fonction/retourProduitVente.php', { codeproduit: codeproduit }, function(data) {
          if (data.error === false) {
              $('.table>tbody:last').append('<tr><td class="prod text-center" style="font-size:10px;"><input style="margin-top:-0.2px;" type="checkbox" class="form-check-input delcheck">'+' '+'<a href="../image/produit/'+data.codeproduit+'.jpg" class="codeprod" data-lightbox="roadtrip" style="font-size:13px;">'+data.codeproduit +'</a></td><td class="quant"><input style="font-size:13px;width:30px;text-align:center;" type="number" class="Qua" value="1"></td><td class="tot" style="font-size:13px;">' + data.prix + '</td><td class="idPrix collapse">'+data.idPrix+'</td></tr>');
              var sum = 0;
              $('.tot').each(function() {
                  var Qt = $(this).html();
                  var prix = Qt.split(",");
                  var number = prix[0].replace(".", "")
                  sum += parseInt(number);
              });
              $('.total').empty().append(formatNumber(sum) + ' Ar');
              fonctiondel();
              quante();
              $('.codeproduit').val("");
          } else {  
              
            $('.modal-body-erreur').empty().append('Une erreur se produit veuillez recommencer.');
            $('.erreur').modal('show'); }
      }, 'json');
  }
}

fonctiondel();
function fonctiondel(){
  $('.suppr').on('click', function(event) {
      event.preventDefault();
      $('.delcheck').each(function(){
          if( $(this).is(":checked")){
              $(this).parent().parent().remove();
          }
        });
      totaltab();
      });
}

function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

  function totaltab() {
      var sum = 0;
      $('.tot').each(function() {
          sum += parseInt($(this).html());
      });
      
      var aff = $('.total').empty().append(formatNumber(sum) + ' Ar');
      return (aff);
  }

function quante(){
 $('.Qua').on('change', function() {
   
             if ($(this).val() < 1) {
          $('.modal-body-erreur').empty().append('Le nombre de produit ne doit pas être inférieur a 1.');
          $('.erreur').modal('show'); 
                 $(this).val('1');
             }else{
             var content = $(this).parent();
             var soustotal = content.next();
             var quantite = $(this).val();
             var prix = content.parent().find('td').eq(2).html();
             var Qt = prix.split(",");
             var number = Qt[0].replace(".", "");
             soustotal.empty().append(parseInt(number) * quantite);
             totaltab();
             }
         });
}

//enregistrement de vente

$('.cli').on('click',function(){
     $('.collapse').collapse('hide');
    $('.Nom').val("");
    $('.Prenom').val("");
    $('.contact').val("");
    $('.codeClient ').val("");
    $('.jour').val("");
    $('.mois option[value="01"]').prop('selected', true);
   
});

/*
 $('.tableData').DataTable({
     "paging":   false,
     "info":     false
 });*/

$('.valid-commande').on('click',function(){
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
    var idPrix=Array();
    var i=0;
    var t=0;
    var p=0;
    var inputfile =$('.inputfile').val();
    var contPro=$('.codeprod').val();
    
    
    
    

if(ville=="" || quartier=="" || typeof(contPro)=='undefined'){
  bootbox.alert("Veuillez remplir les champs obligatoires.");
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
   $('.idPrix').each(function(){
       idPrix[p] = $(this).html();
       p++;
   });

      var content_quantite=JSON.stringify(quantite);
      var content_produit=JSON.stringify(produit);
      var content_idPrix=JSON.stringify(idPrix);
  

  var fd="test";
   
   
    $('.modal-body').empty().append('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
    $('.modal-footer .btn').remove();
    $('.confi').modal('show');
$.ajax({
        url: '../fonction/enregistrement_de_vente_avec_client.php?idPrix='+content_idPrix+'&anne='+anne+'&mois='+mois+'&jour='+jour+'&quartier='+quartier+'&ville='+ville+'&nom='+Nom+'&Prenom='+Prenom+'&sexe='+sexe+'&contact='+contact+'&content_quantite='+content_quantite+'&content_produit='+content_produit,
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
              $('.modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
              $('.modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
              $('.confi').modal('show');
              $('.fade').modal('hide');
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
          produit[i] = $(this).html();
           i++;
              });
       $('.quant').each(function() {
          quantite[t] = $(this).find('.Qua').val();
           t++;
       });
       $('.idPrix').each(function(){
          idPrix[p] = $(this).html();
       p++;
       });
     
          var content_quantite=JSON.stringify(quantite);
          var content_produit=JSON.stringify(produit);
          var content_idPrix=JSON.stringify(idPrix);
           
           
          var idClient=codeClient.split('|');
          
        $('.modal-body').empty().append('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
        $('.modal-footer .btn').remove();
        $('.confi').modal('show');
         $.post('../fonction/enregistrement_de_vente_client_exist.php',{idPrix:content_idPrix,content_produit:content_produit,content_quantite:content_quantite,ville:ville,quartier:quartier,codeClient:idClient[0]},function(data){
             
             if(!data){
                 $('.modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
                 $('.modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
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
      message: "<p>Etes-vous sûre d'enregistrer cette vente sans client ?</p> Enregistrez le client pour obtenir plus de points.",
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
       $('.idPrix').each(function(){
          idPrix[p] = $(this).html();
           p++;
       });

          var content_quantite=JSON.stringify(quantite);
          var content_produit=JSON.stringify(produit);
          var content_idPrix=JSON.stringify(idPrix);
        
    $('.modal-body').empty().append('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
    $('.modal-footer .btn').remove();
    $('.confi').modal('show');
     $.post('../fonction/enregistrement_de_vente_sans_client.php',{idPrix:content_idPrix,content_produit:content_produit,content_quantite:content_quantite,ville:ville,quartier:quartier},function(data){
         
         var codeClient=$('.codeClient').val();
         
         if(data.Message =="false"){
             $('.modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
             $('.modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
             $('.tbody tr').remove();
             $('.Nom').val("");
             $('.Prenom').val("");
             $('.jour').val("");
             $('.quartier').val("");
             $('.contact').val("");
             $('.ville').val("");
         }else if(data.Message =="0"){
               $('.modal-body-erreur').empty().append('Veuillez remplir les champs obligatoires.');
               $('.erreur').modal('show');
         }else{
               $('.modal-body-erreur').empty().append('Veuillez remplir les champs obligatoires.');
               $('.erreur').modal('show');
         }
     },'json');

         if(result){
             $('.modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
             $('.modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
             $('.confi').modal('show');
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
         }
            
    
       }
  });

  }
}

});    





/*$('.valid-commande-speciale').on('click',function(){
    var speciale="true"
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
    var i=0;
    var t=0;
    $('.codeprod').each(function() {
     produit[i] = $(this).html();
      i++;
         });
  $('.quant').each(function() {
     quantite[t] = $(this).find('.Qua').val();
      t++;
  });

     var content_quantite=JSON.stringify(quantite);
     var content_produit=JSON.stringify(produit);

$.post('../fonction/enregistrement_de_vente.php',{speciale:speciale,contact:contact,codeClient:codeClient,content_produit:content_produit,content_quantite:content_quantite,Nom:Nom,Prenom:Prenom,sexe:sexe,jour:jour,mois:mois,anne:anne,ville:ville,quartier:quartier},function(data){
    $('.tbody tr').remove();
    $('.Nom').val("");
    $('.Prenom').val("");
    $('.sexe').val("");
    $('.jour').val("");
    $('.mois').val("");
    $('.quartier').val("");
    $('.anne').val("");
    $('.contact').val("");
    $('.ville').val("");
    var codeClient=$('.codeClient').val();
    if(data.Message =="false"){
        $('.confi').modal('show')
    }else if(data.Message =="0"){
        $('.erreur').modal('show')
    }else{
         $('.erreur').modal('show')
    }
},'json');

});*/

$('.ville').on('blur',function(){
    $(this).val(this.value.toUpperCase());
});
$('.quartier').on('focusout',function(){
    $(this).val(this.value.toUpperCase());
});




//RECUPERER LA VALEUR DU PHOTO

    $('.uploadFile').on('change', function()
    {       
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        $('.nom').append("Image sélectionnée : "+files[0].name);
        if (!files.length || !window.FileReader) return;
        if (/image/.test( files[0].type)){
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function(){
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }

    });
function demo(){
$("#demo").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#test tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
}
demo();


$('.modifProduitBtn').on('click',function(){
 var codeProduit=$('.idproduit').val();
 var description=$('.description').val();
 var ingredient=$('.ingredient').val();
 var produitTemp=$('.idproduit').val();
 var presentation=$('.presentation').val();
 var codeProduit=produitTemp.split("|");
 var modedutilisation=$('.modedutilisation').val();
 var argumentaire=$('.argumentaire').val();
  $.post('../fonction/modifier_produit.php',{presentation:presentation,codeProduit:codeProduit[0],description:description,ingredient:ingredient,modedutilisation:modedutilisation,argumentaire:argumentaire},function(data){
         $('.codeProduit').val("");
         $('.description').val("");
         $('.ingredient').val("");
         $('.produit').val("");
         $('.presentation').val("");
         $('.modedutilisation').val("");
         $('.argumentaire').val("");
    });
});

//affichage famille selon le type
function category(){
var famille=$('.famille').val();
if(typeof(famille)!='undefined'){
  $.get('../fonction/retourCategorie.php',{famille:famille},function(data){
    $('.type').empty().append(data);
   });    
 }    
}

$('.famille').on('change',function(){
  var famille=$(this).val();
  $.get('../fonction/retourCategorie.php',{famille:famille},function(data){
    $('.type').empty().append(data);
  });
});
//insertion produit
$('.ajoutProduit').on('click',function(event){
  event.preventDefault();
  
  var idproduit=$('.input-n-produit').val();
  var designation=$('.designation').val();
  var famille=$('.famille').val();
  var type=$('.type').val();
  var quantite=$('.quantite').val();
  var description=$('.description').val();
  var ingredient=$('.ingredient').val();
  var presentation=$('.presentation').val();
  var modedutilisation=$('.modedutilisation').val();
  var argumentaire=$('.argumentaire').val();
  var nom=$('.input-n-produit').val();

  
  
            $('.modal-body').empty().append('<p class="text-center" style="color:red;"><img src="../images/loading.gif" /></p>');
            $('.btn_modal').removeClass("btn-success");
            $('.btn_modal').addClass('btn-danger');
            $('.fade').modal('show'); 
  
        var fd = new FormData();
        var files = $('.uploadFile')[0].files[0];
        alert(files);
        fd.append('file',files);
  $.ajax({
            url: '../fonction/modif_photo.php?nom='+nom,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    
               $('.fade').modal('hide');

                }else{
                    $('.fade').modal('hide'); 
                    
                }
            }
        });
  
  
  
   $.post('../fonction/enregistrement_produit.php',{idproduit:idproduit,designation:designation,famille:famille,type:type,quantite:quantite,description:description,ingredient:ingredient,presentation:presentation,modedutilisation:modedutilisation,argumentaire:argumentaire},function(data){
    //  $('.alertProduit').append(data);
   /* if(data==="true"){
       
  
        if (typeof ($('.btn-danger').val())!=undefined ){
            $('.modal-title').empty().append("Produit ajouté");
          $('.modal-body').empty().append('<p class="text-center" style="color:red;">Le produit est bien ajouté</p>');
            $('.btn_modal').removeClass("btn-danger");
            $('.btn_modal').addClass('btn-success');
            $('.fade').modal('show');
        }else{
            $('.modal-title').empty().append("Produit ajouté");
             $('.modal-body').empty().append('<p class="text-center" style="color:green;">Le produit est bien ajouté</p>');
              $('.btn_modal').addClass('btn-danger');
              $('.fade').modal('show'); 
        }
    }else if(data=="false-1"){
        if (typeof ($('.btn-success').val())!=undefined ){
            $('.modal-title').empty().append("Le produit n'est pas ajouté");
            $('.modal-body').empty().append('<p class="text-center" style="color:red;">Veuillez remplir tous les champs <img src="../images/loading.gif" /></p>');
            $('.btn_modal').removeClass("btn-success");
            $('.btn_modal').addClass('btn-danger');
            $('.fade').modal('show');
        }else{
                $('.modal-title').empty().append("Le produit n'est pas ajouté");
              $('.modal-body').empty().append('<p class="text-center" style="color:red;">Veuillez remplir tous les champs <img src="../images/loading.gif" /></p>');
              $('.btn_modal').addClass('btn-danger');
              $('.fade').modal('show'); 
        }
     
    }else{
         alert("false-2");  
    }*/
      $('.produit').val("");
      $('.quantite').val("");
      $('.designation').val("");
         $('.description').val("");
         $('.ingredient').val("");
         $('.produit').val("");
         $('.presentation').val("");
         $('.modedutilisation').val("");
         $('.argumentaire').val("");
    });
 });
 //modification produit
$('.modifierProduit').on('click',function(){
  var idproduit=$('.produit').val();
  var codeProduit=idproduit.split("|");
  var description=$('.description').val();
  var ingredient=$('.ingredient').val();
  var presentation=$('.presentation').val();
  var modedutilisation=$('.modedutilisation').val();
  var argumentaire=$('.argumentaire').val();
  $.post('../fonction/modifier_produit.php',{idproduit:codeProduit[0],description:description,ingredient:ingredient,presentation:presentation,modedutilisation:modedutilisation,argumentaire:argumentaire},function(data){
        $('.produit').val("");
         $('.description').val("");
         $('.ingredient').val("");
         $('.produit').val("");
         $('.presentation').val("");
         $('.modedutilisation').val("");
         $('.argumentaire').val("");
  });
});
$('.editeutilisation').on('click',function(event){
    event.preventDefault();
   
    var content="#"+$(this).attr("id")+" "+".jumbotron";
     var text =$(content).html();
    var id="#"+$(this).attr("id")+" "+".jumbotron p";
   var modedutilisation = $(id).val();
   
   $(id).remove();
   $(content).append('<textarea class="form-control modedutilisation">'+ text+'</textarea>');
});

$('.editepresentation').on('click',function(){
   $('.presentation p').remove();
   $('.presentation').append("<textarea class=\"form-control presentation\"></textarea>");
});
$('.editeingredient').on('click',function(){
   $('.ingredient p').remove();
   $('.ingredient').append("<textarea class=\"form-control ingredient\"></textarea>");
});


$('.btn_edit').on('click',function(){
    var text="";
    var id="."+$(this).attr("id");
   
    $('.modal-title').empty().append($('.idproduitmodal').text());
  //  console.log(!$('.modal-title').hasClass($(this).attr("id")));

    if(!$('.modal-title').hasClass($(this).attr("id"))){
        $('.modal-title').addClass($(this).attr("id"));    
    }

    
    text=$(id).html();
    $('.modal-body').empty().append('<textarea class="form-control details" rows="15">'+text+'</textarea>');
    if( typeof($('.btn_modal_save').val()) =='undefined'){
        $('.modal-footer .enregistrement_produit').append('<button type="button" class="btn btn-success btn_modal btn_modal_save" data-dismiss="modal">Enregistrer</button>');
    }
    
    $('.fade').modal('show');
});
$('.enregistrement_produit').on('click',function(e){
    e.preventDefault();
   var body =$(".modal-body").text();
   var id=($('.modal-title').attr('class')).split(" "); // prendre id ex: utilisation, ingredient
   var idproduit=$('.modal-title').text();
   $.post("../fonction/modifier_produit.php",{details:$('.modal-body').find('.details').val(),idproduit:idproduit,test:id[id.length-1]},function(data){
     location.reload();
   });
});
//detail panier avec modal
$('.detailPanier').on('click',function(){
    var panier=$(this).attr("id");
    $('.modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
    $.post("../fonction/retourPanier.php",{panier:panier},function(data){
       $('.modal-body').empty().append(data); 
       
    });
    demo();
    $('.modal-title').empty().append('<p class="text-enter">Panier: '+ panier +'</p>');
    $('.fade-panier').modal('show');
   
});





//couleur du panier au clic
   /* $('.couleurPanier1').on('click',function(e){
        e.preventDefault();
         var couleur = $(this).attr('style');
         
         $.get("../controlleur/info-pannier.php",{couleur:couleur},function(data){
             alert('ok');
         });
    });*/
    $('.commerce_enregistre').on('click',function(event){
        event.preventDefault();
        $('.modal-title').empty().append("Listes des enregistrés");
        $('.modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
        $.post("../fonction/listePersonnel.php",{},function(data){
            $('.modal-body').empty().append(data);
        });
      $(".fade").modal('show');
      
    });
   $('.status_actif').on('click',function(event){
        event.preventDefault();
        var test=true;
        $('.modal-title').empty().append("Listes des actifs");
        $('.modal-body').empty().append('<div class="text-center"><img src="../images/loading.gif" alt="photo loading"></div>');
        $.post("../fonction/listePersonnel.php",{test:test},function(data){
            $('.modal-body').empty().append(data);
        });
      $(".fade").modal('show');
      
    });
    
    //affichage du privilege des 2 btn
    $('.privilege').on('click',function(event){
         var idprivilege=$(this).attr('id');
     
        if("privilege1"==idprivilege){
            $('#tabcontent2').css('display','none');
            $('#tabcontent1').css('display','block');
        }else{
            $('#tabcontent1').css('display','none');
            $('#tabcontent2').css('display','block');
        }
    });
///*************
   
        
         $('#privilege2').on('click',function(event){
            event.preventDefault();
            $(this).addClass('active');
            $('#privilege1').removeClass('active').addClass('');
        });

        $('#privilege1').on('click',function(event){
           event.preventDefault();
           $(this).removeClass('active').addClass('active');
           $('#privilege2').removeClass('active').addClass('');
           
        });
 
        
//test d'enregistrement de vente! C'est juste un test
// attention c'est juste un test
/** TEST **/


$('.valid-commande1').on('click',function(){
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
    var i=0;
    var t=0;
    var inputfile =$('.inputfile').val();
    var contPro=$('.codeprod').val();
    
    
    
    

if(ville=="" || quartier=="" || typeof(contPro)=='undefined'){
  bootbox.alert("Veuillez remplir les champs obligatoires.");
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

      var content_quantite=JSON.stringify(quantite);
      var content_produit=JSON.stringify(produit);
  

  var fd="test";
   
   
    $('.modal-body').empty().append('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
    $('.modal-footer .btn').remove();
    $('.confi').modal('show');
$.ajax({
        url: '../fonction/enregistrement_de_vente_test.php?anne='+anne+'&mois='+mois+'&jour='+jour+'&quartier='+quartier+'&ville='+ville+'&nom='+Nom+'&Prenom='+Prenom+'&sexe='+sexe+'&contact='+contact+'&content_quantite='+content_quantite+'&content_produit='+content_produit,
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
              $('.modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
              $('.modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
              $('.confi').modal('show');
              $('.fade').modal('hide');
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
          produit[i] = $(this).html();
           i++;
              });
       $('.quant').each(function() {
          quantite[t] = $(this).find('.Qua').val();
           t++;
       });

          var content_quantite=JSON.stringify(quantite);
          var content_produit=JSON.stringify(produit);
          
          var idClient=codeClient.split('|');
          
        $('.modal-body').empty().append('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
        $('.modal-footer .btn').remove();
        $('.confi').modal('show');
         $.post('../fonction/enregistrement_de_vente_test.php',{content_produit:content_produit,content_quantite:content_quantite,ville:ville,quartier:quartier,codeClient:idClient[0]},function(data){
             
             if(!data){
                 $('.modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
                 $('.modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
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
      message: "<p>Etes-vous sûre d'enregistrer cette vente sans client ?</p> Si vous enregistres la commande avec client. Enregistrez le client pour obtenir plus de points",
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

          var content_quantite=JSON.stringify(quantite);
          var content_produit=JSON.stringify(produit);
        
        
    $('.modal-body').empty().append('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
    $('.modal-footer .btn').remove();
    $('.confi').modal('show');
     $.post('../fonction/enregistrement_de_vente_test.php',{content_produit:content_produit,content_quantite:content_quantite,ville:ville,quartier:quartier},function(data){
         
         var codeClient=$('.codeClient').val();
         
         if(data.Message =="false"){
             $('.modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
             $('.modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
             $('.tbody tr').remove();
             $('.Nom').val("");
             $('.Prenom').val("");
             $('.jour').val("");
             $('.quartier').val("");
             $('.contact').val("");
             $('.ville').val("");
         }else if(data.Message =="0"){
               $('.modal-body-erreur').empty().append('Veuillez remplir les champs obligatoires.');
               $('.erreur').modal('show');
         }else{
               $('.modal-body-erreur').empty().append('Veuillez remplir les champs obligatoires.');
               $('.erreur').modal('show');
         }
     },'json');

         if(result){
             $('.modal-body').empty().append('Votre commande à bien été enregistrée avec Succès.');
             $('.modal-footer').empty().append('<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>');
             $('.confi').modal('show');
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
         }
            
    
       }
  });

  }
}

}); 
//test d'enregistrement de vente! C'est juste un test
// attention c'est juste un test
/** FIN DU TEST **/
    
   
});


