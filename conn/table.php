<?php

require "db_connection.php";

echo "
        <div id='response-container'></div>
       ";

echo "
        <div class='buttons-container'>
            <button name='new-card' id='add-new' type='button' onclick='newCardForm()'>Add Card</button>
            <button name='update-card' id='update-card' type='button' onclick='updateCardForm()'>Update Card</button>
            <button name='get-history' id='get-history' type='button' onclick='historyForm()'>Get History</button>
            <button name='clear-button' id='clear-button' type='button' onclick='clearInput()'>Clear Input</button>

        </div>
       ";

echo "
        <form action='' method='post' id='new-card-form' style='display: none;'>
            <fieldset>
                <legend>Add New Gift Card</legend>
                <input type='number' name='gift-card-number' value='' id='new-card-input' inputmode='numeric' placeholder='Gift Card Number' required>
                <input type='number' name='init-bal'  pattern='(\d{3})([\.])(\d{2})' min='0.00' max='999.99' step='any' value='' id='gift-number-input' data-type='currency' inputmode='numeric' placeholder='Initial Balance' required>
                <select name='store' class='store-select'>
                    <option value='PFF' selected>PFF</option>
                    <option value='LRS'>LRS</option>
                </select>
                <input type='text' name='initial-new' value='' id='initials-new' placeholder='Initials' minlength='2' maxlength='3' pattern='[A-Za-z]{2,3}' onkeyup='this.value = this.value.toUpperCase();' oninvalid='this.setCustomValidity(`Enter 3 Letter Maximum`)' required>                
                <input type='date' name='date-activated' value='' id='todays-date-add'>
                <input type='submit' name='submit-new' value='ADD'>
            </fieldset>
        </form>
       ";

echo "
        <form action='' method='post' id='update-card-form' style='display: none;'>
            <fieldset>
                <legend>Update Gift Card Balance</legend>
                <input type='number' name='id' value='' id='selectedId' placeholder='ID' required>
                <input type='number' name='rem-bal' pattern='(\d{3})([\.])(\d{2})' min='0.00' max='999.99' step='any' value='' id='rem-bal' data-type='currency' inputmode='numeric' placeholder='Remaining Balance' required>
                <select name='acct-status' class='store-select'>
                    <option value='ACTIVE' selected>ACTIVE</option>
                    <option value='CLOSED'>CLOSED</option>
                </select>
                <input type='text' name='initial-up' value='' id='initials-update' placeholder='Initials' minlength='2' maxlength='3' pattern='[A-Za-z]{2,3}' onkeyup='this.value = this.value.toUpperCase();' oninvalid='this.setCustomValidity(`Enter 3 Letter Maximum`)' required>
                <input type='date' name='date-used' value='' id='todays-date'>
                <input type='submit' name='submit-up' value='UPDATE'>
            </fieldset>
        </form>
       ";

echo "
        <form action='' method='post' id='history-form' style='display: none;'>
            <fieldset>
                <legend>Look Up Card History</legend>
                <input type='number' name='gift-card-history' id='selectedGC' value='' inputmode='numeric' placeholder='Gift Card Number'>
                <input type='submit' name='submit-history' id='getHistory' value='GET HISTORY'>
            </fieldset>
        </form>
       ";

if($resultSet->num_rows > 0) {

    echo "
        <table id='TableID' class='table table-striped cell-border table-bordered orig-table sortable'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gift Card Number</th>
                    <th>Account Status</th>
                    <th>Initial Balance</th>
                    <th>Remaining Balance</th>
                    <th>Store</th>
                    <th>Card Activation Date</th>
                    <th>Date Last Used</th>
                </tr>
            </thead>

            <tbody id='gift-table-body'>
            
        ";

    while($data = $resultSet->fetch_assoc()) {

        $id = $data['Id'];
        $giftCardNum = $data['Gift Card Number'];
        $acctStatus = $data['Account Status'];
        $initBal = $data['Initial Balance'];
        $remainBal = $data['Remaining Balance'];
        $storeDebt = $data['Store'];
        $cardActDate = $data['Card Activation Date'];
        $dateLastUsed = $data['Date Last Used'];

        echo "
        <tr id='gift-card-info'>
            <td>$id</td>
            <td class='gift-card-number'>$giftCardNum</td>
            <td>$acctStatus</td>
            <td>$initBal</td>
            <td>$remainBal</td>
            <td>$storeDebt</td>
            <td>$cardActDate</td>
            <td>$dateLastUsed</td>
        </tr>";

    }

    echo "
                </tbody>
            </table>
            ";
} else {
    echo "No gift cards found.";
}

