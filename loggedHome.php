<!DOCTYPE html>
<html>
<head>
	<title>Home-BPL</title>
	<link rel="stylesheet" type="text/css" href="loggedHome.css">
</head>
<body>
<a class="logo" href="loggedHome.php"><img src="./logo.jpg"></a>

<div class="header">
<ul>
	<li class="title"><a href="loggedHome.php"><span class="title">Bangladesh Premier League</span></a></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	
	
	<li><a href="ticketinfo.php"><span class="tab">Ticket Info</span></a></li>
	<li><a href="home.php"><span class="tab">Log Out</span></a></li>
</ul>
<marquee class="banner">Use Game No. to book your tickets</marquee>
<br><br><br>
</div>
<br><br><br>
<?php 
		$add='localhost';
		$user='root';
		$pass='';
		$db='project';;
		$conn =new mysqli($add, $user, $pass,$db);
		// Check connection
		if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 
		echo "";
?>

<br><br><br>
</div>
<div class="formarea">
	<h2>Book Ticket</h2>
	<form method="POST" action="">
		<label>Enter Game No.:</label><br><br>
		<input type="text" name="gameNo"><br><br>
		<label>Enter Seat No. :</label><br><br>
		<input type="text" name="seatNo"><br><br>
		<label>Enter User Name:</label><br><br>
		<input type="text" name="uname"><br><br>
		<label>Enter Your Name:</label><br><br>
		<input type="text" name="name"><br><br>
		<input type="submit" name="book" value="Book it" onclick="return mess()">
	</form>
	<script type="text/javascript">
	function mess()
	{
		alert("Continue???");
		return true;
	}
	</script>
	<?php
		if(isset($_POST['book'])){
		$gameNo=$_POST['gameNo'];
		$seatNo=$_POST['seatNo'];
		$name=$_POST['name'];
		$uname=$_POST['uname'];
			$sql1 ="select uid from users where UserName='$uname'";
			$result = $conn->query($sql1);
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$uid=$row['uid'];
				}
			}
			else {
    			echo "0 results";
			}
				
					$sql ="insert into ticketinfo(uid,gameNo,seatNo,name)values('$uid','$gameNo','$seatNo','$name')";
					
						if ($conn->query($sql) === TRUE) {
							
							header("Location:loggedHome.php");
							exit;
						} else {
								echo "Ticket already booked!!!Choose another seat please!!";
						}				
		}
	?>
</div>

<h2 class="head">Booked Tickets</h2>
<div class="formarea">
	<h2>Find Bookings</h2>
	<form method="POST" action="">
		<label>Enter username:</label><br><br>
		<input type="text" name="uname"><br><br>
		<input type="submit" name="bookings" value="Show Bookings">
	</form>
</div>

<?php	
		if(isset($_POST['bookings'])){
			echo "<h2 class="."head".">"."Your Bookings"."</h2>";
			$uname=$_POST['uname'];
			$sql1="select * from ticketinfo where uid=(select uid from users where UserName='$uname')";
			$result2 = $conn->query($sql1);
			if ($result2->num_rows > 0) {
	    		while($row2 = $result2->fetch_assoc()) {

		        	echo "<div class="."matchdisplay".">";
		        	echo "Name: ".$row2['name']."<br>";
		        	echo "GameNo:".$row2['gameNo']."<br>";
		        	$gameNo=$row2['gameNo'];
					$query2="select * from gameinfo where gameNo=$gameNo";
					$result3 = $conn->query($query2);
					if ($result3->num_rows > 0) {
		    			while($row3 = $result3->fetch_assoc()) {
			        	    echo $row3['HomeTeam']." VS ".$row3['AwayTeam'];
							echo "<br>".$row3['Venue']."<br>";
							echo $row3['matchdate']."&nbsp".$row3['time'];
			    		}
			    		echo "</div>";
			    		echo "<br><br><br>";
    				}
	    		}echo "<br><br><br>";
    		}
			else {
    			header("location:loggedHome.php");
			}
		}
?>
</div>
<h2 class="head">Next Game</h2>
<div class="matchdisplay">	
	<?php

		$query="select * from gameinfo where gameNo=(select MIN(gameNo) from gameinfo)";
		$result = $conn->query($query);
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	        	echo "GameNo: ".$row['gameNo']."<br>";
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
<br><br>
<h2 class="head">Upcomming Matches</h2>
	
	<?php 
		$query="select * from gameinfo where gameNo!=(select MIN(gameNo) from gameinfo)";
		$result = $conn->query($query);

		if($result->num_rows > 0) {
    	// output data of each row
    	
    	while($row = $result->fetch_assoc()) {
        echo "<div class="."upmatchdisplay".">";
        echo "GameNo: ".$row['gameNo']."<br>";
        echo $row['HomeTeam']." VS ".$row['AwayTeam'];
		echo "<br>".$row['Venue']."<br>";
		echo $row['matchdate']."&nbsp".$row['time'];
		echo "</div>"."<br><br>";
    		}
    	}
	
	?>

</body>
</html>