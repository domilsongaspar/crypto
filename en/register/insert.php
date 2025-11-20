<?php
    session_start();
    require_once '../../config.php';
    require_once '../../scripts/functions.php';

    setSource('../../files/cyt/config.crypto');

    if (isset($_POST['sended'])) {
        $datas = json_decode($_POST['datas']);
        $datas->name = crypto(filter_var($datas->name, FILTER_SANITIZE_SPECIAL_CHARS));
        $datas->email = crypto(filter_var($datas->email, FILTER_SANITIZE_SPECIAL_CHARS));
        $datas->password = crypto(filter_var($datas->password, FILTER_SANITIZE_SPECIAL_CHARS));

        $id = crypto(uniqid());
        $logged = 1;        

        $repositoryName = md5(uncrypto($datas->email).date('d_M_Y'));
        $repository = '../../files/repositories/'.$repositoryName;
        mkdir($repository);

        //Give datas to sessions
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $datas->email;
        $_SESSION['cyt_logged'] = true;
        $_SESSION['cytur_repository'] = $repositoryName;

        $conn = connect();
        mysqli_query($conn, "INSERT INTO _users (_id, _name, _password, _email, _logged) 
        VALUES 
        ('$id', '$datas->name', '$datas->password', '$datas->email', '$logged')");

        mysqli_query($conn, "INSERT INTO _repositories (_id, _name) VALUES ('$id', '$repositoryName')");

        mysqli_close($conn);        
    }