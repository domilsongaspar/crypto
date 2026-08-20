<?php

function connect() {
    try {
        $host = getenv("DB_HOST");
        $user = getenv("DB_USER");
        $password = getenv("DB_PASSWORD");
        $database = getenv("DB_NAME");

        if (!$host || !$user || !$password || !$database) {
            throw new Exception("Database credentials are not set");
        }

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        mysqli_set_charset($conn, "utf8");

        return $conn;
    } catch (Exception $e) {
        die(json_encode(["error" => "Connection failed: " . $e->getMessage()]));
    }
}