  <!-- <?php
  $query = "SELECT rollnumber FROM registered_students ORDER BY rollnumber DESC";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result);
  $lastrollnumber = $row['rollnumber'];
  if(empty($lastrollnumber))
  {
      $number = "2021-0000001";
  }
  else
  {
      $idd = str_replace("2021-", "", $lastrollnumber);
      $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
      $number = '2021-'.$id;
  }
  ?>
 -->
<!----------------------------------------SAVE JUNIOR HIGH SCHOOL----------------------------------------------------->
    <?php
        include 'config.php';

        if(isset($_POST["save_junior"])) {
        $student_type             = $_POST['student_type'];
        $lrn                      = $_POST['lrn'];
        // $rollnumber               = $_POST['rollnumber'];
        $firstname                = $_POST['firstname'];
        $middlename               = $_POST['middlename'];
        $lastname                 = $_POST['lastname'];
        $extname                  = $_POST['extname'];
        $gender                   = $_POST['gender'];
        $dob                      = $_POST['dob'];
        $age                      = $_POST['age'];
        $contact                  = $_POST['contact'];     
        $email                    = $_POST['email'];
        $password                 = md5($_POST['password']);
        $cpassword                = md5($_POST['cpassword']);
        $address                  = $_POST['address'];
        $zipcode                  = $_POST['zipcode'];
        $father                   = $_POST['father'];
        $mother                   = $_POST['mother'];
        $parentscontact           = $_POST['parentscontact'];
        $lastgradelevel           = $_POST['lastgradelevel'];
        $lastschoolyear           = $_POST['lastschoolyear'];
        $schoolname               = $_POST['schoolname'];
        $level_to_enroll          = $_POST['level_to_enroll'];
        $school_to_enroll         = $_POST['school_to_enroll'];
        $school_add_to_enroll     = $_POST['school_add_to_enroll'];
        $file                     = basename($_FILES["fileToUpload"]["name"]);
        //$status                   = 'Pending';

        $date = DATE("d");
        $month = DATE("M");
        $year = DATE("Y");
        //$datenow                  = date("l, d F Y"); // l= Day, d= date, F=month, Y= year
        // $timenow                  = date("g:i a", time()); 

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        }
        elseif (empty($student_type) || empty($firstname) || empty($middlename) || empty($lastname) || empty($gender) || empty($dob) || empty($age) || empty($contact) || empty($email) || empty($password) || empty($cpassword) || empty($address) || empty($father) || empty($mother) || empty($parentscontact) || empty($lastgradelevel) || empty($lastschoolyear) || empty($schoolname) || empty($level_to_enroll) || empty($school_to_enroll) || empty($school_add_to_enroll))  {
        $_SESSION['danger']  = "You have missed required fields. Please fill in all required fields!";
        echo '<script type="text/javascript">'
          . '$( document ).ready(function() {'
          . '$("#register_student").modal("show");'
          . '});'
          . '</script>';  
        } else {

          $lrn_check  = mysqli_query($conn, "SELECT * FROM registered_students WHERE lrn= '$lrn' ");
          if(mysqli_num_rows($lrn_check)>0) {
          $_SESSION['danger']  = "Someone has already owned this Learner Reference Number.";
          echo '<script type="text/javascript">'
            . '$( document ).ready(function() {'
            . '$("#register_student").modal("show");'
            . '});'
            . '</script>';  
          } else {
            
          

            // $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE rollnumber= '$rollnumber' ");
            // if(mysqli_num_rows($query)>0) {
            //     $_SESSION['danger']  = "There is already a student with this roll number. Please try to register again!";
            //     echo '<script type="text/javascript">'
            //       . '$( document ).ready(function() {'
            //       . '$("#register_student").modal("show");'
            //       . '});'
            //       . '</script>';  
            // } else {

                $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
                if(mysqli_num_rows($query)>0) {
                $_SESSION['danger']  = "Email is already taken.";
                echo '<script type="text/javascript">'
                  . '$( document ).ready(function() {'
                  . '$("#register_student").modal("show");'
                  . '});'
                  . '</script>';  
                } else {
                    if($password != $cpassword) {
                    $_SESSION['danger']  = "Password did not match.";
                    echo '<script type="text/javascript">'
                      . '$( document ).ready(function() {'
                      . '$("#register_student").modal("show");'
                      . '});'
                      . '</script>';
                    } else { 




                    // Check if image file is a actual image or fake image
                    $target_dir = "../images-students/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check == false) {
                        $_SESSION['danger']  = "File is not an image! Your file was not uploaded.";
                         echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                        $uploadOk = 1;
                    } 

                    // Check if file already exists
                    if (file_exists($target_file)) {
                        $_SESSION['danger']  = "File already exist. Your file was not uploaded.";
                         echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 2000000) {
                        $_SESSION['danger']  = "Your file is too large. Your file was not uploaded.";
                         echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        $_SESSION['danger']  = "Only JPG, JPEG, PNG & GIF files are allowed. Your file was not uploaded.";
                         echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is OK
                    if ($uploadOk != 0) {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                                $sql = "INSERT INTO registered_students (stud_type, lrn, student_firstname,  student_middlename, student_lastname, student_extname, gender, date_of_birth, age, contact_num, email, password, address, zipcode, fathers_name, mothers_name, parents_contact, last_grade_level, last_school_year, last_school_name, 
                                year_level_to_enroll, school_to_enroll, schooladd_to_enroll, image, date_registered ) 
                                VALUES ('$student_type', '$lrn', '$firstname', '$middlename', '$lastname', '$extname', '$gender', '$dob', '$age', '$contact', '$email', '$password', '$address', '$zipcode', '$father', '$mother', '$parentscontact', '$lastgradelevel', '$lastschoolyear', '$schoolname', '$level_to_enroll', '$school_to_enroll', '$school_add_to_enroll', '$file', '$month. $date, $year') "; //'$datenow - $timenow'

                                        if(mysqli_query($conn, $sql)) {                                                                          
                                            echo ' <script>
                                                        if(window.history.replaceState) {
                                                            window.history.replaceState(null, null, window.location.href)
                                                        } 
                                                    </script> ';
                                             echo '<script>alert("You have successfully registered your information.");</script>';
                                             $_SESSION['success']  = "You have successfully registered <b>$firstname $middlename $lastname $extname</b>.";

                                              // TO AUTOMATICALLY INCREMENT ROLL NUMBER IN MODAL
                                              // $query = "SELECT rollnumber FROM registered_students ORDER BY rollnumber DESC";
                                              // $result = mysqli_query($conn,$query);
                                              // $row = mysqli_fetch_array($result);
                                              // $lastrollnumber = $row['rollnumber'];
                                              // if(empty($lastrollnumber))
                                              // {
                                              //     $number = "2021-0000001";
                                              // }
                                              // else
                                              // {
                                              //     $idd = str_replace("2021-", "", $lastrollnumber);
                                              //     $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
                                              //     $number = '2021-'.$id;
                                              // }
                                             echo "<meta http-equiv='refresh' content='0'>";
                                             // echo '<script type="text/javascript">'
                                             //  . '$( document ).ready(function() {'
                                             //  . '$("#register_student").modal("show");'
                                             //  . '});'
                                             //  . '</script>'; 
                                        } else {
                                            $_SESSION['danger'] = "Something went wrong while saving the information. Please try again.";
                                            echo '<script type="text/javascript">'
                                              . '$( document ).ready(function() {'
                                              . '$("#register_student").modal("show");'
                                              . '});'
                                              . '</script>';
                                        }
                        } else {
                            $_SESSION['danger']   = "There was an error uploading your file.";
                            echo '<script type="text/javascript">'
                              . '$( document ).ready(function() {'
                              . '$("#register_student").modal("show");'
                              . '});'
                              . '</script>'; 
                        }
                    } else {
                          echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                    }
                    }
                }
            } 
          }
      }
  ?>
