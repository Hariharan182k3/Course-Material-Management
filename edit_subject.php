<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"]))
	{
		$subnm=$_POST["subnm"];
		$year=$_POST["year"];
		$semester=$_POST["semester"];
		$department=$_POST["department"];
		
		$sql="update tbl_subject set subnm='{$subnm}',year='{$year}',semester='{$semester}',department='{$department}' where subid='{$_GET['id']}'";
		if($con->query($sql))
		{
			flash("msg","Subject Details Added Successfulluy");
		}
		else
		{
			flash("msg","Subject Details not Added");
		}
	}
	$sql="select * from tbl_subject d inner join tbl_department r on r.did=d.department";
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
						<li class="breadcrumb-item"><a href='add_subject.php' class=''>Subjects</a></li>
						<li class="breadcrumb-item"><a href='view_subject.php' class=''>View Subjects</a></li>
						<li class="breadcrumb-item"><a href='' class='text-dark'>Edit</a></li>
					  </ol>
					</nav>
					<?php
						flash("msg");
					?>
					<?php
						$sql="select * from tbl_subject where subid='{$_GET["id"]}'"; 
						$res=$con->query($sql);
						$rw=$res->fetch_assoc();
					?>
					<form method="post">
						<div class="form-group">
							<label>name</label>
							<input type='text' class='form-control' name='subnm' value="<?php echo $rw["subnm"]; ?>">
						</div>
						<div class="form-group">
							<label>Year</label>
							<input type='text' class='form-control' name='year' value="<?php echo $rw["year"]; ?>">
							
						</div>
						<div class="form-group">
							<label>Semester</label>
							<input type='text' class='form-control' name='semester' value="<?php echo $rw["semester"]; ?>">
						</div>
						<div class="form-group">
							<label>Departments</label>
							<select class="form-control" name='department'>
								<?php
									$sql="select * from tbl_department";
									$res=$con->query($sql);
									while($r=$res->fetch_assoc()){
										if($row["did"]==$r["departments"]){
											echo "<option selected value='{$r["did"]}'>{$r["department"]}</option>";
										}	
										else
										{
											echo "<option value='{$r["did"]}'>{$r["department"]}</option>";
										}
									} 
								?>
							</select>
                        </select>
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