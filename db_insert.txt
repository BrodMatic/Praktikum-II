<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = "admin_user";
$dbpwd = "admin_password";
$dbname = "praktikum";

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
$sql ='INSERT INTO uporabnik (username, email, password) VALUES ('Somebody', 'somebody@gmail.com', 'helvette');';
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
} else {
	$result = mysqli_query($connection, $sql);
	printf($result . "Result");
	
}
$connection->close();
?>
