<!DOCTYPE html>
<html>
<head>
	<title>Bangladesh Premier League</title>
	<link rel="stylesheet" type="text/css" href="adminHome.css">
</head>
<body>
<a class="logo" href="adminHome.php"><img src="./logo.jpg"></a>

<div class="header">
<ul>
	<li class="title"><a href="adminHome.php"><span class="title">Admin</span></a></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li><a href="home.php"><span class="tab">Log Out</span></a></li>
</ul>
<marquee class="banner">Welcome to BPL!!Use Game No. only to remove the Game info</marquee>
<br><br><br>
</div>
<br><br><br>
<?php 
		$add='localhost';
		$user='root';
		$pass='';
		$db='project';
		$conn =new mysqli($add, $user, $pass,$db);

		// Check connection
		if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 
		echo "";
?>
<div class="formarea">
	<form action="" method="POST">
		<label>Game No.:(if you want to delete)</label>
		<input type="text" name="gameNo"><br><BR>

		<label>Home Team:</label><br><br>
		<select type="text" name="hteam" value="" >
			<option>Select a team</option>
			<option>Dhaka Dynamites</option>
			<option>Khulna Titans</option>
			<option>Rajshahi Kings</option>
			<option>Comilla Victorians</option>
			<option>Rangpur Riders</option>
			<option>Sylhet Sixers</option>
			<option>Chittagong Vikings</option>
		</select><br><br>
		<label>Away Team:</label><br><br>
		<select type="text" name="ateam" value="" >
			<option>Select a team</option>
			<option>Dhaka Dynamites</option>
			<option>Khulna Titans</option>
			<option>Rajshahi Kings</option>
			<option>Comilla Victorians</option>
			<option>Rangpur Riders</option>
			<option>Sylhet Sixers</option>
			<option>Chittagong Vikings</option>
		</select><br><br>
		<label>Venue:</label><br><br>
		<select type="text" name="venue" value="" >
			<option>Select a Venue</option>
			<option>Sher-e-Bangla Stadium</option>
			<option>Zahur Ahmed Chowdhury Cricket Stadium</option>
			<option>Sylhet International Cricket Stadium</option>
		</select><br><br>
		<label>Match Date</label><br><br>
		<input type="date" name="matchdate" ><br><br>
		<label>Day</label><br><br>
		<select type="text" name="day" value="" >
			<option>Day</option>
			<option>Saturday</option>
			<option>Sunday</option>
			<option>Monday</option>
			<option>Tuesday</option>
			<option>Wednesday</option>
			<option>Thursday</option>
			<option>Friday</option>
		</select><br><br>
		<label>Time</label>		<br><br>
		<input type="time" name="time"><br><br>
		<input type="submit" name="addgame" value="Add Game" onclick="return mess()">
		<input type="submit" name="deletegame" value="Delete Game">
		<script type="text/javascript">
	function mess()
	{
		alert("Match scheduled successfully!!!");
		return true;
	}
	</script>
		<?php 
			if(isset($_POST['addgame'])){
				$gameNo=$_POST['gameNo'];
				$hteam=$_POST['hteam'];
				$ateam=$_POST['ateam'];
				$venue=$_POST['venue'];
				$matchdate=$_POST['matchdate'];
				$day=$_POST['day'];
				$time=$_POST['time'];
				
				
				$sql ="insert into gameinfo(HomeTeam,AwayTeam,Venue,matchdate,day,time)values('$hteam','$ateam','$venue','$matchdate','$day','$time')";
				if ($conn->query($sql) === TRUE) {
    				header("Location:adminHome.php");
							exit;
				} else {
    					echo "Error adding record: " . $conn->error;
				}
	       
				//header("Refresh:0");
		}
		?>
		<?php 
			if(isset($_POST['deletegame'])){
				$gameNo=$_POST['gameNo'];
							
				$sql ="delete from gameinfo where gameNo=$gameNo";
				$sql2 ="delete from ticketinfo where gameNo=$gameNo";
				if ($conn->query($sql) === TRUE) {
					if($conn->query($sql2) === TRUE){
    				echo "Game has been deleted successfully";
					}else{}
				} 
				else {
    				echo "Error updating record: " . $conn->error;
				}
				
				//header("Refresh:0");
		} 
		
		
		?>


		
	</form>
</div>
<br><br><br>
<h2> Next Match </h2>
<div class="matchdisplay">	
	<?php

		$query="select * from gameinfo where gameNo=(select MIN(gameNo) from gameinfo)";
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
        echo "GameNo: ".$row['gameNo']."<br>";
        echo "Battle Between: ".$row['HomeTeam']." VS ".$row['AwayTeam'];
		echo "<br>"."Venue: ".$row['Venue']."<br>";
		
		echo $row['matchdate']."<br>".$row['day']."<br>".$row['time'];
    		}
    	}
		else {
    		echo "0 results";
		}
	
	?>
</div>

<h2>Upcomming Matches</h2>
	
	<?php 
		$query="select * from gameinfo where gameNo!=(select MIN(gameNo) from gameinfo)";
		$result = $conn->query($query);

		if($result->num_rows > 0) {
    	// output data of each row
    	
    	while($row = $result->fetch_assoc()) {
        echo "<div class="."upmatchdisplay".">";
        echo "GameNo: ".$row['gameNo']."<br>";
        echo "Battle Between: ".$row['HomeTeam']." VS ".$row['AwayTeam'];
		echo "<br>"."Venue: ".$row['Venue']."<br>";
		echo $row['matchdate']."<br>".$row['day']."<br>".$row['time'];
		echo "</div>"."<br><br>";
    		}
    	}
	
	?>
</body>
</html>