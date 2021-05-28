<?php

$mysqli = new MySQLi('localhost' , 'root' , '' , 'dev_giftsearch');

if(! $mysqli ) {
    die('Could not connect: ' . mysql_error());
}

$resultSet = $mysqli->query("SELECT * FROM `table 2`");


//     Submit updated gift card info
if (isset($_POST['submit-up'])) {
//     Variables and values passing here
    $postId = $_POST['id'];
    $postAcctStatus = $_POST['acct-status'];
    $postRemainBal = $_POST['rem-bal'];
    $postDateUsed = $_POST['date-used'];
    $messageSuccess = "Gift Card Successfully Updated!";
    $messageFailure = "Failed to Update Gift Card.";

//     Query to update balance
    $query = "UPDATE `table 2` SET `Remaining Balance`='$postRemainBal', `Account Status`='$postAcctStatus', `Date Last Used`='$postDateUsed' WHERE Id='$postId'";

//     Update data
    $updatedQuery = mysqli_query($mysqli, $query);

    echo "<meta http-equiv='refresh' content='0'>";

//    Alert on successful update
    if (mysqli_affected_rows($mysqli) > 0) {
        echo "<script>alert('$messageSuccess');</script>";
    } else {
        echo "<script>alert('$messageFailure')</script>";
    }

}

//     Submit new gift card info
if (isset($_POST['submit-new'])) {
//     Variables and values passing here
    $postInitialBal = $_POST['init-bal'];
    $postGiftCardNum = $_POST['gift-card-number'];
    $postDateActivated = $_POST['date-activated'];
    $messageSuccessNew = "Gift Card Successfully Added!";
    $messageFailureNew = "Failed to Add Gift Card.";
    $storeAbbv = "PFF";

//     Query to add card
    $query = "INSERT INTO `table 2` (`Gift Card Number`, `Initial Balance`, `Remaining Balance`, `Store`, `Card Activation Date`, `Date Last Used`) VALUES ('$postGiftCardNum', '$postInitialBal', '$postInitialBal', '$storeAbbv', '$postDateActivated', '$postDateActivated')";

//     Update data
    $updatedQueryNew = mysqli_query($mysqli, $query);

    echo "<meta http-equiv='refresh' content='0'>";

//    Alert on successful update
    if (mysqli_affected_rows($mysqli) > 0) {
        echo "<script>alert('$messageSuccessNew');</script>";
    } else {
        echo "<script>alert('$messageFailureNew')</script>";
    }

}


echo "
        <div class='add-new-container'>
            <button name='new-card' id='add-new' type='button' onclick='newCardForm()'>Add New Card</button>
        </div>
       ";

echo "
        <form action='' method='post' id='new-card-form' style='display: none;'>
            <fieldset>
                <legend>Add New Gift Card</legend>
                <input type='number' name='gift-card-number' value='' inputmode='numeric' placeholder='Enter Gift Card Number' style='padding: 5px; width: 20%;'>
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
        <form action='' method='post'>
            <fieldset>
                <legend>Update Gift Card Balance</legend>
                <input type='text' name='id' value='' id='selectedId' style='padding: 5px; width: 10%;'>
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
        <form>
                <input type='submit' name='submit-history' value='GET HISTORY' style='padding: 5px; width 20%;'>
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

//     Getting update history
if (isset($_POST['submit-history'])) {
    $query = "SELECT *, SysTimeStart, SysTimeEnd FROM `table 2` FOR SYSTEM_TIME ALL";

    //     Update data
    $updatedQueryNew = mysqli_query($mysqli, $query);

//    Query duplicate Ids
    $historyLog = $mysqli->query("SELECT `Id`, COUNT(`Id`) FROM `table 2` GROUP BY `Id` HAVING COUNT(`Id`) > 1 FOR SYSTEM_TIME ALL");


}


//while ($updates = mysqli_fetch_array($historyLog)) {
//    echo $updates;
//}

echo $historyLog;