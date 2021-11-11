<?php
    include_once 'dbConnection.php';
    if(isset($_GET['email']) && isset($_GET['v_code'])){
        $query = "SELECT * FROM `students` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
        $result = mysqli_query($con, $query);
        if($result){
          if(mysqli_num_rows($result) == 1){
              $result_fetch = mysqli_fetch_array($result);
              if($result_fetch['is_verified'] == 0){
                $update = "UPDATE `students` SET `is_verified`='1' WHERE `email`='$_GET[email]'";
                if(mysqli_query($con, $update)){
                    echo"
                    <script>
                        alert('Email Verification Successful');
                        window.location.href='index.php';
                    </script>
                    ";
                }else{
                    echo"
                    <script>
                        alert('Verification Failed');
                        window.location.href='index.php';
                    </script>
                    ";
                }

              }else{
                echo"
                <script>
                    alert('Email Already Registered');
                    window.location.href='index.php';
                </script>
                ";
              } 

          }
        }else{
            echo"
            <script>
                alert('Cannot Run Query');
                window.location.href='index.php';
            </script>
            ";
        }
    }

?>