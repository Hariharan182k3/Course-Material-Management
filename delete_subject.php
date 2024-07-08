<?php
	include"config.php";
	session_start();

	$sql="delete from  tbl_subject where subid='{$_GET['id']}'";
	$con->query($sql);
	flash("msg","Subject Deleted Successfully","danger");
	header("location:view_subject.php");
?>