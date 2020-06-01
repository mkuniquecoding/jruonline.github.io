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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link href="css/adminpannel.css" rel="stylesheet">

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
    
     ::placeholder{
              font-weight: 100;
            }
            #record_content{
              margin: 10px 0;
            }
            #record_content table tr th{
              padding: 5px;
              text-align:center;
              background-color: #000;
              color: #fff;
              font-weight: 500;
            }
            #record_content table tr td
            {
              padding: 5px;
              font-size: 12px;
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
                <a href="faculty_reg_report.php" class="active">
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
      <!---------------FAculty Report Area------------------->
        <div class="container">
          <h2 class="text-danger text-center text-uppercase">All Faculty Report</h2>

          <div class="d-flex justify-content-end ">
            <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
         Add Faculty
        </button>
          </div>
          <h2 class="text-danger">All Records</h2>
          <p id="show"></p>
          <div class="table-responsive">
          <div id="record_content">
              <?php
                   $display="SELECT * FROM faculty_registration order by department";
                      $data=mysqli_query($con,$display);
                      $total=mysqli_num_rows($data);
                      if($total !=0)
                      {
                        $number=1;
              ?>
                  <table class="table-bordered table-striped table-hover text-center">
                      <tr>
                          <th>S.No</th>
                          <th>Password</th>
                          <th>Faculty Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Faculty of</th>
                          <th>Department</th>
                          <th>Photo</th>
                          <th>Signature</th>
                           <th>View</th>
                            <th>Edit</th>
                             <th>Delete</th>
                      </tr>
              <?php
                          while ($row=mysqli_fetch_assoc($data)) {
              ?>
                            <tr>
                              <td> <?php echo $number; ?> </td>
                              <td> <?php echo $row['faculty_id']; ?> </td>
                              <td> <?php  echo $row['Name']; ?></td>
                              <td> <?php  echo $row['phone']; ?></td>
                              <td class="text-danger"> <?php  echo $row['email']; ?></td>
                              <td> <?php  echo $row['faculty_of']; ?></td>
                              <td> <?php  echo $row['department']; ?></td>
                              <td><a href="<?php  echo $row['photo']; ?>"><img src="<?php  echo $row['photo']; ?>" height="70px" width="70px;"></a></td>
                              <td><a href="<?php  echo $row['signature']; ?>"><img src="<?php  echo $row['signature']; ?>" height="50px" width="110px;"></a> </td>
                              <td><a href="fetch_faculty_view.php?edit=<?php  echo $row['email']; ?>" class="btn btn-success">View</a></td>
                              <td><a href="updatefaculty.php?edit=<?php  echo $row['email']; ?>" class="btn btn-primary">Edit</a></td>
                              <td><button onclick="GetuserDelete('<?php  echo $row['email']; ?>')" class="btn btn-danger">Delete</button></td>
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

          <!--  Insert Data  Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title text-danger">Add Faculty</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form method="post" action="facultyreg_data.php" id="myform" enctype="multipart/form-data">
              <div class="form-group">
                <label>Name:<sup>*</sup></label>
              <input type="text" class="form-control" placeholder="Enter Name" id="f1" name="f1" required="">
            </div>
            <div class="form-group">
              <label>Phone: <sup>*</sup></label>
              <input type="text" class="form-control" placeholder="Enter Phone" id="f2" name="f2" required="" pattern="[6-9]{1}[0-9]{9}" maxlength="10">
            </div>
            <div class="form-group">
              <label>E-mail:<sup>*</sup></label>
              <input type="email" class="form-control" placeholder="Enter Email" id="f3" name="f3" required="">
            </div>
            <div class="form-group">
              <label>Faculty Of:<sup>*</sup></label>
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
              <label>Department:<sup>*</sup></label>
              <select class="form-control" name="dept" id="dept" required="">
                                <option></option>
                             </select>
            </div>
            <div class="form-group">
              <label>Photo:<sup>*</sup></label>
              <input type="file" class="form-control" id="f5" name="f5" required="">
            </div>
            <div class="form-group">
              <label>Signature:<sup>*</sup></label>
              <input type="file" class="form-control" id="f6" name="f6" required="">
            </div>
                        <input type="submit" value="Add Faculty" id="submit" class="btn btn-success" name="submit">
           </form> 
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
          
            
</div><!---------------End Container---------------------->
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

            
            $(document).ready(function(){
              $('#submit').click(function(){
                name=$('#f1').val();
                phone=$('#f2').val();
                email=$('#f3').val();
                facultyof=$('#facultyof').val();
                dept=$('#dept').val();
                photo=$('#p5').val();
                sign=$('#p6').val();
                if (name=="" || phone=="" || email=="" || facultyof=="" || dept=="" || photo=="" || sign=="") {
                  alert("required all field......!!");
                }
                else{
                        $.ajax({
                           url:'facultyreg_data.php',
                           type:'post',
                           data:$("#myform input, select").serialize(),
                           success: function(data){
                               console.log(data);
                               $('#show').html(data);
                           }
                    });
                }
              });
            });


              function GetuserDelete(deleteId){
              var conf= alert("Data deleted..... please Refresh The Page");
              $.ajax({
                url:'facultyreg_data.php',
                type:'post',
                data:{deleteId:deleteId},
                success: function(data,status){
                  $('#show').html(data);
                }
              });
            }

            $(document).on('click', '.view', function(){
                var email_id = $(this).attr('id');
                var option = {
                  ajaxPrefix: '',
                  ajaxData:{id:id},
                  ajaxComplete:function(){
                    this.button([{
                      type:Dialogify.BUTTON_PRIMARY
                    }]);
                  }
                };
                new Dialogify('fetch_faculty_view.php', $option) 
                  .title('View Faculty Details')
                  .showModel();
            });
            
        </script>

</body>
</html>
