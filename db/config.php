<?php

//local
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE_NAME", "greenworld");

// //production
// define("DB_HOST", "localhost");
// define("DB_USERNAME", "u630097762_greenworld");
// define("DB_PASSWORD", "^i2VgK1F0m");
// define("DB_DATABASE_NAME", "u630097762_greenworld");

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

if (mysqli_connect_errno()) {
    echo "Could not connect to database.";
}