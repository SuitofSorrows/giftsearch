<?php

require "db_connection.php";

echo "
        <div id='response-container'></div>
       ";

echo "
        <div class='buttons-container'>
            <button name='new-card' id='add-new' type='button' onclick='newCardForm()'>Add New Card</button>
            <button name='update-card' id='update-card' type='button' onclick='updateCardForm()'>Update Card</button>
            <button name='get-history' id='get-history' type='button' onclick='historyForm()'>Get History</button>            
        </div>
       ";

echo "
        <form action='' method='post' id='new-card-form' style='display: none;'>
            <fieldset>
                <legend>Add New Gift Card</legend>
                <input type='number' name='gift-card-number' value='' inputmode='numeric' placeholder='Gift Card Number' style='padding: 5px; width: 20%;'>
                <input type='number' name='init-bal'  pattern='(\d{3})([\.])(\d{2})' min='0.00' max='999.99' value='' data-type='currency' inputmode='numeric' placeholder='Initial Balance' style='padding: 5px; width: 15%;'>
                <select name='store' style='padding: 6px; width: 8%;'>
                    <option value='PFF' selected>PFF</option>
                    <option value='LRS'>LRS</option>
                </select>
                <input type='date' name='date-activated' value='' id='todays-date-add' style='padding: 4px; width: 160px;'>
                <input type='submit' name='submit-new' value='ADD' style='padding: 5px; width 20%;'>
            </fieldset>
        </form>
       ";

echo "
        <form action='' method='post' id='update-card-form' style='display: none;'>
            <fieldset>
                <legend>Update Gift Card Balance</legend>
                <input type='text' name='id' value='' id='selectedId' placeholder='ID' style='padding: 5px; width: 10%;'>
                <input type='number' name='rem-bal'  pattern='(\d{3})([\.])(\d{2})' min='0.00' max='999.99' value='' data-type='currency' inputmode='numeric' placeholder='Remaining Balance' style='padding: 5px; width: 15%;'>
                <select name='acct-status' style='padding: 6px; width: 9%;'>
                    <option value='ACTIVE' selected>ACTIVE</option>
                    <option value='CLOSED'>CLOSED</option>
                </select>
                <input type='date' name='date-used' value='' id='todays-date' style='padding: 4px; width: 160px;'>
                <input type='submit' name='submit-up' value='UPDATE' style='padding: 5px; width 20%;'>
            </fieldset>
        </form>
       ";

echo "
        <form action='' method='post' id='history-form' style='display: none;'>
            <fieldset>
                <legend>Look Up Card History</legend>
                <input type='number' name='gift-card-history' id='selectedGC' value='' inputmode='numeric' placeholder='Gift Card Number' style='padding: 5px; width: 20%;'>
                <input type='submit' name='submit-history' id='getHistory' value='GET HISTORY' style='padding: 5px; width 20%;'>
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

