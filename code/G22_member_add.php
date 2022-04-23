<?php include("G22_dataconnection.php")?>

<html>
	
<head>
	<title>MYNottingham Library</title>
	<link rel="icon" href="G22_image/nottlogo.jpg" type="image/jpg">
	
	<style>
		body{font-family: Times New Roman;}
		
		h1{text-align:center;font-size: 5.5vw;margin-top:2%;margin-bottom:2%;}
		form{font-size:1.25vw; width:60%; margin-left: auto; margin-right: auto; background-color: #f0f0f0; text-align: center; padding-top: 2%; padding-bottom:2%; border-radius: 5px;}
		#label{width: 10%;  display: inline-block; text-align:right; margin-right: 5%;}
		form p{height: 7%;}
		input, select{height: 55%; border-radius: 5px; border: 1px solid grey; width: 35%; font-size:1.05vw;}
		input:hover, select:hover{background-color: #f7f7f7;}
		textarea{resize:none; height: 80%; width: 35%; border-radius: 5px; border: 1px solid grey; font-size:1.05vw;}
		textarea:hover{background-color: #f7f7f7;}
		#bottom{margin: 0 auto; width: 55%;}
		#bottom input{float: left; font-weight: bold; margin-top:30px; margin-left: 2%; margin-right:2%; width: 45%; height:5%;
					border-radius: 5px; border-width:1px; background-color:#005580; font-size:1.05vw; font-family:times new roman; color: white; cursor: pointer;}
		#bottom input:hover{background-color: #004466;;}
	</style>
	
	<script type="text/javascript">
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
	
	<h1>Add New Member
	</h1>
	<hr/>
	<br/><br/>
	<form method="post" id="memberadd">
		<h2>Details</h2>
		<br/>
		<p>
		<span id="label"><label>First Name</label></span>
		<input type="text" name="fname" required size="30" maxlength="100"/>
		</p>
		
		<p>
		<span id="label"><label>Last Name</label></span>
		<input type="text" name="lname" required size="30" maxlength="100"/>
		</p>
		
		<p>
		<span id="label"><label>Gender</label></span>
		<select id="gender" name="gender">
			<option value="Prefer not to say">Prefer not to say</option>
			<option value="Female">Female</option>
			<option value="Male">Male</option>
		</select>
		</p>
		
		<p style="height:15%;">
		<span id="label" style="vertical-align: top;"><label>Address</label></span>
		<textarea name="address" form="memberadd"></textarea>
		</p>
		
		<p>
		<span id="label"><label>Contact</label></span>
		<input type="text" name="contact" size="30" maxlength="100" />
		</p>
		
		<p>
		<span id="label"><label>Type</label></span>
		<select id="type" name="type">
			<option value="2">Teacher</option>
			<option value="20">Employee</option>
			<option value="21">Non-Teaching</option>
			<option value="22">Student</option>
			<option value="32">Contruction</option>
		</select>
		</p>
		
		<p>
		<span id="label"><label>Year Level</label></span>
		<select id="yearlvl" name="yearlvl">
			<option value="Faculty">Faculty</option>
			<option value="First Year">First Year</option>
			<option value="Second Year">Second Year</option>
			<option value="Third Year">Third Year</option>
		</select>
		</p>
		
		<p>
		<span id="label"><label>Status</label></span>
		<select id="status" name="status">
			<option value="Active">Active</option>
			<option value="Banned">Banned</option>
		</select>
		</p>
		
		<div id="bottom">
			<div id="cancel">
			<a href="G22_member_view.php?cancel" onclick="return confirmation();">
			<input type="button" name="cancel" value="CANCEL"/>
			</a>
			</div>
			<div id="subbtn">
			<input type="submit" name="subbtn" value="SUBMIT"/>
			</div>
		</div>
		<div style="clear:both"></div>	
	</form>
</body>

</html>

<?php

	if(isset ($_POST["subbtn"]))
	{
		//$bing_id=getid();
		$firstname=$_POST["fname"];
		$lastname=$_POST["lname"];
		$gender=$_POST["gender"];
		$address=$_POST["address"];
		$contact=$_POST["contact"];
		$type_id=$_POST["type"];
		$year_level=$_POST["yearlvl"];
		$status=$_POST["status"];
		
		$add="insert into member(firstname, lastname, gender, address, contact, type_id, year_level, status) values 
		('$firstname', '$lastname', '$gender', '$address', '$contact', '$type_id', '$year_level', '$status')";
		
		if(mysqli_query($connect, $add))
		{
			echo'<script>alert("ADDED SUCCESSFULLY");</script>';
			echo'<script>window.location="G22_member_view.php";</script>';
		}
		else
		{
			echo"FAIL TO ADD".mysqli_error($connect);
		}
	}
	else if(isset ($_REQUEST["cancel"]))
	{
		echo'<script>window.location="G22_member_view.php";</script>';
	}
?>