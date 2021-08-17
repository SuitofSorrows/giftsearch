<?php

// Local connection
$mysqliSess = new MySQLi('localhost' , 'root' , '' , 'dev_gift_session');

// Website connection
//$mysqliSess = new MySQLi('localhost' , 'dklosygm' , 'Tomahawk7' , 'dklosygm_giftsearch');


if(! $mysqliSess ) {
    die('Could not connect: ' . mysql_error());
}

// Checks to see if username already exists
//if (isset($_POST['signup'])) {
//    $username = $_POST['user_name'];
//
//    $query = "SELECT * FROM users WHERE user_name='$username'";
//
//    $results = mysqli_query($mysqliSess, $query);
//
//    if (mysqli_num_rows($results) > 0) {
//        $username_error = "Sorry... username is already taken.";
//    }
//}