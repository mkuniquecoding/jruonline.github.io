<?php
    include('connection.php');
    session_start();
    $stdname=$_SESSION['std_name'];
    if(!isset($stdname))
    {
        header('location:stdlogin.php');
    }
?>
<html>
    <head>
        <title>jru parent feedback form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <style>
            #prtform
            {
                background-image:url(img/regform.jpg);
            }
            #prtform h2
            {
                text-align: center;
                color: #000;
                padding: 10px 0px;
            }
            #prtform h2:after
            {
                content: '';
                background:#000;
                height: 3px;
                width: 80%;
                display: block;
                margin: 20px auto 5px;
            }
            .feedback_border
            {
                border: 1px solid #000;
            }
            .prtform
            {
                position: relative;
            }
            .prtform input
            {
                width: 80%;
                padding: 10px 0;
                color: #757575;
                font-size: 15px;
                outline: none;
                margin-bottom: 20px;
                background: transparent;
                border: none;
                border-bottom: 1px solid #000;
            }
            .prtform select
            {
                width: 80%;
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
            .prtnote p
            {
                text-align: justify;
            }
            .prtnote p span
            {
                font-weight: 600;
            }
            
            .rate
            {
                margin: 20px 0px;
            }
            .rate p
            {
                margin-left: 20px;
                padding: 20px;
                display: inline;
            }
            .prt_rating
            {
                margin: 10px 0px;
            }
            .prt_rating table tr td,
            .prt_rating table tr th
            {
                padding: 10px;
            }
            .prt_rating textarea
            {
                width: 100%;
                height: 150px;
                outline: none;
                background: transparent;
            }
            .prtform input[type="file"] 
            {
                margin: 10px 0;
                padding: 5px;
                border-bottom: 1px solid #000;
            }
            .prtform input[type="date"]
            {
                color: #fff;
                transition: 0.5s;
            }
            .prtform input[type="date"]:valid,
            .prtform input[type="date"]:hover
            {
                color: #757575;
            }
            .prtform p
            {
                font-size: 13px;
            }
            .prtform input[type="submit"] 
            {
                text-align: center;
                color: #fff;
                background-image:  linear-gradient(56deg, #4776e6, #8e54e9);
                height: 55px;
                width: 200px;
                outline: none;
                margin: 20px 0px;
                border: none;
            }
            .notes .p1
            {
                text-align: center;
                font-weight: 600;
                text-decoration: underline;
                color: #000;
                font-style: normal;
            }
            .notes p
            {
                text-align: center;
                font-style: italic;
            }
            .aname
            {
                text-transform: lowercase;
            }
            .enroll input[type="text"]
            {
                text-transform: uppercase;
            }
            .enroll input[type="text"]:valid
            {
                text-transform: uppercase;
            }
            #error_msg
            {
                color: red;
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
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">about</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">result</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="aname"><?php echo $stdname; ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#"><span class="aname"><?php echo $stdname; ?></span></a>
            <a class="dropdown-item" href="logout.php"><i class="fa fa-user"></i> View Profile</a>
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
                            <h1>Welcome to jru-online</h1>
                            <p>University aims to create a knowledge pool for the State of Jharkhand by serving the needs of diverse communities. JRU continuously strives to provide quality education to its students through dynamic research, rigorous training and efficient mentorship</p>
                        </div>
                        <div class="video-play">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------Parent feedback Form area-------------------------->
        <section id="prtform">
            <div class="container feedback_border">
                <h2>JHARKHAND RAI UNIVERSITY - PARENT'S FEEDBACK FORM</h2>
                <form id="myform" method="post" action="prtformdata_insert.php">
                <div class="row">
                        <div class="col-md-6">
                            <div class="prtform">
                                <select required name="p1" id="course" onchange="fetchbranch()">
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
                                <label>COURSE</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prtform">
                                <select required="" name="p2" id="branch" onchange="fetchsem()">
                                    <option></option>
                                </select>
                                <label>BRANCH </label>                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prtform">
                                <select required name="p3" id="sem" onchange="fetchmentor()">
                                    <option></option>
                                    <option>sem</option>
                                </select>
                                <label>SEMESTER </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="prtform">
                                <input type="date" name="p4" required="" id="date">
                                <label>Date </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prtform">
                                <input type="text" name="p5" required="" id="prtname">
                                <label>PARENT'S NAME </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prtform">
                                <input type="text" name="p6" required="" id="phone">
                                <label>PHONE NO </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prtform">
                                <input type="text" name="p7" required="" id="name">
                                <label>WARD'S NAME </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prtform enroll">
                                <input type="text" name="p8" required="" id="enroll">
                                <label>ENROLLMENT NO. </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prtform">
                                <input type="email" name="p9" required="" id="email" value="<?php echo $stdname; ?>">
                                <label>E-MAIL ID </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prtform">
                                <select required name="p10" id="mentor">
                                    <option></option>
                                </select>
                                <label>Select Mentor</label>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="prtnote">
                                <p><span>Note : </span>The five-year old JRU, the first of its kind in the state of jharkhand provides all facilities for its students to turn enterpreneurs and professionals. Parents are important stakeholder of education; therefore their satisfaction is important to us. Parents are requested to give their feedback on the following features/faculties University is providing to their ward. Please rate each feature and assign number according to the following scheme.</p>
                            </div>
                            <div class="rate">
                                <p>1. Excillent</p>
                                <p>2. V Good </p>
                                <p>3. Good</p>
                                <p>4. Average</p>
                                <p>5. Poor</p>
                            </div>
                        </div>
                    <div class="col-md-12">
                        <div class="prt_rating">
                            <table border="1">
                                <tr>
                                    <th>SI. No</th>
                                    <th>features</th>
                                    <th>Rating</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Provision of career oriented programmes</td>
                                    <td><input type="number" required max="5" min="1" name="p11" id="p11"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Quality of Teaching</td>
                                    <td><input type="number" required max="5" min="1" name="p12" id="p12"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>System of Monitoring Student's Progress</td>
                                    <td><input type="number" required max="5" min="1" name="p13" id="p13"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Competence & Commitment of Faculty</td>
                                    <td><input type="number" required max="5" min="1" name="p14" id="p14"></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Encouragement provided to students for Participation in Academic/Cultural Events</td>
                                    <td><input type="number" required="" max="5" min="1" name="p15" id="p15"></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Infrastructure Facilities</td>
                                    <td><input type="number" required max="5" min="1" name="p16" id="p16"></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Learning Resources such as Library, Internet, Computer, etc.</td>
                                    <td><input type="number"required max="5" min="1" name="p17" id="p17"></td>
                                </tr>
                                
                                <tr>
                                    <td>8</td>
                                    <td>Examination System</td>
                                    <td><input type="number" required max="5" min="1" name="p18" id="p18"></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Grooming of Student’s Personality</td>
                                    <td><input type="number" required max="5" min="1" name="p19" id="p19"></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Discipline Practices</td>
                                    <td><input type="number" required max="5" min="1" name="p20" id="p20"></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Response & Communication with the University.</td>
                                    <td><input type="number" required max="5" min="1" name="p21" id="p21"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><textarea placeholder="Suggestion/Comment (if Any)" name="p22" id="p22"></textarea></td>
                                </tr>
                            </table>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="prtform">
                            <input type="file" required name="p23" id="p23">
                            <p>PARENT'S SIGNATURE</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="prtform">
                            <input type="submit" name="submit" id="submit" value="Submit form">
                            <p id="error_msg"></p>
                        </div> 
                    </div>
                </div>
                 </form>
            </div>
            
            <div class="notes">
                <p class="p1">NOTE :</p>
                <P>Duly filled in form may be sent to The Registrar, Jharkhand Rai University,<br> Kamre, Ratu Road Ranchi- 835222 or email on registrar@jru.edu.in</P>
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
       
       <script type="text/javascript">
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

            function fetchsem()
            {
              course=$('#course').val();
              $.ajax({
                   url:'semester.php',
                   type:'POST',
                   data:{course:course},
                   success: function(data)
                   {
                     $('#sem').html(data);
                   }

                });
            }

            function fetchmentor()
            {
              course=$('#course').val();
              branch=$('#branch').val();
              $.ajax({
                   url:'mentors.php',
                   type:'POST',
                   data:{course:course,branch:branch},
                   success: function(data)
                   {
                     $('#mentor').html(data);
                   }

                });
            }


            $(document).ready(function(){
                $('#submit').click(function(){
                    course=$('#course').val();
                    branch=$('#branch').val();
                    sem=$('#sem').val();
                    date=$('#date').val();
                    prtname=$('#prtname').val();
                    phone=$('#phone').val();
                    name=$('#name').val();
                    enroll=$('#enroll').val();
                    email=$('#email').val();
                    mentor=$('#mentor').val();
                    provision=$('#p11').val();
                    quality=$('#p12').val();
                    progress=$('#p13').val();
                    competence=$('#p14').val();
                    participate=$('#p15').val();
                    infrastructure=$('#p16').val();
                    learning_resourse=$('#p17').val();
                    exam_system=$('#p18').val();
                    grooming=$('#p19').val();
                    discipline=$('#p20').val();
                    communication=$('#p21').val();
                    suggestion=$('#p22').val();
                    sign=$('#p23').val();
                    if (date=="" || prtname=="" || phone=="" || name=="" || enroll=="" || email=="" || mentor=="" || provision=="" || competence=="" || participate=="" || infrastructure=="" || learning_resourse=="" || exam_system=="" || grooming=="" || discipline=="" || communication=="" || sign=="") {
                        alert("All Field are required.....");
                    }
                    else{
                        $('#error_msg').html('');
                        $.ajax({
                           url:'prtformdata_insert.php',
                           type:'post',
                           data:$("#myform input, select").serialize(),
                           success: function(data){
                               console.log(data);
                   }
               });
                    }
                });

            });
                
                
       </script> 
    </body>
</html>function 