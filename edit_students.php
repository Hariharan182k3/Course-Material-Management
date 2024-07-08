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
		
		$sql="update tbl_student set name='{$name}',roll_no='{$roll_no}',birth='{$birth}',year='{$year}',semester='{$semester}',department='{$department}' where stuid='{$_GET['id']}'";
		if($con->query($sql))
		{
			flash("msg","Data has been Altered");
		}
		else
		{
			flash("msg","Invalid Record");
		}
	}
	$sql="select * from tbl_student where stuid={$_GET['id']}";
	$res=$con->query($sql);
	$row=$res->fetch_assoc();
?>

<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php include"staff_navbar.php"; ?>
		<div class='container-fluid '>
		<div class='row'>
				<div class='col-md-3'>
					<?php include "staff_sidebar.php"; ?>
				</div>
				<div class='col-md-8 mt-5'>
					<nav aria-label="breadcrumb" class=''>
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href='students.php' class=''>Subject</a></li>
						<li class="breadcrumb-item"><a href='view_students.php' class=''>View students</a></li>
						<li class="breadcrumb-item"><a href='' class='text-dark'>Edit</a></li>
					  </ol>
					</nav>
					<?php
						flash("msg");
					?>
					<form method="post">
						<div class="form-group">
							<label>Name</label>
							<input type='text' class='form-control' name='name' value="<?php echo $row["name"]; ?>">
						</div>
                        <div class="form-group">
							<label>Roll No</label>
							<input type='text' class='form-control' name='roll_no' value="<?php echo $row["roll_no"]; ?>">
						</div>
                        <div class="form-group">
							<label>Birth</label>
							<input type='text' class='form-control date' name='birth' value="<?php echo $row["birth"]; ?>">
						</div>
                        <div class="form-group">
							<label>Year</label>
							<select class='form-control' name='year' required><?php echo $row["year"];?>
								<option>1st year</option>
								<option>2nd year</option>
								<option>3rd year</option>
							</select>
						</div>
                        <div class="form-group">
							<label>Semester</label>
							<select class='form-control' name='semester' required><?php echo $row["semester"];?>
							<?php
							$sql="select * from tbl_student";
							$res=$con->query($sql);
							while($rw=$res->fetch_assoc()){
								if($row["stuid"]==$rw["stuid"]){
									echo "<option selected value='{$rw["stuid"]}'>{$rw["semester"]}</option>";
								}else{
									echo "<option value='{$rw["stuid"]}'>{$rw["semester"]}</option>";
								}	
							} 
							?>
							</select>
						</div>
                        <div class="form-group">
							<label>Departments</label>
							<select class='form-control' name='department' required><?php echo $row["department"];?>
							<?php
							$sql="select * from tbl_student";
							$res=$con->query($sql);
							while($rw=$res->fetch_assoc()){
								if($row["stuid"]==$rw["stuid"]){
									echo "<option selected value='{$rw["stuid"]}'>{$rw["department"]}</option>";
								}else{
									echo "<option value='{$rw["stuid"]}'>{$rw["department"]}</option>";
								}	
							} 
							?>
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