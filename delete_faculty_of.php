<?php
include('connection.php');
		$faculty_of=$_GET['delete'];
		$delete="DELETE FROM faculty_of where s_no='$faculty_of'";
		if(mysqli_query($con,$delete)){
			echo "<script>alert('Data successfully Deleted.....');</script>";
			header('location:Add_faculty_of.php');
		}
		else{
			echo "<script>alert('Something went wrong.....');</script>";
			header('location:Add_faculty_of.php');
		}
?>