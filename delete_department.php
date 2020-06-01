<?php
include('connection.php');
		$dept=$_GET['delete'];
		$delete="DELETE FROM deparment where s_no='$dept'";
		if(mysqli_query($con,$delete)){
			echo "<script>alert('Data successfully Deleted.....');</script>";
			header('location:Add_department.php');
		}
		else{
			echo "<script>alert('Something went wrong.....');</script>";
			header('location:Add_department.php');
		}
?>