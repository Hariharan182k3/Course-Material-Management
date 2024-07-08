<?php
	include"config.php";
	session_start();

	$sql="delete from  tbl_department where did={$_GET['id']}";
	$con->query($sql);
	flash("msg","Department Deleted Successfully","danger");
	header("location:view_department.php");
?>
