<!--

     NFL Database Project
	Main Page
	CS 340
	Thomas Mathew, Aaron Clayton

-->

<?php

//Turn on the error reporting
error_reporting(E_ALL);

//connect to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "mathewt-db", "KmRBVhwv5hWDxsgp", "mathewt-db");
if($mysqli->connect_errno)
{
	echo "Connection error" . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

//Show that no error occurred
echo "Welcome to the NFL Database!"

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>NFL Database</title>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>


<!--
     Add Coach form
-->

	<div>

	<form method="post" action="addcoach.php">
	
	<fieldset>
		<legend> Add a Coach </legend>
		<p>Coach Last name: <input type="text" name="coachName" /></p>	
		<p>Coach Age: <input type="text" name="coachAge" /></p>	

	
	
		<p><input type="submit" /></p>

		</fieldset>

	</form>
</div>

<!--
     Delete Coach form
-->

<div>

	<form method="post" action="deletecoach.php">
	
	<fieldset>
		<legend> Delete a Coach </legend>
		<p>Enter ID of Coach to Delete: <input type="text" name="deleteCoach" /></p>	

		
		<p><input type="submit" /></p>
			</fieldset>

	</form>
</div>


<table>
<?php 



//Use PHP to pull some stuff as a demonstration of current Coach Database 

			if(!($stmt = $mysqli->prepare("SELECT coach_id, name, age, team_val3 FROM COACH WHERE 1")))
			{
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}


			if(!$stmt->execute())
			{
			echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}

			
			if(!$stmt->bind_result($coach_id, $name, $age, $team_val3))
			{
			echo "Bind Failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}

			echo "Current COACH Database" . "\r\n";
			echo "<tr>\n<td>\n" . "ID Number" . "\n</td>\n<td>\n" . "Name" . "\n</td>\n<td>\n" . "Age" . "\n</td>\n</tr>";
			echo "\r\n";
			
			while ($stmt->fetch())
			{
			echo "<tr>\n<td>\n" . $coach_id . "\n</td>\n<td>\n" . $name . "\n</td>\n<td>\n" . $age . "\n</td>\n</tr>";
			echo "\r\n";
			}



$stmt->close();

?>
</table>
        
    


<!--
     Add Team form
-->

<div>

	<form method="post" action="addteam.php">
	
	<fieldset>
		<legend> Add a Team </legend>
		<p>Team Name: <input type="text" name="teamName" /></p>	
		<p>Super Bowl wins: <input type="text" name="teamWins" /></p>	

	

			<legend>Divison Selector</legend>
			<select name="teamDivision">

<option value="NFC North">NFC North</option>
<option value="NFC South">NFC South</option>
<option value="NFC East">NFC East</option>
<option value="NFC West">NFC West</option>

<option value="AFC North">AFC North</option>
<option value="AFC South">AFC South</option>
<option value="AFC East">AFC East</option>
<option value="AFC West">AFC West</option>

			</select>

			<legend>Metro they play in:</legend>
			<select name="teamMetro">
<?php
if(!($stmt = $mysqli->prepare("SELECT metro_id, location FROM METRO"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($metro_id, $location)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $metro_id . ' "> ' . $location . '</option>\n';
}
$stmt->close();
?>
			</select>

		<p><input type="submit" /></p>

		</fieldset>
	</form>
</div>


<!--
     Delete Team form
-->

<div>

	<form method="post" action="deleteteam.php">
	
	<fieldset>
		<legend> Delete a Team </legend>
		<p>Enter ID of Team to Delete: <input type="text" name="deleteTeam" /></p>	
		<p><input type="submit" /></p>

	</fieldset>
	</form>
</div>



<table>
<?php 
//Use PHP to pull some stuff as a demonstration of current Team Database 

			if(!($stmt = $mysqli->prepare("SELECT team_id, name, sbwins, metro_val, divison FROM TEAM WHERE 1")))
			{
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}


			if(!$stmt->execute())
			{
			echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}

			
			if(!$stmt->bind_result($team_id, $name, $sbwins, $metro_val, $divison))
			{
			echo "Bind Failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}


			echo "Current TEAM Database" . "\r\n";
			echo "<tr>\n<td>\n" . "ID Number" . "\n</td>\n<td>\n" . "Name" . "\n</td>\n<td>\n" . "SB Wins" . "\n</td>\n<td>\n" . "Division" . "\n</td>\n</tr>";
			echo "\r\n";
			
			
			while ($stmt->fetch())
			{
			echo "<tr>\n<td>\n" . $team_id . "\n</td>\n<td>\n" . $name . "\n</td>\n<td>\n" . $sbwins .  "\n</td>\n<td>\n" . $divison . "\n</td>\n</tr>";
			echo "\r\n";
			}



$stmt->close();
?>
</table>

<!--
     Add Player form
-->

<div>

	<form method="post" action="addplayer.php">
	
	<fieldset>
		<legend> Add a Player </legend>
		<p>Player First Name: <input type="text" name="playerFname" /></p>	
		<p>Player Last Name: <input type="text" name="playerLname" /></p>	
		<p>Player Age: <input type="text" name="playerAge" /></p>		
		<p>Player status <input type="text" name="playerStatus" /></p>	

		<p><input type="submit" /></p>

	</fieldset>
	</form>
</div>

<!--
     Delete Player form
-->

<div>

	<form method="post" action="deleteplayer.php">
	
	<fieldset>
		<legend> Delete a Player </legend>
		<p>Enter ID of Player to Delete: <input type="text" name="deletePlayer" /></p>	

		<p><input type="submit" /></p>

	</fieldset>
	</form>
</div>


<table>
<?php 
//Use PHP to pull some stuff as a demonstration of current Player Database 

			if(!($stmt = $mysqli->prepare("SELECT player_id, fname, lname, age, team_val, status FROM PLAYER WHERE 1")))
			{
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}


			if(!$stmt->execute())
			{
			echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}

			
			if(!$stmt->bind_result($player_id, $fname, $lname, $age, $team_val, $status))
			{
			echo "Bind Failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}


			echo "Current PLAYER Database" . "\r\n";
			echo "<tr>\n<td>\n" . "ID number" . "\n</td>\n<td>\n" . "First Name" . "\n</td>\n<td>\n" . "Last Name" . "\n</td>\n<td>\n" . "Age" . "\n</td>\n<td>\n" . "Status" ."\n</td>\n</tr>";
			echo "\r\n";
			
			
			
			while ($stmt->fetch())
			{
			echo "<tr>\n<td>\n" . $player_id . "\n</td>\n<td>\n" . $fname . "\n</td>\n<td>\n" . $lname . "\n</td>\n<td>\n" . $age . "\n</td>\n<td>\n" . $status . "\n</td>\n</tr>";
			echo "\r\n";
			}


$stmt->close();
?>
</table>


<!--
     Add Metro form
-->

<div>

	<form method="post" action="addmetro.php">
	
	<fieldset>
		<legend> Add a Metro </legend>
		<p>Metro Name: <input type="text" name="metroName" /></p>	

		<p><input type="submit" /></p>

	</fieldset>
	</form>
</div>

<!--
     Delete Metro form
-->

<div>

	<form method="post" action="deletemetro.php">
	
	<fieldset>
		<legend> Delete a Metro </legend>
		<p>Enter ID of Metro to Delete: <input type="text" name="deleteID" /></p>	
		
		<p><input type="submit" /></p>

	</fieldset>
	</form>
</div>


<table>
<?php 
//Use PHP to pull some stuff as a demonstration of current Metro Database 

			if(!($stmt = $mysqli->prepare("SELECT metro_id, location, team_val2 FROM METRO WHERE 1")))
			{
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}


			if(!$stmt->execute())
			{
			echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}

			
			if(!$stmt->bind_result($metro_id, $location, $team_val2))
			{
			echo "Bind Failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}


			echo "Current METRO Database" . "\r\n";
			echo "<tr>\n<td>\n" . "ID Number" . "\n</td>\n<td>\n" . "Location" . "\n</td>\n</tr>";
			echo "\r\n";
			

			while ($stmt->fetch())
			{
			echo "<tr>\n<td>\n" . $metro_id . "\n</td>\n<td>\n" . $location . "\n</td>\n</tr>";
			echo "\r\n";
			}



$stmt->close();
?>
</table>

<!--
     Add Position form
-->

<div>

	<form method="post" action="addposition.php">
	
	<fieldset>
		<legend> Add a Position </legend>
		<p>Position Name: <input type="text" name="positionName" /></p>	
		<p>Offense or Defense: <input type="text" name="positionType" /></p>	

		<p><input type="submit" /></p>

	</fieldset>
	</form>
</div>

<!--
     Delete Position form
-->

<div>

	<form method="post" action="deleteposition.php">
	
	<fieldset>
		<legend> Delete a Position </legend>
		<p>Enter ID of Position to Delete: <input type="text" name="deletePosition" /></p>	
		
		<p><input type="submit" /></p>

	</fieldset>
	</form>
</div>

<table>
<?php 
//Use PHP to pull some stuff as a demonstration of current Position Database 

			if(!($stmt = $mysqli->prepare("SELECT position_id, offenseDefense, name FROM FBPOSITION WHERE 1")))
			{
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}


			if(!$stmt->execute())
			{
			echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}

			
			if(!$stmt->bind_result($position_id, $offenseDefense, $posname))
			{
			echo "Bind Failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}


			echo "Current POSITION Database" . "\r\n";
			echo "<tr>\n<td>\n" . "ID Number" . "\n</td>\n<td>\n" . "Offense or Defense" . "\n</td>\n<td>\n" . "Name" ."\n</td>\n</tr>";
			echo "\r\n";
			

			while ($stmt->fetch())
			{
			echo "<tr>\n<td>\n" . $position_id . "\n</td>\n<td>\n" . $offenseDefense . "\n</td>\n<td>\n" . $posname . "\n</td>\n</tr>";
			echo "\r\n";
			}



$stmt->close();
?>
</table>


</body>
</html>


