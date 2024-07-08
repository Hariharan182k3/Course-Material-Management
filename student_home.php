<?php
	include"config.php";
	session_start();
    $sql="select * from tbl_students d inner join tbl_staff r on d.sid=r.sid";
	$res=$con->query($sql);
	$row=$res->fetch_assoc();
?>
<html>
	<head>
		<title></title>
	<?php include"header.php";?>
	</head>
<?php
	include"student_navbar.php";
?>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <?php include"student_sidebar.php";?>
        </div>
        <div class="col-8 mt-5">
            <h3><i class="fa fa-indent" aria-hidden="true"></i> Dashboard</h3><hr>
            
	<div class='col-md-9'>
				<table class='table table-bordered mt-4'>
					<thead>
						<th style='width:20px;'>Name</th>
						<th style='width:20px;'>Departments</th>
						<th style='width:150px;'>Year</th>
						<th style='width:20px;'>Semester</th>
					</thead>
					<tbody>
						
					  <?php
                        $sql="select * from tbl_students d inner join tbl_staff r on d.sid=r.sid";
                        $res=$con->query($sql);
						if($res->num_rows>0)
						{
							$i=0;
							while($row=$res->fetch_assoc())
							{
							$i++;
							echo"<tr>
									<td>{$row["name"]}</td>
                                    
								 </tr>";
							}
						}
					  
					  ?> 
					</tbody>
				</table>
			</div>
			
        </div>
    </div>
</div>


<?php
	include'footer.php';
?>
</body>

</html>