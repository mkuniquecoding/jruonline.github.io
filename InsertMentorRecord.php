<?php
	include('connection.php');
	extract($_POST);
	$query="INSERT INTO mentordata(Department, mentor_name, mentor_email,course, branch, password) values('$department','$fname','$femail','$course','$branch','$password')";
	if(mysqli_query($con,$query)){
		echo "<script>alert('Data Successfully Inserted.....')</script>";
		header('location:MentorRecord.php');
	}
	else{
		echo "Something Error.........!!";
	}
?>