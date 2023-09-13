<?php
    session_start();
    include 'config.php';
?>

<!--#########################################################################################################-->
<!-----------------------------------------UPDATE SCHOOL YEAR-------------------------------------------------->
  <?php

      if(isset($_POST['update_schoolyear'])) {
          $id         = $_POST['Id'];
          $schoolyear = $_POST['schoolyear'];
          $status     = $_POST['status'];

          if(!$conn) {
          die("Connection failed " . mysqli_connect_error());
          } 
          elseif(empty(trim($schoolyear)) || empty(trim($status))) {
          $_SESSION['exists'] = "Empty field are required!";   
          header("Location: schoolyear.php");
          exit();
          } else {         
                $query = mysqli_query($conn, "SELECT * FROM school_year WHERE status='$status'");
                $row = mysqli_fetch_array($query);
                $active = $row['status'];
                if($active == 'Active' AND $status == 'Active') {
                $_SESSION['exists'] = "There is already an active year";   
                header("Location: schoolyear.php");    
                exit();            
                } else {
                      $exist = mysqli_query($conn, "SELECT * FROM school_year WHERE schoolyear='$schoolyear'");
                      if(mysqli_num_rows($exist) > 0) {
                      $_SESSION['exists'] = "School year already exists.";   
                      header("Location: schoolyear.php");    
                      exit();            
                      } else {
                             $sql ="UPDATE school_year SET schoolyear=trim('$schoolyear'), status = trim('$status') WHERE year_Id = '$id' ";
                              if(mysqli_query($conn, $sql)) {
                              $_SESSION['success'] = "School year has been updated.";   
                              header("Location: schoolyear.php");
                              } else {
                                  $_SESSION['exists'] = "Something went wrong while updating the data.";   
                                  header("Location: schoolyear.php");
                              }
                      }      
                }                                      
          } 
      }
  ?>
<!-----------------------------------------END UPDATE SCHOOL YEAR---------------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-----------------------------------------UPDATE LEVEL AND SECTION-------------------------------------------->
  <?php

    if(isset($_POST['updatelevel_section'])) {
        $id       = $_POST['Id'];
        $level    = $_POST['level'];
        $section  = $_POST['section'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } 
            elseif(empty(trim($level)) && empty(trim($section)) ) {
            $_SESSION['exists'] = "Empty fields are required!";   
            header("Location: level_section.php");
            exit();
            } else { 
                $query = mysqli_query($conn, "SELECT * FROM level_section WHERE section ='$section' AND level = '$level' ");
                if(mysqli_num_rows($query)>0) {
                $_SESSION['exists'] = "Section already exists.";   
                    header("Location: level_section.php");
                } else {
                      $exists = mysqli_query($conn, "SELECT * FROM level_section WHERE section ='$section'  AND level != '$level' ");
                      if(mysqli_num_rows($exists)>0) {
                            $sql ="UPDATE level_section SET level=trim('$level'), section = trim('$section') WHERE lev_sec_Id = '$id' ";
                            if(mysqli_query($conn, $sql)) {
                            $_SESSION['success'] = "Level and Section has been updated.";   
                            header("Location: level_section.php");
                            } else {
                                $_SESSION['exists'] = "Something went wrong while updating the data.";   
                                header("Location: level_section.php");
                            }
                      } else {
                          $sql ="UPDATE level_section SET level=trim('$level'), section = trim('$section') WHERE lev_sec_Id = '$id' ";
                          if(mysqli_query($conn, $sql)) {
                          $_SESSION['success'] = "Level and Section has been updated.";   
                          header("Location: level_section.php");
                          } else {
                              $_SESSION['exists'] = "Something went wrong while updating the data.";   
                              header("Location: level_section.php");
                          }
                      }  
                }                                     
          } 
    }

  ?>
