<?php
  include('connection.php');
  session_start();
    $aname=$_SESSION['admin_name'];
    if(!isset($aname))
    {
        header('location:facultylogin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	 <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/adminpannel.css" rel="stylesheet">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}
		.delete-table{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
		}
		.delete-table table tr td{
			padding: 10px;
		}
		.delete-table table tr td input[type="text"]{
			border:none;
			width: 100%;
			margin: 0 10px;
			outline: none;
		}
		.table-head{
			background-color:#009688;
			color: #fff;
			text-align: center;
		}
	</style>
 </head>
    <body>

    	<?php

    		$hod_email=$_GET['delete'];

    		if (isset($_POST['confirm'])) {
    			$delquery="DELETE from hod where Email='$hod_email'";
				if(mysqli_query($con,$delquery)){
					echo "<script>alert('Data Successfully Deleted');</script>";
					header('location:HOD.php');
				}
    		}
    		else{
    		$viewhod="SELECT * FROM hod where Email='$hod_email'";
    		$query=mysqli_query($con,$viewhod);
    		if (mysqli_num_rows($query)==1) {
    			while ($row=mysqli_fetch_array($query)) {
    				$name=$row['Name'];
    				$Email=$row['Email'];
    				$faculty_of=$row['faculty_of'];
    				$Department=$row['Department'];
    				
    			}
    		}
    	}
    	?>


    	<div class="delete-table">
    		<div class="table-box">
    			<form method="post" action="#">
    			<table border="1">
    				<tr class="table-head">
    					<td colspan="2">Delete HOD</td>
    				</tr>
    				<tr>
    					<td style="font-weight: bold;">Faculty Name</td>
    					<td><input type="text" name="h1" value="<?php echo $name;  ?>" readonly></td>
    				</tr>
    				<tr>
    					<td style="font-weight: bold;">Faculty Email</td>
    					<td><input type="text" name="h1" value="<?php echo $Email;  ?>" readonly></td>
    				</tr>
    				<tr>
    					<td style="font-weight: bold;">Faculty of</td>
    					<td><input type="text" name="h1" value="<?php echo $faculty_of;  ?>" readonly></td>
    				</tr>
    				<tr>
    					<td style="font-weight: bold;">Department</td>
    					<td style="width: 70%;"><input type="text" name="h1" value="<?php echo $Department;  ?>" readonly></td>
    				</tr>
    				<tr>
    					<td colspan="2"><input type="submit" name="confirm" value="confirm" class="btn btn-danger">
    						<a href="HOD.php" class="btn btn-primary">Cancle</a>
    					</td>
    					
    				</tr>
    			</table>
    			</form>
    		</div>
    	</div>
    </body>
</html>