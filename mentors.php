<?php 
 include('connection.php');
  $course=$_POST["course"];
  $branch=$_POST["branch"];
  $sql="select * from mentors where course='$course' && branch='$branch'";
  $run=mysqli_query($con,$sql);
  echo "<option>select mentor</option>";
  while($data=mysqli_fetch_array($run))
  {
	  ?>
      <option><?php echo $data["mentor_name"];?></option>
      <?php
  }

?>
