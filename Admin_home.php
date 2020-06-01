<?php
    session_start();
    $aname=$_SESSION['admin_name'];
    if(!isset($aname))
    {
        header('location:facultylogin.php');
    }
?>
<html>
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <link href="css/adminpannel.css" rel="stylesheet">
        <style>
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
            @media only screen and (max-width: 540px){
              .ABox{
                padding: 15px;
                height: 80px;
            }  
            }
            #dashboard h2:after
            {
                content: '';
                background: red;
                height: 3px;
                width: 170px;
                display: block;
                margin: 20px auto 5px;
            }
        </style>
    </head>
    <body>
        <section id="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#" style="color: white;">jru-online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Admin_home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ADD Faculty</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Dashboard</a>
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="aname"><?php echo $aname; ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#"><span class="aname"><?php echo $aname; ?></span></a>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-in"></i> logout</a>
        </div>
      </li> 
    </ul>
  </div>
</nav>
        </section>
        <section id="banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner">
                           <img src="img/img1.png">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-title">
                            <h1>Welcome to jru-online (Admin)</h1>
                            <p>University aims to create a knowledge pool for the State of Jharkhand by serving the needs of diverse communities. JRU continuously strives to provide quality education to its students through dynamic research, rigorous training and efficient mentorship</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!---------------Dashboard--------------------------->
        <section id="dashboard">
            <h2 class="text-center text-danger">Admin Dashboard</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-6 col-sm-6 Acontent" align=center>
                        <div class="ABox bg-success">
                            <i class="fa fa-address-card"></i>
                            <a href="faculty_reg.php">Add Faculty</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 col-sm-6 Acontent" align=center>
                        <div class="ABox bg-primary">
                            <i class="fa fa-address-card"></i>
                            <a href="faculty_reg_report.php">Faculty Report</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 col-sm-6 Acontent" align=center>
                        <div class="ABox bg-info">
                            <i class="fa fa-user-plus"></i>
                            <a href="">Student Report</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 col-sm-6 Acontent" align=center>
                        <div class="ABox bg-warning">
                            <i class="fa fa-file-text"></i>
                           <a href="">Exam Form Report</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 col-sm-6 Acontent" align=center>
                        <div class="ABox bg-secondary">
                            <i class="fa fa-address-card-o"></i>
                            <a href="MentorRecord.php">Mentor Report</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 col-sm-6 Acontent" align=center>
                        <div class="ABox bg-danger">
                            <i class="fa fa-address-card-o"></i>
                            <a href="HOD.php">HOD Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!---------------Footer Section--------------------->
        <section id="footer">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-links">
                        <h2>Useful Links</h2>
                        <ul>
                            <li>Home</li>
                            <li>About</li>
                            <li>Attendence</li>
                            <li>profile</li>
                            <li>Leave</li>
                            <li>Gallary</li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-links">
                        <h2>Contact Us</h2>
                        <ul>
                            <li>Jharkhand Rai University,<br> Kamre, Ratu Road Ranchi - 835222</li>
                            <li>Campus : Raja Ulatu,<br> Namkum, Ranchi - 834010</li>
                            <li>visit : jru.edu.in</li>
                            <li>Email: Info@Jru.Edu.In</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-links">
                        <h2>Call Us</h2>
                        <ul>
                            <li>Admission Helpline : 1800 120 2546</li>
                            <li>Reception : 9693296660</li>
                            <li>Career Management Cell (T&P) : 9693296661</li>
                            <li>Exam Cell : 9693296664</li>
                            <li>Accounts Deptt.: 9693296667</li>
                            <li>Public Relation Officer: 7979899524</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="jru-img" align=center>
                        <h2>JRU- Campus</h2>
                        <img src="img/jru.jpg">
                    </div>
                </div>
                <div class="col-md-12 copyright">
                    <p><i class="fa fa-heart"></i> 2020 Copyright: jruonline.com</p>
                </div>
            </div>
            </div>
        </section>
    </body>
</html>
    