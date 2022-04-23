<?php include("G22_dataconnection.php")?>

<html>
    <head>
        <title>MYNottingham Library</title>
        <link rel="icon" href="G22_image/nottlogo.jpg" type="image/jpg">
        <style>
            body{position:relative;}
            #ccc{padding-bottom:7%;}
            h1{text-align:center; font-size:4vw; margin-top:2%; margin-bottom:2%;}
            #up{margin-right: auto; margin-left: auto; margin-top: 2%; width:95%;height: 4%;}
			#search{float:left; width: 20%;}
			#search input[type="number"]{height:100%; width:100%; border-radius:5px; border: 2px solid grey; font-size: 1vw;}
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
			button{margin: auto; width:90%; height:30px; border:none; border-radius:5px; color: white; text-align: center;}
	</style>
	
	<script type="text/javascript">
	function myFunction() 
	{
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("table");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) 
		{
			td = tr[i].getElementsByTagName("td")[8];
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
	
	<h1>BORROW DETAILS</h1>
	<hr/>
	
	<div id="up">
		<div id="search">
			<input type="number" id="myInput" onkeyup="myFunction()" placeholder="Search for borrow status.."><br/>
		</div>
	</div>
	<br/>
	
	<div style="clear:both"></div>
	
	<table id="table">
		<tr>
			<th style="width: 3%;">ID</th>
			<th style="width: 6%; ">Borrow ID</th>
			<th style="width: 5%; ">Book ID</th>
			<th style="width: 15%; ">Book Title</th>
			<th style="width: 7%; ">Member ID</th>
			<th style="width: 13%; ">Member Name</th>
			<th style="width: 8%;">Date Borrow</th>
			<th style="width: 6%; ">Due Date</th>
			<th style="width: 8%; ">Borrow Status</th>
			<th style="width: 8%;">Date Return</th>
		</tr>
		<?php
			$data="SELECT * FROM borrowdetails JOIN book on book.book_id=borrowdetails.book_id 
				JOIN borrow on borrow.borrow_id=borrowdetails.borrow_id JOIN member on member.member_id=borrow.member_id
				ORDER BY borrow_details_id";			
			$result=mysqli_query($connect, $data);
			
			if(mysqli_num_rows($result)>0) //if there are data
			{
				while($row=mysqli_fetch_array($result))
				{
					?>
					<tr>
						<td><?php echo $row["borrow_details_id"]; ?></td>
						<td><?php echo $row["borrow_id"]; ?></td>
						<td><?php echo $row["book_id"]; ?></td>
						<td><?php echo $row["book_title"]; ?></td>
						<td><?php echo $row["member_id"]; ?></td>
						<td><?php echo $row["firstname"]." ".$row["lastname"]; ?></td>
						<td><?php echo $row["date_borrow"]; ?></td>
						<td><?php echo $row["due_date"]; ?></td>
						<td><?php echo $row["borrow_status"]; ?></td>
						<td><?php echo $row["date_return"]; ?></td>	
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