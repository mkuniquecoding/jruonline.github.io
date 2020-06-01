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
    
    *{
          margin: 0;
          padding: 0;
      }
       .Acontent{
          margin: 10px 0;
      }
      .ABox{
          padding: 15px;
      }

      .ABox a{
          color: #fff;
          text-decoration: none;
      }
      .ABox i
      {
          font-size: 55px;
         float: left;
         z-index: 0;
         opacity: .5;
          color: #fff;
      }
      #record_Contant table tr th{
        padding: 5px;
        text-align:center;
        background-color: #000;
        color: #fff;
        font-weight: 500;
      }
      @media only screen and (max-width: 540px){
        .ABox{
          padding: 15px;
          height: 80px;
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
                <a href="faculty_registration.php">
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
                <a href="MentorRecord.php" class="active">
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
      <h1 class="text-center text-primary" style="margin: 20px 0px;">ADD NEW MENTOR</h1>
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Mentor</button>
    </div>
    <h2 class="text-danger">ALL MENTOR RECORD</h2>
    <div class="table-responsive">
      <p id="errors_msg"></p>
    <div id="record_Contant">
       <?php
                   $display="SELECT * FROM mentordata order by course";
                      $data=mysqli_query($con,$display);
                      $total=mysqli_num_rows($data);
                      if($total !=0)
                      {
                        $number=1;
              ?>
                  <table class="table-bordered table-striped table-hover text-center table">
                      <tr>
                          <th>S.No</th>
                         <th>Department</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Course</th>
                          <th>Branch</th>
                          <th>password</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
              <?php
                          while ($row=mysqli_fetch_assoc($data)) {
              ?>
                            <tr>
                              <td> <?php echo $number; ?> </td>
                              <td> <?php echo $row['Department']; ?> </td>
                              <td> <?php echo $row['mentor_name']; ?></td>
                              <td class="text-danger"><a href="https://mail.google.com/mail/u/0/#inbox?compose=new" style="color: red;"> <?php echo $row['mentor_email']; ?></a></td>
                              <td> <?php echo $row['course']; ?></td>
                              <td> <?php echo $row['branch']; ?></td>
                              <td> <?php echo $row['password']; ?></td>
                              <td><a href="ViewMentorRecord.php?edit=<?php  echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                              <td><a href="deleteMentorRecord.php?delete=<?php  echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
              <?php
                            $number++;
                          }

                      }
                      else{
                          echo "no record found";
                      }
              ?>
                </table>
    </div>
</div>
    <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="text-danger">Add Mentor</h2>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form class="form" id="myform">
                <p id="error_msg" style="background-color: rgba(255, 152, 0, 0.3); color: red;"></p>

                <div class="form-group">
              <label>Department<sup>*</sup></label>
              <select class="form-control" name="department" id="department" onchange="fetchname()" required="">
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
              <label>Faculty Name<sup>*</sup></label>
              <select class="form-control" name="fname" id="fname" required="" onchange="fetchemail()">
                                <option></option>
                             </select>
            </div>
                <div class="form-group">
                  <label>Faculty Email<sup>*</sup></label>
                  <select class="form-control" name="femail" id="femail" required="">
                                <option></option>
                             </select>
                </div>
                <div class="form-group">
                  <label class="text-danger">Create Password<sup>*</sup></label>
                  <input type="text" name="password" id="password" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Select Courses<sup>*</sup></label>
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
                  <label>Select Branch<sup>*</sup></label>
                  <select required="" name="branch" id="branch" class="form-control">
                                    <option></option>
                                </select>
                </div>
                
                <input type="submit" value="Add Mentor" class="btn btn-success" name="submit" id="submit">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
  </div>
  </div>
  
</div>  
<script type="text/javascript">
     function fetchname()
            {
            department=$('#department').val();
            $.ajax({
                   url:'fetchFaculty_name.php',
                   type:'POST',
                   data:{department:department},
                   success: function(data)
                   {
                       $('#fname').html(data);
                   }

                });
            }

            function fetchemail()
            {
            facultyname=$('#fname').val();
             department=$('#department').val();
            $.ajax({
                   url:'fetchFaculty_Email.php',
                   type:'POST',
                   data:{facultyname:facultyname},
                   success: function(data)
                   {
                       $('#femail').html(data);
                   }

                });
            }
  
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
            $(document).ready(function(){
              $('#submit').click(function(){
                dept=$('#department').val();
                facultyname=$('#fname').val();
                facultyEmail=$('#femail').val();
                course=$('#course').val();
                branch=$('#branch').val();
                password=$('#password').val();
                if (dept=='' || facultyname=='' || facultyEmail=='' || course=='' || branch=='' || password=='') {
                  alert("All Field are required.....");
                  $('#error_msg').html('Something error..!!');
                }
                else{
                  $.ajax({
                    url:'InsertMentorRecord.php',
                    type:'post',
                    data:$('#myform input,select').serialize(),
                    success:function(data,status){
                      console.log();
                      $('#error_msg').html(data);
                    }
                  });
                }
              });
            });

            function getDelete(id){
              var conf=confirm("Are you sure....?");
              if (conf==true) {
                $.ajax({
                  url:'deleteMentorRecord.php',
                  type:'post',
                  data:{getDelete:getDelete},
                  success:function(data,status){
                     $('#errors_msg').html(data);
                  }
                });
              }
            }
</script>

</body>
</html>
