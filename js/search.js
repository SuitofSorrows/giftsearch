// function myFunction() {
//     // Declare variables
//     var input, filter, tbody, td, a, i, txtValue;
//     input = document.getElementById('myInput');
//     filter = input.value.toUpperCase();
//     tbody = document.getElementById("gift-table-body");
//     td = tbody.getElementsByClassName('gift-table-body');
//
//     // Loop through all list items, and hide those who don't match the search query
//     for (i = 0; i < td.length; i++) {
//         a = td[i].getElementsByTagName("a")[0];
//         txtValue = a.textContent || a.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//             td[i].style.display = "";
//         } else {
//             td[i].style.display = "none";
//         }
//     }
// }

function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("TextBoxID");
    filter = input.value.toUpperCase();
    table = document.getElementById("TableID");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        var x = $("#TextBoxID").val();
        var regex = /^[a-zA-Z]+$/;
        if (!x.match(regex)) {
            td = tr[i].getElementsByClassName("gift-card-number")[0];
        }
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
