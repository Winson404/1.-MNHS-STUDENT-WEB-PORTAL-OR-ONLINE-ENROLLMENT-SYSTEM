<!----------------------------------------SAVE JUNIOR HIGH SCHOOL----------------------------------------------------->
 

    <?php
        session_start();
        include 'config.php';

        if(isset($_POST["save_junior"])) {


        $student_type             = $_POST['student_type'];
        $firstname                = $_POST['firstname'];
        $middlename               = $_POST['middlename'];
        $lastname                 = $_POST['lastname'];
        $extname                  = $_POST['extname'];
        $gender                   = $_POST['gender'];
        $dob                      = $_POST['dob'];
        $age                      = $_POST['age'];
        $contact                  = $_POST['contact'];     
        $email                    = $_POST['email'];
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
        elseif (empty($student_type) || empty($firstname) || empty($middlename) || empty($lastname) || empty($gender) || empty($dob) || empty($age) || empty($contact) || empty($email) || empty($address) || empty($father) || empty($mother) || empty($parentscontact) || empty($lastgradelevel) || empty($lastschoolyear) || empty($schoolname) || empty($level_to_enroll) || empty($school_to_enroll) || empty($school_add_to_enroll))  {
        $_SESSION['exists']  = "You have missed required fields. Please fill in all fields!";
        header("Location:index.php");
        } else {
            $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
            if(mysqli_num_rows($query)>0) {
            $_SESSION['exists']  = "Email is already taken.";
            header("Location:index.php");
              echo '<script type="text/javascript">'
                                      . '$( document ).ready(function() {'
                                      . '$("#register_student").modal("show");'
                                      . '});'
                                      . ' {document.location.href="index.php"}</script>';   
            } else {

                     // Check if image file is a actual image or fake image
                    $target_dir = "images-students/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                    $_SESSION['success']  = "File is an image! - " . $check["mime"] . ".";
                    header("Location:index.php");
                     echo '<script type="text/javascript">'
                                      . '$( document ).ready(function() {'
                                      . '$("#register_student").modal("show");'
                                      . '});'
                                      . '</script>'; 
                    $uploadOk = 1;
                    } else {
                    $_SESSION['exists']  = "File is not an image!";
                    header("Location:index.php");
                     echo '<script type="text/javascript">'
                                      . '$( document ).ready(function() {'
                                      . '$("#register_student").modal("show");'
                                      . '});'
                                      . '</script>'; 
                    $uploadOk = 0;
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                    $_SESSION['exists']  = "File already exist.";
                    header("Location:index.php");
                     echo '<script type="text/javascript">'
                                      . '$( document ).ready(function() {'
                                      . '$("#register_student").modal("show");'
                                      . '});'
                                      . '</script>'; 
                    $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 2000000) {
                    $_SESSION['exists']  = "Your file is too large.";
                    header("Location:index.php");
                     echo '<script type="text/javascript">'
                                      . '$( document ).ready(function() {'
                                      . '$("#register_student").modal("show");'
                                      . '});'
                                      . '</script>'; 
                    $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                    header("Location:index.php");
                     echo '<script type="text/javascript">'
                                      . '$( document ).ready(function() {'
                                      . '$("#register_student").modal("show");'
                                      . '});'
                                      . '</script>'; 
                    $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                    $_SESSION['danger']  = "Your file was not uploaded.";
                    header("Location:index.php");
                     echo '<script type="text/javascript">'
                                      . '$( document ).ready(function() {'
                                      . '$("#register_student").modal("show");'
                                      . '});'
                                      . '</script>'; 
                    // if everything is ok, try to upload file
                    } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                                $sql = "INSERT INTO registered_students (stud_type, student_firstname,  student_middlename, student_lastname, student_extname, gender, date_of_birth, age, contact_num, email, address, zipcode, fathers_name, mothers_name, parents_contact, last_grade_level, last_school_year, last_school_name, 
                                year_level_to_enroll, school_to_enroll, schooladd_to_enroll, image, date_registered ) 
                                VALUES ('$student_type', '$firstname', '$middlename', '$lastname', '$extname', '$gender', '$dob', '$age', '$contact', '$email',
                                '$address', '$zipcode', '$father', '$mother', '$parentscontact', '$lastgradelevel', '$lastschoolyear', '$schoolname', '$level_to_enroll',
                                '$school_to_enroll', '$school_add_to_enroll', '$file', '$month. $date, $year') "; //'$datenow - $timenow'

                                        if(mysqli_query($conn, $sql)) {
                                            $_SESSION['success']  = "You have successfully registered <b>$firstname $middlename $lastname $extname</b>. ";
                                            header("Location:index.php");
                                        } else {
                                            $_SESSION['success'] = "Something went wrong while saving the information. Please try again.";
                                            header("Location:index.php");
                                        }
                            } else {
                                $_SESSION['warning']   = "There was an error uploading your file.";
                                header("Location:index.php");
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
  ?>
<!------------------------------------------END SAVE JUNIOR HIGH SCHOOL-------------------------------------------------> 







<!----------------------------------------SAVE SENIOR HIGH SCHOOL------------------------------------------------------->
 
    <?php
    

        if(isset($_POST["save_senior"])) {


        $student_type             = $_POST['student_type'];
        $firstname                = $_POST['firstname'];
        $middlename               = $_POST['middlename'];
        $lastname                 = $_POST['lastname'];
        $extname                  = $_POST['extname'];
        $gender                   = $_POST['gender'];
        $dob                      = $_POST['dob'];
        $age                      = $_POST['age'];
        $contact                  = $_POST['contact'];     
        $email                    = $_POST['email'];
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
        elseif (empty($student_type) || empty($firstname) || empty($middlename) || empty($lastname) || empty($gender) || empty($dob) || empty($age) || empty($contact) || empty($email) || empty($address) || empty($father) || empty($mother) || empty($parentscontact) || empty($lastgradelevel) || empty($lastschoolyear) || empty($schoolname) || empty($level_to_enroll) || empty($school_to_enroll) || empty($school_add_to_enroll) || empty($semester) || empty($track) || empty($strand))  {
        $_SESSION['exists']  = "You have missed required fields. Please fill in all fields!";
        header("Location:index.php");
        } else {
            $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
            if(mysqli_num_rows($query)>0) {
            $_SESSION['exists']  = "Email is already taken.";
 
            header("Location:index.php");

            } else {

                     // Check if image file is a actual image or fake image
                    $target_dir = "images-students/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                    $_SESSION['success']  = "File is an image! - " . $check["mime"] . ".";
                    header("Location:index.php");
                    $uploadOk = 1;
                    } else {
                    $_SESSION['exists']  = "File is not an image!";
                    header("Location:index.php");
                    $uploadOk = 0;
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                    $_SESSION['exists']  = "File already exist.";
                    header("Location:index.php");
                    $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 50000000) {
                    $_SESSION['exists']  = "Your file is too large.";
                    header("Location:index.php");
                    $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                    header("Location:index.php");
                    $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                    $_SESSION['danger']  = "Your file was not uploaded.";
                    header("Location:index.php");
                    // if everything is ok, try to upload file
                    } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                                $sql = "INSERT INTO registered_students (stud_type, student_firstname,  student_middlename, student_lastname, student_extname, gender, date_of_birth, age, contact_num, email, address, zipcode, fathers_name, mothers_name,  parents_contact, last_grade_level, last_school_year, last_school_name,  year_level_to_enroll, school_to_enroll, schooladd_to_enroll, semester, track, strand, image,  date_registered ) 
                                VALUES ('$student_type', '$firstname', '$middlename', '$lastname', '$extname', '$gender', '$dob', '$age', '$contact', '$email', '$address', '$zipcode', '$father', '$mother', '$parentscontact', '$lastgradelevel', '$lastschoolyear', '$schoolname', '$level_to_enroll', '$school_to_enroll', '$school_add_to_enroll', '$semester', '$track', '$strand', '$file', '$month. $date, $year') ";

                                        if(mysqli_query($conn, $sql)) {
                                            $_SESSION['success']  = "You have successfully registered <b>$firstname $middlename $lastname $extname</b>. ";
                                            header("Location:index.php");
                                        } else {
                                            $_SESSION['success'] = "Something went wrong while saving the information. Please try again.";
                                            header("Location:index.php");
                                        }
                            } else {
                                $_SESSION['warning']   = "There was an error uploading your file.";
                                header("Location:index.php");
                            }
                     }
                }
          }
        }
  ?>
<!----------------------------------------END SAVE SENIOR HIGH SCHOOL-------------------------------------------------> 