<!-----------------------------------------END UPDATE LEVEL AND SECTION---------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-----------------------------------------UDPATE COURSE------------------------------------------------------->
  <?php

    if(isset($_POST['udpate_course'])) {

        $id = $_POST['course_Id'];

        $coursename        = $_POST['update_name'];
        $coursedescription = $_POST['update_description'];
        

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } elseif (empty($coursename) || empty($coursedescription)) {
              $_SESSION['exists']  = "Empty field are required! ";
              } else {
                      $courses = mysqli_query($conn, "SELECT * FROM courses WHERE course_name='$coursename' ");
                      if(mysqli_num_rows($courses) > 0) {
                      $_SESSION['exists']  = "Selected course already exist!";
                      header("Location: course.php");
                      } else {
                              $sql ="UPDATE courses SET course_name=trim('$coursename'), course_description = trim('$coursedescription') WHERE course_Id = '$id' ";
                              if(mysqli_query($conn, $sql)) {
                              $_SESSION['success'] = "Courses has been updated.";   
                              header("Location: course.php");
                              } else {
                                  $_SESSION['exists'] = "Something went wrong while updating the data.";   
                                  header("Location: course.php");
                              }
                      }
              }  
     }

////////////////////////////////-----------UPDATING COURSE PHOTO--------------/////////////////////////////// 
     elseif(isset($_POST['updatecourse_photo'])) {
      $id = $_POST['course_id'];
      $file        = basename($_FILES["fileToUpload"]["name"]);

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

                $sql ="UPDATE courses SET course_image = '$file' WHERE course_Id = '$id' ";
                      if(mysqli_query($conn, $sql)) {
                      $_SESSION['success'] = "Courses has been updated.";   
                      header("Location: course.php");
                      } else {
                          $_SESSION['exists'] = "Something went wrong while updating the data.";   
                          header("Location: course.php");
                      }
                } else {
                    $_SESSION['exists']   = "There was an error uploading your file.";
                    header("Location: course.php");
                }
         }

     }
     ?>
<!-----------------------------------------END UDPATE COURSE--------------------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-----------------------------------------UDPATE FACULTY------------------------------------------------------>
    <?php

        if(isset($_POST["updatefaculty"])) {

        $id          = $_POST['faculty_id'];

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
        //$file        = basename($_FILES["fileToUpload"]["name"]);

                if(!$conn) {
                die("Connection failed " . mysqli_connect_error());
                }  

                elseif (empty($firstname) || empty($middlename) || empty($lastname) || empty($age) || empty($dob) || empty($contact) || empty($email) || empty($address) )  
                {
                  $_SESSION['exists']  = "Empty fields are required!";
                  header("Location: faculty.php");
                }         
                else {    
                       $sql ="UPDATE faculty SET
                        firstname        = trim('$firstname'),
                        middlename       = trim('$middlename'),
                        lastname         = trim('$lastname'),
                        date_of_birth    = trim('$dob'),
                        age              = trim('$age'),
                        gender           = trim('$gender'),
                        address          = trim('$address'),
                        contact          = trim('$contact'),
                        email            = trim('$email'),
                        level_section_id = '$advisory' WHERE fac_Id = '$id' ";

                                if(mysqli_query($conn, $sql)) {
                                    $sql =mysqli_query($conn,"SELECT * FROM enrollment");
                                    $row = mysqli_fetch_array($sql);
                                    $level_section = $row['level_section_id'];
                                    $enrollment_id = $row['enrollment_id'];

                                    $update_enrollment ="UPDATE enrollment SET level_section_id='$advisory' WHERE enrollment_id='$enrollment_id' ";

                                    if(mysqli_query($conn, $update_enrollment)) {
                                        $_SESSION['success']  = "Faculty has been updated.";  
                                        header("Location: faculty.php");
                                    } else {
                                        $_SESSION['exists']  = "Cannot update section.";  
                                        header("Location: faculty.php");
                                    }                    
                                } else {
                                      $_SESSION['exists']   = "Something went wrong while updating your information. Please try again.";
                                      header("Location: faculty.php");
                                } 
                }
       }    
                  
