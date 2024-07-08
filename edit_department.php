<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"]))
	{
		$department=$_POST["department"];
		
		$sql="update tbl_department set department='{$department}' where did='{$_GET['id']}'";
		if($con->query($sql))
		{
			flash("msg","Department name changed");
		}
		else
		{
			flash("msg","Invalid Record");
		}
	}
	$sql="select * from tbl_department where did={$_GET['id']}";
	$res=$con->query($sql);
	$row=$res->fetch_assoc();
?>

<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php include"admin_navbar.php"; ?>
		<div class='container-fluid '>
		<div class='row'>
				<div class='col-md-3'>
					<?php include "admin_sidebar.php"; ?>
				</div>
				<div class='col-md-8 mt-5'>
					<nav aria-label="breadcrumb" class=''>
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href='add_department.php' class=''>Departments</a></li>
						<li class="breadcrumb-item"><a href='view_department.php' class=''>View Departments</a></li>
						<li class="breadcrumb-item"><a href='' class='text-dark'>Edit</a></li>
					  </ol>
					</nav>
					<?php
						flash("msg");
					?>
					<form method="post">
						<div class="form-group">
							<label>Department</label>
							<input type='text' class='form-control' name='department' value="<?php echo $row["department"]; ?>">
						</div>
					  <button type="submit" name='submit' class="btn btn-primary ">Submit</button>
					</form>	
				</div>
		</div>
	</div>

	<?php
		include"footer.php"; 
	?>
	</body>
</html>