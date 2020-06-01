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
    
    /*-------------------faculty reg----------------------*/
    .fac-form{
      background: #C7C1C1;
    }
    .fac-head{
      background: #0C0C0C;
      padding: 5px;
      text-align: center;
      color: #fff
    }
    @media(max-width: 650px){
       .fac-head h2{
        font-size: 20px;
       }
    }
    .form-content{
      padding: 5px 20px;
    }
    .form-content input[type="submit"]{
      background-image: linear-gradient(to right top, #178024, #178823, #179021, #18991e, #1aa11a);
      padding: 10px;
      height: 50px;
      width: 190px;
      border:none;
      color: #fff;
      
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
        <a href="admin_index.php">Admin Dashboard</a>
      </div>
      <div class="right_menu">
        <ul>
          <li><span><?php echo $aname; ?> </span> <i class="fas fa-user"></i>
            <div class="profile_dd">
               <div class="dd_item">Change Password</div>
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
                 <p class="profile_name" align="center">&nbsp; &nbsp; <?php echo $aname; ?></p>
              </div>
            </div>
            <ul>     
              <li>
                <a href="faculty_registration.php" class="active">
                  <span class="icon"><i class="fa fa-user"></i></i></span>
                  <span class="title">Add Faculty</span>
                </a>
              </li>
              <li>
                <a href="faculty_reg_report.php">
                  <span class="icon"><i class="fa fa-user-plus"></i></span>
                  <span class="title">Faculty Report</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fa fa-users"></i></span>
                  <span class="title">Student Report</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fa fa-file-text"></i></span>
                  <span class="title">Exam Form Report</span>
                </a>
              </li>
              <li>
                <a href="MentorRecord.php">
                  <span class="icon"><i class="fa fa-user-circle"></i></span>
                  <span class="title">Mentor Report</span>
                </a>
              </li>
              <li>
                <a href="HOD.php">
                  <span class="icon"><i class="fa fa-user-plus"></i></i></span>
                  <span class="title">HOD Report</span>
                </a>
              </li>
            </ul>
          </div>
      </div>
      <div class="container col-lg-6 mr-auto">
         <div class="fac-form">
          <div class="fac-head">
            <h2>Registration Form</h2>
          </div>
              <div class="form-content">
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name<sup>*</sup></label>
                          <input type="text" name="f1" class="form-control" required="">
                  </div>
                    <div class="form-group">
                            <label>Phone<sup>*</sup></label> 
                            <input type="text" name="f2" class="form-control" required="" pattern="[6-9]{1}[0-9]{9}" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label>Email<sup>*</sup></label>
                        <input type="email" name="f3" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Faculty of <sup>*</sup></label>
                        <select class="form-control" name="f4" id="facultyof" onchange="fetchdept()" required="">
                        <option>-:select:-</option>
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
                        <label>Department<sup>*</sup></label>
                        <select class="form-control" name="dept" id="dept" required="">
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Photo<sup>*</sup></label>
                        <input type="file" name="f6" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Signature<sup>*</sup></label>
                        <input type="file" name="f7" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="facsub" value="Submit">
                    </div>
                </form>
              </div>
            </div>
      </div>
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
        if(isset($_POST['facsub']))
        {
            $id=uniqid();
            $name=$_REQUEST['f1'];
            $ph=$_REQUEST['f2'];
            $email=$_REQUEST['f3'];
            $facultyof=$_REQUEST['f4'];
            $dept=$_REQUEST['dept'];
            $photo=$_FILES['f6'];
            $sign=$_FILES['f7'];

            $pfilename=$photo['name'];
            $sfilename=$sign['name'];

            $pfileerror=$photo['error'];
            $sfileerror=$sign['error'];

            $pfiletmp=$photo['tmp_name'];
            $sfiletmp=$sign['tmp_name'];

            $pfile_ext=explode('.', $pfilename);
            $sfile_ext=explode('.', $sfilename);

            $pfilecheck=strtolower(end($pfile_ext));
            $sfilecheck=strtolower(end($sfile_ext));

            $pfilestored=array('png', 'jpg', 'jpeg');
            $sfilestored=array('png', 'jpg', 'jpeg');
            if (in_array( $pfilecheck, $pfilestored) && in_array($sfilecheck,$sfilestored)) {
                $pdestinationfile = 'upload/'.$pfilename;
                $sdestinationfile = 'upload/'.$sfilename;
                move_uploaded_file($pfiletmp,  $pdestinationfile);
                move_uploaded_file($sfiletmp,  $sdestinationfile);

                $sql="SELECT * FROM faculty_registration where email = '$email'";
                $res=mysqli_query($con,$sql);
                $num=mysqli_num_rows($res);
                if ($num == 1) {
                    echo "Username Already Taken..........";
                }
                else{
                    $qu="INSERT INTO faculty_registration VALUES('$id','$name','$ph','$email','$facultyof','$dept','$pdestinationfile','$sdestinationfile')";
                    if (mysqli_query($con,$qu)) {
                       echo "<script>alert('Successfully Data Inserted........');</script>";
                    }
                    else{
                        echo "<script>alert('Something went wrong.........');</script>";
                    }
                }
            }
            
        }
?>