////////////////////////////////-----------UPDATING PROFILE PHOTO OF FACULTY---------------///////////////////// 
        elseif(isset($_POST['update_profile'])) {
        $id = $_POST['faculty_id'];
        $file = basename($_FILES["fileToUpload"]["name"]);


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
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
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
        $_SESSION['error']  = "Your file was not uploaded.";
        header("Location: faculty.php");
        // if everything is ok, try to upload file
        } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    $sql = " UPDATE faculty SET image = '$file' WHERE fac_Id= '$id' ";
                    if(mysqli_query($conn, $sql)) {
                    $_SESSION['success']  = "Faculty profile has been updated.";
                    header("Location: faculty.php");                                 
                    } else {
                            $_SESSION['exists']   = "Something went wrong while saving your information. Please try again.";
                            header("Location: faculty.php");
                    }
                }
                else {
                    $_SESSION['exists']   = "There was an error uploading your file.";
                    header("Location: faculty.php");
                }
         }
    }
  ?>
<!-----------------------------------------END UDPATE FACULTY-------------------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-----------------------------------------UDPATE STUDENT INFORMATION------------------------------------------>
  <?php

    if(isset($_POST["update_student"])) {

      $id          = $_POST['student_id'];

      $firstname      = $_POST['student_firstname'];
      $middlename     = $_POST['student_middlename'];
      $lastname       = $_POST['student_lastname'];
      $extname        = $_POST['student_extname'];
      $gender         = $_POST['gender'];
      $dob            = $_POST['dob'];
      $age            = $_POST['age'];
      $address        = $_POST['address'];
      $zipcode        = $_POST['zipcode'];
      $contact        = $_POST['contact'];
      $email          = $_POST['email'];
      $fathersname    = $_POST['fathers_name'];
      $mothersname    = $_POST['mothers_name'];
      $parentscontact = $_POST['parents_contact'];
      $yearlevel      = $_POST['year_level_to_enroll'];
      $semester       = $_POST['semester'];
      $track          = $_POST['track'];
      $strand         = $_POST['strand'];

      if(!$conn) {
      die("Connection failed " . mysqli_connect_error());
      }  else {

              $sql = mysqli_query($conn, "SELECT year_level_to_enroll FROM registered_students WHERE stud_Id= '$id' ");
              $row = mysqli_fetch_array($sql);

              if($row['year_level_to_enroll'] === 'Grade 11' || $row['year_level_to_enroll'] === 'Grade 12') {

                                // FOR EMPTY INPUT FIELDS--------------------------------------------------------------------------------->
                                  if (empty($firstname) || empty($middlename) || empty($lastname) || empty($gender) || empty($dob) || empty($age) || empty($address) || empty($contact) || empty($email) || empty($fathersname) || empty($mothersname) || empty($parentscontact) || empty($yearlevel) || empty($semester) || empty($track) ||empty($strand) ) {
                                  $_SESSION['exists']  = "There are empty fields required!";
                                  header("Location: registered_students.php");
                                  } 
                                // END -FOR EMPTY INPUT FIELDS---------------------------------------------------------------------------->

                                else {  // UPDATING SENIOR HIGH SCHOOL ONLY--------------------------------------------------------------------->      
                                  // $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
                                  // if(mysqli_num_rows($query)>0) {
                                  // $_SESSION['exists']  = "Email is already in used.";
                                  // header("Location: registered_students.php");
                                  // } else {
                                        $sql ="UPDATE registered_students SET
                                        student_firstname    = trim('$firstname'),
                                        student_middlename   = trim('$middlename'),
                                        student_lastname     = trim('$lastname'),
                                        student_extname      = trim('$extname'),
                                        gender               = trim('$gender'),
                                        date_of_birth        = trim('$dob'),
                                        age                  = trim('$age'),
                                        contact_num          = trim('$contact'),
                                        email                = trim('$email'),
                                        address              = trim('$address'),
                                        zipcode              = trim('$zipcode'),
                                        fathers_name         = trim('$fathersname'),
                                        mothers_name         = trim('$mothersname'),
                                        parents_contact      = trim('$parentscontact'),
                                        year_level_to_enroll = trim('$yearlevel'),
                                        semester             = trim('$semester'),
                                        track                = trim('$track'),
                                        strand               = trim('$strand') WHERE stud_Id = '$id' ";

                                          if(mysqli_query($conn, $sql)) {
                                          $_SESSION['success'] = "Student information has been updated.";  
                                          header("Location: registered_students.php");                               
                                          } else {
                                              $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                                              header("Location: registered_students.php");
                                          }
                                    //}
                                } // END UPDATING SENIOR HIGH SCHOOL ONLY----------------------------------------------------------------------->

              } // CLOSING THE IF CONDITION IF LEVEL IS EQUAL TO GRADE 11 OR 12

              else {  // ELSE STATEMENT FOR IF CONDITION IF LEVEL IS EQUAL TO GRADE 7 TO 10

                                // FOR EMPTY INPUT FIELDS--------------------------------------------------------------------------------->
                                  if (empty($firstname) || empty($middlename) || empty($lastname) || empty($gender) || empty($dob) || empty($age) || empty($address) || empty($contact) || empty($email) || empty($fathersname) || empty($mothersname) || empty($parentscontact) || empty($yearlevel) ) { 
                                    $_SESSION['exists']  = "There are empty fields required!";
                                    header("Location: registered_students.php");
                                  } 
                                // END -FOR EMPTY INPUT FIELDS---------------------------------------------------------------------------->

                                else {   // UPDATING JUNIOR HIGH SCHOOL ONLY-------------------------------------------------------------------->      
                                  // $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
                                  // if(mysqli_num_rows($query)>0) {
                                  // $_SESSION['exists']  = "Email is already in used.";
                                  // header("Location: registered_students.php");
                                  // } else {
                                        $sql ="UPDATE registered_students SET
                                        student_firstname    = trim('$firstname'),
                                        student_middlename   = trim('$middlename'),
                                        student_lastname     = trim('$lastname'),
                                        student_extname      = trim('$extname'),
                                        gender               = trim('$gender'),
                                        date_of_birth        = trim('$dob'),
                                        age                  = trim('$age'),
                                        contact_num          = trim('$contact'),
                                        email                = trim('$email'),
                                        address              = trim('$address'),
                                        zipcode              = trim('$zipcode'),
                                        fathers_name         = trim('$fathersname'),
                                        mothers_name         = trim('$mothersname'),
                                        parents_contact      = trim('$parentscontact'),
                                        year_level_to_enroll = trim('$yearlevel'),
                                        semester             = trim('$semester'),
                                        track                = trim('$track'),
                                        strand               = trim('$strand')  WHERE stud_Id = '$id' ";

                                            if(mysqli_query($conn, $sql)) {
                                            $_SESSION['success'] = "Student information has been updated.";  
                                            header("Location: registered_students.php");                               
                                            } else {
                                                  $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                                                  header("Location: registered_students.php");
                                            }
                                   // }
                                } // END UPDATING SENIOR HIGH SCHOOL ONLY----------------------------------------------------------------------->
              
              } // CLOSING ELSE STATEMENT FOR IF CONDITION IF LEVEL IS EQUAL TO GRADE 7 TO 10

         }  //CLOSING THE FIRST ELSE STATEMENT     
    } //CLOSING IF ISSET CONDITION

