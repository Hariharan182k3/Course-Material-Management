<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"]))
	{
		$name=$_POST["name"];
		$pwd=$_POST["pwd"];
		$email=$_POST["email"];
		$qualification=$_POST["qualification"];
		$mobile=$_POST["mobile"];
		$department=$_POST["department"];
		$year=$_POST["year"];
		
		
		$sql="update tbl_staff set name='{$name}',pwd='{$pwd}',email='{$email}',qualification='{$qualification}',mobile='{$mobile}',department='{$department}',year='{$year}' where sid='{$_GET['id']}'";
		if($con->query($sql))
		{
			flash("msg","Department Edited successfully");
		}
		else
		{
			flash("msg","Department Not Edited");
		}
	}
	$sql="select * from tbl_staff where sid={$_GET['id']}";
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
						<li class="breadcrumb-item"><a href='add_staffs.php' class=''>staffs</a></li>
						<li class="breadcrumb-item"><a href='view_staffs.php' class=''>View staffs</a></li>
						<li class="breadcrumb-item"><a href='' class='text-dark'>Edit</a></li>
					  </ol>
					</nav>
					<?php
						flash("msg");
					?>
					<form method="post">
						<div class="form-group">
							<label>Staff Name</label>
							<input type='text' class='form-control' name='name' value="<?php echo $row["name"]; ?>">
						</div>
                        <div class="form-group">
							<label>Password</label>
							<input type='text' class='form-control' name='pwd' value="<?php echo $row["pwd"]; ?>">
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input type='text' class='form-control' name='email' value="<?php echo $row["email"]; ?>">
						</div>
                        <div class="form-group">
							<label>Qualification</label>
							<input type='text' class='form-control' name='qualification' value="<?php echo $row["qualification"]; ?>">
						</div>
                        <div class="form-group">
							<label>Mobile</label>
							<input type='text' class='form-control' name='mobile' value="<?php echo $row["mobile"]; ?>">
						</div>
                        <div class="form-group">
							<label>Department</label>
							<select class='form-control chosen' name='department' required >
                                    <option>Select year</option>
                                    <option value="<?php echo $row["department"]; ?>">1st year</option>
                                    <option value="<?php echo $row["department"]; ?>">2nd year</option>
                                    <option vlaue="<?php echo $row["department"]; ?>">3rd year</option>
                                </select>
						</div>
                        <div class="form-group">
							<label>Year</label>
							<select class='form-control' name='year' required><?php echo $row["year"];?>
							<?php
							$sql="select * from tbl_staff";
							$res=$con->query($sql);
							while($rw=$res->fetch_assoc()){
								if($row["sid"]==$rw["sid"]){
									echo "<option selected value='{$rw["sid"]}'>{$rw["year"]}</option>";
								}else{
									echo "<option value='{$rw["sid"]}'>{$rw["year"]}</option>";
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