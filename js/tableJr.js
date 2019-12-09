$(document).ready(function () {
  var $pagination = $('#paginationJr'),
  totalRecords = 0,
  records = [],
  displayRecords = [],
  recPerPage = 10,
  page = 1,
  totalPages = 0;
  $.ajax({
        url: "../fonction/historique_des_pointJr.php",
        async: true,
        dataType: 'json',
        success: function (data) {
            if(data!==""){
                    records = data;
                    totalRecords = records.length;
                    totalPages = Math.ceil(totalRecords / recPerPage);
                    apply();  
                    demo();
            }
                   
        }
  });

function generate() {
      var tr;
      console.log(displayRecords[0]);
      $('#emp_bod').html('');
      for (var i = 0; i < displayRecords.length; i++) {
            tr = $('<tr/>');
            tr.append("<td><a href='?page=information_sur_point&date="+displayRecords[i].date+"&heure="+displayRecords[i].heure+"&facture="+displayRecords[i].facture+"'><p style='font-size:11px;'><strong>" + displayRecords[i].date +"</strong></p></a></td><td style='font-size:11px;'>"+displayRecords[i].heure+"</td><td style='font-size:11px;'>"+displayRecords[i].activite+"</td><td style='font-size:11px;'>"+ displayRecords[i].point+"</td>");
            
           
            $('#emp_bod').append(tr);
      }
}

  function apply() {
      $pagination.twbsPagination({
            totalPages: totalPages,
            visiblePages: 4,
            prev:'Précedent',
            next:'Suivant',
            first:'',
            last:'',

            onPageClick: function (event, page) {
                  displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
                  endRec = (displayRecordsIndex) + recPerPage;
                  displayRecords = records.slice(displayRecordsIndex, endRec);
                  
                  generate();
            }
      });
}



function demo(){
$(".inputJ").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $(".tbodyJ tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
$(".input").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $(".tbody tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});



}

});