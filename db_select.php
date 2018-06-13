<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = "admin_user";
$dbpwd = "admin_password";
$dbname = "praktikum";

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
$sql ="SELECT * FROM uporabnik;";
//$sql ="CREATE TABLE Uporabnik(
//    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
//    username varchar(255) NOT NULL,
//    email varchar(255) NOT NULL,
//    password varchar(255)
//);";
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
} else {
	$result = mysqli_query($connection, $sql);
	printf($result . "Result");
	
}
$connection->close();
?>
