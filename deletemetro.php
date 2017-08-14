
<!--

     Delete Metro File
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
delete ID: <?php echo $_POST["deleteID"]; ?> <br>


     <?php
     
     
     if(!($stmt = $mysqli->prepare("DELETE FROM METRO WHERE metro_id = ?")))
     {
     echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
     }

     //Bind the parameters. S, I, and I for name, age, and team_val3. Use a POST array
     if(!($stmt->bind_param("i",$_POST['deleteID'])))
     {
     echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
     }

     //If adding rows failed
     if(!$stmt->execute())
     {
     echo "Execute failed: "  . "You can't delete a metro if a team still plays there!" . $stmt->errno . " " . $stmt->error;
     }

     //If adding rows suceeded, let them know
     else
     {
     echo "deleted " . $stmt->affected_rows . " rows (metros) from METRO.";
     }
     
    
   
$mysqli->close();
?>


<a href="http://web.engr.oregonstate.edu/~mathewt/NFL/Test.php">Click here to go back to the main page.</a>


