

<?php
    if(isset($_POST['update_profile_sidebar'])) {
        $id = $_POST['faculty_id'];
        $file = basename($_FILES["fileToUpload"]["name"]);


        // Check if image file is a actual image or fake image
        $target_dir = "../images-faculty/";
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
                header("Location: admin_profile.php");
                // if everything is ok, try to upload file
                } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    $sql = " UPDATE faculty SET image = '$file' WHERE fac_Id= '$id' ";
                    if(mysqli_query($conn, $sql)) {
                    $_SESSION['success']  = "Faculty profile has been updated.";
                    header("Location: admin_profile.php");                                 
                    } else {
                            $_SESSION['exists']   = "Something went wrong while saving your information. Please try again.";
                            header("Location: admin_profile.php");
                    }
                }
                else {
                    $_SESSION['exists']   = "There was an error uploading your file.";
                    header("Location: admin_profile.php");
                }
         }
    }
?>