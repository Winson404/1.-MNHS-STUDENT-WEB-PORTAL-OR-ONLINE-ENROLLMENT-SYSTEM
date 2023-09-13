<?php
    session_start();
    include 'config.php';
?>

<!--#############################################################################################################################-->
<!-----------------------------------------SAVE SCHOOL YEAR CODE------------------------------------------------------------------->
  <?php

    if(isset($_POST['saveschoolyear'])) {
        $schoolyear = $_POST['schoolyear'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } elseif (empty($schoolyear) ) {
              $_SESSION['exists']  = "Please input the required fields!";
              header("Location: schoolyear.php");
              } else {
                      $query = mysqli_query($conn, "SELECT * FROM school_year WHERE schoolyear='$schoolyear' ");
                      if(mysqli_num_rows($query)>0) {
                      $_SESSION['exists']  = "Academic School Year already exist!";
                      header("Location: schoolyear.php");
                      } else {                  
                              $sql = " INSERT INTO school_year (schoolyear) VALUES (trim('$schoolyear') )";
                              if(mysqli_query($conn, $sql)) {    
                              $_SESSION['success']  = "New Academic School Year has been saved!";
                              header("Location: schoolyear.php");                                 
                              } else {
                                      $_SESSION['danger']   = "Opps, something went wrong. Please try again.";
                                      header("Location: schoolyear.php");
                                      } 
                              }
                      }  
     }

  ?>
<!-----------------------------------------END SAVE SCHOOL YEAR CODE--------------------------------------------------------------->
<!--#############################################################################################################################-->



<!--#############################################################################################################################-->
<!-----------------------------------------SAVE LEVEL AND SECTION CODE------------------------------------------------------------->
  <?php
  
      if(isset($_POST['savelevel_section'])) {
      $level   = $_POST['level'];
      $section = $_POST['section'];

      if(!$conn) {
      die("Connection failed " . mysqli_connect_error());
      } elseif (empty($level) && empty($section)) {
            $_SESSION['exists']  = "Please input the required fields!";
            header("Location: level_section.php");
            } elseif (empty($level)) {
                  $_SESSION['exists']  = "Level input field is required!";
                  header("Location: level_section.php");
                  } elseif (empty($section)) {
                        $_SESSION['exists']  = "Section input field is required!";
                        header("Location: level_section.php");
                        } else {
                                $query = mysqli_query($conn, "SELECT * FROM level_section WHERE section= '$section' ");
                                if(mysqli_num_rows($query)>0) {
                                $_SESSION['exists']  = "Section already exist!";
                                header("Location: level_section.php");
                                } else {                  
                                        $sql = " INSERT INTO level_section (level, section) VALUES (trim('$level'), trim('$section'))";
                                        if(mysqli_query($conn, $sql)) {    
                                        $_SESSION['success']  = "New Level and Section has been saved!";
                                        header("Location: level_section.php");                                 
                                        } else {
                                                $_SESSION['danger']   = "Opps, something went wrong. Please try again.";
                                                header("Location: level_section.php");
                                                } 
                                        }
                                }  
    }

  ?>
<!-----------------------------------------END SAVE LEVEL AND SECTION CODE--------------------------------------------------------->
<!--#############################################################################################################################-->



