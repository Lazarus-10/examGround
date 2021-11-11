<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Exam Ground | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <script src="https://use.fontawesome.com/dd653cca0e.js"></script>


  <?php
  include_once 'dbConnection.php';
  session_start();
  $email = $_SESSION['email'];
  $college = 'IIEST';
  if (!(isset($_SESSION['email']))) {
    header("location:index.php");
  } else {
    $name = $_SESSION['name'];;
  } ?>
</head>

<body class="bodyClass" style="background: url(image/bg5.jpg);" style="background:#eee;">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark title1" id="main-nav">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <a class="navbar-brand text-info fw-bold fs-4" href="dash.php?q=0">Exam Ground&nbsp;<i class="fa fa-book"></i></a>
      <form class="d-flex">
        <span class="pull-right title1" style="justify-content:center;">
          <span class="log1">
            <span><i class="fa fa-user-o "></i>&nbsp;&nbsp;Hello, </span>
            <a class="me-0 log" href="dash.php?q=0"><?php echo $name; ?></a>
          </span>
          <span>
            <span style="color: white;">|&nbsp;</span>
            <a href="logout.php?q=account.php" class="log">
              <i class="fa fa-sign-out-alt"></i>Signout&nbsp;&nbsp;<i class="fa fa-sign-out fa-lg "></i>
            </a>
          </span>
        </span>

      </form>
    </div><!-- /.container-fluid -->
  </nav>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="main-nav">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <a class="navbar-brand" href="dash.php?q=0"><i class="fa fa-cog fa-spin fa-lg fa-fw"></i>Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--- Collect the nav links, forms, and other content for toggling --->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php if (@$_GET['q'] == 0) echo ' active'; ?> " aria-current="page" href=" dash.php?q=0"><i class="fa fa-home fa-lg"></i>&nbsp;Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (@$_GET['q'] == 1) echo ' active'; ?>" href="dash.php?q=1">
              <i class="fa fa-users "></i>&nbsp;Students
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (@$_GET['q'] == 2) echo ' active'; ?>" href="dash.php?q=2"><i class="fa fa-signal"></i>&nbsp;Rankings</a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link <?php if (@$_GET['q'] == 3) echo ' active'; ?>" href="dash.php?q=3"><i class="fa fa-comments "></i>&nbsp;Feedbacks</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  <?php if (@$_GET['q'] == 4 || @$_GET['q'] == 5) echo ' active'; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-book"></i>&nbsp;Quiz</span></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-success" href="dash.php?q=4"><i class="fa fa-plus-square"></i>&nbsp;Add Quiz</a></li>
              <li><a class="dropdown-item text-danger" href="dash.php?q=5"><i class="fa fa-minus-square"></i>&nbsp;Remove Quiz</a></li>
            </ul>

          </li>
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <!-- admin start-->

  <!--navigation menu-->

  <!--navigation menu closed-->
  <div class="container">
    <!--container start-->
    <div class="row">
      <div class="col-md-12">
        <!--home start-->

        <?php if (@$_GET['q'] == 0) {

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



            echo  '<tr> 
            <td style="color:blue">' . $c++ . '</td>
            <td style="color:#042391">' . $title . '</td>
            <td>' . $total . '</td>
            <td style="color:green">+' . $sahi . '</td>
            <td style="color:red">-' . $neg . '</td>
            <td style="color:green">' . $sahi * $total . '</td>
            <td style="color:#ef3535">' . $time . '&nbsp;min</td>
            <td>
              <b>
                  <a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&s=' . $seed . '" class="pull-right btn btn-success quizBtn" style="margin:0px; padding-right: 1.30rem; padding-left: 1.30rem;" ><b> Test </b></a>
              </b>
            </td>
            <td>
              <b>
                  <a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&s=' . $seed . '" class="pull-right btn btn-success quizBtn" style="margin:0px; padding-right: 1.30rem; padding-left: 1.30rem;" ><b> Edit </b></a>
              </b>
            </td>
          </tr>';
          }
          echo '</table></div></div>';
        }

        if (@$_GET['q'] == 'result' && @$_GET['eid']) {
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
            $q = mysqli_query($con, "DELETE FROM students WHERE email='$email' ") or die('Error157');
        }

       
        ?>

        <!--home closed-->

        <!--students start-->
        <?php if (@$_GET['q'] == 1) {

          $result = mysqli_query($con, "SELECT * FROM students") or die('Error');
          echo  '<div class="panel">
                  <div class="table-responsive">
                  <table class="table table-striped table-hover ">
                    <tr class = "table-dark ">
                      <td><b>S.N.</b></td>
                      <td><b>Name</b></td>
                      <td><b>Gender</b></td>
                      <td><b>College</b></td>
                      <td><b>Email</b></td>
                      <td><b>Mobile</b></td>
                      <td><b>Verified</b></td>
                      <td></td>
                    </tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $mob = $row['mob'];
            $gender = $row['gender'];
            $email = $row['email'];
            $status = $row['is_verified'];

            echo '<tr class = "table-primary fw-bold">
                    <td class = "fw-bolder fs-6 text-primary">' . $c++ . '</td><td>' . $name . '</td>
                    <td>' . $gender . '</td>
                    <td>' . $college . '</td>
                    <td>' . $email . '</td>
                    <td>';
            if ($mob == 0) echo '-- NULL --';
            else echo $mob;
            echo '</td>
                    <td>
                      <i class="fa fa-2x ';?> <?php if($status)echo 'fa-check-circle text-success'; else echo'fa-times-circle text-danger';?> <?php echo'"></i>
                    </td>
	                  <td>
                      <a title="Delete Student" href="update.php?demail=' . $email . '"><i class="btn btn-primary quizBtn fa fa-trash-o"></i></a>
                    </td>
                  </tr>';
          }
          $c = 0;
          echo '</table></div></div>';
        } ?>
        <!--students end-->

        <!-- ranking start -->
        <?php if (@$_GET['q'] == 2) {
          $q = mysqli_query($con, "SELECT * FROM ranks ORDER BY score DESC ") or die('Error223');
          echo  '<div class="panel">
          <div class="table-responsive">
          <table class="table table-striped table-hover title1">
            <tr class = "table-dark">
                <td><b>Rank</b></td>
                <td><b>Name</b></td>
                <td><b>Gender</b></td>
                <td><b>College</b></td>
                <td><b>Score</b></td>
                <td><b>History</b></td>
              </tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($q)) {
            $e = $row['email'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM students WHERE email='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
              $name = $row['name'];
              $gender = $row['gender'];
            }
            echo '<tr class = "table-primary fw-bold">
                    <td class = "text-primary">' . $c++ . '</td>
                    <td>' . $name . '</td>
                    <td>' . $gender . '</td>
                    <td>' . $college . '</td>
                    <td>' . $s . '</td>
                    <td><a title="See History" href="dash.php?q=6&e='.$e.'"><i class="fa fa-folder-open fa-lg"></i></a></td>

                  <tr>';
          }
          echo
          '</table>
          </div>
        </div>';
        }
        ?>

        <!-- History Start -->
        <?php if(@$_GET['q'] == 6 && @$_GET['e']){
          $e = @$_GET['e'];
          $q = mysqli_query($con, "SELECT roll, name FROM students WHERE email='$e'") or die('Error199');
          $row = mysqli_fetch_array($q);
          echo '<h4 class = "title panel2" style = "text-align:center; margin: 20px;">HISTORY for <span title="" class ="text-danger">'.$row['name']. '</span> <span ><a title="Back to Ranking" style="text-decoration:none; font-size:1rem;" href="dash.php?q=2">&nbsp;<i class="btn btn-primary quizBtn fa fa-level-up"></i></a></span></h4>';


          $q = mysqli_query($con, "SELECT * FROM history WHERE email='$e' ORDER BY date DESC ") or die('Error197');
          echo  '<div class="panel title" style="margin-top:0;">
                   <div class="table-responsive">
                    <table class="table table-hover table-striped title1" >
                      <tr class = "table-dark">
                        <td><b>S.N.</b></td>
                        <td><b>Quiz</b></td>
                        <td><b>Question Solved</b></td>
                        <td><b>Right</b></td>
                        <td><b>Wrong<b></td>
                        <td><b>Date</b></td>
                        <td><b>Time</b></td>
                        <td><b>Score</b></td>

                      </tr>';
          $c = 0;
          while ($row = mysqli_fetch_array($q)) {
            $eid = $row['eid'];
            $s = $row['score'];
            $w = $row['wrong'];
            $r = $row['sahi'];
            $qa = $row['level'];
            $dt = $row['date'];
            $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');
            $row = mysqli_fetch_array($q23);
            $title = $row['title'];
            $c++;

            $time = new DateTime($dt);
            $date = $time->format('j.n.Y');
            $time = $time->format('H:i');

            echo '<tr class = "fw-bold">
                      <td style = "color: blue" >' . $c . '</td>
                      <td style = "color: #042391" >' . $title . '</td>
                      <td>' . $qa . '</td>
                      <td style = "color: green">' . $r . '</td>
                      <td style = "color: red">' . $w . '</td>
                      <td style = "color: ">' . $date . '</td>
                      <td style = "color: ">' . $time . '</td>
                      <td style = "color: blue">' . $s . '</td>
                    </tr>';
          }
          echo '</table></div></div>';

        }
        ?>

        <!--feedback start-->
        <?php if (@$_GET['q'] == 3) {
          $result = mysqli_query($con, "SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
          echo  '<div class="panel">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover title1">
                      <tr class="table-dark">
                        <td><b>S.N.</b></td>
                        <td><b>Subject</b></td>
                        <td><b>Email</b></td>
                        <td><b>Date</b></td>
                        <td><b>Time</b></td>
                        <td><b>By</b></td>
                        <td></td>
                        <td></td>
                      </tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $date = $row['date'];
            $date = date("d-m-Y", strtotime($date));
            $time = $row['time'];
            $subject = $row['subject'];
            $name = $row['name'];
            $email = $row['email'];
            $id = $row['id'];
            echo '<tr class="fw-bold">
                    <td class="text-primary">' . $c++ . '</td>
                    <td><a title="Click to open feedback" href="dash.php?q=3&fid=' . $id . '">' . $subject . '</a></td>
                    <td>' . $email . '</td>
                    <td>' . $date . '</td>
                    <td>' . $time . '</td>
                    <td>' . $name . '</td>
	                  <td><a title="Open Feedback" href="dash.php?q=3&fid=' . $id . '"><i class="fa fa-folder-open fa-lg"></i></a></td>
                    <td><a title="Delete Feedback" href="update.php?fdid=' . $id . '"><i class="fa text-danger fa-trash fa-lg"></i></a></td>
                	</tr>';
          }
          echo '</table>
              </div>
            </div>';
        }
        ?>
        <!--feedback closed-->



        <!--feedback reading portion start-->
        <?php if (@$_GET['fid']) {
          echo '<br />';
          $id = @$_GET['fid'];
          $result = mysqli_query($con, "SELECT * FROM feedback WHERE id='$id' ") or die('Error');
          while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $subject = $row['subject'];
            $date = $row['date'];
            $date = date("d-m-Y", strtotime($date));
            $time = $row['time'];
            $feedback = $row['feedback'];

            echo '<div class="panel" style="text-align:center;">
                    
                    <h4 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><a title="Back to Archive" href="dash.php?q=3"><i class="btn btn-primary quizBtn fa fa-level-up"></i></a><b>&nbsp' . $subject . '</b></h4>
                    <div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;">
                      <span style="line-height:35px;padding:5px;">&nbsp;<b>DATE:</b>&nbsp;' . $date . '</span>
                      <span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;' . $time . '</span>
                      <span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;' . $name . '</span>
                      <br />' . $feedback . '
                    </div>
                  </div>';
          }
        } ?>
        <!--Feedback reading portion closed-->

        <!--add quiz start-->
        <?php
        if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
          echo ' 
          <div class="row">
            <h2 class = "title" style = "text-align:center; margin: 0px;">Enter Quiz Details </h2>
            <div class="col-md-3"></div><div class="col-md-6">   
              <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
                <fieldset>


                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="name"></label>  
                    <div class="col-md-12">
                      <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="total"></label>  
                    <div class="col-md-12">
                      <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="right"></label>  
                    <div class="col-md-12">
                      <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="wrong"></label>  
                    <div class="col-md-12">
                      <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="time"></label>  
                    <div class="col-md-12">
                      <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="tag"></label>  
                    <div class="col-md-12">
                      <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
                    </div>
                  </div>


                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="desc"></label>  
                    <div class="col-md-12">
                      <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12"> 
                      <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                    </div>
                  </div>

                </fieldset>
              </form>
            </div>';
        }
        ?>
        <!--add quiz end-->

        <!--add quiz step2 start(i.e add questions)-->
        <?php
        if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
          echo ' 
            <div class="row">
              <h2 class = "title" style = "text-align:center; margin: 0 0 2rem 0;">Enter Quiz Details </h2>
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
                  <fieldset>';  

                    for ($i = 1; $i <= @$_GET['n']; $i++) {echo '
                      <b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
                      <div class="form-group">
                        <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
                        <div class="col-md-12">
                          <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
                        </div>
                      </div>

                      <!-- Text input-->
                      <div class="form-group">
                        <label class="col-md-12 control-label" for="' . $i . '1"></label>  
                        <div class="col-md-12">
                          <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
                        </div>
                      </div>

                      <!-- Text input-->
                      <div class="form-group">
                        <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                        <div class="col-md-12">
                          <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
                        </div>
                      </div>

                      <!-- Text input-->
                      <div class="form-group">
                        <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                        <div class="col-md-12">
                          <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
                        </div>
                      </div>

                      <!-- Text input-->
                      <div class="form-group">
                        <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                        <div class="col-md-12">
                          <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
                        </div>
                      </div>
                      
                      <br />
                      <b>Correct answer</b>:
                      <br />

                      <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
                        <option value="a">Select answer for question ' . $i . '</option>
                        <option value="a">option a</option>
                        <option value="b">option b</option>
                        <option value="c">option c</option>
                        <option value="d">option d</option>
                      </select>
                      <br />
                      <br />';
                    }

                    echo 
                    '<div class="form-group">
                      <label class="col-md-12 control-label" for=""></label>
                      <div class="col-md-12"> 
                        <input  type="submit" style="margin-left:40%" class="quizBtn btn btn-primary mb-4" value="Submit" class="btn btn-primary"/>
                      </div>
                    </div>

                  </fieldset>
                </form>
              </div>
            </div>';
        }
        ?>
        <!--add quiz step 2 end-->

        <!--remove quiz-->
        <?php if (@$_GET['q'] == 5) {

          $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
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
            echo '<tr> 
            <td style="color:blue">' . $c++ . '</td>
            <td style="color:#042391">' . $title . '</td>
            <td>' . $total . '</td>
            <td style="color:green">+' . $sahi . '</td>
            <td style="color:red">-' . $neg . '</td>
            <td style="color:green">' . $sahi * $total . '</td>
            <td style="color:#ef3535">' . $time . '&nbsp;min</td>
            <td> <a href="update.php?q=rmquiz&eid=' . $eid . '" class="pull-right btn btn-danger quizBtn"><i class="fa fa-trash"></i>&nbsp;Remove</a></td>
                  </tr>';
          }
          $c = 0;
          echo '</table></div></div>';
        }
        ?>


      </div>
      <!--container closed-->
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>