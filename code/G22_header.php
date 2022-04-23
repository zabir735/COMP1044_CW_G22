<?php include("G22_dataconnection.php"); ?>
<html>
<head>
<link rel="stylesheet" href="G22_header.css">
</head>

<body>
	<div id="header">
		<nav>
			<div id="homelogo">
			<img src="G22_image/home.png"></img>
			</div>
			
			<dl>
			<div id="center">
			<div id="aa">
			<a href="G22_index.php"><dt><p> HOME </p></dt></a>
			</div>
			<div id="drop"><a href="G22_book_view.php"><dt><p> BOOK </p></dt></a>
				<div id="dropcontent">
					<a href="G22_book_view.php"> View </a>
					<a href="G22_book_add.php"> Add </a>
					<a href="G22_book_editdelete.php"> Update </a>
					<a href="G22_book_editdelete.php"> Delete </a>
				</div>
			</div>
			<div id="drop"><a href="G22_member_view.php"><dt><p> MEMBER </p></dt></a>
				<div id="dropcontent">
					<a href="G22_member_view.php"> View </a>
					<a href="G22_member_add.php"> Add </a>
					<a href="G22_member_editdelete.php"> Update </a>
					<a href="G22_member_editdelete.php"> Delete </a>
				</div>
			</div>
			<div id="drop"><a href="G22_borrow_view.php"><dt><p> BORROW DETAILS </p></dt></a>
				<div id="dropcontent">
					<a href="G22_borrow_view.php"> View </a>
					<a href="G22_borrow_editdelete.php"> Update </a>
					<a href="G22_borrow_editdelete.php"> Delete </a>
				</div>
			</div>
			<div id="drop"><a href="#"><dt><p> BORROW REPORT </p></dt></a>
				<div id="dropcontent">
					<a href="G22_borrowreport_book.php"> Book </a>
					<a href="G22_borrowreport_member.php"> Member </a>
				</div>
			</div>
			</div>
			</dl>
			
			<div id="userimg"><img src="G22_image/user.png" alt="userLogin" title="User"/>
				<div id="userdropcontent" style="right:0.5%">
					<a href="G22_user_chgpw.php"> Change Password</a>
					<a href="G22_login.php"> Log Out </a>
				</div>
			</div>
		</nav>
	</div>
</body>
</html>