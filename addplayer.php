<!--

     Add player PHP file
     Tom Mathew

-->
<?php

//Turn on the error reporting
error_reporting(E_ALL);
//Define connection to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "mathewt-db", "KmRBVhwv5hWDxsgp", "mathewt-db");

if(!$mysqli || $msqli->connect_errno)
{
	echo "Connection error occurred " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}


//Show that no error occurred
echo "Everything is Working!!"



?>



<br>
player F name: <?php echo $_POST["playerFname"]; ?> <br>
player L name: <?php echo $_POST["playerLname"]; ?> <br>
player age: <?php echo $_POST["playerAge"]; ?> <br>
player status: <?php echo $_POST["playerStatus"]; ?> <br>



     <?php

     if(!($stmt = $mysqli->prepare("INSERT INTO PLAYER(fname, lname, age, team_val, status) VALUES (?,?,?,?,?)")))
     {
     echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
     }

     //Bind the parameters. S, I, and I for name, age, and team_val3. Use a POST array
     if(!($stmt->bind_param("ssiis",$_POST['playerFname'],$_POST['playerLname'],$_POST['playerAge'],$_POST['playerTeamval'],$_POST['playerStatus'])))
     {
     echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
     }

     //If adding rows failed
     if(!$stmt->execute())
     {
     echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
     }

     //If adding rows suceeded, let them know
     else
     {
     echo "Added " . $stmt->affected_rows . " rows (players) to PLAYER.";
     }


?>

<a href="http://web.engr.oregonstate.edu/~mathewt/NFL/Test.php">Click here to go back to the main page.</a>