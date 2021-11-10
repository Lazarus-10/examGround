<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Exam Ground</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/dd653cca0e.js"></script>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

  <?php if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
  }
  ?>



  <script>
    function validateForm() {
      var y = document.forms["form"]["name"].value;
      if (y == null || y == "") {
        alert("Name must be filled out.");
        return false;
      }
     
      var x = document.forms["form"]["email"].value;
      var atpos = x.indexOf("@students.iiests.ac.in");
      if (atpos == -1) {
        alert("Not a valid college e-mail.");
        return false;
      }
      var a = document.forms["form"]["password"].value;
      if (a == null || a == "") {
        alert("Password must be filled out");
        return false;
      }
      if (a.length < 5 || a.length > 25) {
        alert("Passwords must be 5 to 25 characters long.");
        return false;
      }
      var b = document.forms["form"]["cpassword"].value;
      if (a != b) {
        alert("Passwords must match.");
        return false;
      }
    }
  </script>


</head>

<body class="bodyClass">
  <nav class="navbar navbar-expand-lg navbar-dark title1" style="background-color: #7952B3;">
    <div class="container-fluid">
      <a class="navbar-brand  fw-bold fs-4" style="color:aqua" href="index.php">Exam Ground&nbsp;<i class="fa fa-book"></i>&nbsp;&nbsp;</a>
      <button class="btn btn-primary fw-bold raise" type="button" data-bs-toggle="modal" data-bs-target="#signInModal"><i class="fa fa-sign-out fa-lg "></i>&nbsp;Sign
        in</button>
    </div>
  </nav>
  <!--header closed-->



  <!-- Sign Up form -->
  <div id="mybg-div" class = "bodyClass"  style="overflow:hidden;">
    <div class="col-md-4 panel panel2">
      <form class="form-horizontal" style="font-size: 0;" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
        <fieldset>
          <!-- Text input(name)-->
          <div class="row mb-3" style="justify-content : center">
            <div class="col-11 col-md-10">
              <input id="name" name="name" placeholder="Enter your name" type="text" class="form-control input" autofocus>
            </div>
          </div>
          <!-- Text input(name)-->
          <div class="row mb-3" style="justify-content : center">
            <div class="col-11 col-md-10">
              <input id="roll" name="roll" placeholder="Enrollment Number" type="text" class="form-control input" required>
            </div>
          </div>

          <!-- Selection input(Gender)-->
          <div class="row mb-3" style="justify-content : center">
            <div class="col-11 col-md-10">
              <select id="gender" name="gender" placeholder="Enter your gender" class="form-control input">
                <option value="M">Select Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
            </div>
          </div>

          <!-- Text input(Email)-->
          <div class="row mb-3" style="justify-content : center">
            <div class="col-11 col-md-10">
              <input id="email" name="email" maxlength="50" placeholder="example@students.iiests.ac.in" type="email" class="form-control input">
            </div>
          </div>

          <!-- Number input(phone)-->
          <div class="row mb-3" style="justify-content : center">
            <div class="col-11 col-md-10">
              <input id="mob" name="mob" placeholder="Enter your Mobile number" type="number" class="form-control input">
            </div>
          </div>

          <!-- Text input(Password)-->
          <div class="row mb-3" style="justify-content : center">
            <div class="col-11 col-md-10">
              <input id="password" name="password" placeholder="Enter your Password" type="password" class="form-control input">
            </div>
          </div>

          <!-- Text input(confirm Password)-->
          <div class="row mb-3" style="justify-content : center">
            <div class="col-11 col-md-10">
              <input id="cpassword" name="cpassword" placeholder="Confirm Password" type="password" class="form-control input">
            </div>
          </div>


          <button type="submit" class="sub btn btn-primary">Sign Up</button>
        </fieldset>
      </form>

      <?php if (@$_GET['q7']) {
        echo '<script> alert("' . @$_GET['q7'] . '");</script>';
      } ?>

    </div>

  </div>
  <!--container end-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

<!--Footer start-->

<footer>
  <div class="row footer mt-auto" style="background-color: #7952B3; color:red;">
    <div class="col-md-4 box">
      <a href="#" target="_blank"><i class="fa fa-address-card"></i>&nbsp;&nbsp;About us</a>
    </div>
    <div class="col-md-4 box">
      <a href="#" data-bs-toggle="modal" data-bs-target="#adminLogin"><i class="bi bi-shield-lock-fill"></i>&nbsp;&nbsp;Admin Login</a>
    </div>
    <div class="col-md-4 box">
      <a href="#" data-bs-toggle="modal" data-bs-target="#developers"><i class="fa fa-users"></i>&nbsp;Developers</a>
    </div>

  </div>
</footer>
<!--footer end-->


<!--sign in modal start-->
<div class="modal fade" id="signInModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="font-family:'typo' "><span>Log In</span></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body title1">
        <form role="form" class="form-horizontal" action="login.php" method="POST">
          <fieldset>
            <!-- Text input -->
            <div class="row mb-2">
              <div class="testClass col-sm-10 col-md-6">
                <i class = "fa fa-user fa-border"></i>
                <input id="logIN" name="email" maxlength="50" placeholder="example@students.iiests.ac.in" class="form-control input" type="email" autofocus>
              </div>
            </div>

            <!-- Password input-->
            <div class="row mb-2">
              <!-- <label for="password" class="col-sm-2 col-form-label"></label> -->
              <div class="testClass col-sm-10 col-md-6">
                <i class = "fa fa-key fa-border"></i>
                <input name="password" maxlength="15" placeholder="Enter your Password" type="password" class="form-control input">
              </div>
            </div>
          </fieldset>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Log In</button>
          </div>
        </form>
      </div>
    </div> <!-- model-content -->
  </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
<!--sign in modal closed-->


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


<script>
  var myModal1 = document.getElementById('signInModal')
  var myInput1 = document.getElementById('logIN')

  myModal1.addEventListener('shown.bs.modal', function() {
    myInput1.focus()
  })
  var myModal = document.getElementById('adminLogin')
  var myInput = document.getElementById('uName')

  myModal.addEventListener('shown.bs.modal', function() {
    myInput.focus()
  })
</script>

</html>