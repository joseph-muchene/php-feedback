<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "kvtc");

// create a connection instance

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


// check the connection

if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
