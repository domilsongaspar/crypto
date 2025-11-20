<?php

    session_start();

    if (!isset($_SESSION['cyt_logged'])) {
        header('Location: ../login/login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crypto | Home</title>
    <link rel="shortcut icon" href="http://www.crypto.com/favicon.png" type="image/png">
    <link rel="stylesheet" href="http://www.crypto.com/css/acc_home.css">
    <link rel="stylesheet" href="http://www.crypto.com/css/all.min.css">
    <link rel="stylesheet" href="http://www.crypto.com/css/animate.min.css">
    <link rel="stylesheet" href="http://www.crypto.com/css/toast.css">
    <script src="http://www.crypto.com/js/promisses.js"></script>
    <script defer src="http://www.crypto.com/js/acc_manager.js"></script>
    <script defer src="http://www.crypto.com/js/toast.js"></script>
</head>
<body>
    <div class="body">
        <div class="header">
            <figure class="logo">
                <img src="http://www.crypto.com/images/cryptoLogo.svg" alt="Logotipo">
            </figure>

            <div class="menu">
                <div class="icons">
                    <i class="fa fa-cog fa-lg c-pointer" title="Settings" id="settings"></i>
                    <i class="fa fa-plus fa-lg c-pointer" title="New cryptography" id="newCryptography"></i>
                    <a href="http://www.crypto.com/en/accounts/logout.php" title="Log out">
                        <i class="fa fa-sign-out-alt fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="main animated flipInX" id="main"></div>
    </div>
    <!-- Mask -->
    <div class="mask none" id="mask"></div>
    <!-- Elements on mask -->
    <div class="maskMenu none animated" id="idContainer">
        <i class="fa fa-times closeIcon"></i>
        <div class="field">
            <label for="name" class="bold">My ID</label>
            <span class="w-break"><?php echo $_SESSION['id'];?></span>
        </div>        
    </div>

    <div class="maskMenu none animated" id="newCryptoContainer">
        <i class="fa fa-times closeIcon"></i>
        <div class="field">
            <label for="name">Cryptography name</label>
            <input type="text" id="name" placeholder="Put here!">
            <button type="button" class="finish" id="finish">Finish</button>
        </div>        
    </div>

    <div class="maskMenu none animated" id="editCryptoContainer">
        <i class="fa fa-times closeIcon"></i>
        <div class="icon-input">            
            <input type="text" id="edName" disabled>
            <i class="fa fa-edit editIcon"></i>
        </div>

        <div class="field">
            <button type="button" class="finish">Finish</button>
        </div>
        
        <div class="field delContainer">
            <button type="button" class="delete">Delete</button>
        </div>
    </div>
    <!-- End -->
    <!-- Data Hidden Area -->
    <input type="hidden" id="userId" value="<?php echo $_SESSION['id'];?>">
    <input type="hidden" id="lang" value="en">
    <!-- End -->
    <div id="tt-target"></div>
</body>
</html>