<!--#############################################################################################################################-->
<!-----------------------------------------SAVE COURSES CODE----------------------------------------------------------------------->
  <?php

      if(isset($_POST["savecourse"])) {    

      $coursename   = $_POST['coursename'];
      $coursedescription  = $_POST['coursedescription'];
      $file        = basename($_FILES["fileToUpload"]["name"]);

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        }  
        elseif (empty($coursename))  {
        $_SESSION['exists']  = "Course name input field is required.";
        header("Location: course.php");
        } 
        elseif (empty($coursedescription)) {
        $_SESSION['exists']  = "Course description input field is required.";
        header("Location: course.php");
        } 
        else {
            $query = mysqli_query($conn, "SELECT * FROM courses WHERE course_name= '$coursename' ");
            if(mysqli_num_rows($query)>0) {
            $_SESSION['exists']  = "Course already exist.";
            header("Location: course.php");
            } else {


                // Check if image file is a actual image or fake image
        $target_dir = "../images-course/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
        // $_SESSION['exists']  = "File is an image! - " . $check["mime"] . ".";
        // header("Location: course.php");
        $uploadOk = 1;
        } else {
        $_SESSION['invalid']  = "File is not an image!";
        $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        $_SESSION['invalid']  = "File already exist.";
        
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
        $_SESSION['invalid']  = "Your file is too large.";
       
        $uploadOk = 0;
        }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $_SESSION['error']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                $_SESSION['error']  = "Your file was not uploaded.";
                header("Location: course.php");
                // if everything is ok, try to upload file
                } else {

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = " INSERT INTO courses (course_name, course_description, course_image) 
                    VALUES (trim('$coursename'), trim('$coursedescription'), '$file')";
                          if(mysqli_query($conn, $sql)) {
                          $_SESSION['success']  = "Course has been saved.";
                          header("Location: course.php");                                
                          } else {
                            $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                            header("Location: course.php");
                          }
                    } else {
                          $_SESSION['exists'] = "There was an error uploading your file.";
                          header("Location: course.php");
                    }
                }
            }
        }
      }
  ?>
<!-----------------------------------------END SAVE COURSES CODE------------------------------------------------------------------->
<!--#############################################################################################################################-->




<!--#############################################################################################################################-->
<!-----------------------------------------SAVE FACULTY CODE----------------------------------------------------------------------->
  <?php

        if(isset($_POST["savefaculty"])) {


        $datetnow    = date("l, d F Y");
        $timenow     = date("g:i a", time());     

        $firstname   = $_POST['firstname'];
        $middlename  = $_POST['middlename'];
        $lastname    = $_POST['lastname'];
        $dob         = $_POST['dob'];
        $age         = $_POST['age'];
        $gender      = $_POST['gender'];
        $address     = $_POST['address'];
        $contact     = $_POST['contact'];
        $email       = $_POST['email'];
        // $username    = $_POST['username'];
        // $password    = md5($_POST['password']);
        // $cpassword   = md5($_POST['cpassword']);
        $advisory    = $_POST['advisory'];
        $file        = basename($_FILES["fileToUpload"]["name"]);

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        }  
        elseif (empty($firstname))  {
        $_SESSION['exists']  = "First name input field is required.";
        header("Location: faculty.php");
        } 
        elseif (empty($middlename)) {
        $_SESSION['exists']  = "MIddle name input field is required.";
        header("Location: faculty.php");
        } 
        elseif (empty($lastname))   {
        $_SESSION['exists']  = "Last name input field is required.";
        header("Location: faculty.php");
        } 
        elseif (empty($age))        {
        $_SESSION['exists']  = "Age input field is required.";
        header("Location: faculty.php");
        }
        elseif (empty($gender))        {
        $_SESSION['exists']  = "Gender input field is required.";
        header("Location: faculty.php");
        } 
        elseif (empty($dob))        {
        $_SESSION['exists']  = "Date of Birth input field is required.";
        header("Location: faculty.php");
        } 
        elseif (empty($contact))    {
        $_SESSION['exists']  = "Contact input field is required.";
        header("Location: faculty.php");
        }
        elseif (empty($email))      {
        $_SESSION['exists']  = "Email input field is required.";
        header("Location: faculty.php");
        } 
        elseif (empty($address))    {
        $_SESSION['exists']  = "Address input field is required.";
        header("Location: faculty.php");
        }
        else {
            $query = mysqli_query($conn, "SELECT * FROM faculty WHERE email= '$email' ");
            if(mysqli_num_rows($query)>0) {
            $_SESSION['exists']  = "Username already exist.";
            header("Location: faculty.php");
            } else {
                    $query = mysqli_query($conn, "SELECT * FROM faculty WHERE level_section_id= '$advisory' ");
                    if(mysqli_num_rows($query)>0){
                    $_SESSION['exists']  = "Section has already been asigned";
                    header("Location: faculty.php");
                    } else {
                            $query = mysqli_query($conn, "SELECT * FROM faculty WHERE email= '$email' ");
                            if(mysqli_num_rows($query)>0) {
                            $_SESSION['exists']  = "Email is already in used.";
                            header("Location: faculty.php");
                            } else {
                                    // Check if image file is a actual image or fake image
                                    $target_dir = "../images-faculty/";
                                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                    if($check !== false) {
                                    $_SESSION['success']  = "File is an image! - " . $check["mime"] . ".";
                                    header("Location: faculty.php");
                                    $uploadOk = 1;
                                    } else {
                                    $_SESSION['exists']  = "File is not an image!";
                                    header("Location: faculty.php");
                                    $uploadOk = 0;
                                    }

                                    // Check if file already exists
                                    if (file_exists($target_file)) {
                                    $_SESSION['exists']  = "File already exist.";
                                    header("Location: faculty.php");
                                    $uploadOk = 0;
                                    }

                                    // Check file size
                                    if ($_FILES["fileToUpload"]["size"] > 2000000) {
                                    $_SESSION['exists']  = "Your file is too large.";
                                    header("Location: faculty.php");
                                    $uploadOk = 0;
                                    }

                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif" ) {
                                    $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                                    header("Location: faculty.php");
                                    $uploadOk = 0;
                                    }

                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                    $_SESSION['danger']  = "Your file was not uploaded.";
                                    header("Location: faculty.php");
                                    // if everything is ok, try to upload file
                                    } else {
                                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                                                    $sql = " INSERT INTO faculty (firstname, middlename, lastname, date_of_birth, age, gender, address, contact, email, level_section_id, image) 
                                                    VALUES (trim('$firstname'), trim('$middlename'), trim('$lastname'), '$dob', trim('$age'), trim('$gender'), trim('$address'), trim('$contact'), trim('$email'), trim('$advisory'), '$file')";
                                                    if(mysqli_query($conn, $sql)) {
                                                    $_SESSION['success']  = "Faculty has been saved.";
                                                    header("Location: faculty.php");                                 
                                                    } else {
                                                    $_SESSION['danger']   = "Something went wrong while saving your information. Please try again.";
                                                    header("Location: faculty.php");
                                                    }
                                            } else {
                                            $_SESSION['warning']   = "There was an error uploading your file.";
                                            header("Location: faculty.php");
                                            }
                                    }
                            }
                    }
            }
        }
     } 
  ?>
