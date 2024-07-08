<?php
	include"config.php";
	session_start();
?>
<html>
	<head>
		<title></title>
	<?php include"header.php";?>
	</head>
<?php
	include"staff_navbar.php";
?>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <?php include"staff_sidebar.php";?>
        </div>
        <div class="col-9 mt-5">
            <h3><i class="fa fa-indent" aria-hidden="true"></i> Dashboard</h3><hr>
            <div class="alert alert-primary" role="alert">
                Welcome to <?php echo $_SESSION["name"];?>
            </div>  
        </div>

    </div>
</div>


<?php
	include'footer.php';
?>
</body>

</html>