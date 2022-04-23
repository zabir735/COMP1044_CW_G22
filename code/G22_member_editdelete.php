<?php include("G22_dataconnection.php")?>

<html>
<head>
	<title>MYNottingham Library</title>
	<link rel="icon" href="G22_image/nottlogo.jpg" type="image/jpg">
	<style>
	body{position: relative;}
	#ccc{padding-bottom: 7%;}
	h1{text-align:center;font-size: 4.2vw;margin-top:2%;margin-bottom:2%;}
	#up{margin-right: auto; margin-left: auto; margin-top: 2%; width:95%;height: 4%;}
	#search{float:left; width: 20%;}
	#search input[type="text"]{height:100%; width:100%; border-radius:5px; border: 2px solid grey; font-size: 1vw;}
	#add{float:right; width: 11%;}
	#add a{color: white; text-decoration: none;}
	#add a:visited{border:none;}
	#add button{color:white; background-color: #4682B4; width: 100%; border:none; border-radius:5px; font-size: 1vw;}
	#add button:hover{color:white; background-color: #3C6F99; width: 100%; border:none;}

	#addtext{padding-left: 5px;}
	#table{margin-left:auto; margin-right:auto; border-spacing: 0px; border: 1px solid black; border-left:none; border-right:none; width: 95%;margin-bottom:1%;}
	#table tr{height: 40px; font-size: 1.1vw;}
	#table th{background-color: #D3D3D3;}
	#table th, td{text-align: left}
	#table td{border-bottom: 1px solid black;}
	#thbtn{margin: auto; text-align: right;}
	#table button{style="background-color:#4682B4;"}
	#edit button{background-color: #4682B4; font-size: 1vw;}
	#edit button:hover{background-color: #3C6F99; }
	#dlt button{background-color:#DC143C; font-size: 1vw;}
	#dlt button:hover{background-color:#BF1134;}
	button{margin: auto; width:90%; height:30px; border:none; border-radius:5px; color: white; text-align: center;}
	</style>
	
	<script type="text/javascript">
	function confirmation()
	{
		answer = confirm("Do you sure want to delete?");
		return answer;
	}
	
	function myFunction() 
	{
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("table");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) 
		{
			td = tr[i].getElementsByTagName("td")[1];
			if (td) 
			{
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) 
				{
					tr[i].style.display = "";
				} 
				else 
				{
					tr[i].style.display = "none";
				}
			}       
		}
	}
	</script>
</head>

<body>
	<div id="ccc">
	<?php include("G22_header.php");?>
	<div style="clear:both"></div>	
	
	<h1>Member</h1>
	<hr/>
	
	<div id="up">
		<div id="search">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for name.." title="Type in a name">
		</div>
	</div>
	<br/>
	
	<div style="clear:both"></div>
	
	<table id="table">
		<tr>
			<th style="width: 3%;">ID</th>
			<th style="width: 23%; ">First name</th>
			<th style="width: 15%; ">Last name</th>
			<th style="width: 9%; ">Gender</th>
			<th style="width: 6%;">Contact</th>
			<th style="width: 10%; ">Address</th>
			<th style="width: 8%; ">year level</th>
			<th style="width: 6%;">Status</th>
			
			<div class="thbtn" style="text-align: right;">
			<th style="width: 5%; "></th>
			<th style="width: 7%; "></th>
			</div>
		</tr>
		<?php
			$data="SELECT * FROM member ORDER BY member_id";
			$result=mysqli_query($connect, $data);
			
			if(mysqli_num_rows($result)>0) //if there are data
			{
				while($row=mysqli_fetch_array($result))
				{
					?>
					<tr>
						<td><?php echo $row["member_id"]; ?></td>
						<td><?php echo $row["firstname"]; ?></td>
						<td><?php echo $row["lastname"]; ?></td>
						<td><?php echo $row["gender"]; ?></td>
						<td><?php echo $row["contact"]; ?></td>
						<td><?php echo $row["address"]; ?></td>
						<td><?php echo $row["year_level"]; ?></td>
						<td><?php echo $row["status"]; ?></td>	
						
						<td>
							<div id="edit">
								<a href="G22_member_edit.php?edit&id=<?php echo $row["member_id"];?>">
								<button>
									<span id="btntext">Edit</span>
								</button>
								</a>
							</div>
						</td>
						
						<td>
							<div id="dlt">
								<a href="G22_member_editdelete.php?del&id=<?php echo $row["member_id"];?>" onclick="return confirmation();">
								<button>
									<span id="btntext">Delete</span>
								</button>
								</a>
							</div>
						</td>
					</tr>
					<?php
				}
			}
			
			else
			{
				echo"0 results";
			}
		?>
	</table>
	</div>
	<div style="clear:both"></div>
	<?php include("G22_footer.php");?>
	
</body>
</html>

<?php
	if(isset($_REQUEST["del"])) 
	{
		$id = $_REQUEST["id"]; 
		mysqli_query($connect, "DELETE FROM member WHERE member_id=$id");
		
		echo'<script>window.location="G22_member_view.php";</script>';
	}
?>