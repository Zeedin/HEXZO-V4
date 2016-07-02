<!--  <?php session_start();?> -->

<?php
	//print_r($_SESSION);
if( isset ($Udata['id'])) {echo '
	<div id="Chat-Send-Box">
      <form action = "'.$_PHP_SELF.'" method = "POST">
			<input type="text" name="input" >
			<input type="submit" value="Send">
      </form>
    </div>';

  }

		if( $_POST["input"]) {
			$servername = "localhost";
		    $username = "";
		    $password = "";
		    $dbname = "";

			$milliseconds = round(microtime(true) * 1000);
			$date = date('M-d (h:i A)');
			$Meassage = htmlspecialchars($_POST['input'], ENT_QUOTES, 'UTF-8');

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
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
?>




