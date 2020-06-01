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
		<h1 class="text-center text-danger">Update faculty</h1><br>
		<?php
			include('connection.php');
			$id=$_GET['edit'];
			$display="SELECT * FROM mentordata where id='$id'";
                      $data=mysqli_query($con,$display);
                      $total=mysqli_num_rows($data);
                      if($total !=0)
                      {
                      	 while ($row=mysqli_fetch_assoc($data)) {
                      	 	$id=$row['id'];
                      	 	$Department= $row['Department'];
                      	 	$email=$row['mentor_email'];
                      	 	$name=$row['mentor_name'];
							$course=$row['course'];
							$branch=$row['branch'];
							$password=$row['password'];
                      	 }
                      }
			
		  ?>
		  
		  <div class="col-lg-6 m-auto">
		  	<div class="details">
		  	<p style="background-color: #fc0; padding: 10px;" class="text-danger"> <?php echo "Name: ".$name; ?></p>
		  </div>
		  	<form method="post" action="#" enctype="multipart/form-data" id="updateform">
		  		<div class="form-group">
					    <label> Update Department: <span class="text-danger">( <?php echo $Department; ?> )</span></label>
					    <select class="form-control" name="department" id="department" required="">
                                <option></option>
                                <?php
                                  $sql="select* from deparment";
                                  $run=mysqli_query($con,$sql);
                                  while($data=mysqli_fetch_array($run))
                                  {
                                      ?>
                                      <option value="<?php echo $data["departments"];?>"><?php echo $data["departments"];?></option>
                                      <?php
                                  }
                               ?>
                             </select>
					  </div>
					  
                <div class="form-group">
                  <label>Update Password</label>
                  <input type="text" name="password" id="password" class="form-control" value="<?php echo $password; ?>" required="">
                </div>
			        	<div class="form-group">
			        		<label>Update Courses <span class="text-danger">( <?php echo $course; ?> )</span></label>
			        		<select required name="course" class="form-control" id="course" onchange="fetchbranch()">
                                    <option></option>
                                    <?php 
                                     $sql="select* from course";
                                     $result=mysqli_query($con,$sql);
                                    while($data=mysqli_fetch_array($result))
                                    {
                                  ?>
                                    <option><?php echo $data["Courses"];?></option>
                                  <?php
                                    }
                                  ?>
                            </select>
			        	</div>
			        	<div class="form-group">
			        		<label>Update Branch <span class="text-danger">( <?php echo $branch; ?> )</span></label>
			        		<select required="" name="branch" id="branch" class="form-control">
                                    <option></option>
                                </select>
			        	</div>
		  		<input type="hidden" name="" class="btn btn-success" id="submit" value="<?php echo $id; ?>">
		  		<div class="form-group">
		  			<input type="submit" name="upsubmit" value="update" class="btn btn-success" id="update">
		  			<a href="MentorRecord.php" class="btn btn-danger">Cancle</a>
		  		</div>
		  	</form>
		  </div>
	</div>
	<script type="text/javascript">
		
			function fetchbranch()
            {
              course=$('#course').val();
              $.ajax({
                   url:'branch.php',
                   type:'POST',
                   data:{course:course},
                   success: function(data)
                   {
                     $('#branch').html(data);
                   }

                });
            }
	</script>
</body>
</html>
<?php
if (isset($_POST['upsubmit'])) {
	$department=$_POST['department'];
	$password=$_POST['password'];
	$course=$_POST['course'];
	$branch=$_POST['branch'];

	$query="update mentordata set Department='$department', course='$course', branch='$branch', password='$password' where id='$id'" ;

	if (mysqli_query($con,$query)) {
			echo "<script>alert('Update Successful....');</script>";
		}	
		else{
			echo "<script>alert('Something errors. !! Please Try again....');</script>";
			header('location:ViewMentorRecord.php');
		}
	}
	
?>