<!------------------------------------------END SAVE JUNIOR HIGH SCHOOL-------------------------------------------------> 


<!----------------------------------------SAVE SENIOR HIGH SCHOOL------------------------------------------------------->
 
    <?php
        if(isset($_POST["save_senior"])) {
        $student_type             = $_POST['student_type'];
        $lrn                      = $_POST['lrn'];
        // $rollnumber               = $_POST['rollnumber'];
        $firstname                = $_POST['firstname'];
        $middlename               = $_POST['middlename'];
        $lastname                 = $_POST['lastname'];
        $extname                  = $_POST['extname'];
        $gender                   = $_POST['gender'];
        $dob                      = $_POST['dob'];
        $age                      = $_POST['age'];
        $contact                  = $_POST['contact'];     
        $email                    = $_POST['email'];
        $password                 = md5($_POST['password']);
        $cpassword                = md5($_POST['cpassword']);
        $address                  = $_POST['address'];
        $zipcode                  = $_POST['zipcode'];
        $father                   = $_POST['father'];
        $mother                   = $_POST['mother'];
        $parentscontact           = $_POST['parentscontact'];
        $lastgradelevel           = $_POST['lastgradelevel'];
        $lastschoolyear           = $_POST['lastschoolyear'];
        $schoolname               = $_POST['schoolname'];
        $level_to_enroll          = $_POST['level_to_enroll'];
        $school_to_enroll         = $_POST['school_to_enroll'];
        $school_add_to_enroll     = $_POST['school_add_to_enroll'];
        $semester                 = $_POST['semester'];
        $track                    = $_POST['track'];
        $strand                   = $_POST['strand'];
        $file                     = basename($_FILES["fileToUpload"]["name"]);
        //$status                   = 'Pending';

        $date = DATE("d");
        $month = DATE("M");
        $year = DATE("Y");  
        //$datenow                  = date("l, d F Y");
        //$timenow                  = date("g:i a", time()); 

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        }
        elseif (empty($student_type) || empty($firstname) || empty($middlename) || empty($lastname) || empty($gender) || empty($dob) || empty($age) || empty($contact) || empty($email) || empty($password) || empty($cpassword) || empty($address) || empty($father) || empty($mother) || empty($parentscontact) || empty($lastgradelevel) || empty($lastschoolyear) || empty($schoolname) || empty($level_to_enroll) || empty($school_to_enroll) || empty($school_add_to_enroll) || empty($semester) || empty($track))  {
        $_SESSION['danger']  = "You have missed required fields. Please fill in all required fields!";
        echo '<script type="text/javascript">'
          . '$( document ).ready(function() {'
          . '$("#register_student").modal("show");'
          . '});'
          . '</script>';
        } else {

          $lrn_check_senior  = mysqli_query($conn, "SELECT * FROM registered_students WHERE lrn= '$lrn' ");
          if(mysqli_num_rows($lrn_check_senior)>0) {
          $_SESSION['danger']  = "Someone has already owned this Learner Reference Number.";
          echo '<script type="text/javascript">'
            . '$( document ).ready(function() {'
            . '$("#register_student").modal("show");'
            . '});'
            . '</script>';  
          } else {

            // $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE rollnumber= '$rollnumber' ");
            // if(mysqli_num_rows($query)>0) {
            //     $_SESSION['danger']  = "There is already a student with this roll number. Please try to register again!";
            //     echo '<script type="text/javascript">'
            //       . '$( document ).ready(function() {'
            //       . '$("#register_student").modal("show");'
            //       . '});'
            //       . '</script>';  
            // } else {
                $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
            if(mysqli_num_rows($query)>0) {
                $_SESSION['danger']  = "Email is already taken.";
                echo '<script type="text/javascript">'
                  . '$( document ).ready(function() {'
                  . '$("#register_student").modal("show");'
                  . '});'
                  . '</script>';
            } else {
                if($password != $cpassword) {
                $_SESSION['danger']  = "Password did not match.";
                echo '<script type="text/javascript">'
                  . '$( document ).ready(function() {'
                  . '$("#register_student").modal("show");'
                  . '});'
                  . '</script>';
                } else {

                    // Check if image file is a actual image or fake image
                    $target_dir = "../images-students/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check == false) {
                        $_SESSION['danger']  = "File is not an image! Your file was not uploaded.";
                         echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                        $uploadOk = 1;
                    } 

                    // Check if file already exists
                    if (file_exists($target_file)) {
                        $_SESSION['danger']  = "File already exist. Your file was not uploaded.";
                         echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 2000000) {
                        $_SESSION['danger']  = "Your file is too large. Your file was not uploaded.";
                         echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        $_SESSION['danger']  = "Only JPG, JPEG, PNG & GIF files are allowed. Your file was not uploaded.";
                         echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>'; 
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk != 0) {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                                $sql = "INSERT INTO registered_students (stud_type, lrn, student_firstname,  student_middlename, student_lastname, student_extname, gender, date_of_birth, age, contact_num, email, password, address, zipcode, fathers_name, mothers_name,  parents_contact, last_grade_level, last_school_year, last_school_name,  year_level_to_enroll, school_to_enroll, schooladd_to_enroll, semester, track, strand, image,  date_registered ) 
                                VALUES ('$student_type', '$lrn', '$firstname', '$middlename', '$lastname', '$extname', '$gender', '$dob', '$age', '$contact', '$email', '$password', '$address', '$zipcode', '$father', '$mother', '$parentscontact', '$lastgradelevel', '$lastschoolyear', '$schoolname', '$level_to_enroll', '$school_to_enroll', '$school_add_to_enroll', '$semester', '$track', '$strand', '$file', '$month. $date, $year') ";

                                        if(mysqli_query($conn, $sql)) {                                 
                                            echo ' <script>
                                                        if(window.history.replaceState) {
                                                            window.history.replaceState(null, null, window.location.href)
                                                        } 
                                                    </script> ';
                                             echo '<script>alert("You have successfully registered your information.");</script>';
                                             $_SESSION['success']  = "You have successfully registered <b>$firstname $middlename $lastname $extname</b>.";

                                             // TO AUTOMATICALLY INCREMENT ROLL NUMBER IN MODAL
                                              // $query = "SELECT rollnumber FROM registered_students ORDER BY rollnumber DESC";
                                              // $result = mysqli_query($conn,$query);
                                              // $row = mysqli_fetch_array($result);
                                              // $lastrollnumber = $row['rollnumber'];
                                              // if(empty($lastrollnumber))
                                              // {
                                              //     $number = "2021-0000001";
                                              // }
                                              // else
                                              // {
                                              //     $idd = str_replace("2021-", "", $lastrollnumber);
                                              //     $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
                                              //     $number = '2021-'.$id;
                                              // }

                                              echo "<meta http-equiv='refresh' content='0'>";
                                             // echo '<script type="text/javascript">'
                                             //  . '$( document ).ready(function() {'
                                             //  . '$("#register_student").modal("show");'
                                             //  . '});'
                                             //  . '</script>'; 
                                        } else {
                                            $_SESSION['danger'] = "Something went wrong while saving the information. Please try again.";
                                            echo '<script type="text/javascript">'
                                              . '$( document ).ready(function() {'
                                              . '$("#register_student").modal("show");'
                                              . '});'
                                              . '</script>';
                                        }
                            } else {
                                $_SESSION['danger']   = "There was an error uploading your file.";
                                echo '<script type="text/javascript">'
                                  . '$( document ).ready(function() {'
                                  . '$("#register_student").modal("show");'
                                  . '});'
                                  . '</script>';
                            }
                    } else {
                        echo '<script type="text/javascript">'
                          . '$( document ).ready(function() {'
                          . '$("#register_student").modal("show");'
                          . '});'
                          . '</script>';       
                     }
                    }
                }
            }
          }
        }
  ?>
