<!DOCTYPE html>
<html>
<head>
	<title>Faculty Update</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-center text-danger">Update faculty</h1>

		<p class="text-danger" style="background-color: aqua; padding: 10px;">Note:  E-mail Id is not Changeable</p>
		<?php
			include('connection.php');
			$email_id=$_GET['edit'];
			$display="SELECT * FROM faculty_registration where email='$email_id'";
                      $data=mysqli_query($con,$display);
                      $total=mysqli_num_rows($data);
                      if($total !=0)
                      {
                      	 while ($row=mysqli_fetch_assoc($data)) {

                      	 	$name= $row['Name'];
							$phone= $row['phone'];
							$email=$row['email'];
							$faculty_of=$row['faculty_of'];
							$dept=$row['department'];
                      	 }
                      }
			
		  ?>
		  <div class="col-lg-6 m-auto">
		  	<form method="post" action="#" enctype="multipart/form-data" id="updateform">
		  		<div class="form-group">
		  			<label>Name</label>
		  			<input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>">
		  		</div>
		  		<div class="form-group">
		  			<label>Phone</label>
		  			<input type="text" name="phone" class="form-control" id="phone" value="<?php echo$phone; ?>">
		  		</div>
		  		<div class="form-group">
		  			<label>Email</label>
		  			<input type="text" name="email" class="form-control" id="email" value="<?php echo $email; ?>" readonly>
		  		</div>

		  		<div class="form-group">
					    <label>Faculty Of:</label>
					    <select class="form-control" name="f4" id="facultyof" onchange="fetchdept()" required="">
                                <option></option>
                                <?php
                                  $sql="select* from faculty_of";
                                  $run=mysqli_query($con,$sql);
                                  while($data=mysqli_fetch_array($run))
                                  {
                                      ?>
                                      <option value="<?php echo $data["faculty_of"];?>"><?php echo $data["faculty_of"];?></option>
                                      <?php
                                  }
                               ?>
                             </select>
					  </div>
					  <div class="form-group">
					    <label>Department:</label>
					    <select class="form-control" name="dept" id="dept" required="">
                                <option></option>
                             </select>
					  </div>
		  		<input type="hidden" name="" class="btn btn-success" id="submit" value="<?php echo $email; ?>">
		  		<div class="form-group">
		  			<input type="submit" name="upsubmit" value="update" class="btn btn-success" id="update">
		  		</div>
		  	</form>
		  </div>
	</div>
	<script type="text/javascript">
		function fetchdept()
            {
            facultyof=$('#facultyof').val();
            $.ajax({
                   url:'department.php',
                   type:'POST',
                   data:{facultyof:facultyof},
                   success: function(data)
                   {
                       $('#dept').html(data);
                   }

                });
            }
	</script>
</body>
</html>
<?php
if (isset($_POST['upsubmit'])) {
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$faculty_of=$_POST['f4'];
	$dept=$_POST['dept'];

	$query="update faculty_registration set Name='$name', phone='$phone', email='$email', faculty_of='$faculty_of', department='$dept' where email='$email'" ;

	if (mysqli_query($con,$query)) {
			echo "<script>alert('Update Successful....')</script>";
			header('location:faculty_reg_report.php');
		}	
		else{
			echo "<script>alert('Please Try again....')</script>";
			header(('location:updatefaculty.php'));
		}
	}
	
?>