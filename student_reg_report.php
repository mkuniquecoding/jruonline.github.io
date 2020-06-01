<?php
  include('connection.php');
  session_start();
    $mname=$_SESSION['mentor_name'];
    if(!isset($mname))
    {
        header('location:mentors_login.php');
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

  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <script>
    $(document).ready(function(){
      $(".hamburger .hamburger__inner").click(function(){
        $(".wrapper").toggleClass("active")
      })

      $(".top_navbar .fas").click(function(){
         $(".profile_dd").toggleClass("active");
      });
    })
  </script>
  <style type="text/css">
  	.table table tr th{
      background: #000;
      color: #fff;
      font-size: 12px;
    }
    .table table tr td{
      font-size: 12px;
    }
    .table table tr td img{
      height: 40px;
      width: auto;
    }
  </style>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="hamburger__inner">
         <div class="one"></div>
         <div class="two"></div>
         <div class="three"></div>
       </div>
    </div>
    <div class="menu">
      <div class="logo">
        <a href="admin_index.php">Mentor Dashboard</a>
      </div>
      <div class="right_menu">
        <ul>
          <li><span><?php echo $mname; ?> </span> <i class="fas fa-user"></i>
            <div class="profile_dd">
               <div class="dd_item"><a href="Mentor_password_recover.php">Change Password</a></div>
               <div class="dd_item"><a href="logout.php">Logout</a></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
    
  <div class="main_container">
      <div class="sidebar">
          <div class="sidebar__inner">
            <div class="profile">
              
              <div class="profile_info text-center">
                 <p>Welcome</p>
                 <p class="profile_name" align="center">&nbsp; &nbsp; <?php echo $mname; ?></p>
              </div>
            </div>
            <ul>     
              <li>
                <a href="Mentor_index.php">
                  <span class="icon"><i class="fa fa-user-plus"></i></i></span>
                  <span class="title">Add Student</span>
                </a>
              </li>
              <li>
                <a href="student_report.php" class="active">
                  <span class="icon"><i class="fa fa-users"></i></span>
                  <span class="title">Student Report</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fa fa-file-text"></i></span>
                  <span class="title">Prt. Feedback Form</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fa fa-file-text"></i></span>
                  <span class="title">Anti-Ragging Form</span>
                </a>
              </li>
              <li>
                <a href="MentorRecord.php">
                  <span class="icon"><i class="fa fa-file-text"></i></span>
                  <span class="title">Exam Reg. Form</span>
                </a>
              </li>
              <li>
                <a href="MentorRecord.php">
                  <span class="icon"><i class="fa fa-file-text"></i></span>
                  <span class="title">No Dues Form</span>
                </a>
              </li>
              <li>
                <a href="MentorRecord.php">
                  <span class="icon"><i class="fa fa-user-circle"></i></span>
                  <span class="title">Logout</span>
                </a>
              </li>
            </ul>
          </div>
      </div>
      <section id="student_report">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
            <div class="table-responsive table table-striped table-bordered table-hover">
              <?php
                $display="SELECT * FROM student_registrationdata where mentor='$mname' order by Course";
                $query=mysqli_query($con,$display);
                if (mysqli_num_rows($query)>0) {
                  $number=1;
              ?>
                <table class="table">
                  <tr>
                    <th>S.No.</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Category</th>
                    <th>Course</th>
                    <th>Branch</th>
                    <th>Session</th>
                    <th>Enrollment</th>
                    <th>Mobile No.</th>
                    <th>Alternet No</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Signature</th>
                    <th>Reg. Date</th>
                    <th>View</th>
                    <th>Update</th>
                  </tr>
              <?php
                  while ($row=mysqli_fetch_array($query)) {
              ?>
                  <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $row['Student_Name']; ?></td>
                    <td><?php echo $row['Father_Name']; ?></td>
                    <td><?php echo $row['Category']; ?></td>
                    <td><?php echo $row['Course']; ?></td>
                    <td><?php echo $row['Branch']; ?></td>
                    <td><?php echo $row['Session']; ?></td>
                    <td><?php echo $row['enrollment']; ?></td>
                    <td><?php echo $row['Mobile']; ?></td>
                    <td><?php echo $row['Alter_Mobile']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><a href="<?php echo $row['Photo'] ?>"><img src="<?php echo $row['Photo'] ?>"></a></td>
                    <td><a href="<?php echo $row['signature'] ?>"><img src="<?php echo $row['signature'] ?>"></a></td>
                    <td><?php echo $row['reg_date']; ?></td>
                    <td><a href="#" class="btn btn-primary">View</a></td>
                    <td><a href="#" class="btn btn-success">Update</a></td>
                  </tr>
              <?php
              $number++;
                  }
                }
                else{
                  echo "No record found.....!!";
                }
              ?>

              </table>
            </div>
          </div>
        </div>
        </div>
      </section>
  </div>
  
</div>  


<script type="text/javascript">
	

</script>

</body>
</html>
