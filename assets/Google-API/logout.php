<?php
include_once("config.php");
if(array_key_exists('logout',$_GET))
{
	unset($_SESSION['token']);
	unset($_SESSION['google_data']); //Google session data unset
	$gClient->revokeToken();
	session_destroy();
	header("Location: http://hexzo.com/V4/");
}
if (isset($_COOKIE['G-User'])) {
    unset($_COOKIE['G-User']);
    setcookie('G-User', '', time() - 3600, '/'); // empty value and old timestamp
}
?>