////////////////////////////////-----------UPDATING PROFILE PICTURE OF REGISTERED STUDENT---------------/////////////////////
    elseif(isset($_POST['update_registered_student_profile'])) {
          $id = $_POST['stud_id'];
          $file = basename($_FILES["fileToUpload"]["name"]);


          // Check if image file is a actual image or fake image
          $target_dir = "../images-students/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
          $_SESSION['success']  = "File is an image! - " . $check["mime"] . ".";
          header("Location: registered_students.php");
          $uploadOk = 1;
          } else {
          $_SESSION['exists']  = "File is not an image!";
          header("Location: registered_students.php");
          $uploadOk = 0;
          }

          // Check if file already exists
          if (file_exists($target_file)) {
          $_SESSION['exists']  = "File already exist.";
          header("Location: registered_students.php");
          $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 50000000) {
          $_SESSION['exists']  = "Your file is too large.";
          header("Location: registered_students.php");
          $uploadOk = 0;
          }

          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
          $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
          header("Location: registered_students.php");
          $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
          $_SESSION['error']  = "Your file was not uploaded.";
          header("Location: registered_students.php");
          // if everything is ok, try to upload file
          } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                      $sql = " UPDATE registered_students SET image = '$file' WHERE stud_Id= '$id' ";
                      if(mysqli_query($conn, $sql)) {
                      $_SESSION['success']  = "Student profile has been updated.";
                      header("Location: registered_students.php");                                 
                      } else {
                              $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                              header("Location: registered_students.php");
                      }
                  }
                  else {
                      $_SESSION['exists'] = "There was an error uploading your file.";
                      header("Location: registered_students.php");
                  }
           }
    }
