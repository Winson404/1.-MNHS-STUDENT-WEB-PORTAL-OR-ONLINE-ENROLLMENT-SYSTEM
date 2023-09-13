<?php
      include 'config.php';   
      if(isset($_POST['login'])) {
      $username  = $_POST['username'];
      $password  = md5($_POST['password']);

      if (empty($username) || empty($password)) {
          echo '<script>'
                .'$( document ).ready(function() {'
                .'$("#loginmodal").modal("show");'
                .'});'
                .'</script>';                         
          $_SESSION['error'] = "Warning! Empty fields are required to login.";
      } else {
              //Admin--------------------->
              $sql_query = "SELECT * FROM faculty WHERE username='$username' AND password='$password' AND usertype='Admin' ";
              $result = mysqli_query($conn, $sql_query);

              if (mysqli_num_rows($result) === 1) {
              $row = mysqli_fetch_array($result);
                      if ($row['username'] === $username && $row['password'] === $password) {
                           $_SESSION['faculty_username'] = $row['username'];
                           $_SESSION['faculty_id']       = $row['fac_Id'];
                           header("Location: admin/dashboard.php");
                      } else {
                           $_SESSION['error'] = "Password is incorrect. Try again!"; 
                    $script =  "<script> $(document).ready(function(){ $('#loginmodal').modal('show'); }); </script>";   
                      }
              } else {
                      //FOR PENDING Students--------------------->
                      $pending = "SELECT * FROM registered_students WHERE email='$username' AND password='$password' AND status='Pending' ";
                      $pending_result = mysqli_query($conn, $pending);

                      if (mysqli_num_rows($pending_result) === 1) {
                            $row = mysqli_fetch_assoc($pending_result);
                            if ($row['email'] === $username && $row['password'] === $password) {
                                  $_SESSION['student_firstname'] = $row['student_firstname'];
                                  $_SESSION['student_lastname'] = $row['student_lastname'];
                                  $_SESSION['student_id'] = $row['stud_Id'];
                                  header("Location: student-side/home-pending.php");
                            } else {                                    
                                  // echo '<script>'
                                  // .'$( document ).ready(function() {'
                                  // .'$("#loginmodal").modal("show");'
                                  // .'});'
                                  // .'</script>';                         
                                  // $_SESSION['error'] = "Password is incorrect. Try again!";    
                              $_SESSION['error'] = "Password is incorrect. Try again!"; 
                    $script =  "<script> $(document).ready(function(){ $('#loginmodal').modal('show'); }); </script>";
                            }
                      } else {   
                            //FOR ENROLLED Students--------------------->
                            $enrolled = "SELECT * FROM registered_students WHERE email='$username' AND password='$password' AND status='Enrolled' ";
                            $enrolled_result = mysqli_query($conn, $enrolled);

                            if (mysqli_num_rows($enrolled_result) === 1) {
                                  $row = mysqli_fetch_assoc($enrolled_result);
                                  if ($row['email'] === $username && $row['password'] === $password) {
                                        $_SESSION['student_firstname'] = $row['student_firstname'];
                                        $_SESSION['student_lastname'] = $row['student_lastname'];
                                        $_SESSION['student_id'] = $row['stud_Id'];
                                        header("Location: student-side/home-enrolled.php");
                                  } else {                                    
                                        // echo '<script>'
                                        // .'$( document ).ready(function() {'
                                        // .'$("#loginmodal").modal("show");'
                                        // .'});'
                                        // .'</script>';                         
                                        // $_SESSION['error'] = "Password is incorrect. Try again!";    

                    $_SESSION['error'] = "Password is incorrect. Try again!"; 
                    $script =  "<script> $(document).ready(function(){ $('#loginmodal').modal('show'); }); </script>";
                    
                                  }
                            } else {
                              $_SESSION['error'] = "Password is incorrect. Try again!"; 
                    $script =  "<script> $(document).ready(function(){ $('#loginmodal').modal('show'); }); </script>";
                                  // echo '<script>'
                                  // .'$( document ).ready(function() {'
                                  // .'$("#loginmodal").modal("show");'
                                  // .'});'
                                  // .'</script>';                         
                                  $_SESSION['error'] = "Password is incorrect. Try again!";    
                                  echo ' <script>
                                  if(window.history.replaceState) {
                                  window.history.replaceState(null, null, window.location.href)
                                  }
                                  </script>
                                  ';
                            }
                      }
              }
         }
    }
?>

<style>
  .modal-header {
    color: #fff;
  }
  .form-group #danger{
    text-align: center;
    color: red;
    background-color: transparent;
  }
  .modal-body img {
    height: 100px;
    width: auto;
    display: block;
    margin: auto;
  }
  .modal-body input {
    margin-bottom: 5px;
  }

  .modal-body #error {
    color: red;
    font-weight: bold;
    margin-bottom: -1px;
  }

  @media only screen and (max-width : 480px) {
    #loginmodal {
      width: 300px;
      margin-left: auto;
      margin-right: auto;

    }
  }
</style>


<!--##########################################################################-->
<!-------------------------------LOGIN MODAL------------------------------------>
  <!-- Modal -->
<div class="modal" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
        <div class="modal-body p-3">
          <img src="images/MNHS LOGO.png" class="img-responsive mb-3" >
          <!--##########################################################################-->
          <!-------------------------------SESSIONS--------------------------------------->
              <?php if(isset($_SESSION['error'])) { ?> 
                  <p class="alerts" id="error" ><?php echo $_SESSION['error']; ?></p>  
              <?php unset($_SESSION['error']);  }  ?>
          <!-------------------------------END SESSIONS----------------------------------->
          <!--##########################################################################-->
            <input type="text"     class="form-control text-center" name="username" placeholder="Email" required>
            <input type="password" class="form-control text-center" id="password" name="password" placeholder="Password" required>
            
            <input type="checkbox" onclick="myFunction()"> Show Password
        </div>
        <div class="modal-footer p-3">
          <button type="submit"  class="form-control btn btn-primary" name="login">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-------------------------------END LOGIN MODAL------------------------------------>
<!--##########################################################################-->


<!-- IF LOG IN FAILS , BRING THE LOGIN MODAL BACK -->
<?php if(isset($script)){ echo $script; } ?>
<!-- IF LOG IN FAILS , BRING THE LOGIN MODAL BACK -->



<script>
  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<!---------------------------------ALERT TIMEOUT------------------------------->
<script>
    $(document).ready(function()
   {
       setTimeout(function()
       {
          $('.alerts').hide();
        }, 5000);
    } );
</script>
<!----------------------------------END ALERT TIMEOUT-------------------------->