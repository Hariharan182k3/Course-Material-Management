<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"]))
	{	
		$subnm=$_POST["subnm"];
		$year=$_POST["year"];
		$semester=$_POST["semester"];
		$department=$_POST["department"];
		
		$sql="insert into tbl_subject(subnm,year,semester,department) values ('{$subnm}','{$year}','{$semester}','{$department}')";
		if($con->query($sql))
		{
			flash("msg","Subject Added Successfully");
		}
		else
		{
			flash("msg","Subject not Added");
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
                <h3><i class="fa fa-users" aria-hidden="true"></i></i> Add Subjects</h3><hr>
                    <form class='mb-2' style="padding:2 0 3 0;" method='post'>
                    <?php
                        flash("msg");
                    ?>
                    <div class="form-group">
                        <label>Subejct name</label>
                        <input type="text" class="form-control" name="subnm">
                    </div>
                    <div class="form-group">
                        <label>year</label>
                        <select class='form-control chosen' name='year' required >
                            <option>Select year</option>
                            <option>1st year</option>
                            <option>2nd year</option>
                            <option>3rd year</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control chosen" name='semester'>
                        <option value=''>Select semester</option>
                        <?php
                            $sql="select * from tbl_department";
                                echo"   
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                ";	
                            
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Departments</label>
                        <select class="form-control chosen" name='department'>
                        <option value=''>Select Departments</option>
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
                   <!-- <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="Department">
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="Subject">
                    </div> -->
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </form>
            </div>
        </div>
    </div>	
    <?php include"footer.php"?>
</body>