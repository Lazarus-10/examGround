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
  <!--alert message-->
  <?php if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
  }
  ?>
  <!--alert message end-->

</head>

<body>

  <!--header start-->
  <div class="row header">
    <div class="col-lg-6">
      <span class="logo">Test Your Skill</span>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
      <?php
      include_once 'dbConnection.php';
      session_start();
      if ((!isset($_SESSION['email']))) {
        echo '<a href="#" class="pull-right sub1 btn title3" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;Signin</a>&nbsp;';
      } else {
        echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</a>&nbsp;';
      }
      ?>

      <a href="index.php" class="pull-right btn sub1 title3"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a>&nbsp;
    </div>
  </div>

  <!--sign in modal start-->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content title1">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title title1"><span style="color:orange">Log In</span></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="login.php?q=index.php" method="POST">
            <fieldset>


              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-3 control-label" for="email"></label>
                <div class="col-md-6">
                  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">

                </div>
              </div>

              <!-- Password input-->
              <div class="form-group">
                <label class="col-md-3 control-label" for="password"></label>
                <div class="col-md-6">
                  <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">

                </div>
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Log in</button>
          </fieldset>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!--sign in modal closed-->

  <!--header end-->

  <div class="bg1">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:430px;">
        <h2 align="center" style="font-family:'typo'; color:#000066">FEEDBACK/REPORT A PROBLEM</h2>
        <div style="font-size:14px">
          <?php if (@$_GET['q']) echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;' . @$_GET['q'] . '</span>';
          else {
            echo ' 
You can send us your feedback through e-mail on the following e-mail id:<br />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<a href="mailto:ksarim225@gmail.com" style="color:#000000">ksarim225@gmail.com</a><br /><br />
</div><div class="col-md-1"></div></div>
<p>Or you can directly submit your feedback by filling the enteries below:-</p>
<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Name:</b><br /><br /><br /><b>Subject:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>E-Mail address:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>';
          } ?>
        </div>
        <!--col-md-6 end-->
        <div class="col-md-3"></div>
      </div>
    </div>
  </div>
  <!--container end-->
  </body>


  <!--Footer start-->
  <footer>
  <!--Footer start-->
  <div class="row footer mt-auto">
    <div class="col-md-3 box">
      <a href="#" target="_blank">About us</a>
    </div>
    <div class="col-md-3 box">
      <a href="#" data-bs-toggle="modal" data-bs-target="#adminLogin">Admin Login</a>
    </div>
    <div class="col-md-3 box">
      <a href="#" data-bs-toggle="modal" data-bs-target="#developers">Developers</a>
    </div>
    <div class="col-md-3 box">
      <a href="feedback.php" class="disabled text-white" target="_blank">Feedback</a>
    </div>
  </div>
</footer>

  <!-- Modal For Developers-->
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
            <a style="font-family:'typo';font-size: 14px; text-decoration: none;" class="title1" href="mailto:ksarim225@gmail.com" target="_blank">emanur99rahman@gmail.com</a>

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

  <!--Modal for admin login-->
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



</html>