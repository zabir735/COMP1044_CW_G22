<?php include("G22_dataconnection.php")?>

<html>
<head>
	<title>MYNottingham Library</title>
	<link rel="icon" href="G22_nottlogo.jpg" type="image/jpg">
	<style>
		form{width:50%; margin-right:auto; margin-left:auto;text-align:center; padding-top:2%; padding-bottom:2%; font-size:1.25vw;}
		#label{width: 25%;  display: inline-block; text-align:right; margin-right: 5%;}
		form p{height: 7%;}
		input, select{height: 60%; border-radius: 5px; border: 1px solid grey; width: 35%; font-size:1.05vw;}
		input:hover, select:hover{background-color: #f7f7f7;}
		#bottom{margin: 0 auto; width: 55%;}
		#bottom input{float: left; font-weight: bold; margin-top:30px; margin-left: 2%; margin-right:2%; width: 45%; height:5%;
					border-radius: 5px; border-width:1px; background-color:#005580; font-size:16px; font-family:times new roman; color: white; cursor: pointer;}
		#bottom input:hover{background-color: #004466;}
	</style>
	
	<script type="text/javascript">
	function unchangeable()
	{
		alert("Username is unchangeable."); 
	}
	function confirmation()
	{
		answer = confirm("Do you sure want to cancel? Your data won't be saved.");
		return answer;
	}
	</script>
</head>

<body>
	<?php include("G22_header.php");?>
	<div style="clear:both"></div>
	
	<?php
		$data="SELECT * FROM users";
		$result=mysqli_query($connect, $data);
		$row = mysqli_fetch_array($result);
	?>
	
	<form method="POST">
		<p>
		<span id="label"><label for="fname">Username</label></span>
		<input onclick="unchangeable()" type="text" id="username" name="username" placeholder="<?php echo $row["username"]; ?>" readonly />
		</p>
		
		<p>
		<span id="label"><label for="fname">Current Password</label></span>
		<input type="password" id="currentpw" name="currentpw" placeholder="Enter Current Password" required />
		</p>
		
		<p>
		<span id="label"><label for="fname">New Password</label></span>
		<input type="password" id="newpw" name="newpw" placeholder="Enter New Password" required />
		</p>
		
		<p>
		<span id="label"><label for="fname">Reenter New Password</label></span>
		<input type="password" id="newpw" name="renewpw" placeholder="Enter New Password" required />
		</p>
		
		<div id="bottom">
			<div id="cancel">
				<a href="index.php?cancel" onclick="return confirmation();">
				<input type="button" name="cancel" value="CANCEL"/>
				</a>
			</div>
			<div id="subbtn">
				<input type="submit" name="subbtn" value="UPDATE"/>
			</div>
		</div>
		<div style="clear:both"></div>
	</form>
</body>

</html>

<?php 
	if(isset ($_POST["subbtn"]))
	{
		if(strcmp($_POST["currentpw"], $row["password"])==0)
		{
			if(strcmp($_POST["newpw"], $_POST["renewpw"])==0)
			{
				$update="UPDATE users set password='" . $_POST["newpw"] . "' WHERE username='" . $_SESSION["username"] . "'";
				if(mysqli_query($connect, $update))
				{
					echo "<script>
						alert('Update Successful! Please Login again');
						window.location.href='G22_login.php';
						</script>";
				}
			}
			else
			{
				echo "<script>
				alert('New Password and Reenter New Password is DIFFERENT. Please try again');
				</script>";
			}
		}
		else
		{
			echo "<script>
				alert('Current Password is INCORRECT. Please try again');
				</script>";
		}
	}		
?>