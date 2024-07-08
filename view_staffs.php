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
		
		$sql="update tbl_staff set name='{$name}',pwd='{$pwd}',email='{$pwd}',qualification='{$qualification}',mobile='{$mobile}',department='{$department}',year='{$year}' where did='{$_SESSION['id']}'";
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
		<?php include"admin_navbar.php"; ?>
		<div class='container-fluid '>
		<div class='row'>
				<div class='col-md-3'>
					<?php include "admin_sidebar.php"; ?>
				</div>
				<div class='col-md-8 '>
					<nav aria-label="breadcrumb" class='mt-5'>
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href='add_staff.php' class=''>Staffs</a></li>
						<li class="breadcrumb-item"><a href='.' class='text-dark'>View Staffs</a></li>
					  </ol>
					</nav>
					<?php
						flash("msg");
					?>
					<table class="table table-bordered" id='myTable' >
					  <thead>
						<tr>
						  <th scope="col">Sno</th>
						  <th scope="col">Name</th>
						  <th scope="col">Email</th>
						  <th scope="col">Qualification</th>
						  <th scope="col">Departments</th>
						  <th scope="col">Year</th>
						  <th scope="col">Edit</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php
						$sql="select * from tbl_staff d inner join tbl_department r on r.did=d.department";
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
										<td>{$row["email"]}</td>
										<td>{$row["qualification"]}</td>
										<td>{$row["department"]}</td>
										<td>{$row["year"]}</td>
                                        <td><a href='edit_staff.php?id={$row["sid"]}'><input type='submit' value='Edit' class='btn btn-success'></a></td>
									    <td><a href='delete_staff.php?id={$row["sid"]}'><input type='submit' value='Delete' class='btn btn-danger'></td>
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