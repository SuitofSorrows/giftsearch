
function newCardForm() {

    var x = document.getElementById('new-card-form');

    if (x.style.display === 'none') {
        x.style.display = 'block';
        document.getElementById('add-new').innerHTML = 'Hide New Card';
    } else {
        x.style.display = 'none';
        document.getElementById('add-new').innerHTML = 'Add New Card';
    }
}
