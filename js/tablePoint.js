$(document).ready(function () {
  var $pagination = $('#pagination'),
  totalRecords = 0,
  records = [],
  displayRecords = [],
  recPerPage = 5,
  page = 1,
  totalPages = 0;
  $.ajax({
        url: "../fonction/historique_des_point.php",
        async: true,
        dataType: 'json',
        success: function (data) {
                    records = data;
                    totalRecords = records.length;
                    totalPages = Math.ceil(totalRecords / recPerPage);
                    apply_pagination();
        }
  });
//point
function generate_table() {
      var tr;
      $('#emp_body').html('');
      for (var i = 0; i < displayRecords.length; i++) {
            tr = $('<tr/>');
          //  tr.append("<td><a href='?page=information_sur_point&date="+displayRecords[i].date+"'><p style='font-size:11px;'><strong>" + displayRecords[i].date +"</strong></p></a></td><td style='font-size:11px;'>"+displayRecords[i].heure+"</td><td style='font-size:11px;'>"+displayRecords[i].activite+"</td><td style='font-size:11px;'>"+ displayRecords[i].point+"</td>");
            tr.append("<td><a href='?page=information_sur_point&id="+displayRecords[i].id+"&heure="+displayRecords[i].heure+"&facture="+displayRecords[i].facture+"'><p style='font-size:11px;'><strong>" + displayRecords[i].date +"</strong></p></a></td><td style='font-size:11px;'>"+displayRecords[i].heure+"</td><td style='font-size:11px;'>"+displayRecords[i].activite+"</td><td style='font-size:11px;'>"+ displayRecords[i].point+"</td>");
            $('#emp_body').append(tr);
      }
}

  function apply_pagination() {
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
                  generate_table();
            }
      });
}
});