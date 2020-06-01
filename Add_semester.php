<?php
  include('connection.php');
  session_start();
    $aname=$_SESSION['admin_name'];
    if(!isset($aname))
    {
        header('location:facultylogin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    .coursesBox{
      background: #CCD2C9;
    }
  </style>
</head>
<body>



<div class="container col-lg-6 m-auto">

<h2 class="text-center text-danger">Add New Semester</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Semester</button>
  <a href="admin_index.php" class="btn btn-danger">Back</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-success">Add Semester</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="post" action="#">
            <div class="form-group">
              <label>Course Name</label>
              <select class="form-control" name="c1" required="">
                <option></option>
                <?php
                  $branch="SELECT * FROM course ORDER BY Courses";
                  $query=mysqli_query($con,$branch);
                  if (mysqli_num_rows($query)>0) {
                    while ($row=mysqli_fetch_assoc($query)) {
                ?>
                    <option><?php echo $row['Courses']; ?></option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Semester</label>
              <input type="text" name="c2" value="Semester " class="form-control" required="">
            </div>

            <div class="form-group">  
              <input type="submit" name="sem_submit" value="Add Semester" class="btn btn-outline-success">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<?php
  if (isset($_POST['sem_submit'])) {
    $course=$_POST['c1'];
    $sem=ucwords($_POST['c2']);
    $check="SELECT * FROM semester where Course='$course' && Semesters='$sem'";
    $query=mysqli_query($con,$check);
    if (mysqli_num_rows($query)==1) {
      echo "<script>alert('Data Already Inserted......');</script>";
    }
    else{
    $ins="INSERT INTO semester(Semesters,Course) values('$sem','$course')";
    if (mysqli_query($con,$ins)) {
      echo "<script>alert('Data successfully Inserted......');</script>";
    }
    else{
      echo "<script>alert('Something went Wrong......');</script>";
    }
    }
  }
?>


<div class="coursesBox">
    <?php
      $semester="SELECT * FROM semester ORDER BY Course";
      $query=mysqli_query($con,$semester);
      if ($num=mysqli_num_rows($query)!=0) {
        $num=1;
    ?>
    <table class="table">
      <tr class="text-center" style="background: #000; color: #fff;">
        <td>S.No</td>
        <td>Course</td>
        <td>Semester</td>
        <td>Delete</td>
      </tr>
    
    <?php
      while ($row=mysqli_fetch_assoc($query)) {
    ?>
        <tr class="text-center">
          <td><?php echo $num; ?></td>
          <td><?php echo $row['Course']; ?></td>
          <td><?php echo $row['Semesters']; ?></td>
          <td><a href="delete_semester.php?delete=<?php  echo $row['S_No']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>

    <?php
        $num++;
      }
    ?>

  </table>
    <?php
      }
    ?>
</div>
</div>
  
</body>
</html>
