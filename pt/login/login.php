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
    <title>Crypto | Iniciar Sessão</title>
    <link rel="shortcut icon" href="http://www.crypto.com/favicon.png" type="image/png">
    <link rel="stylesheet" href="http://www.crypto.com/css/login.css">
    <link rel="stylesheet" href="http://www.crypto.com/css/all.min.css">
</head>
<body>
    <form action="http://www.crypto.com/pt/login/proccess.php" method="POST" class="form">
        <div class="header">            
            <figure class="logo">
                <img src="http://www.crypto.com/images/cryptoLogo.svg" alt="Logotipo">
            </figure>
        </div>

        <div class="main">
            <div class="field">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Coloque o seu e-mail">
            </div>

            <div class="field">
                <label for="password">Palavra-passe</label>
                <input type="password" name="password" id="password" placeholder="Coloque a sua palavra-passe">
            </div>        

            <div class="send">
                <button type="submit" name="send">Entrar</button>
            </div>

            <div class="goHome">
                <div class="bar"></div>
                <a href="http://www.crypto.com/pt/" title="Ír para o Início">
                    <i class="fa fa-home fa-lg"></i>
                </a>
                <div class="bar"></div>
            </div>
        </div>
    </form>
</body>
</html>