<!-----------------------------------------END SAVE FACULTY CODE------------------------------------------------------------------->
<!--#############################################################################################################################-->



<!--#############################################################################################################################-->
<!-----------------------------------------ENROLL STUDENT CODE--------------------------------------------------------------------->
  <?php

        if(isset($_POST["enroll"] )) {

            $student_id    = $_POST['student_id']; // ID used in SAVING and UPDATING status of registered students after enrolling

            $name     = $_POST['studentname']; //Used to display the name of registered students in student confirmation of enrollment page

            $schoolyear    = $_POST['schoolyear'];                   
            $level_section = $_POST['level_section'];
            $adviser       = $_POST['adviser'];

            $datenow       = date("F d, Y");
            $timenow       = date("l - g:i a", time());


            $limit = mysqli_query($conn, "SELECT * FROM enrollment WHERE level_section_id='$level_section' ");
            if(mysqli_num_rows($limit) == 50) {
                   $_SESSION['danger']  = " Section is already full. ";
                   header("Location:registered_students.php");
            } else {
                 
                    $exists = mysqli_query($conn, "SELECT * FROM enrollment WHERE student_id='$student_id' ");
                    if(mysqli_num_rows($exists) > 0) {
                           $_SESSION['danger']  = " Student is already enrolled. ";
                           header("Location:registered_students.php");
                    } else {
                            $sql = "INSERT INTO enrollment (school_year_id, student_id, level_section_id, faculty_id, date) 
                            VALUES ('$schoolyear', '$student_id', '$level_section', '$adviser', '$datenow - $timenow') ";

                            if(mysqli_query($conn, $sql)) {
                                $query = mysqli_query($conn, "UPDATE registered_students set status='Enrolled' WHERE stud_Id = '$student_id' "); 
                                $_SESSION['success']  = " You have officially enrolled <b>$name</b>.";
                                header("Location:registered_students.php");
                            }
                             else {
                                  $_SESSION['danger']  = " Something went wrong while saving your information. Please try again. ";
                                  header("Location:registered_students.php");
                            }
                      }
              }      
        }
  ?>
