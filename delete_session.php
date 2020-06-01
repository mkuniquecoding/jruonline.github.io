<?php
include('connection.php');
		$session=$_GET['delete'];
		$delete="DELETE FROM session where s_no='$session'";
		if(mysqli_query($con,$delete)){
			echo "<script>alert('Data successfully Deleted.....');</script>";
			header('location:Add_session.php');
		}
		else{
			echo "<script>alert('Something went wrong.....');</script>";
			header('location:Add_session.php');
		}
?>