////////////////////////////////-----------END UPDATING PROFILE PICTURE OF REGISTERED STUDENT---------------/////////////////////

////////////////////////////////-----------UPDATING PROFILE PICTURE OF ENROLLED STUDENT---------------/////////////////////

    elseif(isset($_POST['update_enrolled_student_profile'])) {
          $id = $_POST['stud_id'];
          $file = basename($_FILES["fileToUpload"]["name"]);


          // Check if image file is a actual image or fake image
          $target_dir = "../images-students/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
          $_SESSION['success']  = "File is an image! - " . $check["mime"] . ".";
          header("Location: enrolled_students.php");
          $uploadOk = 1;
          } else {
          $_SESSION['exists']  = "File is not an image!";
          header("Location: enrolled_students.php");
          $uploadOk = 0;
          }

          // Check if file already exists
          if (file_exists($target_file)) {
          $_SESSION['exists']  = "File already exist.";
          header("Location: enrolled_students.php");
          $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 50000000) {
          $_SESSION['exists']  = "Your file is too large.";
          header("Location: enrolled_students.php");
          $uploadOk = 0;
          }

          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
          $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
          header("Location: enrolled_students.php");
          $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
          $_SESSION['error']  = "Your file was not uploaded.";
          header("Location: enrolled_students.php");
          // if everything is ok, try to upload file
          } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                      $sql = " UPDATE registered_students SET image = '$file' WHERE stud_Id= '$id' ";
                      if(mysqli_query($conn, $sql)) {
                      $_SESSION['success']  = "Student profile has been updated.";
                      header("Location: enrolled_students.php");                                 
                      } else {
                              $_SESSION['exists'] = "Something went wrong while saving your information. Please try again.";
                              header("Location: enrolled_students.php");
                      }
                  }
                  else {
                      $_SESSION['exists'] = "There was an error uploading your file.";
                      header("Location: enrolled_students.php");
                  }
           }
    }
////////////////////////////////-----------UPDATING PROFILE PICTURE OF ENROLLED STUDENT---------------/////////////////////
  ?>
<!-----------------------------------------END UDPATE STUDENT INFORMATION--------------------------------------->
<!--##########################################################################################################-->



