<html>
<head>
	<title>MYNottingham Library</title>
	<link rel="icon" href="G22_image/nottlogo.jpg" type="image/jpg">
	
	<style>
		body{background-color: #fffef5;}
		form{width: 30%; max-height: 80%;background-color:#f0f0f0; margin-left:auto; margin-right:auto; border-radius: 25px; margin-top:5%}
		#content{padding: 6% 10%; border:1px solid grey; border-radius: 25px; max-height:80%;}
		#content p img{max-height:18%; width: 62%; margin-bottom: 15%; text-align:center;margin-left: auto;
  margin-right: auto; display: block;}
		#content input[type="textbox"], #content input[type="password"]
		{width:100%; background-color:transparent; border: none; border-bottom: 1px solid grey; height:8%; margin-top: 2%; margin-bottom:5%; font-size:1.1vw;}
		#content button{margin-top: 10%; margin-bottom: 10%; width: 100%; min-height: 8%; border-radius: 10px; border:none; background-color:#fffef5; font-size:1.1vw;}
		#content button:hover{cursor: pointer; background-color:#f7f6e9;}
	</style>
</head>

<body>
	<form method="post">
		<div id="content">
		<p><img src="G22_image/home.png"></img></p>
		<label for="username" style="font-size:1.3vw;"> Username  </label><br/>
		<input class="adtextbox" type="textbox" name="adminusername" id="adminUsername" placeholder=" Enter your username" required><br/>
		<label for="password" style="font-size:1.3vw;"> Password </label><br/>
		<input style="margin-left:0.5%;"class="adtextbox"type="password" name="adminpassword" id="adminPassword" placeholder="Enter your password"required><br/>
		
		<button class="b"type="submit">Log In</button>
		</div>
	</form>
</body>
</html>

<?php
	include("G22_dataconnection.php");
	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$loginname = $_POST['adminusername'];
		$loginpw = $_POST['adminpassword'];
	
		$sql = "SELECT * FROM users WHERE username = '$loginname' and password = '$loginpw'";
		$result = mysqli_query($connect,$sql);
		$check = mysqli_fetch_array($result);
		
		$username=strcmp($check["username"], $loginname);
		$pw=strcmp($check["password"], $loginpw);
		$active = $row['active'];

		$count = mysqli_num_rows($result);
		
		if($count==1 && $username==0 && $pw==0) 
		{
			echo "	<script>
					alert('Login Successful.');
					window.location.href='G22_index.php';
					</script>
					";
			$_SESSION["username"] = $loginname;
		}
		else 
		{
			echo "	<script>
					alert('Wrong username OR password. Please try again.');
					window.location.href='G22_login.php';
					</script>
					";
		}
	
	}
?>