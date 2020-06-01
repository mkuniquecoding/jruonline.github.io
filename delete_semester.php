<?php
include('connection.php');
		$sem=$_GET['delete'];
		$delete="DELETE FROM semester where S_No='$sem'";
		if(mysqli_query($con,$delete)){
			echo "<script>alert('Data successfully Deleted.....');</script>";
			header('location:Add_semester.php');
		}
		else{
			echo "<script>alert('Something went wrong.....');</script>";
			header('location:Add_semester.php');
		}
?>