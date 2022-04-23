<?php
	$connect = mysqli_connect("localhost","root","", "library");
	
	if(!$connect)
	{
		die('Could not Connect MySql Server:' .mysql_error());
	}
?>