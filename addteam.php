<!--

     Add Team PHP file
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
team name: <?php echo $_POST["teamName"]; ?> <br>
team SB wins: <?php echo $_POST["teamWins"]; ?> <br>
Divison: <?php echo $_POST["teamDivision"]; ?> <br>




     <?php

    

     if(!($stmt = $mysqli->prepare("INSERT INTO TEAM(name, sbwins, divison, metro_val) VALUES (?,?,?,?)")))
     {
     echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
     }

     //Bind the parameters. S, I, and I for name, age, and team_val3. Use a POST array
     if(!($stmt->bind_param("sisi",$_POST['teamName'],$_POST['teamWins'],$_POST['teamDivision'],$_POST['teamMetro'])))
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
     echo "Added " . $stmt->affected_rows . " rows (team) to TEAM.";
     }



?>

<a href="http://web.engr.oregonstate.edu/~mathewt/NFL/Test.php">Click here to go back to the main page.</a>

