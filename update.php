<?php
include_once 'dbConnection.php';
session_start();
$email = $_SESSION['email'];



//delete feedback
if (isset($_SESSION['key'])) {
  if (@$_GET['fdid'] && $_SESSION['key'] == 'saif91406714') {
    $id = @$_GET['fdid'];
    echo $id;
    $result = mysqli_query($con, "DELETE FROM feedback WHERE id='$id' ") or die(mysqli_error($con));
    header("location:dash.php?q=3");
  }
}

//delete student
if (isset($_SESSION['key'])) {
  if (@$_GET['demail'] && $_SESSION['key'] == 'saif91406714') {
    $demail = @$_GET['demail'];
    $r1 = mysqli_query($con, "DELETE FROM ranks WHERE email='$demail' ") or die(mysqli_error($con));
    $r2 = mysqli_query($con, "DELETE FROM history WHERE email='$demail' ") or die(mysqli_error($con));
    $result = mysqli_query($con, "DELETE FROM students WHERE email='$demail' ") or die(mysqli_error($con));
    header("location:dash.php?q=1");
  }
}
//remove quiz
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'rmquiz' && $_SESSION['key'] == 'saif91406714') {
    $eid = @$_GET['eid'];
    $result = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' ") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
      $qid = $row['qid'];
      $r1 = mysqli_query($con, "DELETE FROM options WHERE qid='$qid'") or die(mysqli_error($con));
      $r2 = mysqli_query($con, "DELETE FROM answer WHERE qid='$qid' ") or die(mysqli_error($con));
    }
    $r3 = mysqli_query($con, "DELETE FROM questions WHERE eid='$eid' ") or die(mysqli_error($con));
    $r4 = mysqli_query($con, "DELETE FROM quiz WHERE eid='$eid' ") or die(mysqli_error($con));
    $r4 = mysqli_query($con, "DELETE FROM history WHERE eid='$eid' ") or die(mysqli_error($con));

    header("location:dash.php?q=5");
  }
}

//add quiz
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'addquiz' && $_SESSION['key'] == 'saif91406714') {
    $name = $_POST['name'];
    $name = ucwords(strtolower($name));
    $total = $_POST['total'];
    $sahi = $_POST['right'];
    $wrong = $_POST['wrong'];
    $time = $_POST['time'];
    $tag = $_POST['tag'];
    $desc = $_POST['desc'];
    $id = uniqid();
    $q3 = mysqli_query($con, "INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

    header("location:dash.php?q=4&step=2&eid=$id&n=$total");
  }
}

//add question
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'addqns' && $_SESSION['key'] == 'saif91406714') {
    $n = @$_GET['n'];
    $eid = @$_GET['eid'];
    $ch = @$_GET['ch'];

    for ($i = 1; $i <= $n; $i++) {
      $qid = uniqid();
      $qns = $_POST['qns' . $i];
      $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
      $oaid = uniqid();
      $obid = uniqid();
      $ocid = uniqid();
      $odid = uniqid();
      $a = $_POST[$i . '1'];
      $b = $_POST[$i . '2'];
      $c = $_POST[$i . '3'];
      $d = $_POST[$i . '4'];
      $qa = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die(mysqli_error($con));
      $qb = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$b','$obid')") or die(mysqli_error($con));
      $qc = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die(mysqli_error($con));
      $qd = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$d','$odid')") or die(mysqli_error($con));
      $e = $_POST['ans' . $i];
      switch ($e) {
        case 'a':
          $ansid = $oaid;
          break;
        case 'b':
          $ansid = $obid;
          break;
        case 'c':
          $ansid = $ocid;
          break;
        case 'd':
          $ansid = $odid;
          break;
        default:
          $ansid = $oaid;
      }


      $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('$qid','$ansid')");
    }
    header("location:dash.php?q=0");
  }
}

//quiz start
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
  $eid = @$_GET['eid'];
  $sn = @$_GET['n'];
  $total = @$_GET['t'];
  $ans = $_POST['ans'];
  $qid = @$_GET['qid'];
  $seed = @$_GET['s'];
  $q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
  while ($row = mysqli_fetch_array($q)) {
    $ansid = $row['ansid'];
  }


  $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ");
  while ($row = mysqli_fetch_array($q)) {
    $sahi = $row['sahi'];  // fetch the marks for correct submission
    $wrong = $row['wrong']; // fetch the marks for wrong submission
  }

  //Reset the history for that quiz
  if ($sn == 1) {
    if ($_SESSION['key'] == 'saif91406714') {
      $q = mysqli_query($con, "INSERT INTO students (`name`, `email`) VALUES ('Admin', '$email')"); // we have to first add the student, as the history table is referencing from students table
    }
    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($q);
    if ($rowcount == 0) {
      $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0','0',NOW() )") or die(mysqli_error($con));
    }
  }
  $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die(mysqli_error($con)); //fetch the history till this question

  while ($row = mysqli_fetch_array($q)) {
    $s = $row['score'];
    $r = $row['sahi'];
    $w = $row['wrong'];
    $skp = $row['skipped'];
  }

  if(isset($_POST['submit'])){
    if ($ans == $ansid) {
      $r++; //increase the correct answer count
      $s = $s + $sahi; // increase the score for this quiz
    } else {
      $w++;
      $s = $s - $wrong;
    }
  }else{
    $skp++;
  }
  $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r,  `wrong` =$w, `skipped` = $skp, date= NOW()  WHERE  email = '$email' AND eid = '$eid'") or die(mysqli_error($con));
  if ($sn != $total) {
    $sn++;
    header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&s=$seed") or die(mysqli_error($con));
  } else if ($_SESSION['key'] != 'saif91406714') {  //if the user is not admin => update his score
    $q = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
    }
    $q = mysqli_query($con, "SELECT * FROM ranks WHERE email='$email'") or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($q);
    //if the student is giving exam for the first time
    if ($rowcount == 0) {
      $q2 = mysqli_query($con, "INSERT INTO ranks VALUES('$email','$s',NOW())") or die(mysqli_error($con));
    } else { // if he had score for some previous exam
      while ($row = mysqli_fetch_array($q)) {
        $sun = $row['score'];
      }
      $sun = $s + $sun;
      $q = mysqli_query($con, "UPDATE `ranks` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die(mysqli_error($con));
    }
    header("location:account.php?q=result&eid=$eid");
  } else {  // if the user is admin => just show the result
    header("location:dash.php?q=result&eid=$eid");
  }
}

//restart quiz
if (@$_GET['q'] == 'quizre' && @$_GET['step'] == 25) {
  $eid = @$_GET['eid'];
  $n = @$_GET['n'];
  $t = @$_GET['t'];
  $seed = @$_GET['s'];
  $q = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die(mysqli_error($con));
  while ($row = mysqli_fetch_array($q)) {
    $s = $row['score'];
  }
  $q = mysqli_query($con, "DELETE FROM `history` WHERE eid='$eid' AND email='$email' ") or die(mysqli_error($con));
  $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )") or die(mysqli_error($con));
  $q = mysqli_query($con, "SELECT * FROM ranks WHERE email='$email'") or die(mysqli_error($con));
  while ($row = mysqli_fetch_array($q)) {
    $sun = $row['score'];
  }
  $sun = $sun - $s;
  $q = mysqli_query($con, "UPDATE `ranks` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die(mysqli_error($con));
  header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t&s=$seed");
}
