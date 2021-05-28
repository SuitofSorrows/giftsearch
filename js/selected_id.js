// $('.highlight').find('td:first-child').text();
//
// highlightRow = document.getElementsByClassName('highlight');
//
// for (var i = 0; i < highlightRow.rows.length; i++) {
//     var firstCol = highlightRow.rows[i].cells[0];
//     input.name('id').value = firstCol;
// }

$("#TableID").on("click", "td", function(){
    var ptsID = $(this).parent("tr").find("td:first").text();

    // test to get id
    console.log(ptsID);

    // add it to the update balance form
    document.getElementById('selectedId').value = ptsID;
});