<?php include("G22_dataconnection.php")?>

<html>
	
<head>
	<title>MYNottingham Library</title>
	<link rel="icon" href="G22_image/nottlogo.jpg" type="image/jpg">
	
	<style>
		body{background-color: #FDF5E6; font-family: Times New Roman;}
		h1{text-align:center;font-size: 5.5vw;margin-top:2%;margin-bottom:2%;}
		form{font-size:1.25vw; width:60%; margin-left: auto; margin-right: auto; background-color: #f0f0f0; text-align: center; padding-top: 2%; padding-bottom:2%;}
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
	
	<?php
		if(isset($_REQUEST["edit"]))
		{
			$id=$_REQUEST["id"];
			$update=true;
			$data="SELECT * FROM book JOIN category on category.category_id=book.category_id WHERE book_id=$id";
			$result=mysqli_query($connect, $data);
				
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_array($result);
				
				$id=$row["book_id"];
				$title=$row["book_title"];
				$catid=$row["category_id"];
				$author=$row["author"];
				$copies=$row["book_copies"];
				$bookpub=$row["book_pub"];
				$pubname=$row["publisher_name"];
				$isbn=$row["isbn"];
				$copyright=$row["copyright_year"];
				$dreceive=$row["date_receive"];
				$dadded=$row["date_added"];
				$statuss=$row["status"];
			}
		}
	?>
	
	<h1>Update Book Details</h1>
	<hr/>
	<br/><br/>
	<form method="post">
		<h2>Details</h2>
		<br/>
		
		<input type="hidden" name="bookid" value="<?php echo $id; ?>">

		
		<p>
		<span id="label"><label>Book Title</label></span>
		<input type="text" name="title" required size="30" maxlength="100" value="<?php echo $title ?>"/>
		</p>
		
		<p>
		<span id="label"><label>Category ID</label></span>
		<select id="catid" name="cateid">
			<option value="<?php $catid; ?>" selected disabled hidden><?php echo $catid ?> - <?php echo $row["classname"]?></option>
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
		<input type="text" placeholder="eg: bingsu/yogurt bingsu.jpg" name="author" required size="30" maxlength="100" value="<?php echo $author ?>"/>
		</p>
		
		<p>
		<span id="label"><label>Book Copies</label></span>
		<input type="number" step="1" min="1"name="copies" required value="<?php echo $copies ?>"/>
		</p>
		
		<p>
		<span id="label"><label>Book Publisher</label></span>
		<input type="text" name="bookppub" size="30" maxlength="100" value="<?php echo $bookpub ?>"/>
		</p>
		
		<p>
		<span id="label"><label>Publisher Name</label></span>
		<input type="text" name="pubname" size="30" maxlength="100" value="<?php echo $pubname ?>"/>
		</p>
		
		<p>
		<span id="label"><label>ISBN</label></span>
		<input type="text" name="isbn" size="30" maxlength="100" value="<?php echo $isbn ?>"/>
		</p>
		
		<p>
		<span id="label"><label>Copyright Year</label></span>
		<input type="number" name="copyright" min="1800" max="2099" step="1" value="2022" value="<?php echo $copyright ?>"/>
		</p>
		
		<p>
		<span id="label"><label>Date Receive</label></span>
		<input type="text" name="date_receive" size="30" maxlength="100" placeholder="yyyy-mm-dd hh:mm:ss (24 hour format)" value="<?php echo $dreceive ?>"/>
		</p>
		
		<p>
		<span id="label"><label>Date Added</label></span>
		<input type="text" name="date_added" size="30" maxlength="100" placeholder="yyyy-mm-dd hh:mm:ss (24 hour format)" value="<?php echo $dadded ?>"/>
		</p>
		
		<p>
		<span id="label"><label>Status</label></span>
		<select id="status" name="status">
			<option value="<?php $statuss ?>" selected disabled hidden><?php echo $statuss ?></option>
			<option value="New">New</option>
			<option value="Archieve">Archieve</option>
			<option value="Damage">Damage</option>
			<option value="Lost">Lost</option>
			<option value="Old">Old</option>
		</select>
		</p>
		
		<div id="bottom">
			<div id="cancel">
				<a href="G22_book_editdelete.php?cancel" onclick="return confirmation();">
				<input type="button" name="cancel" value="CANCEL"/>
				</a>
			</div>
			<div id="subbtn">
				<?php if($update==true): ?>
				<input type="submit" name="subbtn" value="UPDATE"/>
				<?php else: ?>
				<input type="submit" name="subbtn" value="SAVE"/>
				<?php endif ?>
			</div>
		</div>
		<div style="clear:both"></div>	
	</form>
</body>

</html>

<?php
	
	if(isset ($_POST["subbtn"]))
	{
		$book_id=$_POST["bookid"];
		$book_title=$_POST["title"];
		$category_id=$_POST["cateid"];
		$author=$_POST["author"];
		$book_copies=$_POST["copies"];
		$book_pub=$_POST["bookppub"];
		$publisher_name=$_POST["pubname"];
		$isbn=$_POST["isbn"];
		$copyright_year=$_POST["copyright"];
		$date_receive=$_POST["date_receive"];
		$date_added=$_POST["date_added"];
		$status=$_POST["status"];
		
		if($category_id==NULL)
		{
			$category_id=$catid;
		}
		if($status==NULL)
		{
			$status=$statuss;
		}
		
		$edit="UPDATE book SET book_title='$book_title', category_id='$category_id', author='$author', book_copies='$book_copies', book_pub='$book_pub', 
		publisher_name='$publisher_name', isbn='$isbn', copyright_year='$copyright_year', date_receive='$date_receive', date_added='$date_added', status='$status' 
		WHERE book_id=$book_id";
		
		if(mysqli_query($connect, $edit))
		{
			echo'<script>alert("UPDATED SUCCESSFULLY");</script>';
			echo'<script>window.location="G22_book_view.php";</script>';
		}
		else
		{
			echo"FAIL TO UPDATE".mysqli_error($connect);
		}
	}
	else if(isset ($_REQUEST["cancel"]))
	{
		echo'<script>window.location="G22_book_view.php";</script>';
	}
?>