<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../webproject/css/style.css">

    <title>Signup Form - Reunion</title>
</head>
<body>
    <div class="container">
        <form action="includes/signup.inc.php" method="post" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Signup</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword">
            </div>            
            <div class="input-group">
                <button name="submit" class="btn">Signup</button>
            </div>
            <p class="login-register-text">Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>

    <?php
    check_signup_errors();
    ?>
</body>
</html>