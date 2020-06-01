<?php
include('connection.php');
		$corse=$_GET['delete'];
		$delete="DELETE FROM course where Courses='$corse'";
		if(mysqli_query($con,$delete)){
			echo "<script>alert('Data successfully Deleted.....');</script>";
			header('location:Add_courses.php');
		}
		else{
			echo "<script>alert('Something went wrong.....');</script>";
			header('location:Add_courses.php');
		}
?>