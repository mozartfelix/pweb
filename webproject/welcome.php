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

    <title>Welcome To Reunion</title>
</head>
<body>
    <div class="container">
        <form action="includes/logout.inc.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Logout</p>
            <div class="input-group">
                <button name="submit" class="btn">Logout</button>
            </div>
        </form>
    </div>
</body>
</html>