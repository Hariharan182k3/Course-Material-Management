<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"]))
	{
		$department=$_POST["department"];
		
		$sql="update tbl_department set department='{$department}' where did='{$_SESSION['id']}'";
		if($con->query($sql))
		{
			flash("msg","Department Updated");
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
						<li class="breadcrumb-item"><a href='add_department.php' class=''>Departments</a></li>
						<li class="breadcrumb-item"><a href='.' class='text-dark'>View Departments</a></li>
					  </ol>
					</nav>
					<?php
						flash("msg");
					?>
					<table class="table table-bordered " id='myTable' >
					  <thead>
						<tr>
						  <th scope="col">Sno</th>
						  <th scope="col">Departments</th>
						  <th scope="col">Edit</th>
						  <th scope="col">Delete</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php
						$sql="select * from tbl_Department";
						$res=$con->query($sql);
						if($res->num_rows>0)
						{
							$i=0;
							while($row=$res->fetch_assoc())
							{
								$i++;
								echo"<tr>
										<td>{$i}</td>
										<td>{$row["department"]}</td>
                                        <td><a href='edit_department.php?id={$row["did"]}'><input type='submit' value='Edit' class='btn btn-success'></a></td>
									    <td><a href='delete_department.php?id={$row["did"]}'><input type='submit' value='Delete' class='btn btn-danger'></td>
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