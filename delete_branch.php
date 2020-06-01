<?php
include('connection.php');
		$branch=$_GET['delete'];
		$delete="DELETE FROM branch where S_No='$branch'";
		if(mysqli_query($con,$delete)){
			echo "<script>alert('Data successfully Deleted.....');</script>";
			header('location:Add_branch.php');
		}
		else{
			echo "<script>alert('Something went wrong.....');</script>";
			header('location:Add_branch.php');
		}
?>