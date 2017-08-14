<!--

     Add position PHP file
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
position name: <?php echo $_POST["positionName"]; ?> <br>
offense or defense: <?php echo $_POST["positionType"]; ?> <br>

     <?php


     if(!($stmt = $mysqli->prepare("INSERT INTO FBPOSITION(offenseDefense, name) VALUES (?,?)")))
     {
     echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
     }
     
     //Bind the parameters. S, I, and I for name, age, and team_val3. Use a POST array 
     if(!($stmt->bind_param("ss",$_POST['positionType'],$_POST['positionName'])))
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
     echo "Added " . $stmt->affected_rows . " row (position) to POSITION.";
     }
     
     
     
?>

     <a href="http://web.engr.oregonstate.edu/~mathewt/NFL/Test.php">Click here to go back to the main page.</a>


