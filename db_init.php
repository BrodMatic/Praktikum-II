<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = "admin_user";
$dbpwd = "admin_password";
$dbname = "praktikum";

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
$sql ='


DROP TABLE IF EXISTS `boolbox`;
CREATE TABLE IF NOT EXISTS `boolbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agreed` tinyint(1) NOT NULL,
  `fk_checkbox` int(11) NOT NULL,
  `fk_podpisnik` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_checkbox` (`fk_checkbox`),
  KEY `fk_podpisnik` (`fk_podpisnik`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

';
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
} else {
	$result = mysqli_query($connection, $sql);
	printf($result . "Result");
	
}
$connection->close();
?>
