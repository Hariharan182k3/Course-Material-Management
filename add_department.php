<?php
	include"config.php";
	session_start();
    if(isset($_POST["submit"]))
	{	
		$department=$_POST["department"];
		
		$sql="insert into tbl_department (department) values ('{$department}')";
		if($con->query($sql))
		{
			flash("msg","Department Added Successfully");
		}
		else
		{
			flash("msg","Department Not Added");
		}
	
	}	
?>

<html>
	<head>
		<title>
		</title>
		<?php include"header.php";?>
	</head>

<?php
	include"admin_navbar.php";
?>
<body>
		<div class='container-fluid'>
			<div class='row'>
				
				<div class='col-md-3'>
					<?php include"admin_sidebar.php"; ?>
				</div>
				<div class='col-md-8 mt-5'>
					<h3>Add Department</h3><hr>
					<form method='post'  enctype='multipart/form-data' >
						<?php flash("msg");?>
						<div class='row'>
							<div class='col-md-6'>
								<div class=' form-group '>
									<label>Department Name</label>
									<input type="text" name="department" class='form-control'>
								</div>
                                <input type="submit" name="submit" class='btn btn-success'>
								</div>
							</div>
						</div>
				    </form>
				</div>
			</div>
		</div>
		
	<script>
	
	function ok(ele,e)
		{
		var k=e.keyCode;
		var n=Number(ele.value+e.key); 
		if(k>=48 && k<=57 && n<=12345678910)  
		{
			
		}
		else
		{
		e.preventDefault();
		}

		}
	
	</script>
<?php include"footer.php" ?>
</body>
</html>
