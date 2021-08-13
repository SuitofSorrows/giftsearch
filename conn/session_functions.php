<?php

function check_login($mysqliSess) {
    if(isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($mysqliSess, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
    }

    // redirect to login

    header("Location: includes/login.php");
    die;

}

function random_num ($length) {

    $text = "";
    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i=0; $i < $len; $i++) {

        $text .= rand(0,9);
    }

    return $text;

}