<?php include("G22_dataconnection.php")?>

<html>
    <head>
        <title>MYNottingham Library</title>
        <link rel="icon" href="G22_image/nottlogo.jpg" type="image/jpg">
        <style>
            body{position:relative;}
            #ccc{padding-bottom:7%;}
            h1{text-align:center; font-size:4vw; margin-top:2%; margin-bottom:2%;}
            #up{margin-right: auto; margin-left: auto; margin-top: 2%; width:85%;height: 4%;}
			#search{float:left; width: 20%;}
			#search input[type="text"]{height:100%; width:100%; border-radius:5px; border: 2px solid grey; font-size: 1vw;}
			#add{float:right; width: 11%;}
			#add a{color: white; text-decoration: none;}
			#add a:visited{border:none;}
			#add button{color:white; background-color: #4682B4; width: 100%; border:none; border-radius:5px; font-size: 1vw;}
			#add button:hover{color:white; background-color: #3C6F99; width: 100%; border:none;}
			#addtext{padding-left: 5px;}
			#table{margin-left:auto; margin-right:auto; border-spacing: 0px; border: 1px solid black; border-left:none; border-right:none; width: 85%;margin-bottom:1%;}
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
	
	<h1>BORROW REPORT</h1>
	<hr/>
	
	<div id="up">
		<div id="search">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for book title.." ><br/>
		</div>
	</div>
	<br/>
	
	<div style="clear:both"></div>
	
	<table id="table">
		<tr>
			<th style="width: 3%; ">Book ID</th>
			<th style="width: 15%; ">Book Title</th>
			<th style="width: 8%;">Number of times borrowed by member</th>
		</tr>
		<?php
			$data="SELECT *, COUNT(borrowdetails.book_id) FROM borrowdetails RIGHT JOIN book on book.book_id=borrowdetails.book_id 
			GROUP BY book.book_id";			
			$result=mysqli_query($connect, $data);
			
			if(mysqli_num_rows($result)>0) //if there are data
			{
				while($row=mysqli_fetch_array($result))
				{
					?>
					<tr>
						<td><?php echo $row["book_id"]; ?></td>
						<td><?php echo $row["book_title"]; ?></td>
						<td><?php echo $row["COUNT(borrowdetails.book_id)"]; ?></td>
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