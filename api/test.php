<?php

    require_once '../scripts/functions.php';
    require_once '../scripts/builder.php';

    setSource('../files/test/config.crypto');

    if (isset($_POST['at']) && $_POST['at'] == 'lock') {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
        $data = preg_replace('/_plus/', '+', $data);        

        if (isset($_POST['up']) && $_POST['up'] == 'dynamic') {
            $builder = new Builder();
            $builder->createMask('../files/test/config.crypto');
        }

        echo crypto($data);
    }

    if (isset($_POST['at']) && $_POST['at'] == 'unlock') {
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
        $data = preg_replace('/_plus/', '+', $data);

        echo uncrypto($data);
    }