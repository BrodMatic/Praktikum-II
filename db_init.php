<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = "admin_user";
$dbpwd = "admin_password";
$dbname = "praktikum";

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
$sql ='
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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

DROP TABLE IF EXISTS `checkbox`;
CREATE TABLE IF NOT EXISTS `checkbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkbox` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `FK_che_ver` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

DROP TABLE IF EXISTS `podpisnik`;
CREATE TABLE IF NOT EXISTS `podpisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `cas` datetime NOT NULL,
  `FK_pod_ver` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `pooblascenec`;
CREATE TABLE IF NOT EXISTS `pooblascenec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) NOT NULL,
  `priimek` varchar(255) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `privolitve`;
CREATE TABLE IF NOT EXISTS `privolitve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) NOT NULL,
  `FK_priv_upo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `uporabnik`;
CREATE TABLE IF NOT EXISTS `uporabnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `upravljalec`;
CREATE TABLE IF NOT EXISTS `upravljalec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) NOT NULL,
  `priimek` varchar(255) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `FK_upr_priv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `verzija`;
CREATE TABLE IF NOT EXISTS `verzija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verzija` int(11) NOT NULL,
  `text` text NOT NULL,
  `rok_hrambe` varchar(255) NOT NULL,
  `FK_ver_priv` int(11) NOT NULL,
  `FK_ver_poob` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;


COMMIT;
';
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
	$result = mysqli_query($connection, $sql);
	printf($result);
	
}
$connection->close();
?>