<!--#########################################################################################################-->
<!-----------------------------------------UPDATE ENROLLMENT--------------------------------------------------->
  <?php

    if(isset($_POST['edit_enrollment'])) {
        $enrollment_id    = $_POST['enrollment_id'];
        $student_id       = $_POST['student_id'];
        $level_section_id = $_POST['level_section_id'];
        $faculty_id       = $_POST['faculty_id'];
        $schoolyear_id    = $_POST['schoolyear_id'];

        if(!$conn) {
        die("Connection failed " . mysqli_connect_error());
        } 
            elseif(empty(trim($level)) && empty(trim($section)) && empty(trim($level_section_id))  && empty(trim($faculty_id)) && empty(trim($schoolyear_id))) {
            $_SESSION['exists'] = "Empty fields are required!";   
            header("Location: enrolled_students.php");
            exit();
            }
                else {
                    $limit = mysqli_query($conn, "SELECT * FROM enrollment WHERE level_section_id='$level_section' ");
                    if(mysqli_num_rows($limit) == 50) {
                           $_SESSION['exists']  = " Section is already full. ";
                           header("Location: enrolled_students.php");
                    } else {
                          $sql ="UPDATE enrollment SET school_year_id=trim('$schoolyear_id'), student_id = trim('$student_id'), level_section_id=trim('$level_section_id'), faculty_id = trim('$faculty_id')WHERE enrollment_id = '$enrollment_id' ";
                          if(mysqli_query($conn, $sql)) {
                              $_SESSION['success'] = "Student enrollment has been updated.";   
                              header("Location: enrolled_students.php");
                          } else {
                              $_SESSION['exists'] = "Something went wrong while updating data.";   
                              header("Location: enrolled_students.php");
                          }    
                    }                             
               } 
    }

  ?>
<!-----------------------------------------END UPDATE ENROLLMENT----------------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-----------------------------------------UPDATE SUBJECT------------------------------------------------------>
  <?php

      if(isset($_POST['update_subject'])) {
          $id            = $_POST['Id'];
          $subject_level = $_POST['subject_level'];
          $subject_name  = $_POST['subject_name'];
          

          if(!$conn) {
          die("Connection failed " . mysqli_connect_error());
          } else if ($subject_level == "Grade 7" || $subject_level == "Grade 8" || $subject_level == "Grade 9" || $subject_level == "Grade 10") {
              if(empty(trim($subject_level)) || empty(trim($subject_name))) {
                $_SESSION['exists'] = "Empty field are required!";   
                header("Location: subject.php");
                exit();
              } else {
                    $check_subject_name1 = mysqli_query($conn, "SELECT * FROM subject WHERE subject_name='$subject_name' ");
                    if(mysqli_num_rows($check_subject_name1) > 0 ) {
                    $_SESSION['exists'] = "Subject already exists!";   
                    header("Location: subject.php");    
                    exit();            
                    } else {
                           $subject_update1 ="UPDATE subject SET subject_level = trim('$subject_level'), subject_name = trim('$subject_name') WHERE sub_Id = '$id' ";
                            if(mysqli_query($conn, $subject_update1)) {
                            $_SESSION['success'] = "Subject year has been updated.";   
                            header("Location: subject.php");
                            } else {
                                $_SESSION['exists'] = "Something went wrong while updating the data.";   
                                header("Location: subject.php");
                            }
                    }
              }
          } else {
                // VARIABLE FOR STRAND FOR SENIOR HIGH SCHOOL SUBJECTS
                $strand        = $_POST['strand'];
                if(empty(trim($subject_level)) || empty(trim($subject_name)) || empty(trim($strand))) {
                $_SESSION['exists'] = "Empty field are required!";   
                header("Location: subject.php");
                exit();
                } else {         
                      $check_subject_name2 = mysqli_query($conn, "SELECT * FROM subject WHERE subject_name='$subject_name'");
                      if(mysqli_num_rows($check_subject_name2)>0) {
                      $_SESSION['exists'] = "Subject already exists!";   
                      header("Location: subject.php");    
                      exit();            
                      } else {
                             $subject_update2 ="UPDATE subject SET subject_level=trim('$subject_level'), subject_name = trim('$subject_name'), strand = trim('$strand') WHERE sub_Id = '$id' ";
                              if(mysqli_query($conn, $subject_update2)) {
                              $_SESSION['success'] = "Subject year has been updated.";   
                              header("Location: subject.php");
                              } else {
                                  $_SESSION['exists'] = "Something went wrong while updating the data.";   
                                  header("Location: subject.php");
                              }
                      }                                      
                } 
          }

      }
  ?>
<!-----------------------------------------END UPDATE SUBJECT-------------------------------------------------->
<!--#########################################################################################################-->