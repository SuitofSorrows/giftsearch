<?php
    session_start();

    include 'header.php';
    include '../conn/db_connection_user.php';
    include '../conn/session_functions.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        // read from database
        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";

        $loginResult = mysqli_query($mysqliSess, $query);

        if ($loginResult) {
            if (mysqli_num_rows($loginResult) > 0) {
                $user_data = mysqli_fetch_assoc($loginResult);

                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: ../index.php");
                    die;
                } else {
                    $signup_error = "Username/Password is incorrect...try again.";
                }
            }
        } else {
            $signup_error = "Username/Password is incorrect...try again.";
        }

    }


?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>

    <head>
        <title>LPRCS Giftcards - Login</title>
    </head>

    <body style="background-color: #fff87c;">
        <div id="login-form">
            <form method="post">
                <img src="../images/lprcs_logo_login.png" alt="LPRCS_Logo" class="login-logo">

                <?php if (!empty($signup_error)): ?>
                    <div class="register-error"><?php echo $signup_error; ?></div>
                <?php endif ?>

                <input id="login-text" type="text" name="user_name" placeholder="Username"><br><br>
                <input id="login-text" type="password" name="password" placeholder="Password"><br><br>
                <input id="login-button" type="submit" value="Login"><br><br>
                <p class="registered-text">Not registered? <a href="signup.php" style="color: #db151b">Click here</a> to sign up!</p>
            </form>
        </div>
    </body>

</html>
