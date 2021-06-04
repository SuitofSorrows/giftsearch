
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

function historyForm() {

    var x = document.getElementById('history-form');

    if (x.style.display === 'none') {
        x.style.display = 'block';
        document.getElementById('get-history').innerHTML = 'Hide History';
    } else {
        x.style.display = 'none';
        document.getElementById('get-history').innerHTML = 'Get History';
    }
}

function updateCardForm() {

    var x = document.getElementById('update-card-form');

    if (x.style.display === 'none') {
        x.style.display = 'block';
        document.getElementById('update-card').innerHTML = 'Hide Update';
    } else {
        x.style.display = 'none';
        document.getElementById('update-card').innerHTML = 'Update Card';
    }
}

function clearInput() {
    document.getElementById('new-card-input').value = "";
    document.getElementById('gift-number-input').value = "";
    document.getElementById('initials-new').value = "";
    document.getElementById('selectedId').value = "";
    document.getElementById('rem-bal').value = "";
    document.getElementById('initials-update').value = "";
    document.getElementById('selectedGC').value = "";
}