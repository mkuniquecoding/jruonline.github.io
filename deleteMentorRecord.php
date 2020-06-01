<?php
include('connection.php');
		$faculty_id=$_GET['delete'];
		$delquery="DELETE from mentordata where id='$faculty_id'";
		if(mysqli_query($con,$delquery)){
			echo "<script>alert('Data Successfully Deleted');</script>";
			header('location:MentorRecord.php');
		}
		
?>