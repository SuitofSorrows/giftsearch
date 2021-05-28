function highlightSelected(){

    var index,
        table = document.getElementById("TableID");

    for(var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            // remove the background from the previous selected row
            if(typeof index !== "undefined"){
                table.rows[index].classList.toggle("highlight");
                // table.rows[index].classList.toggle("expand");
            }
            // console.log(typeof index);
            // get the selected row index
            index = this.rowIndex;
            // add class selected to the row
            this.classList.toggle("highlight");
            // console.log(typeof index);
        };
    }
}
highlightSelected();

// $("#gift-card-info").click(function(event) {
//     $("#hidden-form").toggle("slow");
//     event.preventDefault();
// })