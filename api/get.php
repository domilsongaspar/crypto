<?php
    /*
     *
        This file return all crytography containers of current user
     *
     * 
     * */

    session_start();

    require_once '../config.php';

    if (isset($_POST['at']) && $_POST['at'] == 'get') {
        $id = $_SESSION['id'];
        $lang = filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = connect();

        $query = mysqli_query($conn, "SELECT * FROM _cryptodatas WHERE _proprietary = '$id'");
        $rows = mysqli_num_rows($query);

        if ($rows > 0) {
            while ($datas = mysqli_fetch_array($query)) {
                echo ($lang == 'en') ? enTemplate($datas['_code'], $datas['_name'], $datas['_used']) : ptTemplate($datas['_code'], $datas['_name'], $datas['_used']);
            }
        } else {
            echo 'empty';
        }
        
    }

    function enTemplate ($code, $title, $used) {
        $uContent = (!$used == 0) ? '<span class="green-circle" title="Active"></span>' : '<span class="red-circle" title="No active"></span>';
        return '<div class="box" data-id="'.$code.'" data-title="'.$title.'">
    <span class="block bold w-break">'.$title.'</span>
    <span class="block w-break">Code : '.$code.'</span>
    <span class="block">Using: '.$uContent.'</span>
    <button class="block manageBtn">Manage</button>
</div>';
    }

    function ptTemplate ($code, $title, $used) {
        $uContent = (!$used == 0) ? '<span class="green-circle" title="Active"></span>' : '<span class="red-circle" title="No active"></span>';
        return '<div class="box" data-id="'.$code.'" data-title="'.$title.'">
    <span class="block bold w-break">'.$title.'</span>
    <span class="block w-break">Código : '.$code.'</span>
    <span class="block">Em utilização: '.$uContent.'</span>
    <button class="block manageBtn">Gerir</button>
</div>';
    }