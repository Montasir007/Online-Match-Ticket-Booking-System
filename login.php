<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="login.css">
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

<div class="container">
	<form action="" method="POST">
		<label>UserName:</label><br><br>
		<input type="text" name="uname" value="" required><br><br>
		<label>Password:</label><br><br>
		<input type="password" name="upass" value="" required><br><br>
		<input class="button" type="submit" name="submit" value="Sign In"/><br>
			
	</form>
	
</div>

<?php 
	if(isset($_POST['submit'])){
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


		$uname=$_POST['uname'];
		$upass=$_POST['upass'];
		$sql = "select * from users where password='$upass' AND UserName='$uname'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row['UserName']=='admin'){
	    					header("location:adminHome.php");
	    				}
    			else
    				header("location:loggedHome.php");	
    				
				}
		}
		else {
    			echo "Error: " . $conn->error;
				}
	}
?>
</body>
</html>