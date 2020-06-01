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
  	.student-form-head{
  		background: #000;
  		color: #fff;
  		text-align: center;
  		padding: 10px 0px;
  	}
  	@media (max-width: 786px){
  		.student-form-head h2{
  			font-size: 16px;
  		}
  	}
  	.student-form{
  		background: #CCD2C9;
  		padding: 10px 20px;
  	}
  	.prtform
            {
                position: relative;
            }
    .prtform input[type="text"],
    .prtform input[type="email"],
    .prtform select
    {
        width: 90%;
        padding: 10px 0;
        color: #757575;
        font-size: 15px;
        outline: none;
        margin-bottom: 20px;
        background: transparent;
        border: none;
        border-bottom: 1px solid #000;
    }
    
    .prtform label
    {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        color: #000;
        font-size: 14px;
        pointer-events: none;
        transition: .5s;
    }
    .prtform input:focus ~ label,
    .prtform select:focus ~ label,
    .prtform input:valid ~ label,
    .prtform select:valid ~ label
    {
        top: -18px;
        left: 0;
        color: #b71c1c;
        font-size: 10px;
    }
    .inputfile label{
    	font-weight: 600;
    }
    .prtform input[type="submit"]{
    	margin-top: 15px;
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
                <a href="faculty_registration.php" class="active">
                  <span class="icon"><i class="fa fa-user-plus"></i></i></span>
                  <span class="title">Add Student</span>
                </a>
              </li>
              <li>
                <a href="student_reg_report.php">
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
      <div class="container">
      	<div class="student-form-head"><h2>Student Registration Form</h2></div>
      	<div class="student-form">
      <form method="post" action="#" enctype="multipart/form-data">
      	<div class="row">
      		
      		<div class="col-md-6">
      			<div class="prtform">
                    <input type="text" name="s1" required="" id="stdname">
                    <label>Student Name </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <input type="text" name="s2" required="" id="fname">
                    <label>Std. Father's Name </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <select name="s3" required="" id="category">
                    	<option></option>
                        <option value="OBC">OBC</option>
                        <option value="ST/SC">ST/SC</option>
                        <option value="General">General</option>
                    </select>
                    <label>Category </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <select class="" name="s4" id="course" onchange="fun()" required="">
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
                    <label>Course </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <select class="" name="s5" id="branch" onchange="fun1()" required="">
                      <option></option>
                    </select>
                    <label>Branch </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <select class="" name="s6" id="session" required="">
                      <option></option>
                    </select>
                    <label>Session </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <input type="text" name="s7" id="enroll" required="">
                    <label>Enrollment No. </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <input type="text" name="s8" id="mobile" required="" pattern="[6-9]{1}[0-9]{9}" maxlength="10">
                    <label>Mobile No. </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <input type="text" name="s9" id="altmob" required="" pattern="[6-9]{1}[0-9]{9}" maxlength="10">
                    <label>Alternet Mobile No. </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <input type="email" name="s10" id="email" required="">
                    <label>Email </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
                    <select class="" name="s11" id="mentor" onchange="fun()" required="">
                      <option></option>
                      <option><?php echo $mname; ?></option>
                    </select>
                    <label>Mentor </label>
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="inputfile">
      				<label>Photo </label>
                    <input type="file" name="s12" id="photo">
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="inputfile">
      				<label>Signature </label>
                    <input type="file" name="s13" id="sign">    
                </div>
      		</div>
      		<div class="col-md-6">
      			<div class="prtform">
      			   <input type="submit" name="stdsub" value="register" class="btn btn-success form-control" onclick="std_reg()">
      		    </div>
      		</div>
      	</div>
      </form>
      	</div>
      </div>
  </div>
  
</div>  


<script type="text/javascript">
	function fun()
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

    function fun1()
    {
      course=$('#course').val();
      $.ajax({
           url:'session.php',
           type:'POST',
           data:{course:course},
           success: function(data)
           {
             $('#session').html(data);
           }

        });
    }

    function std_reg()
    {
      name=$('#stdname').val();
      fname=$('#fname').val();
      category=$('#category').val();
      course=$('#course').val();
      branch=$('#branch').val();
      session=$('#session').val();
      mobile=$('#mobile').val();
      Alt_Mobile=$('#altmob').val();
      email=$('#email').val();
      mentor=$('#mentor').val();
      if (name=="" || fname=="" || category=="" || course=="" || branch=="" || session=="" || email=="" || mentor=="") {
      	alert('Required All Field.......!!');
      }

    }

</script>

</body>
</html>
<?php 
include('connection.php');
	if (isset($_POST["stdsub"])) {

		$currentDate = date('Y-m-d');

		$pass_generator="RAIUNIVERSITY1234567890";
		$pass=substr(str_shuffle($pass_generator), 0,8);
		$stdname=ucwords($_POST['s1']);
		$fname=ucwords($_POST['s2']);
		$category=$_POST['s3'];
		$course=$_POST['s4'];
		$branch=$_POST['s5'];
		$session=$_POST['s6'];
		$enroll=strtoupper($_POST['s7']);
		$mobile=$_POST['s8'];
		$altmob=$_POST['s9'];
		$email=$_POST['s10'];
		$mentor=$_POST['s11'];
		$photo=$_FILES['s12'];
        $sign=$_FILES['s13'];

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



		$check="SELECT * FROM student_registrationdata WHERE Email='$email' or enrollment='$enroll'";
		$query=mysqli_query($con,$check);
		if (mysqli_num_rows($query)==1) {
			echo "<script>alert('Username Already Inserted.....!!');</script>";
		}
		else{
		$ins="INSERT INTO student_registrationdata(Student_Name,Father_Name,Category,Course,Branch,Session,enrollment,
													Mobile,Alter_Mobile,Email,password,Photo,signature,mentor,reg_date) 
							values('$stdname','$fname','$category','$course','$branch',
							'$session','$enroll','$mobile','$altmob','$email','$pass','$pdestinationfile','$sdestinationfile','$mentor','$currentDate')";
		if (mysqli_query($con,$ins)) {
			echo "<script>alert('successfully inserted');</script>";
		}
		else{
			echo "<script>alert('not inserted');</script>";
		}
		}
	}
	}

?>