<!----------------------------------------END SAVE SENIOR HIGH SCHOOL-------------------------------------------------> 
 
<!-----------------------------------------------------------ADMISSION FORM----------------------------------------------------------------->
<!-- The Modal -->
<div class="modal fade" id="register_student">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title"><i class="bi bi-plus-square"></i> Admission Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!--##########################################################################-->
        <!-------------------------------SESSIONS--------------------------------------->
            <?php if(isset($_SESSION['success'])) { ?> 
                <h5 class="alert" id="success"> <strong>Success! &nbsp;</strong> <?php echo $_SESSION['success']; ?></h5>  
            <?php unset($_SESSION['success']);  } ?>

            <?php if(isset($_SESSION['danger'])) { ?> 
                <h5 class="alert" id="danger" ><strong>Warning! &nbsp;</strong> <?php echo $_SESSION['danger']; ?></h5>  
            <?php unset($_SESSION['danger']);  }  ?>
        <!-------------------------------END SESSIONS----------------------------------->
        <!--##########################################################################-->
      <!-- Modal body -->
      <div class="modal-body p-4">
        <!-- <label for="">Roll number: <span style="color: red;"><?php echo $number;?></span></label> -->
        <select class="form-control option form-select" name="option" id="option" required="">
        <!-- <option value="" selected disabled>Select High School Type</option> -->
        <option value="JHS" selected>Junior High School</option>
        <option value="SHS">Senior High School</option>
        </select>
        <?php include 'registered_students_create_junior.php'; ?>
        <?php include 'registered_students_create_senior.php'; ?>  
      </div>

    </div>
  </div>
</div>

<!-----------------------------------------------------------END ADMISSION FORM------------------------------------------------------------->

<script>
    $('.option').change(function(){
    var responseID = $(this).val();
    if(responseID =="JHS") {
            $('#junior').removeClass("hidden");
            $('#junior').addClass("show");
            $('#senior').removeClass("show");
            $('#senior').addClass("hidden");
    } else if(responseID =="SHS") {
            $('#senior').removeClass("hidden");
            $('#senior').addClass("show");
            $('#junior').removeClass("show");
            $('#junior').addClass("hidden");
    } else {
            $('#junior').removeClass("hidden");
            $('#junior').addClass("show");
            $('#senior').removeClass("show");
            $('#senior').addClass("hidden");     
    } 
            //console.log(responseID);
            });
</script>



<!-- //-----------------------------ALERT TIMEOUT-------------------------// -->
    <script>
          $(document).ready(function()
          {
              setTimeout(function()
              {
                  $('.alert').hide();
              }, 5000);
          } );
    </script>
<!-- //-----------------------------ALERT TIMEOUT-------------------------// -->
</body>
</html>















