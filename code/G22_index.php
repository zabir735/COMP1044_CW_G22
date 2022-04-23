<html>

<head>
	<title>MYNottingham Library</title>
	<link rel="icon" href="G22_image/nottlogo.jpg" type="image/jpg">
	
	<style>
		h1{text-align:center; margin: 3% 0% 5% 0%;}
		#content, #contentword{width: 90%; margin-left:auto; margin-right:auto; margin-top: 3%; text-align:center;}
		#content span, #contentword span{float:left; width:33%;}
		#content span img{width: 45%;}
		#contentword span{font-size: 1.25vw; font-weight: bold;}
	</style>
</head>

<body>
	<?php include("G22_header.php");?>
	<div style="clear:both"></div>	
	
	<h1>Welcome to MYNottingham Library</h1>
	
	<div id="content">
		<span><a href="G22_book_view.php"><img src="G22_image/bookicon.png"></img></a></span>
		<span><a href="G22_member_view.php"><img src="G22_image/membericon.png"></img></a></span>
		<span><a href="G22_borrow_view.php"><img src="G22_image/borrowdetailsicon.png"></img></a></span>
	</div>
	<div style="clear:both"></div>
	<div id="contentword">
		<span>BOOK</span>
		<span>MEMBER</span>
		<span>BORROW DETAILS</span>
	</div>
	
	<div style="clear:both"></div>
	<?php include("G22_footer.php");?>
</body>

</html>