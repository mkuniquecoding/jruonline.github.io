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

<h2 class="text-center text-danger">Add New Faculty_of</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add FAculty_of</button>
  <a href="admin_index.php" class="btn btn-danger">Back</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-success">Add Faculty_Of</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="post" action="#">
            <div class="form-group">
              <label>Add Faculty_of</label>
              <input type="text" name="c1" class="form-control" required="">
            </div>
            <div class="form-group">
              
              <input type="submit" name="faculty_of_submit" value="Add Faculty_of" class="btn btn-outline-success">
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
  if (isset($_POST['faculty_of_submit'])) {
    $faculty_of=ucwords($_POST['c1']);
    $check="SELECT * FROM faculty_of where faculty_of='$faculty_of'";
    $query=mysqli_query($con,$check);
    if (mysqli_num_rows($query)==1) {
      echo "<script>alert('Data Already Inserted......');</script>";
    }
    else{
    $ins="INSERT INTO faculty_of(faculty_of) values('$faculty_of')";
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
      $courses="SELECT * FROM faculty_of ORDER BY faculty_of";
      $query=mysqli_query($con,$courses);
      if ($num=mysqli_num_rows($query)!=0) {
        $num=1;
    ?>
    <table class="table">
      <tr class="text-center" style="background: #000; color: #fff;">
        <td>S.No</td>
        <td>faculty_of</td>
        <td>Delete</td>
      </tr>
    
    <?php
      while ($row=mysqli_fetch_array($query)) {
    ?>
        <tr class="text-center">
          <td><?php echo $num; ?></td>
          <td><?php echo $row['faculty_of']; ?></td>
          <td><a href="delete_faculty_of.php?delete=<?php  echo $row['s_no']; ?>" class="btn btn-danger">Delete</a></td>
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