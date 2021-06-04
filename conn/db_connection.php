<?php

// Local connection
$mysqli = new MySQLi('localhost' , 'root' , '' , 'dev_giftsearch');

// Website connection
//$mysqli = new MySQLi('localhost' , 'dklosygm' , 'Tomahawk7' , 'dklosygm_giftsearch');


if(! $mysqli ) {
    die('Could not connect: ' . mysql_error());
}

// Local
$resultSet = $mysqli->query("SELECT * FROM `table 2`");

// Website
//$resultSet = $mysqli->query("SELECT * FROM `TABLE 1`");

//     Submit updated gift card info
if (isset($_POST['submit-up'])) {
//     Variables and values passing here
    $postId = $_POST['id'];
    $postAcctStatus = $_POST['acct-status'];
    $postRemainBal = $_POST['rem-bal'];
    $postDateUsed = $_POST['date-used'];
    $postInitials = $_POST['initial-up'];
    $messageSuccess = "Gift Card Successfully Updated!";
    $messageFailure = "Failed to Update Gift Card.";

//     Query to update balance
    $query = "UPDATE `table 2` SET `Remaining Balance`='$postRemainBal', `Account Status`='$postAcctStatus', `Date Last Used`='$postDateUsed', `Initials`='$postInitials' WHERE Id='$postId'";

    //     Query to update balance (Website)
//    $query = "UPDATE `TABLE 1` SET `Remaining Balance`='$postRemainBal', `Account Status`='$postAcctStatus', `Date Last Used`='$postDateUsed', `Initials`='$postInitials' WHERE Id='$postId'";

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
    $postInitials = $_POST['initial-new'];
    $messageSuccessNew = "Gift Card Successfully Added!";
    $messageFailureNew = "Failed to Add Gift Card.";
    $storeAbbv = "PFF";

//     Query to add card
    $query = "INSERT INTO `table 2` (`Gift Card Number`, `Initial Balance`, `Remaining Balance`, `Store`, `Card Activation Date`, `Date Last Used`, `Initials`) VALUES ('$postGiftCardNum', '$postInitialBal', '$postInitialBal', '$storeAbbv', '$postDateActivated', '$postDateActivated', '$postInitials')";

//     Query to add card (Website)
//    $query = "INSERT INTO `TABLE 1` (`Gift Card Number`, `Initial Balance`, `Remaining Balance`, `Store`, `Card Activation Date`, `Date Last Used` `Initials`) VALUES ('$postGiftCardNum', '$postInitialBal', '$postInitialBal', '$storeAbbv', '$postDateActivated', '$postDateActivated', '$postInitials')";

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

//     Getting update history
if (isset($_POST['submit-history'])) {

    $giftcardHist = $_POST['gift-card-history'];

//    Query to get history
    $query = "SELECT `Account Status`, `Initial Balance`, `Remaining Balance`, `Store`, `Card Activation Date`, `Date Last Used`, `SysTimeEnd` FROM `table 2` FOR SYSTEM_TIME ALL WHERE `Gift Card Number` = '$giftcardHist'";

//    Query to get history (Website)
//    $query = "SELECT `Account Status`, `Initial Balance`, `Remaining Balance`, `Store`, `Card Activation Date`, `Date Last Used`, `SysTimeEnd` FROM `TABLE 1` FOR SYSTEM_TIME ALL WHERE `Gift Card Number` = '$giftcardHist'";


    //     Get history data
    $updatedQueryNew = mysqli_query($mysqli, $query);

    echo "<h5 style='text-align: center'>Card History:<br><span style='font-weight: 500; font-size: 1.5rem;'>$giftcardHist</span></h5>";

    echo "<div class='history-container'>";

    echo "<span style='font-weight: 500; font-size: 1.25rem;'>Status | Initial | Remaining | Store | Activation | Used | Time</span>";

    if (mysqli_num_rows($updatedQueryNew) === 0) {
        echo "<span style='text-align: center; font-weight: 500;'><br><br>No History Found</span>";
    }

    while ($row = mysqli_fetch_assoc($updatedQueryNew)) {
        print "<pre>";
        echo implode(" &#x2022 ", $row);
        print "</pre>";
    }

    echo "</div>";

    echo "<form action='$_SERVER[PHP_SELF]' method='post'>
                <input type='submit' name='reset' id='reset' value='RESET' style='padding: 5px; width 20%;'>
          </form>";

}