<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"])){
		$name=$_POST["username"];
		$pass=$_POST["password"];
		$sql="select * from tbl_admin where username='{$name}' and password='{$pass}'";
		$res=$con->query($sql);
		{
			if($res->num_rows>0)
			{
				$row=$res->fetch_assoc();
				header("location:admin_home.php");
				$_SESSION["aid"]=$row["id"];
				$_SESSION["username"]=$row["username"];
				$_SESSION["password"]=$row["password"]; 
			}
		}
	}	
?>
<html>
	<head>
		<title></title>
	<?php
		include'header.php';
	?>
	</head>
	 
<body>
	<?php include"navbar.php"?>
</nav> 
	
		<div class='container '>
			<div class='col-md-6 mx-auto ' >
		        <h3 class="text-center mt-5"><i class="fa fa-user" aria-hidden="true"></i> Admin Login</h3><hr>
				<form method='post'>
					<div class=' form-group mt-4'>
						<label>Admin Name</label>
						<input type='text' name='username' class='form-control' required>
					</div>
					<div class=' form-group '>
						<label>Password</label>
						<input type='password' name='password' class='form-control' required>
					</div>
					<input type='submit' name='submit' title='click to submit here' value='submit' class='btn btn-info'>
				</form>
			</div>
		</div>
</body>
</html>