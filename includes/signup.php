<?php
    session_start();

    include 'header.php';
    include '../conn/db_connection_user.php';
    include '../conn/session_functions.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // something was posted
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $messageSuccess = 'User Successfully Created';

        // checks to see if username already exists
        $query = "SELECT * FROM users WHERE user_name='$user_name'";

        $results = mysqli_query($mysqliSess, $query);

        if (mysqli_num_rows($results) > 0) {
            $username_error = "Sorry... username is already taken.";
        } else {
            // add user information to database or catch errors
            if (!empty($first_name) && !empty($last_name) && !empty($user_name) && !empty($password) && !is_numeric($first_name) && !is_numeric($last_name) && !is_numeric($user_name) && strlen($password) > 6) {

                // save to database
                $user_id = random_num(8);
                $query = "INSERT INTO users (user_id, first_name, last_name, user_name, password) VALUES ('$user_id', '$first_name', '$last_name', '$user_name', '$password')";

                mysqli_query($mysqliSess, $query);

                //    Alert on successful update (not working; go back and review this)
//                if (mysqli_affected_rows($results) > 0) {
//                    echo "<script>alert('$messageSuccess');</script>";
//                }

                header("Location: login.php");
                die;

            }

            if (is_numeric($first_name) || is_numeric($last_name) || is_numeric($user_name)) {

                $numeric_error = "Name cannot begin with a number.";

            } elseif (strlen($password) < 7) {

                $minimum_error = "Password must be longer than 6 characters.";

            } else {

                $complete_error = "Please fill out the entire form.";

            }

        }

    }
?>


<!DOCTYPE html>
<html>

    <head>
        <title>LPRCS Giftcards - Signup</title>
    </head>

    <body style="background-color: #fff87c;">
        <div id="login-form">
            <form method="post">
                <img src="../images/lprcs_logo_login.png" alt="LPRCS_Logo" class="login-logo">
                <div class="register-title">Registration Page</div>

                <?php if (!empty($numeric_error)): ?>
                    <div class="register-error"><?php echo $numeric_error; ?></div>
                <?php endif ?>

                <?php if (!empty($minimum_error)): ?>
                    <div class="register-error"><?php echo $minimum_error; ?></div>
                <?php endif ?>

                <?php if (!empty($complete_error)): ?>
                    <div class="register-error"><?php echo $complete_error; ?></div>
                <?php endif ?>

                <?php if (!empty($username_error)): ?>
                    <div class="register-error"><?php echo $username_error; ?></div>
                <?php endif ?>

                <input id="login-text" type="text" name="first_name" placeholder="First name"><br><br>
                <input id="login-text" type="text" name="last_name" placeholder="Last name"><br><br>
                <input id="login-text" type="text" name="user_name" placeholder="Username"><br><br>
                <input id="login-text" type="password" name="password" placeholder="Password"><br><br>
                <input id="login-button" name="signup" type="submit" value="Submit"><br><br>
                <p class="registered-text">Already registered? <a href="login.php" style="color: #db151b">Click here</a> to login!</p>
            </form>
        </div>
    </body>

</html>
