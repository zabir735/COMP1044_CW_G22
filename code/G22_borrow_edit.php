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
		#bottom input:hover{background-color: #004466;}
		#dater{display:none;}
	</style>
	
	<script type="text/javascript">
		function confirmation()
		{
			answer = confirm("Do you sure want to cancel? Your data won't be saved.");
			return answer;
		}

		 function showresult(id, elementValue) 
		{
			if(elementValue.value == "returned")
			{
				document.getElementById("dater").style.display = 'block';
				document.getElementById("dater2").remove(dater2);
				document.getElementById("dater1").required = true;
			}
			else
			{
				document.getElementById("dater").style.display = 'none';
				document.getElementById("dater2").remove(dater2);
			}
			//document.getElementById("dater2").element.remove = elementValue.value == "pending";
			//document.getElementById("dater").style.display = 'block' : 'none';
			//document.getElementById("dater1").required = true;
		}
		
		function unchangeable()
		{
			alert("Unchangeable."); 
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
			$data="SELECT * FROM borrowdetails 
			JOIN book on book.book_id=borrowdetails.book_id 
				JOIN borrow on borrow.borrow_id=borrowdetails.borrow_id 
				JOIN member on member.member_id=borrow.member_id
				WHERE borrow_details_id=$id";
			$result=mysqli_query($connect, $data);
				
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_array($result);
				
				$id=$row["borrow_details_id"];
				$borrowid=$row["borrow_id"];
				$bookid=$row["book_id"];
				$booktitle=$row["book_title"];
				$memid=$row["member_id"];
				$memfname=$row["firstname"];
				$memlname=$row["lastname"];
				$dateborrow=$row["date_borrow"];
				$duedate=$row["due_date"];
				$bstatus=$row["borrow_status"];
				$datereturn=$row["date_return"];
			}
		}
	?>
	
	<h1>Update Borrow Details</h1>
	<hr/>
	<br/><br/>
	<form method="post" id="memberadd">
		<h2>Details</h2>
		<br/>
		
		<input type="hidden" name="bid" value="<?php echo $id; ?>" />
		<?php $show=false; ?>
		
		<p>
		<span id="label"><label>Borrow ID</label></span>
		<input type="text" name="boid" value="<?php echo $borrowid ?>" readonly onclick="unchangeable()"  onMouseOver="this.style.backgroundColor='#FFFFFF'" />
		</p>
		
		<p>
		<span id="label"><label>Book</label></span>
		<input type="text" name="bookd" value="<?php echo $bookid." - " .$booktitle ?>" readonly onclick="unchangeable()" onMouseOver="this.style.backgroundColor='#FFFFFF'"/>
		</p>
		
		<p>
		<span id="label"><label>Member</label></span>
		<input type="text" name="memd" value="<?php echo $memid." - ".$memfname." ".$memlname?>" readonly onclick="unchangeable()" onMouseOver="this.style.backgroundColor='#FFFFFF'"/>
		</p>
		
		<p>
		<span id="label"><label>Date Borrow</label></span>
		<input type="text" name="dboo" value="<?php echo $dateborrow?>" required placeholder="yyyy-mm-dd hh:mm:ss (24hours format)" />
		</p>
		
		<p>
		<span id="label"><label>Due Date</label></span>
		<input type="date" name="due" value="<?php echo $duedate?>" required />
		</p>
		
		<p>
		<span id="label"><label for="bstat">Borrow Status</label></span>
		<select id="bstat" name="bstat" onchange="showresult('dater', this)">
			<option value="<?php $bstatus; ?>" selected disabled hidden><?php echo $bstatus ?></option>
			<option value="pending">pending</option>
			<option value="returned">returned</option>
		</select>		
		</p>
		
		<?php 
		if($bstatus=="returned")
		{
		?>
			<div id="dater2">
			<p>
			<span id="label"><label>Date Return</label></span>
			<input type="text" name="dater10" value="<?php echo $datereturn ?>" required placeholder="yyyy-mm-dd hh:mm:ss (24hours format)"/>
			</p>
			</div>
		<?php
		}?>
		
		<div id="dater">
		<p>
		<span id="label"><label>Date Return</label></span>
		<input type="datetime-local" name="dater" id="dater1" <?php if($show==true){echo "required";}?>/>
		</p>
		</div>
		
		
		<div id="bottom">
			<div id="cancel">
			<a href="G22_borrow_editdelete.php?cancel" onclick="return confirmation();">
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
		$borrow_details_id=$_POST["bid"];
		$borrow_id=$_POST["boid"];
		$date_borrow=$_POST["dboo"];
		$due_date=$_POST["due"];
		$borrow_status=$_POST["bstat"];
		$date_return=$_POST["dater"];
		
		if($borrow_status==NULL)
		{
			$borrow_status=$bstatus;
			$date_return=$_POST["dater10"];
		}
		if($borrow_status=="pending")
		{
			$date_return=NULL;
		}
		
		$edit="UPDATE borrowdetails SET borrow_status='$borrow_status', date_return='$date_return' 
		WHERE borrow_details_id=$borrow_details_id";
		
		//$edit="UPDATE borrow SET date_borrow='$date_borrow', due_date='$due_date' WHERE borrow_id=$borrow_id";
		 
		if(mysqli_query($connect, $edit))
		{
			echo'<script>alert("UPDATED SUCCESSFULLY");</script>';
			echo'<script>window.location="G22_borrow_editdelete.php";</script>';
		}
		else
		{
			echo"FAIL TO UPDATE".mysqli_error($connect);
		}
	}
	else if(isset ($_REQUEST["cancel"]))
	{
		echo'<script>window.location="G22_borrow_editdelete.php";</script>';
	}
?>