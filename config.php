<?php

    function connect () {
        $conn = new mysqli('db', 'root', 'root', 'cyt_db');
        mysqli_set_charset($conn, 'utf8');

        return $conn;
    }