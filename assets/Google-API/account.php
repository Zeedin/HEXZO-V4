<?php
session_start();
// set the cookies
if($_GET["set"] === ""){
	echo '<meta http-equiv="refresh" content="0; url=http://hexzo.com/" />';
}

else{
if(isset($_SESSION['google_data'])){
setcookie("G-User", serialize($_SESSION['google_data']), strtotime("20 April 6969 11:20"), "/");
echo '<meta http-equiv="refresh" content="0; url='.$_SERVER['PHP_SELF'].'?set" />';
}
else {
	echo "Login Error!";
	}
}
?>
