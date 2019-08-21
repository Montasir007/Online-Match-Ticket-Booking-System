<!DOCTYPE html>
<html>
<head>
	<title>BPL-Ticket Management System</title>
	<link rel="stylesheet" type="text/css" href="home.css"/>
</head>
<body>

<a class="logo" href="home.php"><img src="./logo.jpg"></a>

<div class="header">
<ul>
	<li class="title"><a href="home.php"><span class="title">Bangladesh Premier League</span></a></li>
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
	
	<li><a href="signup.php"><span class="tab">Sign Up</span></a></li>
	<li><a href="login.php"><span class="tab">Log In</span></a></li>
</ul>
<br><br><br>
</div>

<?php 

	$add='localhost';
		$user='root';
		$pass='';
		$db='project';
	$conn = new mysqli($add, $user, $pass,$db);

	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	echo "";


?>
<marquee class="banner">
<?php 
		$query="select * from gameinfo where gameNo=(select MIN(gameNo) from gameinfo)";
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
        echo "Next Match: ".$row['HomeTeam']." VS ".$row['AwayTeam'];
		
    		}
    	}
		else {
    		echo "0 results";
		}
	
	?>
</marquee>


<div class="container">
	<h2>Next Match:</h2>
	<div class="matchdisplay">
	<?php 
		$query="select * from gameinfo where gameNo=(select MIN(gameNo) from gameinfo)";
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
        echo $row['HomeTeam']." VS ".$row['AwayTeam'];
		echo "<br>".$row['Venue']."<br>";
		echo $row['matchdate']."&nbsp".$row['time'];
    		}
    	}
		else {
    		echo "0 results";
		}
	
	?>
	</div>
	<br><br><br>
	<h2>Upcomming Matches</h2>
	
	<?php 
		$query="select * from gameinfo where gameNo!=(select MIN(gameNo) from gameinfo)";
		$result = $conn->query($query);

		if($result->num_rows > 0) {
    	// output data of each row
    	
    	while($row = $result->fetch_assoc()) {
        echo "<div class="."upmatchdisplay".">";
        echo $row['HomeTeam']." VS ".$row['AwayTeam'];
		echo "<br>".$row['Venue']."<br>";
		echo $row['matchdate']."&nbsp".$row['time'];
		echo "</div>"."<br>";
    		}
    	}
	
	?>
		
	
</div>
<?php
	date_default_timezone_set('Asia/Dhaka');
  
  
	echo "<div class="."timeDisplay".">";
    echo date('l, jS F h:iA');
	echo "</div>"."<br>";
  
?>





</body>
</html>