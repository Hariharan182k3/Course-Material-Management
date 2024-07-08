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
		
		
		$sql="update tbl_student set name='{$name}',roll_no='{$roll_no}',birth='{$birth},'year='{$year}',semester='{$semester},'department='{$department}' where stuid='{$_SESSION['id']}'";
		if($con->query($sql))
		{
			flash("msg","Data has been Altered");
		}
		else
		{
			flash("msg","Invalid Record");
		}
	}
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
				<div class='col-md-8 '>
					<nav aria-label="breadcrumb" class='mt-5'>
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href='students.php' class=''>students</a></li>
						<li class="breadcrumb-item"><a href='.' class='text-dark'>view students</a></li>
					  </ol>
					</nav>
					<?php
						flash("msg");
					?>
					<table class="table table-bordered ">
					  <thead>
						<tr>
						  <th scope="col">Sno</th>
						  <th scope="col">Name</th>
						  <th scope="col">Roll No</th>
						  <th scope="col">Birth</th>
						  <th scope="col">year</th>
						  <th scope="col">semester</th>
						  <th scope="col">Departments</th>
						  <th scope="col">Edit</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php
						$sql="select * from tbl_student";
						$res=$con->query($sql);
						if($res->num_rows>0)
						{
							$i=0;
							while($row=$res->fetch_assoc())
							{
								$i++;
								echo"<tr>
										<td>{$i}</td>
										<td>{$row["name"]}</td>
										<td>{$row["roll_no"]}</td>
										<td>{$row["birth"]}</td>
										<td>{$row["year"]}</td>
										<td>{$row["semester"]}</td>
										<td>{$row["department"]}</td>
                                        <td><a href='edit_students.php?id={$row["stuid"]}'><input type='submit' value='Edit' class='btn btn-success'></a></td>
									    <td><a href='delete_students.php?id={$row["stuid"]}'><input type='submit' value='Delete' class='btn btn-danger'></td>
									</tr>";
							}
						}
					  
					  ?>
						
						
					  </tbody>
					</table>
						

				</div>
		</div>
	</div>

	<?php
		include"footer.php"; 
	?>
	</body>
</html>