<?php
	$con=mysqli_connect("localhost","root","","db_course_management");	

function flash($name='',$msg='',$cate='success')
	{
		if(!empty($name))
		{
			if(!empty($msg)&&empty($_SEESION[$name]))
			{
				$_SESSION[$name]=$name;
				$_SESSION[$name."_msg"]=$msg;
				$_SESSION[$name."_cate"]=$cate;
			}
			else if (empty($msg)&&!empty($_SESSION[$name]))
			{
				echo"<div class='alert alert-{$_SESSION[$name."_cate"]} alert-dismissible'>
				  <button type='button' class='close' data-dismiss='alert'>&times; </button>
				  {$_SESSION[$name."_msg"]}</div>";
				unset($_SESSION[$name]);
				unset($_SESSION[$name."_msg"]);
				unset($_SESSION[$name."_cate"]);
			}
			
		}
		
	}
		
?>