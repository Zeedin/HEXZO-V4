<?php 
//$Meassage = "Find the link and hyper link it only https://www.google.ca/ and https://twitter.com/ also normal http http://hexzo.com/";
$Meassage_Array = explode(" ", $Meassage);
$find_https = 'https://';
$find_http = 'http://';
//$matches = preg_grep($Meassage, $findme);

// URL Hyper link
foreach ($Meassage_Array as $Word) {
	if (strpos($Word, $find_https) !== false || strpos($Word, $find_http) !== false) {
		$Meassage_Array = str_replace($Word,'<a href="'.$Word.'"">'.$Word.'</a>',$Meassage_Array);
	}
}

$Meassage_Filtered = implode(" ", $Meassage_Array);



?>
