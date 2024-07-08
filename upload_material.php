<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"]))
	{	
		$department  = $_POST["department"];
		$subnm	 = $_POST["subnm"];
		$year  = $_POST["year"];
		$semester	 = $_POST["semester"];
		$date = date("Y-m-d",strtotime($_POST["date"]));
		
		if(isset($_FILES["img"]))
	{
		$allowedTypes = ["png","jpg","jpeg","webp"];
		$fileType = strtolower(pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION));
		if(!in_array($fileType,$allowedTypes)){
			flash("Image uploaded Failed","danger");
		}elseif($_FILES["img"]["size"]>500000){
			flash("Image Uploaded Failed. Image Size greater than 500kb",'danger');
		}else{
			$fileName = time().".".$fileType; 
			if(move_uploaded_file($_FILES["img"]["tmp_name"],"imgs/".$fileName)){
				//$pid=$_GET["id"];
				$pid=$con->insert_id;
				$sql="insert into tbl_subject (img,department,subnm,year,semester,date) values ('{$fileName}','{$department}','{$subnm}','{$year}','{$semester}','{$date}')";
				if($con->query($sql)){
					flash("Image Uploaded Successfully",'success');
				}else{
					flash("Image Uploaded Failed",'danger');
				}
			}
		}
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
	include"staff_navbar.php";
?>
<body>
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-3'>
					<?php include"staff_sidebar.php"; ?>
				</div>
				<div class='col-md-8 mt-5'>
					<h3>Department Details</h3><hr>
					<div class='row text-right'>
						<div class="col-12 text-right">
							
						</div>
					</div>
					<form method='post'  enctype='multipart/form-data' >
						<?php flash("msg");?>
						<div class='row'>
							<div class='col-md-6'>
								<div class=' form-group '>
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
							<div class='col-md-6'>
								<div class=' form-group '>
									<label>Subject</label>
									<select class="form-control chosen" name='subnm'>
										<option value=''>Select Subject</option>
										<option>Tamil</option>
										<option>English</option>
										<option>Maths</option>
										<option>Science</option>
									</select>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-6'>
								<div class=' form-group '>
									<label>year</label>
									<select class="form-control chosen" name='year'>
										<option value=''>Select year</option>
										<?php
											$sql="select * from tbl_staff";
											$res=$con->query($sql);
											while($row=$res->fetch_assoc()){
												echo" 
													<option value='{$row["sid"]}'>{$row["year"]}</option>
												";	
											} 
										?>
									</select>
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
									<label>Material Name</label>
									<input type='text' name='material_name' class='form-control' required>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<label>Date</label>
									<input type='text' name='date' class='form-control date'  required value='<?php echo date("d-m-Y"); ?>'>
								</div>
							</div>
						</div>	
                        <div class='row'>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Material</label>
                                    <input type="file" class="form-control" name="img">
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
	<!--	
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
										-->
	</script>
<?php include"footer.php" ?>
</body>
</html>
