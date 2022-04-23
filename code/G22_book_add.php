<?php include("G22_dataconnection.php")?>

<html>
	
<head>
	<title>MYNottingham Library</title>
	<link rel="icon" href="G22_image/nottlogo.jpg" type="image/jpg">
	
	<style>
		body{font-family: Times New Roman;}
		
		h1{text-align:center;font-size: 5.5vw;margin-top:2%;margin-bottom:2%;}
		form{font-size:1.25vw; width:60%; margin-left: auto; margin-right: auto; background-color: #f0f0f0; text-align: center; padding-top: 2%; padding-bottom:2%; border-radius: 5px;}
		#label{width: 15%;  display: inline-block; text-align:right; margin-right: 5%;}
		form p{height: 7%;}
		input, select{height: 55%; border-radius: 5px; border: 1px solid grey; width: 35%; font-size:1.05vw;}
		input:hover, select:hover{background-color: #f7f7f7;}
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
	
	<h1>Add New Book</h1>
	<hr/>
	<br/><br/>
	<form method="post">
		<h2>Details</h2>
		<br/>
		<p>
		<span id="label"><label>Book Title</label></span>
		<input type="text" name="title" required size="30" maxlength="100"/>
		</p>
		
		<p>
		<span id="label"><label>Category ID</label></span>
		<select id="catid" name="catid">
			<option value="1">1 - Periodical</option>
			<option value="2">2 - English</option>
			<option value="3">3 - Math</option>
			<option value="4">4 - Science</option>
			<option value="5">5 - Encylopedia</option>
			<option value="6">6 - Filipiniana</option>
			<option value="7">7 - Newspaper</option>
			<option value="8">8 - General</option>
			<option value="9">9 - References</option>
		</select>
		</p>
		
		<p>
		<span id="label"><label>Author</label></span>
		<input type="text" name="author" required size="30" maxlength="100"/>
		</p>
		
		<p>
		<span id="label"><label>Book Copies</label></span>
		<input type="number" step="1" value="1" min="1"name="copies" required />
		</p>
		
		<p>
		<span id="label"><label>Book Publisher</label></span>
		<input type="text" name="bookppub" size="30" maxlength="100"/>
		</p>
		
		<p>
		<span id="label"><label>Publisher Name</label></span>
		<input type="text" name="pubname" size="30" maxlength="100"/>
		</p>
		
		<p>
		<span id="label"><label>ISBN</label></span>
		<input type="text" name="isbn" size="30" maxlength="100"/>
		</p>
		
		<p>
		<span id="label"><label>Copyright Year</label></span>
		<input type="number" name="copyright" min="1800" max="2099" step="1" value="2022" />
		</p>
		
		<p>
		<span id="label"><label>Date Receive</label></span>
		<input type="datetime-local" name="date_receive" size="30" maxlength="100" />

		</p>
		
		<p>
		<span id="label"><label>Date Added</label></span>
		<input type="datetime-local" name="date_added" size="30" maxlength="100" />
		</p>
		
		<p>
		<span id="label"><label>Status</label></span>
		<select id="status" name="status">
			<option value="New">New</option>
			<option value="Archieve">Archieve</option>
			<option value="Damage">Damage</option>
			<option value="Lost">Lost</option>
			<option value="Old">Old</option>
		</select>
		</p>
		
		<div id="bottom">
			<div id="cancel">
			<a href="G22_book_view.php?cancel" onclick="return confirmation();">
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
		$book_title=$_POST["title"];
		$category_id=$_POST["catid"];
		$author=$_POST["author"];
		$book_copies=$_POST["copies"];
		$book_pub=$_POST["bookppub"];
		$publisher_name=$_POST["pubname"];
		$isbn=$_POST["isbn"];
		$copyright_year=$_POST["copyright"];
		$date_receive=$_POST["date_receive"];
		$date_added=$_POST["date_added"];
		$status=$_POST["status"];
		
		$add="insert into book(book_title, category_id, author, book_copies, book_pub, publisher_name, isbn, copyright_year, date_receive, date_added, status) values 
		('$book_title', '$category_id', '$author', '$book_copies', '$book_pub', '$publisher_name', '$isbn', '$copyright_year', '$date_receive', '$date_added', '$status')";
		
		if(mysqli_query($connect, $add))
		{
			echo'<script>alert("ADDED SUCCESSFULLY");</script>';
			echo'<script>window.location="G22_book_view.php";</script>';
		}
		else
		{
			echo"FAIL TO ADD".mysqli_error($connect);
		}
	}
	else if(isset ($_REQUEST["cancel"]))
	{
		echo'<script>window.location="G22_book_view.php";</script>';
	}
?>