<?php
    session_start();
    require_once '../../config.php';
    require_once '../../scripts/functions.php';

    setSource('../../files/cyt/config.crypto');

    if (isset($_POST['send'])) {
        $email = crypto(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
        $password = crypto(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));

        $conn = connect();

        $query = mysqli_query($conn, "SELECT _id, _email, _name FROM _users WHERE _email = '$email' AND _password = '$password'");
        $row = mysqli_num_rows($query);

        if ($row > 0) {
            $results = mysqli_fetch_assoc($query);

            $id = $results['_id'];
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $results['_email'];
            $_SESSION['cyt_logged'] = true;            

            mysqli_query($conn, "UPDATE _users SET _logged = 1 WHERE _id = '$id'");
            $query = mysqli_query($conn, "SELECT _name FROM _repositories WHERE _id = '$id'");
            $data = mysqli_fetch_assoc($query);
            $_SESSION['cytur_repository'] = $data['_name'];

            header('Location: ../accounts/home.php');
        } else {
            header('Location: ./login.php');
        }

        mysqli_close($conn);
    }