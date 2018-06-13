 <?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = "admin_user";
$dbpwd = "admin_password";
$dbname = "praktikum";
$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
?> 