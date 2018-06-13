<?php

session_start();

if(isset($_SESSION['google_id'])) {
    $site_url = $_SESSION['url'];
    session_destroy();
    header("Location: https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=" . $site_url);
    exit();
    
}else{

    session_destroy();
    header("Location: index.php");
    exit();

}

?>