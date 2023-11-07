<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../webproject/css/style.css">

    <title>Login Form - Reunion</title>
</head>

<body>
    <div class="container">
        <form action="includes/login.inc.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <p class="login-text" style="font-size: 1rem; font-weight: 800;"><?php output_username(); ?></p>
            <div class="input-group">
                <input type="username" placeholder="Username" name="username">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Don't have an account yet? <a href="signup.php">Signup</a>.</p>
        </form>
    </div>

    <?php
    check_login_errors();
    ?>

</body>

</html>