<!-----------------------------------------END ENROLL STUDENT CODE----------------------------------------------------------------->
<!--#############################################################################################################################-->







<!----------------------------------------SAVE JUNIOR HIGH SCHOOL----------------------------------------------------->
 

    <?php
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
        elseif (empty($student_type))  {
        $_SESSION['exists']  = "Student type input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($firstname))  {
        $_SESSION['exists']  = "First name input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($middlename)) {
        $_SESSION['exists']  = "MIddle name input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($lastname))   {
        $_SESSION['exists']  = "Last name input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($gender))   {
        $_SESSION['exists']  = "Gender input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($dob))        {
        $_SESSION['exists']  = "Date of Birth input field is required.";
        header("Location:registered_students.php");
        }  
        elseif (empty($age))        {
        $_SESSION['exists']  = "Age input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($contact))    {
        $_SESSION['exists']  = "Contact input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($email))      {
        $_SESSION['exists']  = "Email input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($address))    {
        $_SESSION['exists']  = "Address input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($father))   {
        $_SESSION['exists']  = "Father's name input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($mother))   {
        $_SESSION['exists']  = "mother's name input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($parentscontact))  {
        $_SESSION['exists']  = "Parent's contact input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($lastgradelevel))    {
        $_SESSION['exists']  = "Last grade level input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($lastschoolyear))      {
        $_SESSION['exists']  = "Last school year input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($schoolname))    {
        $_SESSION['exists']  = "Name of last school attended input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($level_to_enroll))   {
        $_SESSION['exists']  = "Year level to enroll input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($school_to_enroll))   {
        $_SESSION['exists']  = "Name of school to enroll input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($school_add_to_enroll))  {
        $_SESSION['exists']  = "School address input field is required.";
        header("Location:registered_students.php");
        } 
        else {
            $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
            if(mysqli_num_rows($query)>0) {
            $_SESSION['exists']  = "Email is already taken.";
            header("Location:registered_students.php");
            } else {

                                     // Check if image file is a actual image or fake image
                                    $target_dir = "../images-students/";
                                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                    if($check !== false) {
                                    $_SESSION['success']  = "File is an image! - " . $check["mime"] . ".";
                                    header("Location:registered_students.php");
                                    $uploadOk = 1;
                                    } else {
                                    $_SESSION['exists']  = "File is not an image!";
                                    header("Location:registered_students.php");
                                    $uploadOk = 0;
                                    }

                                    // Check if file already exists
                                    if (file_exists($target_file)) {
                                    $_SESSION['exists']  = "File already exist.";
                                    header("Location:registered_students.php");
                                    $uploadOk = 0;
                                    }

                                    // Check file size
                                    if ($_FILES["fileToUpload"]["size"] > 2000000) {
                                    $_SESSION['exists']  = "Your file is too large.";
                                    header("Location:registered_students.php");
                                    $uploadOk = 0;
                                    }

                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif" ) {
                                    $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                                header("Location:registered_students.php");
                                    $uploadOk = 0;
                                    }

                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                    $_SESSION['danger']  = "Your file was not uploaded.";
                                    header("Location:registered_students.php");
                                    // if everything is ok, try to upload file
                                    } else {
                                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                                                $sql = "INSERT INTO registered_students (stud_type, student_firstname,  student_middlename, student_lastname, student_extname, gender, date_of_birth, age, contact_num, email, address, zipcode, fathers_name, mothers_name, parents_contact, last_grade_level, last_school_year, last_school_name, 
                                                year_level_to_enroll, school_to_enroll, schooladd_to_enroll, image, date_registered ) 
                                                VALUES ('$student_type', '$firstname', '$middlename', '$lastname', '$extname', '$gender', '$dob', '$age', '$contact', '$email',
                                                '$address', '$zipcode', '$father', '$mother', '$parentscontact', '$lastgradelevel', '$lastschoolyear', '$schoolname', '$level_to_enroll',
                                                '$school_to_enroll', '$school_add_to_enroll', '$file',  '$month. $date, $year') "; //'$datenow - $timenow'

                                                        if(mysqli_query($conn, $sql)) {
                                                            $_SESSION['success']  = "You have successfully registered <b>$firstname $middlename $lastname $extname</b>. </b> ";
                                                            header("Location:registered_students.php");
                                                        } else {
                                                            echo    "Something went wrong while saving the information. Please try again.";
                                                            header("Location:registered_students.php");
                                                        }
                                            } else {
                                                $_SESSION['warning']   = "There was an error uploading your file.";
                                                header("Location:registered_students.php");
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
        elseif (empty($student_type))  {
        $_SESSION['exists']  = "Student type input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($firstname))  {
        $_SESSION['exists']  = "First name input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($middlename)) {
        $_SESSION['exists']  = "MIddle name input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($lastname))   {
        $_SESSION['exists']  = "Last name input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($gender))   {
        $_SESSION['exists']  = "Gender input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($dob))        {
        $_SESSION['exists']  = "Date of Birth input field is required.";
        header("Location:registered_students.php");
        }  
        elseif (empty($age))        {
        $_SESSION['exists']  = "Age input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($contact))    {
        $_SESSION['exists']  = "Contact input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($email))      {
        $_SESSION['exists']  = "Email input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($address))    {
        $_SESSION['exists']  = "Address input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($father))   {
        $_SESSION['exists']  = "Father's name input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($mother))   {
        $_SESSION['exists']  = "mother's name input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($parentscontact))  {
        $_SESSION['exists']  = "Parent's contact input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($lastgradelevel))    {
        $_SESSION['exists']  = "Last grade level input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($lastschoolyear))      {
        $_SESSION['exists']  = "Last school year input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($schoolname))    {
        $_SESSION['exists']  = "Name of last school attended input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($level_to_enroll))   {
        $_SESSION['exists']  = "Year level to enroll input field is required.";
        header("Location:registered_students.php");
        }
        elseif (empty($school_to_enroll))   {
        $_SESSION['exists']  = "Name of school to enroll input field is required.";
        header("Location:registered_students.php");
        } 
        elseif (empty($school_add_to_enroll))  {
        $_SESSION['exists']  = "School address input field is required.";
        header("Location:registered_students.php");
        } 
        else {
            $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
            if(mysqli_num_rows($query)>0) {
            $_SESSION['exists']  = "Email is already taken.";
            header("Location:registered_students.php");
            } else {

                                     // Check if image file is a actual image or fake image
                                    $target_dir = "../images-students/";
                                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                    if($check !== false) {
                                    $_SESSION['success']  = "File is an image! - " . $check["mime"] . ".";
                                    header("Location:registered_students.php");
                                    $uploadOk = 1;
                                    } else {
                                    $_SESSION['exists']  = "File is not an image!";
                                    header("Location:registered_students.php");
                                    $uploadOk = 0;
                                    }

                                    // Check if file already exists
                                    if (file_exists($target_file)) {
                                    $_SESSION['exists']  = "File already exist.";
                                    header("Location:registered_students.php");
                                    $uploadOk = 0;
                                    }

                                    // Check file size
                                    if ($_FILES["fileToUpload"]["size"] > 2000000) {
                                    $_SESSION['exists']  = "Your file is too large.";
                                    header("Location:registered_students.php");
                                    $uploadOk = 0;
                                    }

                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif" ) {
                                    $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
                                    header("Location:registered_students.php");
                                    $uploadOk = 0;
                                    }

                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                    $_SESSION['danger']  = "Your file was not uploaded.";
                                    header("Location:registered_students.php");
                                    // if everything is ok, try to upload file
                                    } else {
                                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                                                $sql = "INSERT INTO registered_students (stud_type, student_firstname,  student_middlename, student_lastname, student_extname, gender, date_of_birth, age, contact_num, email, address, zipcode, fathers_name, mothers_name,  parents_contact, last_grade_level, last_school_year, last_school_name,  year_level_to_enroll, school_to_enroll, schooladd_to_enroll, semester, track, strand, image, date_registered ) 
                                                VALUES ('$student_type', '$firstname', '$middlename', '$lastname', '$extname', '$gender', '$dob', '$age', '$contact', '$email', '$address', '$zipcode', '$father', '$mother', '$parentscontact', '$lastgradelevel', '$lastschoolyear', '$schoolname', '$level_to_enroll', '$school_to_enroll', '$school_add_to_enroll', '$semester', '$track', '$strand', '$file', '$month. $date, $year') ";

                                                        if(mysqli_query($conn, $sql)) {
                                                            $_SESSION['success']  = "You have successfully registered <b>$firstname $middlename $lastname $extname</b>. </b> ";
                                                            header("Location:registered_students.php");
                                                        } else {
                                                            echo    "Something went wrong while saving the information. Please try again.";
                                                            header("Location:registered_students.php");
                                                        }
                                            } else {
                                                $_SESSION['warning']   = "There was an error uploading your file.";
                                                header("Location:registered_students.php");
                                            }
                                     }
                   }
          }
        }
  ?>
