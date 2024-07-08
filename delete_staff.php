<?php
	include"config.php";
	session_start();

	$sql="delete from  tbl_staff where sid={$_GET['id']}";
	$con->query($sql);
	flash("msg","Department Deleted Successfully","danger");
	header("location:view_staffs.php");
?>