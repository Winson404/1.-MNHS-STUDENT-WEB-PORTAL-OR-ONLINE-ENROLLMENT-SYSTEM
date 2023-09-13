<?php
session_start();
include '../config.php';

    if(isset($_POST['update_student_profile'])) {
          $id = $_POST['stud_Id'];
          $file = basename($_FILES["fileToUpload"]["name"]);


          // Check if image file is a actual image or fake image
          $target_dir = "../images-students/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
          $_SESSION['success']  = "File is an image! - " . $check["mime"] . ".";
          header("Location: student_profile.php");
          $uploadOk = 1;
          } else {
          $_SESSION['exists']  = "File is not an image!";
          header("Location: student_profile.php");
          $uploadOk = 0;
          }

          // Check if file already exists
          if (file_exists($target_file)) {
          $_SESSION['exists']  = "File already exist.";
          header("Location: student_profile.php");
          $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 50000000) {
          $_SESSION['exists']  = "Your file is too large.";
          header("Location: student_profile.php");
          $uploadOk = 0;
          }

          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
          $_SESSION['exists']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
          header("Location: student_profile.php");
          $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
          $_SESSION['danger']  = "Your file was not uploaded.";
          header("Location: student_profile.php");
          // if everything is ok, try to upload file
          } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                      $sql = " UPDATE registered_students SET image = '$file' WHERE stud_Id= '$id' ";
                      if(mysqli_query($conn, $sql)) {
                      $_SESSION['success']  = "Student profile has been updated.";
                      header("Location: student_profile.php");                                 
                      } else {
                              $_SESSION['danger'] = "Something went wrong while saving your information. Please try again.";
                              header("Location: student_profile.php");
                      }
                  }
                  else {
                      $_SESSION['warning'] = "There was an error uploading your file.";
                      header("Location: student_profile.php");
                  }
           }
    }
?>