<?php

    require_once '../scripts/functions.php';
    require_once '../config.php';

    /**
     * sended = 1
     * lk <=> lock = data to crypto
     * uk <=> unlock = data to uncrypto
     * ce <=> code = code of cryptography 
     * pr <=> proprietary = id of proprietary of criptography
     */    

    if (isset($_POST['sd']) && isset($_POST['lk'])) {
        $data = filter_input(INPUT_POST, 'lk', FILTER_SANITIZE_SPECIAL_CHARS);
        $data = preg_replace('/_plus/', '+', $data);
        $id = filter_input(INPUT_POST, 'pr', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = preg_replace('/_plus/', '+', $id);
        $code = filter_input(INPUT_POST, 'ce', FILTER_SANITIZE_SPECIAL_CHARS);

        setSource(getSource($id, $code));
        echo crypto($data);
    }

    if (isset($_POST['sd']) && isset($_POST['uk'])) {
        $data = filter_input(INPUT_POST, 'uk', FILTER_SANITIZE_SPECIAL_CHARS);
        $data = preg_replace('/_plus/', '+', $data);
        $id = filter_input(INPUT_POST, 'pr', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = preg_replace('/_plus/', '+', $id);
        $code = filter_input(INPUT_POST, 'ce', FILTER_SANITIZE_SPECIAL_CHARS);

        setSource(getSource($id, $code));
        echo uncrypto($data);
    }

    function getSource ($id, $code) {
        $conn = connect();
        $query = mysqli_query($conn, "SELECT _name FROM _repositories WHERE _id = '$id'");
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            //Get user repository name
            $result = mysqli_fetch_assoc($query);
            $repositoryName = $result['_name'];

            $query = mysqli_query($conn, "SELECT _name FROM _cryptodatas WHERE _code = '$code' AND _proprietary = '$id'");
            $row = mysqli_num_rows($query);

            if ($row > 0) {
                //Get cryptography name
                $result = mysqli_fetch_assoc($query);
                $crypto_name = $result['_name'];

                //return all way of cryptography config file
                return "../files/repositories/$repositoryName/$crypto_name/config.crypto";
            }
        }        
    }