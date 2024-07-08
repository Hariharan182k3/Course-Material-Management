<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"]))
	{	
		$name=$_POST["name"];
		$roll_no=$_POST["roll_no"];
		$birth=$_POST["birth"];
		$year=$_POST["year"];
		$semester=$_POST["semester"];
		$department=$_POST["department"];
		
		$sql="insert into tbl_student (name,roll_no,birth,year,semester,department) values ('{$name}','{$roll_no}','{$birth}','{$year}','{$semester}','{$department}')";
        if($con->query($sql))
		{
			flash("msg","Student Details Added Successfully");
		}
		else
		{
			flash("msg","Student Details not Added");
		}
	
	}
?>

<html>
	<head>
		<title>
		</title>
	<?php
		include"header.php";
	?>
	</head>
	<body>
	<?php include"staff_navbar.php"; ?>
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-3'>
					<?php include "staff_sidebar.php"; ?>
				</div>

				<div class='col-md-8 mt-5'>
					<h3>Student Details</h3><hr>
					<form method='post' >
						<?php flash("msg");?>
                        <div class='row text-right'>
                            <div class="col-12 text-right">
                            	
                            </div>
                        </div>
						<div class='row'>
							<div class='col-md-6'>
								<div class=' form-group '>
									<label>Name</label>
									<input type='text' name='name' class='form-control' required>
								</div>
							</div>
							<div class='col-md-6'>
								<div class=' form-group '>
									<label>Roll No</label>
									<input type='text' name='roll_no' class='form-control' required>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-6'>
								<div class=' form-group '>
									<label>Birth</label>
									<input type='text' name='birth' class='form-control date' required>
								</div>
							</div>
							<div class='col-md-6'>
								<div class=' form-group '>
									<label>Semester</label>
									<select class='form-control chosen' name='semester' required>
										<option>Select Semester</option>
										<option>Semester-1</option>
										<option>Semester-2</option>
										<option>Semester-3</option>
										<option>Semester-4</option>
										<option>Semester-5</option>
										<option>Semester-6</option>
										<option>Semester-7</option>
										<option>Semester-8</option>
									</select>
								</div>
							</div>
						</div>
                        <div class='row'>
							<div class='col-md-6'>
								<div class=' form-group '>
									<label>Year</label>
									<select class="form-control chosen" name='year'>
										<option>Select year</option>
										<option>1st year</option>
										<option>2nd year</option>
										<option>3rd year</option>
									</select>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<label>Department</label>
									<select class="form-control chosen" name='department'>
										<option value=''>Select Department</option>
										<?php
											$sql="select * from tbl_department";
											$res=$con->query($sql);
											while($row=$res->fetch_assoc()){
												echo" 
													<option value='{$row["did"]}'>{$row["department"]}</option>
												";	
											} 
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class='btn btn-success'>
						</div>	
					</form>
				</div>
			</div>
		</div>
	<?php include"footer.php"?>
	</body>
</html>