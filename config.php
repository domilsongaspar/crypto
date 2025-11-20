<?php

    function connect () {
        $conn = new mysqli('localhost', 'root', '', 'cyt_db');
        mysqli_set_charset($conn, 'utf8');

        return $conn;
    }