<!----------------------------------------END SAVE SENIOR HIGH SCHOOL-------------------------------------------------> 


<!--#############################################################################################################################-->
<!-----------------------------------------SAVE SUBJECT CODE------------------------------------------------------------------->
  <?php

    if(isset($_POST['save_subject'])) {
        $subject_level = $_POST['subject_level'];
        $subject_name  = $_POST['subject_name'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } elseif($subject_level == "Grade 7" || $subject_level == "Grade 8" || $subject_level == "Grade 9" || $subject_level == "Grade 10") {
              if (empty($subject_level) || empty($subject_name)) {
              $_SESSION['exists']  = "Please input the required fields!";
              header("Location: subject.php");
              } else {
                      $subject_query = mysqli_query($conn, "SELECT * FROM subject WHERE subject_name='$subject_name' ");
                      if(mysqli_num_rows($subject_query)>0) {
                      $_SESSION['exists']  = "Subject already exist!";
                      header("Location: subject.php");
                      } else {                  
                              $subject = " INSERT INTO subject (subject_level, subject_name) VALUES (trim('$subject_level'), trim('$subject_name'))";
                              if(mysqli_query($conn, $subject)) {    
                              $_SESSION['success']  = "New subject has been saved!";
                              header("Location: subject.php");                                 
                              } else {
                                      $_SESSION['danger']   = "Opps, something went wrong. Please try again.";
                                      header("Location: subject.php");
                                      } 
                      }
              }  
        } else {
              // VARIABLE FOR STRAND FOR SENIOR HIGH SCHOOL SUBJECTS
              $strand        = $_POST['strand'];
              if (empty($subject_level) || empty($subject_name) || empty($strand)) {
              $_SESSION['exists']  = "Please input the required fields!";
              header("Location: subject.php");
              } else {
                      $subject_query = mysqli_query($conn, "SELECT * FROM subject WHERE subject_name='$subject_name' ");
                      if(mysqli_num_rows($subject_query)>0) {
                      $_SESSION['exists']  = "Subject already exist!";
                      header("Location: subject.php");
                      } else {                  
                              $subject = " INSERT INTO subject (subject_level, subject_name, strand) VALUES (trim('$subject_level'), trim('$subject_name'), trim('$strand'))";
                              if(mysqli_query($conn, $subject)) {    
                              $_SESSION['success']  = "New subject has been saved!";
                              header("Location: subject.php");                                 
                              } else {
                                      $_SESSION['danger']   = "Opps, something went wrong. Please try again.";
                                      header("Location: subject.php");
                                      } 
                              }
                      }
        }

                
     }

  ?>
<!-----------------------------------------END SAVE SUBJECT CODE--------------------------------------------------------------->
<!--#############################################################################################################################-->