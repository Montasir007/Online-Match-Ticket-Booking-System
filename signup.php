<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
		<label>Full Name:</label><br><br>
		<input type="text" name="fullname" value="" required placeholder="Full name"><br><br>
		<label>Username:</label><br><br>
		<input type="text" name="uname" id="uname" value="" required placeholder="Username"><br><br>
		<span id="availability"></span>
		<label>Password:</label><br><br>
		<input type="password" name="upass" value="" required placeholder="Password"><br><br>
		<label>Email:</label><br><br>
		<input type="email" name="email" value="" required placeholder="Email Address"><br><br>
		
		<input class="button" type="submit" name="submit" value="Sign Up"/><br>
			
	</form>
	
</div>

<?php 
	if(isset($_POST['submit'])){
		$add='localhost';
		$user='root';
		$pass='';
		$db='project';
		$conn = new mysqli($add, $user, $pass,$db);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		} 
		echo "";
	/*	if(isset($_POST["UserName"]))
		{
			$sql="SELECT * FROM users WHERE UserName='".$_POST["UserName"]."'";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0)
			{
				echo '<span class="text-danger">Username already exists!!!Use different username</span>';
			}
			else
			{}
		}*/

		$fullname=$_POST['fullname'];
		$uname=$_POST['uname'];
		$upass=$_POST['upass'];
		$email=$_POST['email'];
		$sql = "insert into users(FullName,UserName,password,email) values('$fullname','$uname','$upass','$email')";

		if($conn->query($sql) === TRUE) {
    				header("location:successfulRegister.php");}
		else {
    			header("location:UnsuccessfulRegister.php");
			}
	}
?>
</body>
</html>