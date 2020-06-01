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
    .recoveryBox{
      position: absolute;
      background: #CCD2C9;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      width: 400px;
      height: 350px;

    }
    .recoveryBox .recoveryhead h4{
      background: #000;
      color: #fff;
      text-align: center;
      padding: 10px;
    }

    .recoveryBox .recovery-item{
      position: relative;
      top: 30px;
      padding: 10px 15px;
    }
    @media (max-width: 399px){
      .recoveryBox{
        width: auto;
        height: 380px;
      }
      .recoveryBox .recoveryhead h4{
        font-size: 12px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="recoveryBox">
      <div class="recoveryhead"><h4>Recover Password</h4></div>
      <div class="recovery-item">
        <form method="post" action="#">
          <div class="form-group">
            <input type="email" name="r1" class="form-control" value="<?php echo $aname; ?>" readonly>
          </div>
          <div class="form-group">
            <input type="password" name="r2" class="form-control" placeholder="New password" required="">
          </div>
          <div class="form-group">
            <input type="text" name="r3" class="form-control" placeholder="confirm password" required="">
          </div>
          <div class="form-group">
            <input type="submit" name="pass_submit" class="btn btn-success" value="Change Password">
            <a href="admin_index.php" class="btn btn-danger">cancle</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>


<?php
  if (isset($_POST['pass_submit'])) {
    $pass=$_POST['r2'];
    $confirm_pass=$_POST['r3'];
    if ($pass==$confirm_pass) {
      $update="UPDATE admin_login set password='$pass' where email='$aname'";
      if (mysqli_query($con,$update)) {
        echo "<script>alert('Password Successfuly Updated......');</script>";
      }
      else{
        echo "<script>alert('something went wrong....!!');</script>";
      }
    }
    else{
      echo "<script>alert('Password Mismatched please try again......!!');</script>";
    }
  }

?>