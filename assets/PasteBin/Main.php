<?php

if( isset ($Udata['id'])) {echo '
	<div id="Chat-Send-Box">
		<form action = "'.$_SERVER['PHP_SELF'].'" method = "POST">
			<input type="text" name="input" >
			<input type="submit" value="Send">
		</form>
	</div>';

}

if( isset($_POST["input"])) {
	$milliseconds = round(microtime(true) * 1000);
	$date = date('M-d (h:i A)');
	$Meassage = htmlspecialchars($_POST['input'], ENT_QUOTES, 'UTF-8');

			// Create connection
	$conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);
			// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	include_once("Filter.php");


	$sql = "INSERT INTO Paste_Bin (`id`, `uid`, `date`, `text`)
	VALUES ( '".$milliseconds."', '".$Udata['id']."', '".$date."', '".$Meassage_Filtered."')";

	if ($conn->query($sql) === TRUE) {

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
include_once("Log.php");

# Nuker Start
//if( isset($_POST["del-message"])) {
//	exec("DELETE FROM Paste_Bin WHERE id=".$_POST["del-message"]."")
//	}
//}
# Nuker End
?>
