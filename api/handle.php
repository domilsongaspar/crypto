<?php
    session_start();

    require_once '../scripts/functions.php';
    require_once '../scripts/builder.php';
    require_once '../config.php';    

    if (isset($_POST['at']) && $_POST['at'] == 'new') {        
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = $_SESSION['id'];
        $code = md5($data.date('dYM'));
        $builder = new Builder();
        //Create a directory for this cryptography if not exists
        if (!file_exists('../files/repositories/'.$_SESSION['cytur_repository'].'/'.$data)) {
            mkdir('../files/repositories/'.$_SESSION['cytur_repository'].'/'.$data);
            $builder->createMask('../files/repositories/'.$_SESSION['cytur_repository'].'/'.$data.'/config.crypto');
            
            $conn = connect();
            $query = mysqli_query($conn, "INSERT INTO _cryptodatas (_code, _name, _used, _proprietary)
            VALUES
            ('$code', '$data', '0', '$id')");
            mysqli_close($conn);
    
            if ($query) {
                echo 'ok';
            } else {
                echo 'failed';
            }
        } else {
            echo 'exists';
        }           
    }

    if (isset($_POST['at']) && $_POST['at'] == 'change') {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = $_SESSION['id'];
        
        $conn = connect();
        $query = mysqli_query($conn, "UPDATE _cryptodatas SET _name = '$data' WHERE _proprietary = '$id'");
        mysqli_close($conn);

        if ($query) {
            echo 'ok';
        } else {
            echo 'failed';
        } 
    }

    if (isset($_POST['at']) && $_POST['at'] == 'del') {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = $_SESSION['id'];
        
        $conn = connect();
        $query = mysqli_query($conn, "SELECT _name FROM _cryptodatas WHERE _proprietary = '$id'");
        $result = mysqli_fetch_assoc($query);
        //Remove this cryptography datas
        $query = mysqli_query($conn, "DELETE FROM _cryptodatas WHERE _proprietary = '$id'");
        mysqli_close($conn);

        //Remove this cryptography directory and its file
        unlink('../files/repositories/'.$_SESSION['cytur_repository'].'/'.$result['_name'].'/config.crypto');
        rmdir('../files/repositories/'.$_SESSION['cytur_repository'].'/'.$result['_name'].'/');

        if ($query) {
            echo 'ok';
        } else {
            echo 'failed';
        } 
    }