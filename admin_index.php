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
    .admincontentBox1{
      width: 100%;
      background: #342DD8;
      padding: 10px;
      margin: 10px 0;
    }
    .admincontentBox2{
      width: 100%;
      background: #890383;
      padding: 10px;
      margin: 10px 0;
    }
    .admincontentBox3{
      width: 100%;
      background: #112F5C;
      padding: 10px;
      margin: 10px 0;
    }
    .admincontentBox4{
      width: 100%;
      background: #49534D;
      padding: 10px;
      margin: 10px 0;
    }
    .admincontent-item{
      color: #fff;
      margin-left: 5%;
    }
    .admincontent-item p{
      font-size: 25px;
    }
    .admincontentBox1 .click{
      position: absolute;
      background: #4842DC;
      top: 20px;
      right: 10px;
      padding: 20px;
      overflow: hidden;
      box-shadow: inset 1px -2px 7px #0C086B;
    }
    .admincontentBox2 .click1{
      position: absolute;
      background: #B51FAF;
      top: 20px;
      right: 10px;
      padding: 20px;
      overflow: hidden;
      box-shadow: inset 1px -2px 7px #670963;
    }
    .admincontentBox3 .click2{
      position: absolute;
      background: #264B83;
      top: 20px;
      right: 10px;
      padding: 20px;
      overflow: hidden;
      box-shadow: inset 1px -2px 7px #041D44;
    }
    .admincontentBox4 .click3{
      position: absolute;
      background: #666B68;
      top: 20px;
      right: 10px;
      padding: 20px;
      overflow: hidden;
      box-shadow: inset 1px -2px 7px #434A46;
    }
    #click button{
      background: transparent;
      outline: none;
      border:none;
    }
    #click button i{
      color: #fff;
      font-size: 20px;
    }
    @media (min-width: 992px) and (max-width: 1298px) {
      .admincontent-item p{
        font-size: 20px;
      }
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
               <div class="dd_item"><a href="Admin_password_recover.php">Change Password</a></div>
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
      <div class="container">
        <div class="row items">
          <div class="col-md-3 col-3 col-sm-6 col-12">
            <div class="item">
              <i class="fa fa-users"></i>
              <p>Total Student <span>1020<sup>+</sup></span></p>
            </div>
          </div>
          <div class="col-md-3 col-lg-3 col-sm-6 col-12">
             <div class="item1">
              <i class="fa fa-users"></i>
              <p>Experience Faculty <span>420<sup>+</sup></span></p>
            </div>
          </div>
          <div class="col-md-3 col-lg-3 col-sm-6 col-12">
            <div class="item2">
              <i class="fa fa-user-plus"></i>
              <p>Total Mentors <span>350<sup>+</sup></span></p>
            </div>
          </div>
          <div class="col-md-3 col-lg-3 col-sm-6 col-12">
             <div class="item3">
              <i class="fa fa-user-plus"></i>
              <p>Total HOD <span>850<sup>+</sup></span></p>
            </div>
          </div>

        </div>
        <hr>
        <div class="row">
          <div class="col-md-6 col-lg-3 col-sm-6 col-12">
            <div class="admincontentBox1">
              <div class="admincontent-item">
                <span>Add</span>
                <p>Courses</p>
                <div class="click" id="click">
                  <a href="Add_courses.php">
                    <button><i class="fa fa-arrow-left"></i></button>
                  </a>
                </div>
              </div> 
            </div>
          </div>
        
        <div class="col-md-6 col-lg-3 col-sm-6 col-12">
            <div class="admincontentBox2">
              <div class="admincontent-item">
                <span>Add</span>
                <p>Branch</p>
                <div class="click1" id="click">
                  <a href="Add_branch.php">
                    <button><i class="fa fa-arrow-left"></i></button>
                  </a>
                </div>
              </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3 col-sm-6 col-12">
            <div class="admincontentBox3">
              <div class="admincontent-item">
                <span>Add</span>
                <p>Faculty of</p>
                <div class="click2" id="click">
                  <a href="Add_faculty_of.php">
                    <button><i class="fa fa-arrow-left"></i></button>
                  </a>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 col-sm-6 col-12">
            <div class="admincontentBox4">
              <div class="admincontent-item">
                <span>Add</span>
                <p>Department</p>
                <div class="click3" id="click">
                  <a href="Add_department.php">
                    <button><i class="fa fa-arrow-left"></i></button>
                  </a>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 col-sm-6 col-12">
            <div class="admincontentBox3">
              <div class="admincontent-item">
                <span>Add</span>
                <p>Semester</p>
                <div class="click2" id="click">
                  <a href="Add_semester.php">
                    <button><i class="fa fa-arrow-left"></i></button>
                  </a>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 col-sm-6 col-12">
            <div class="admincontentBox1">
              <div class="admincontent-item">
                <span>Add</span>
                <p>Session</p>
                <div class="click" id="click">
                  <a href="Add_session.php">
                    <button><i class="fa fa-arrow-left"></i></button>
                  </a>
                </div>
              </div>
            </div>
        </div>
        </div>
      </div>
  </div>
  
</div>  


</body>
</html>