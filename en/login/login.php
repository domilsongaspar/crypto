<?php
    session_start();

    if (isset($_SESSION['cyt_logged'])) {
        header('Location: ../accounts/home.php');
    }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crypto | Log in</title>
    <link rel="shortcut icon" href="http://www.crypto.com/favicon.png" type="image/png">
    <link rel="stylesheet" href="http://www.crypto.com/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.min.css" integrity="sha512-AyOHI/tIMgoG+32apAs3OdqFowPSDqiz5vLcD2wdhBJ4J/xF1PI6UITcyhS5HCmsiioapRaONqYBvimxzFfnoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
</head>
<body>
    <form action="http://www.crypto.com/en/login/proccess.php" method="POST" class="form">
        <div class="header">
            <figure class="logo">
                <img src="http://www.crypto.com/images/cryptoLogo.svg" alt="Logotipo">
            </figure>
        </div>

        <div class="main">
            <div class="field">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Put your e-mail">
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Put your password">
            </div>        

            <div class="send">
                <button type="submit" name="send">Go</button>
            </div>

            <div class="goHome">
                <div class="bar"></div>
                <a href="http://www.crypto.com/en/" title="Go to home">
                    <i class="fa fa-home fa-lg"></i>
                </a>
                <div class="bar"></div>
            </div>
        </div>
    </form>
</body>
</html>