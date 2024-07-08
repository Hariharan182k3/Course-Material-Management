<?php
	include"config.php";
	session_start();
	if(isset($_POST["submit"])){
		$name=$_POST["name"];
		$pwd=$_POST["pwd"];
		$sql="select * from tbl_staff where name='{$name}' and pwd='{$pwd}'";
		$res=$con->query($sql);
		{
			if($res->num_rows>0)
			{
				$row=$res->fetch_assoc();
				header("location:staff_home.php");
				$_SESSION["sid"]=$row["id"];
				$_SESSION["name"]=$row["name"];
				$_SESSION["pwd"]=$row["pwd"]; 
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
		        <h3 class="text-center mt-5">Staff Login</h3><hr>
				<form method='post'>
					<div class=' form-group mt-4'>
						<label>Staff Name</label>
						<input type='text' name='name' class='form-control' required>
					</div>
					<div class=' form-group '>
						<label>Password</label>
						<input type='password' name='pwd' class='form-control' required>
					</div>
					<input type='submit' name='submit' title='click to submit here' value='submit' class='btn btn-info'>
				</form>
			</div>
		</div>
</body>
</html>