<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Exam Ground</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <script src="https://use.fontawesome.com/dd653cca0e.js"></script>

  <script>
    var elem = document.documentElement;

    function openFullscreen1() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) {
        /* Safari */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) {
        /* IE11 */
        elem.msRequestFullscreen();
      }
    }

    function closeFullscreen1() {
      if (document.fullscreenElement) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) {
        /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        /* IE11 */
        document.msExitFullscreen();
      }
    }
  </script>


  <!--alert message-->
  <?php if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
  }
  ?>
  <!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
session_start();
if (!(isset($_SESSION['email']))) {
  header("location:index.php");
} else {
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $college = 'IIEST';
} ?>

<body class="bodyClass" style="background: url(image/bg5.jpg);">

  <!----------------------- Setting up the navbar for header ------------------------->

  <nav class="navbar navbar-expand-lg navbar-dark title1" style="background-color: #7952B3;" id="main-nav">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <a class="navbar-brand fw-bold fs-4" style="color:aqua" href="account.php?q=1">Exam Ground&nbsp;<i class="fa fa-book"></i>&nbsp;&nbsp;</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--- Collect the nav links, forms, and other content for toggling --->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php if (@$_GET['q'] == 1) echo ' active'; ?>" href="account.php?q=1"><i class="fa fa-home fa-lg"></i>&nbsp;Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (@$_GET['q'] == 2) echo ' active'; ?>" href="account.php?q=2">
              <i class="bi bi-file-text-fill"></i></i>&nbsp;History
            </a>

          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (@$_GET['q'] == 3) echo ' active'; ?>" href="account.php?q=3"><i class="bi bi-bar-chart-line-fill"></i>&nbsp;Ranking</a>
          </li>
        </ul>
        <form class="d-flex">
          <span class="pull-right title1" style="justify-content:center;">
            <span class="log1">
              <span><i class="fa fa-user-o "></i>&nbsp; Hello, </span>
              <a class="log" href="account.php?q=1"><?php echo explode(' ', trim($name))[0]; ?></a>
            </span>
            <span style="color: white;">|</span>
            <a href="#" data-bs-toggle="modal" data-bs-target="#signOutModal" class="log">
              Signout&nbsp;&nbsp;<i class="fa fa-sign-out fa-lg "></i>
            </a>
          </span>

        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!--navigation menu closed-->

  <!---------------------------------- Modal for sign-out --------------------------------->
  <div class="modal fade title1" id="signOutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-family: typo; color: orange;">Confirm Sign out</h5>
          <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"> Are you sure you want to Logout?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a type="button" href="logout.php?q=account.php" class="btn btn-primary px-3"> OK </a>
        </div>
      </div>
    </div>
  </div>

  <!-- "" -->

  <div id="bg" class="body-with-footer">
    <div class="container">
      <!--container start-->
      <div class="row">
        <div class="col-md-12">

          <!------------------------------------- HOME PAGE START ------------------------------------->
          <?php if (@$_GET['q'] == 1) {
            echo '<script>closeFullscreen();</script>';
            $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
            /***************  Printing the table headings ***************/
            echo  '<div class="panel">
                      <div class="table-responsive">
                        <table class="table table-hover table-striped title1" style = "font-weight:bold;">
                          <tr class = "table-dark" >
                            <td>S.N.</td>
                            <td>Topic</td>
                            <td>Total question</td>
                            <td>Positive</td>
                            <td>Negative</td>
                            <td>Max. Marks</td>
                            <td>Time limit</td>
                            <td></td>
                          </tr>';
            $c = 1;
            while ($row = mysqli_fetch_array($result)) {
              $title = $row['title'];
              $total = $row['total'];
              $sahi = $row['sahi'];
              $time = $row['time'];
              $eid = $row['eid'];
              $neg = $row['wrong'];
              $seed = FLOOR(RAND() * 100);

              //fetch the exams already given by student
              $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
              $rowcount = mysqli_num_rows($q12);
              /***************  Printing the exams information ***************/
              if ($rowcount == 0) {  //if the student haven't given the exam previously
                echo  '<tr> 
                          <td style="color:blue">' . $c++ . '</td>
                          <td style="color:#042391 ">' . $title . '</td>
                          <td>' . $total . '</td>
                          <td style="color:green">+' . $sahi . '</td>
                          <td style="color:red">-' . $neg . '</td>
                          <td style="color:green">' . $sahi * $total . '</td>
                          <td style="color:#ef3535">' . $time . '&nbsp;min</td>
                          <td>
                            <b>
                                <a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&s=' . $seed . '" class="pull-right btn btn-success quizBtn" style="margin:0px; padding-right: 1.30rem; padding-left: 1.30rem;" ><b> <i class="fa fa-play"></i>&nbsp;Start </b></a>
                            </b>
                          </td>
                        </tr>';
              } else {
                echo  '<tr>
                          <td style="color:blue">' . $c++ . '</td>
                          <td class="text-success">' . $title . '&nbsp;<i class="fa fa-check fa-lg"></i></td>
                          <td>' . $total . '</td>
                          <td style="color:green">+' . $sahi . '</td>
                          <td style="color:red">-' . $neg . '</td>
                          <td style="color:green">' . $sahi * $total . '</td>
                          <td style="color:#ef3535">' . $time . '&nbsp;min</td>
                          <td>
                            <b>
                              <a class="pull-right btn btn-warning quizBtn" href = "account.php?q=restart&step=2&eid=' . $eid . '&n=1&t=' . $total . '&s=' . $seed . '"  style="margin:0px; text-shadow: 2px 2px 4px #fff; "><b> <i class="fa fa-repeat"></i>&nbsp;Restart </b></span></a>
                            </b>
                          </td>
                        </tr>';
              }
            }
            $c = 0;
            echo '</table></div></div>';
          } ?>


          <!---------------------- Modal for asking confirmation about Re-Test --------------------->
          <?php
          if (@$_GET['q'] == 'restart' && @$_GET['step'] == 2) {
            echo '<script>closeFullscreen();</script>';
            $eid = @$_GET['eid'];
            $total = @$_GET['t'];
            $seed = @$_GET['s'];
            echo '<button type="button" id="launch" style = "display:none;" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>';

            echo '<script type="text/javascript">
            $(document).ready(function() {
              $("#launch").click();
            });
            </script>';

            echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style = "font-family: ubuntu; font-size: 1.2rem;" >Confirm Re-test</h5>
                        <a type="button" class="btn-close" href = "account.php?q=1"></a>
                      </div>
                      <div class="modal-body">
                      <p style = "color: red; font-family:typo; font-size: 1.1rem;">Any previous Score for this exam will get reset.</p>
                      </div>
                      <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" href = "account.php?q=1">Close</a>
                        <a type="button" class="btn btn-danger" href = "update.php?q=quizre&step=25&eid=' . $eid . '&n=1&t=' . $total . '&s=' . $seed . '">Confirm</a>
                      </div>
                    </div>
                  </div>
                </div>';
          }
          ?>
          <!------------------------------------- HOME PAGE CLOSED ------------------------------------->

          <!-- <span id="countdown" class="timer"></span>
          <script>
            var seconds = 40;

            function secondPassed() {
              var minutes = Math.round((seconds - 30) / 60);
              var remainingSeconds = seconds % 60;
              if (remainingSeconds < 10) {
                remainingSeconds = "0" + remainingSeconds;
              }
              document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
              if (seconds == 0) {
                clearInterval(countdownTimer);
                document.getElementById('countdown').innerHTML = "Buzz Buzz";
              } else {
                seconds--;
              }
            }
            var countdownTimer = setInterval('secondPassed()', 1000);
          </script> -->

          <!--home closed-->



          <!---------------------------------- QUIZ START ------------------------------------->
          <?php
          if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {

            echo '<script>openFullscreen();</script> ';
            $eid = @$_GET['eid'];
            $sn = @$_GET['n'];
            $seed = @$_GET['s'];
            $total = @$_GET['t'];
            // if ($sn > $total) {
            //   echo '<a type="button" id="last" style = "display:none;" ></a>';
            //   echo '<script type="text/javascript">
            //   $(document).ready(function() {
            //     $("#last").click();
            //   });
            //   </script>';
            // }
            $q = mysqli_query($con, "SELECT* FROM(SELECT ROW_NUMBER() OVER (ORDER BY RAND($seed)) AS row_num , eid , qid , qns ,choice , sn From questions WHERE eid = '$eid') AS sub WHERE row_num = '$sn'");
            // $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' ORDER BY RAND($seed)");
            echo
            ' <div class="container container2 mt-5 my-1">
                <div class="question ml-sm-3 pl-sm-3 pt-2">';

            /***************  Printing the question ***************/
            while ($row = mysqli_fetch_array($q)) {
              $qns = $row['qns'];
              $qid = $row['qid'];
              echo '<h5 class="py-2" style="font-size:1.3rem; font-weight:none; margin:0;"><b>Q' . $sn . '. ' . $qns . '</b></h5>';
            }
            /***************  Printing the options ***************/
            $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
            echo '<div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
             <form  action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '&s=' . $seed . '" method="POST" class="form-horizontal"><br />';

            while ($row = mysqli_fetch_array($q)) {
              $option = $row['option'];
              $optionid = $row['optionid'];

              echo '<label class="options">' . $option . '<input type="radio" name="ans" value = "' . $optionid . '"> <span class="checkmark"></span> </label>';
            }
            echo
            '<div class="d-flex align-items-center pt-3 qus">
            <div class="ms-auto"> <button class="quizBtn btn btn-primary bg-primary text-black" style = "text-shadow:none;" type="submit;" onclick = "openFullscreen();">Submit</button> </div>
                  </div>
                </form>
              </div>';
            echo '</div>
            </div>';
            //header("location:dash.php?q=4&step=2&eid=$id&n=$total");
          }

          /***************************************  Result Display **************************************/
          if (@$_GET['q'] == 'result' && @$_GET['eid']) {
            echo '<script>closeFullscreen();</script>';
            $eid = @$_GET['eid'];
            $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error157');
            $q2 = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid'") or die('Error158');
            while ($row = mysqli_fetch_array($q2)) {
              $perCorrect = $row['sahi'];
              $perWrong = $row['wrong'];
            }
            echo  '<div class="panel">
                      <p class="title fs-1" style="color:#660033;">Result</p>
                    <br />
                    <div class = "table-responsive">
                     <table class="table table-hover title1 fs-5 fw-bold">';

            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              $w = $row['wrong'];
              $r = $row['sahi'];
              $qa = $row['level'];
              echo  '<tr class="table-primary">
                      <td class="text-start">Total Questions</td>
                      <td>' . $qa . '</td>
                    </tr>
                    <tr class="text-success table-primary">
                      <td class="text-start">Right Answers&nbsp;<i class="fa fa-check-circle"></i></td>
                      <td>' . $r . '&nbsp;(+' . $perCorrect * $r . ')</td>
                    </tr> 
                    <tr class="text-danger table-primary">
                      <td class="text-start">Wrong Answers&nbsp;<i class="fa fa-times-circle"></i></td>
                      <td>' . $w . '&nbsp;(-' . $perWrong * $w . ')</td>
                    </tr>
                    <tr class="text-primary table-primary">
                      <td class="text-start">Score&nbsp;<i class="fa fa-star"></i></td>
                      <td>' . $s . '</td>
                    </tr>';
            }
            $q = mysqli_query($con, "SELECT * FROM ranks WHERE  email='$email' ") or die('Error157');
            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              echo '<tr class="text-success table-info">
                      <td class="text-start">Overall Score&nbsp;<i class="fa fa-signal"></i></td>
                      <td>' . $s . '</td>
                    </tr>';
            }
            echo '</table></div></div>';
          }
          ?>
          <!--quiz end-->


          <?php
          /***************************************  History start **************************************/
          if (@$_GET['q'] == 2) {
            echo '<script type="text/javascript">
            $(".navbar-nav li a").function() {
              $(".navbar-nav li a").removeClass(active);
              $(this).addClass(active);    
            };
            </script>';
            $q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC ") or die('Error197');
            echo  '<div class="panel title">
                     <div class="table-responsive">
                      <table class="table table-hover table-striped title1" >
                        <tr class = "table-dark">
                          <td><b>S.N.</b></td>
                          <td><b>Quiz</b></td>
                          <td><b>Question Solved</b></td>
                          <td><b>Right</b></td>
                          <td><b>Wrong<b></td>
                          <td><b>Score</b></td>
                        </tr>';
            $c = 0;
            while ($row = mysqli_fetch_array($q)) {
              $eid = $row['eid'];
              $s = $row['score'];
              $w = $row['wrong'];
              $r = $row['sahi'];
              $qa = $row['level'];
              $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');
              $row = mysqli_fetch_array($q23);
              $title = $row['title'];
              $c++;
              echo '<tr class = "fw-bold">
                        <td style = "color: blue" >' . $c . '</td>
                        <td style = "color: #042391" >' . $title . '</td>
                        <td>' . $qa . '</td>
                        <td style = "color: green">' . $r . '</td>
                        <td style = "color: red">' . $w . '</td>
                        <td style = "color: blue">' . $s . '</td>
                      </tr>';
            }
            echo '</table></div></div>';
          }

          /***************************************  ranking start **************************************/
          if (@$_GET['q'] == 3) {
            $q = mysqli_query($con, "SELECT * FROM ranks  ORDER BY score DESC ") or die('Error223');
            echo  '<div class="panel">
                    <div class="table-responsive">
                      <table class="table table-hover table-striped title1" style = "font-weight:bold;">
                        <tr class = "table-dark" >
                          <td>Rank</td>
                          <td>Name</td>
                          <td>Gender</td>
                          <td>College</td>
                          <td>Score</td>
                        </tr>';
            $c = 0;
            while ($row = mysqli_fetch_array($q)) {
              $e = $row['email'];
              $s = $row['score'];
              $q12 = mysqli_query($con, "SELECT * FROM students WHERE email='$e' ") or die('Error231');
              while ($row = mysqli_fetch_array($q12)) {
                $name = $row['name'];
                $gender = $row['gender'];
              }
              $c++;
              if ($c == 1) {
                echo '<tr class = "table-active text-success" >
                        <td style="color:green">' . $c . '</td>
                        <td>' . $name . '';
                if ($e == $email) {
                  echo ' (You)';
                }
                echo '</td>
                        <td>' . $gender . '</td>
                        <td>' . $college . '</td>
                        <td>' . $s . '</td>
                      <tr>';
              } else if ($email == $e) {
                echo '<tr class = "table-active text-primary">
                        <td>' . $c . '</td>
                        <td>' . $name . ' (You)</td>
                        <td>' . $gender . '</td>
                        <td>' . $college . '</td>
                        <td>' . $s . '</td>
                      <tr>';
              } else {
                echo '<tr class = "table-active">
                          <td style="color:blue">' . $c . '</td>
                          <td>' . $name . '</td>
                          <td>' . $gender . '</td>
                          <td>' . $college . '</td>
                          <td>' . $s . '</td>
                      <tr>';
              }
            }
            echo
            '</table>
              </div>
              </div>';
          }
          ?>



        </div>
      </div>
    </div>
  </div>

  <!------------------------------------- Footer start ------------------------------------->
  <footer class="row footer mt-auto" style="background-color: #7952B3;" id="my-footer">
    <div class="col-md-3 box">
      <a href="#" target="_blank"><i class="fa fa-address-card"></i>&nbsp;&nbsp;About us</a>
    </div>
    <div class="col-md-3 box">
      <a href="#" data-bs-toggle="modal" data-bs-target="#adminLogin"><i class="bi bi-shield-lock-fill"></i>&nbsp;&nbsp;Admin Login</a>
    </div>
    <div class="col-md-3 box">
      <a href="#" data-bs-toggle="modal" data-bs-target="#developers"><i class="fa fa-users"></i>&nbsp;Developers</a>
    </div>
    <div class="col-md-3 box">
      <a href="feedback.php" target="_blank"><i class="fa fa-comments fa-lg"></i>&nbsp;Feedback</a>
    </div>
  </footer>
  <!--footer end-->


  <!------------------------------------- Modal For Developers ------------------------------------->
  <div class="modal fade title1" id="developers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developers</span>
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body" style="text-align: center;">

          <div class="row">
            <div class="col-md-6 float-md-end">
              <img src="image/pp.jpg" width=100 height=100 alt="Mohammad Saif Khan" class="img-rounded">
              <a href="#" style="display: block; color:#202020; font-family:'typo' ; font-size:16px; color: blue; text-decoration: none;" title="Find on Facebook">Mohd. Saif Khan</a>
              <h5 style="color:#202020; font-family:'typo'; font-size: 13px; " class="title1">+91 9140671497</h5>
              <a style="font-family:'typo';font-size: 14px; text-decoration: none;" class="title1" href="mailto:ksarim225@gmail.com" target="_blank">ksarim225@gmail.com</a>
            </div>

            <div class="col-md-6">
              <img src="image/emanur.png" width=100 height=100 alt="Emanur Rahman" class="img-rounded">
              <a href="#" style="display: block; color:#202020; font-family:'typo' ; font-size:16px; color: blue; text-decoration: none;" title="Find on Facebook">Emanur Rahman</a>
              <h5 style="color:#202020; font-family:'typo'; font-size: 13px;" class="title1">+91 7047615466</h5>
              <a style="font-family:'typo';font-size: 14px; text-decoration: none;" class="title1" href="mailto:emanur99rahman@gmail.com" target="_blank">emanur99rahman@gmail.com</a>

            </div>
          </div>

          <div class="row mt-2">
            <div class="col">
              <a style="font-family:'typo'; display:'inline-block'; margin-bottom: 13px;" ; class="title1" href="https://www.iiests.ac.in/" target="_blank">Indian Institute of Engineering Science and
                Technology,
                Shibpur
              </a>
            </div>
          </div>

        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!------------------------------------- Modal for admin login ------------------------------------->
  <div class="modal fade title1" id="adminLogin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Log In</span>
          </h4>
          <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body title1">
          <form role="form" method="post" action="admin.php?q=index.php">
            <fieldset>

              <!-- text-input -->
              <div class="row mb-2">
                <div class="col-sm-10 col-md-6">
                  <input id="uName" name="uname" maxlength="20" placeholder="Admin user-id" class="form-control input" type="text" autofocus>
                </div>
              </div>


              <!-- Password input-->
              <div class="row mb-2">
                <div class="col-sm-10 col-md-6">
                  <input name="password" maxlength="15" placeholder="Password" type="password" class="form-control input">
                </div>
              </div>
            </fieldset>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="login" class="btn btn-primary">Log In</button>
            </div>
          </form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <!------------ This script hides all the navbars and footers as soon as the quiz starts ------------>
  <?php
  if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
    echo
    '<script type="text/javascript">
    
    const y = document.getElementById("main-nav");
    y.classList.add("display-off");
    
    const z = document.getElementById("my-footer");
    z.classList.add("display-off");
    
    const t = document.getElementById("bg");
    t.classList.remove("body-with-footer");
    t.classList.add("body-without-footer");
      </script>';
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    var myModal = document.getElementById('adminLogin')
    var myInput = document.getElementById('uName')

    myModal.addEventListener('shown.bs.modal', function() {
      myInput.focus()
    })
  </script>

</body>

</html>