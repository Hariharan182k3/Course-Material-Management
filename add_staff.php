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
		
		$sql="insert into tbl_staff (name,pwd,email,qualification,mobile,department,year) values ('{$name}','{$pwd}','{$email}','{$qualification}','{$mobile}','{$department}','{$year}')";
		if($con->query($sql))
		{
			flash("msg","Staff Added Successfully");
		}
		else
		{
			flash("msg","Staff not Added");
		}
	
	}
?>

<?php
	include"admin_navbar.php";
?>

<body>
<html>
	<head>
		<title></title>
	<?php
		include"header.php";
	?>
	</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php include"admin_sidebar.php";?>
                
            </div>
            <div class="col-8 mt-5">
                <h3><i class="fa fa-users" aria-hidden="true"></i></i> Add Staffs</h3><hr>
                    <form class='mb-2' style="padding:2 0 3 0;" method='post'>
                    <?php
                        flash("msg");
                    ?>
                    <div class='row'>
                        <div class='col-6'>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pwd" required>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-6'>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class="form-group">
                                <label>Qualification</label>
                                <input type="text" class="form-control" name="qualification" required>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-6'>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" class="form-control" name="mobile" required>
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control chosen" name='department' required>
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
                    <div class='row'>
                        <div class='col-6'>
                            <div class="form-group">
                                <label>Year</label> 
                                <select class='form-control chosen' name='year' required >
                                    <option>Select year</option>
                                    <option value="1st year">1st year</option>
                                    <option value="2nd year">2nd year</option>
                                    <option vlaue="3rd year">3rd year</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   <!-- <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="Department">
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="Subject">
                    </div> -->
                    <div class=' text-right'>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>	
    <?php include"footer.php"?>
</body>