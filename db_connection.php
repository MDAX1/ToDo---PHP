
<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // For a better explaination if a problem occurs

define('DB_HOST', 'homestead');
define('DB_USER', 'homestead');
define('DB_PASS', 'secret');
define('DB_NAME', 'todo-php');

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if (!$connection) {
    die("Failed connect to the database " . mysqli_error($connection));
} else {
        echo ("successfully connected to database");
}

?>