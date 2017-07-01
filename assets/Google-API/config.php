<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = 'N\A'; //Google CLIENT ID
$clientSecret = 'N\A'; //Google CLIENT SECRET
$redirectUrl = 'http://hexzo.com/assets/Google-API';  //return url (url to script)
$homeUrl = 'http://hexzo.com/assets/Google-API';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to codexworld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>