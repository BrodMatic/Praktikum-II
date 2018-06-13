<?php 
session_start();
require_once "config.php";

if(isset($_SESSION['gLogout'])){
    
    $url = $gClient->createAuthUrl();
    unset($_SESSION['gLogout']);
    header("Location: $url");
    exit();
    
}else{
    $site_url=$_SESSION['url'];
    $_SESSION['gLogout'] = "something";
    header("Location: https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=" . $site_url . "/google_login_preset.php");
    exit();
    
}
?>