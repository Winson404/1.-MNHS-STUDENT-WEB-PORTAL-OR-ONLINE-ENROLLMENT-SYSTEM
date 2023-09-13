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
        elseif (empty($student_type) || empty($firstname) || empty($middlename) || empty($lastname) || empty($gender) || empty($dob) || empty($age) || empty($contact) || empty($email) || empty($address) || empty($father) || empty($mother) || empty($parentscontact) || empty($lastgradelevel) || empty($lastschoolyear) || empty($schoolname) || empty($level_to_enroll) || empty($school_to_enroll) || empty($school_add_to_enroll))  {
        $_SESSION['danger']  = "You have missed required fields. Please fill in all required fields!";
        echo '<script type="text/javascript">'
          . '$( document ).ready(function() {'
          . '$("#register_student").modal("show");'
          . '});'
          . '</script>';  
        } else {
            $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
            if(mysqli_num_rows($query)>0) {
                $_SESSION['danger']  = "Email is already taken.";
                echo '<script type="text/javascript">'
                  . '$( document ).ready(function() {'
                  . '$("#register_student").modal("show");'
                  . '});'
                  . '</script>';  
            } else {
                    // Check if image file is a actual image or fake image
                    $target_dir = "images-students/";
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

                                $sql = "INSERT INTO registered_students (stud_type, student_firstname,  student_middlename, student_lastname, student_extname, gender, date_of_birth, age, contact_num, email, address, zipcode, fathers_name, mothers_name, parents_contact, last_grade_level, last_school_year, last_school_name, 
                                year_level_to_enroll, school_to_enroll, schooladd_to_enroll, image, date_registered ) 
                                VALUES ('$student_type', '$firstname', '$middlename', '$lastname', '$extname', '$gender', '$dob', '$age', '$contact', '$email',
                                '$address', '$zipcode', '$father', '$mother', '$parentscontact', '$lastgradelevel', '$lastschoolyear', '$schoolname', '$level_to_enroll',
                                '$school_to_enroll', '$school_add_to_enroll', '$file', '$month. $date, $year') "; //'$datenow - $timenow'

                                        if(mysqli_query($conn, $sql)) {                                                                          
                                            echo ' <script>
                                                        if(window.history.replaceState) {
                                                            window.history.replaceState(null, null, window.location.href)
                                                        } 
                                                    </script> ';
                                             $_SESSION['success']  = "You have successfully registered <b>$firstname $middlename $lastname $extname</b>.";
                                             echo '<script type="text/javascript">'
                                              . '$( document ).ready(function() {'
                                              . '$("#register_student").modal("show");'
                                              . '});'
                                              . '</script>'; 
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
        elseif (empty($student_type) || empty($firstname) || empty($middlename) || empty($lastname) || empty($gender) || empty($dob) || empty($age) || empty($contact) || empty($email) || empty($address) || empty($father) || empty($mother) || empty($parentscontact) || empty($lastgradelevel) || empty($lastschoolyear) || empty($schoolname) || empty($level_to_enroll) || empty($school_to_enroll) || empty($school_add_to_enroll) || empty($semester) || empty($track))  {
        $_SESSION['danger']  = "You have missed required fields. Please fill in all required fields!";
        echo '<script type="text/javascript">'
          . '$( document ).ready(function() {'
          . '$("#register_student").modal("show");'
          . '});'
          . '</script>';
        } else {
            $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE email= '$email' ");
            if(mysqli_num_rows($query)>0) {
                $_SESSION['danger']  = "Email is already taken.";
                echo '<script type="text/javascript">'
                  . '$( document ).ready(function() {'
                  . '$("#register_student").modal("show");'
                  . '});'
                  . '</script>';
            } else {
                    // Check if image file is a actual image or fake image
                    $target_dir = "images-students/";
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

                                $sql = "INSERT INTO registered_students (stud_type, student_firstname,  student_middlename, student_lastname, student_extname, gender, date_of_birth, age, contact_num, email, address, zipcode, fathers_name, mothers_name,  parents_contact, last_grade_level, last_school_year, last_school_name,  year_level_to_enroll, school_to_enroll, schooladd_to_enroll, semester, track, strand, image,  date_registered ) 
                                VALUES ('$student_type', '$firstname', '$middlename', '$lastname', '$extname', '$gender', '$dob', '$age', '$contact', '$email', '$address', '$zipcode', '$father', '$mother', '$parentscontact', '$lastgradelevel', '$lastschoolyear', '$schoolname', '$level_to_enroll', '$school_to_enroll', '$school_add_to_enroll', '$semester', '$track', '$strand', '$file', '$month. $date, $year') ";

                                        if(mysqli_query($conn, $sql)) {                                 
                                            echo ' <script>
                                                        if(window.history.replaceState) {
                                                            window.history.replaceState(null, null, window.location.href)
                                                        } 
                                                    </script> ';
                                             $_SESSION['success']  = "You have successfully registered <b>$firstname $middlename $lastname $extname</b>.";
                                             echo '<script type="text/javascript">'
                                              . '$( document ).ready(function() {'
                                              . '$("#register_student").modal("show");'
                                              . '});'
                                              . '</script>'; 
                                        } else {
                                            $_SESSION['success'] = "Something went wrong while saving the information. Please try again.";
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
  ?>
<!----------------------------------------END SAVE SENIOR HIGH SCHOOL-------------------------------------------------> 


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admission Form | MNHS Web Portal</title>
    </head>
    <style>
        body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        overflow: auto;
        position: relative;
        overflow-x: auto;
        background-color: white;
        }

        .modal-body{
            padding: 20px 30px 10px 30px;
        }

        #add_modalheader h3{
         text-align: center;
        }
        /*---------------ADD MODAL-----------------*/
        #add_modalheader{
        background-color: #00cc44;
        }
         /*---------------ADD, UPDATE, DELETE LABEL---------------*/
        #add_modallabel{
        color: white;
        }

        .hidden{
        display: block;
        }
        .show{
        display: block;
        }

        .alert {
        margin: auto;
        margin-bottom: 15px;
        width: 100%;
        font-size: 15px;
        text-align: center;
        color: white;
        border-radius: 4px;
        }
        /*------------------SESSION BACKGROUND COLORS----------------*/
        #success{
            background-color: #00b300;
        }
         #danger{
            background-color: #ff0e0e;
        }
        #exists{
            background-color:  red;
        }
        /*--------END LOGIN MODAL STYLE---------*/
    </style>
    <body>
       
<!-----------------------------------------------------------ADMISSION FORM----------------------------------------------------------------->
    <div class="container">
        <div class="row">

        <!-- Modal -->
        <div class="modal fade" id="register_student" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" id="modal">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header" id="add_modalheader">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" id="add_modallabel">Admission Form</h3>
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
        <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-12">
                <select class="form-control option" name="option" id="option" required="">
                <option value="" selected disabled>Select High School Type</option>
                <option value="JHS">Junior High School</option>
                <option value="SHS">Senior High School</option>
                </select>
            </div>
        </div>
        <hr>

        <div class="" id="junior"> 
        <form action="" method="POST" enctype="multipart/form-data">

                <div class="row" id="junior_type_option">
                    <div class="form-group col-md-6">
                        <label>Student type1</label>
                        <select class="form-control stud_type" name="student_type" required>
                            <option value="" selected="" disabled>Select Student Type</option>
                            <option value ="New">New</option>
                            <option value ="Regular">Regular</option>
                            <option value ="Returnee">Returnee</option>
                            <option value ="Transferee">Transferee</option>
                        </select>
                    </div>
                </div>
                <!-- FOR SENIOR HIGH SCHOOL STUDENT_TYPE -->
                <div class="row hidden" id="senior_type_option">
                    <div class="form-group col-md-6">
                        <label>Student type2</label>
                        <select class="form-control senior_type" name="student_type" required>
                            <option value="" selected="" disabled>Select Student Type</option>
                            <option value ="Regular">Regular</option>
                            <option value ="Returnee">Returnee</option>
                            <option value ="Transferee">Transferee</option>
                        </select>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <h3><b>Student information</b></h3>
                        <br>
                    </div>

                    <div class="form-group col-md-6">                                      
                        <label>First name</label>
                        <input type="text" class="form-control" name="firstname"  placeholder="First name"  autocomplete="off" required>
                    </div>                                   
                    <div class="form-group col-md-6">                                        
                        <label>Middle name</label>
                        <input type="text" class="form-control" name="middlename" placeholder="Middle name" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="lastname"   placeholder="Last name"   autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Ext. name(Jr./Sr.)</label>
                        <input type="text" class="form-control" name="extname"    placeholder="Jr./Sr."   autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Gender</label>
                        <select class="form-control" name="gender" required>
                        <option value="" selected="" disabled>Choose your gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>         
                </div>
                <div class="row">
                    <div class="form-group col-md-3">                 
                        <label>Date of Birth</label>
                        <input type="Date" class="form-control"  name="dob"  autocomplete="off" id="txtbirthdate" onchange="getAgeVal(0)" onblur="getAgeVal(0);" required>
                    </div>
                    <div class="form-group col-md-2">                               
                        <label>Age</label>
                        <input type="text" class="form-control"  name="age"  placeholder="Age" autocomplete="off" id="txtage" required  readonly style="background-color: white;">
                        <span id="agestatus" style="color: red; display: none;"><b>Age must be at least 12yrs old and above.</b></span>
                    </div>  
                    <div class="form-group col-md-3">
                        <label>Contact number</label>
                        <input type="number" class="form-control"  name="contact" placeholder="9123456789" pattern="[7-9]{1}[0-9]{9}" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email"   placeholder="sample@gmail.com" autocomplete="off" required>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3><b>Address</b></h3>
                        <br>
                    </div>
                    <div class="form-group col-md-10">
                        <label>House number/Barangay/Municipality/Province</label>
                        <input type="text" class="form-control" name="address"  placeholder="Home Address" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Zipcode</label>
                        <input type="number" class="form-control" name="zipcode"  placeholder="Zipcode" autocomplete="off" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3><b>Parent's information</b></h3>
                        <br>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name/ First name Middle name</label>
                        <input type="text" class="form-control" name="father"         placeholder="Father's name..."  autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name/ First name/ Middle name</label>
                        <input type="text" class="form-control" name="mother"         placeholder="Mother's name..."  autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Contact number</label>
                        <input type="number" class="form-control" name="parentscontact" placeholder="9123456789" pattern="[7-9]{1}[0-9]{9}" autocomplete="off" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3><b>For Returning Learners <br>(Balik-Aral and Those Who Shall Transfer/ Move In)</b></h3>
                        <br>
                    </div>
                    <div class="form-group col-md-6" id="junior_year_level">
                        <label>Last grade level completed1</label>
                        <select class="form-control" name="lastgradelevel" required>
                            <option value="" selected="" disabled="">Select Year Level</option>
                            <option value="Grade 6"  class="hidden" id="last_Grade_6">Grade 6</option>
                            <option value="Grade 7"  class="hidden" id="last_Grade_7">Grade 7</option>
                            <option value="Grade 8"  class="hidden" id="last_Grade_8">Grade 8</option>
                            <option value="Grade 9"  class="hidden" id="last_Grade_9">Grade 9</option>
                        </select>
                    </div>
                    <!-- FOR SENIOR HIGH SCHOOL -->
                    <div class="form-group col-md-6 hidden" id="senior_year_level">
                        <label>Last grade level completed2</label>
                        <select class="form-control" name="level_to_enroll" required>
                            <option value="" selected="" disabled="">Select Year Level</option>
                            <option value="Grade 10" class="hidden" id="senior_last_Grade_10">Grade 10</option> 
                            <option value="Grade 11" class="hidden" id="senior_last_Grade_11">Grade 11</option>                   
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last school year completed</label>
                        <input type="text" class="form-control" name="lastschoolyear" placeholder="Last School Year Completed..." autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>School name</label>
                        <input type="text" class="form-control" name="schoolname"     placeholder="School Name..." autocomplete="off" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3><b>School Information To Enroll</b></h3>
                        <br>
                    </div>
                    <div class="form-group col-md-6" id="enroll_junior_year_level">
                        <label>Year level1</label>
                        <select class="form-control" name="level_to_enroll" required>
                            <option value="" selected="" disabled="">Select Year Level</option>
                            <option value="Grade 6"  class="hidden" id="enroll_Grade_6">Grade 6</option>
                            <option value="Grade 7"  class="hidden" id="enroll_Grade_7">Grade 7</option>
                            <option value="Grade 8"  class="hidden" id="enroll_Grade_8">Grade 8</option>
                            <option value="Grade 9"  class="hidden" id="enroll_Grade_9">Grade 9</option>
                            <option value="Grade 10" class="hidden" id="enroll_Grade_10">Grade 10</option>  
                        </select>
                    </div>
                    <!-- FOR SENIOR HIGH SCHOOL -->
                    <div class="form-group col-md-6 hidden" id="enroll_senior_year_level">
                        <label>Year level2</label>
                        <select class="form-control" name="level_to_enroll" required>
                            <option value="" selected="" disabled="">Select Year Level</option> 
                            <option value="Grade 11" class="hidden" id="enroll_senior_Grade_11">Grade 11</option>
                            <option value="Grade 12" class="hidden" id="enroll_senior_Grade_12">Grade 12</option> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Name of School</label>
                       <?php  if(isset($_GET[''])) { ?>
                        <input type="text" class="form-control" name="school_to_enroll" value="Medellin National High School"  autocomplete="off" readonly>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="school_to_enroll" value="Medellin National High School"  autocomplete="off" readonly>
                   <?php } ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>School Address</label>
                        <input type="text" class="form-control" name="school_add_to_enroll" value="Poblacion, Medellin, Cebu" autocomplete="off" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Upload image (Image must be 2MB in size or lower)</label>
                        <input type="file" class="form-control" name="fileToUpload" required>
                    </div>
                </div>

<!---------------------SENIOR HIGH SCHOOL ADMISSION FORM---------------------------------------------->
                 <div class="hidden" id="senior">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><b>For Learners in Senior High School</b></h3>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Semester</label>
                                <select class="form-control" name="semester"   >
                                <option value="" selected="" disabled>Select semester</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Academic Track</label>
                                <input type="text" class="form-control" name="track"  placeholder="Track..." autocomplete="off" >
                            </div>
                            <div class="form-group col-sm-12 col-md-6" >
                                <label>Academic Strand (If any)</label>
                                <input type="text" class="form-control" name="strand" placeholder="Academic Strand ..." autocomplete="off">
                            </div>
                           
                        </div>
                    </div>    
<!---------------------END SENIOR HIGH SCHOOL ADMISSION FORM------------------------------------------>

                <div class="modal-footer " id="btn-junior">
                    <button type="submit" class="btn btn-primary" name="save_junior">   <i class="fa fa-save" aria-hidden="true"></i> Save1</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Close</button>
                </div>

                <div class="modal-footer hidden" id="btn-senior">
                    <button type="submit" class="btn btn-primary" name="save_senior">   <i class="fa fa-save" aria-hidden="true"></i> Save2</button>              
                    <button type="button" class="btn btn-danger"  data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Close</button>
                </div>               
            </form>
            </div>
                 
        </div> <!-- END MODAL BODY -->
        </div> <!-- END MODAL CONTENT -->
        </div>
        </div>
        </div>
        </div> <!-- END MODAL CONTAINER -->
<!-----------------------------------------------------------END ADMISSION FORM------------------------------------------------------------->

<script>
    $('.option').change(function(){
    var responseID = $(this).val();
    if(responseID =="JHS") {
            $('#junior').removeClass("hidden");
            $('#junior').addClass("show");
            $('#senior').removeClass("show");
            $('#senior').addClass("hidden");

            $('#btn-senior').removeClass("show");
            $('#btn-senior').addClass("hidden");
            $('#btn-junior').removeClass("hidden");
            $('#btn-junior').addClass("show");

            $('#senior_type_option').removeClass("show");
            $('#senior_type_option').addClass("hidden");
            
            $('#junior_type_option').removeClass("hidden");
            $('#junior_type_option').addClass("show");

            $('#junior_year_level').removeClass("hidden");
            $('#junior_year_level').addClass("show");

            $('#senior_year_level').removeClass("show");
            $('#senior_year_level').addClass("hidden");
            
            $('#enroll_junior_year_level').removeClass("hidden");
            $('#enroll_junior_year_level').addClass("show");

            $('#enroll_senior_year_level').removeClass("show");
            $('#enroll_senior_year_level').addClass("hidden");
    } else if(responseID =="SHS") {
            $('#senior').removeClass("hidden");
            $('#senior').addClass("show");
            $('#junior').removeClass("hidden");
            $('#junior').addClass("show");

            $('#btn-senior').removeClass("hidden");
            $('#btn-senior').addClass("show");
            $('#btn-junior').removeClass("show");
            $('#btn-junior').addClass("hidden");

            $('#senior_type_option').removeClass("hidden");
            $('#senior_type_option').addClass("show");

            $('#junior_type_option').removeClass("show");
            $('#junior_type_option').addClass("hidden");

            $('#junior_year_level').removeClass("show");
            $('#junior_year_level').addClass("hidden");

            $('#senior_year_level').removeClass("hidden");
            $('#senior_year_level').addClass("show");

            $('#enroll_junior_year_level').removeClass("show");
            $('#enroll_junior_year_level').addClass("hidden");
            
            $('#enroll_senior_year_level').removeClass("hidden");
            $('#enroll_senior_year_level').addClass("show");

    } else {
            $('#junior').removeClass("hidden");
            $('#junior').addClass("show");
            $('#senior').removeClass("show");
            $('#senior').addClass("hidden");

            $('#btn-senior').removeClass("show");
            $('#btn-senior').addClass("hidden");
            $('#btn-junior').removeClass("hidden");
            $('#btn-junior').addClass("show");

            $('#senior_type_option').removeClass("show");
            $('#senior_type_option').addClass("hidden");
            
            $('#junior_type_option').removeClass("hidden");
            $('#junior_type_option').addClass("show");

            $('#junior_year_level').removeClass("hidden");
            $('#junior_year_level').addClass("show");

            $('#senior_year_level').removeClass("show");
            $('#senior_year_level').addClass("hidden");
            
            $('#enroll_junior_year_level').removeClass("hidden");
            $('#enroll_junior_year_level').addClass("show");

            $('#enroll_senior_year_level').removeClass("show");
            $('#enroll_senior_year_level').addClass("hidden");
    } 
            //console.log(responseID);
            });
</script>

<!-- FOR JUNIOR HIGH SCHOOL -->
<script>
    $('.stud_type').change(function(){
    var stud_type = $(this).val();
    if(stud_type =="New") {
            $('#last_Grade_6').removeClass("hidden");
            $('#last_Grade_6').addClass("show"); 

            $('#last_Grade_7').removeClass("show");
            $('#last_Grade_7').addClass("hidden");
            $('#enroll_Grade_7').removeClass("hidden");
            $('#enroll_Grade_7').addClass("show");

            $('#last_Grade_8').removeClass("show");
            $('#last_Grade_8').addClass("hidden");
            $('#enroll_Grade_8').removeClass("show");
            $('#enroll_Grade_8').addClass("hidden");

            $('#last_Grade_9').removeClass("show");
            $('#last_Grade_9').addClass("hidden");
            $('#enroll_Grade_9').removeClass("show");
            $('#enroll_Grade_9').addClass("hidden");

            $('#last_Grade_10').removeClass("show");
            $('#last_Grade_10').addClass("hidden"); 
            $('#enroll_Grade_10').removeClass("show");
            $('#enroll_Grade_10').addClass("hidden");

            // $('#last_Grade_11').removeClass("show");
            // $('#last_Grade_11').addClass("hidden");
            // $('#enroll_Grade_11').removeClass("show");
            // $('#enroll_Grade_11').addClass("hidden"); 
    } else if(stud_type =="Transferee" || stud_type =="Returnee") {
            $('#last_Grade_6').removeClass("hidden");
            $('#last_Grade_6').addClass("show");

            $('#last_Grade_7').removeClass("hidden");
            $('#last_Grade_7').addClass("show");
            $('#enroll_Grade_7').removeClass("hidden");
            $('#enroll_Grade_7').addClass("show");

            $('#last_Grade_8').removeClass("hidden");
            $('#last_Grade_8').addClass("show");
            $('#enroll_Grade_8').removeClass("hidden");
            $('#enroll_Grade_8').addClass("show");

            $('#last_Grade_9').removeClass("hidden");
            $('#last_Grade_9').addClass("show");
            $('#enroll_Grade_9').removeClass("hidden");
            $('#enroll_Grade_9').addClass("show");

            $('#last_Grade_10').removeClass("hidden");
            $('#last_Grade_10').addClass("show");
            $('#enroll_Grade_10').removeClass("hidden");
            $('#enroll_Grade_10').addClass("show");

            // $('#last_Grade_11').removeClass("hidden");
            // $('#last_Grade_11').addClass("show");
            // $('#enroll_Grade_11').removeClass("hidden");
            // $('#enroll_Grade_11').addClass("show");

            // $('#last_Grade_12').removeClass("show");
            // $('#last_Grade_12').addClass("hidden"); 
            // $('#enroll_Grade_12').removeClass("hidden");
            // $('#enroll_Grade_12').addClass("show"); 
    } else if(stud_type =="Regular"){
            $('#last_Grade_6').removeClass("show");
            $('#last_Grade_6').addClass("hidden");
            $('#enroll_Grade_6').removeClass("show");
            $('#enroll_Grade_6').addClass("hidden");

            $('#last_Grade_7').removeClass("hidden");
            $('#last_Grade_7').addClass("show");
            $('#enroll_Grade_7').removeClass("show");
            $('#enroll_Grade_7').addClass("hidden");

            $('#last_Grade_8').removeClass("hidden");
            $('#last_Grade_8').addClass("show");
            $('#enroll_Grade_8').removeClass("hidden");
            $('#enroll_Grade_8').addClass("show");

            $('#last_Grade_9').removeClass("hidden");
            $('#last_Grade_9').addClass("show");
            $('#enroll_Grade_9').removeClass("hidden");
            $('#enroll_Grade_9').addClass("show");

            $('#last_Grade_10').removeClass("hidden");
            $('#last_Grade_10').addClass("show");
            $('#enroll_Grade_10').removeClass("hidden");
            $('#enroll_Grade_10').addClass("show");

            // $('#last_Grade_11').removeClass("hidden");
            // $('#last_Grade_11').addClass("show");
            // $('#enroll_Grade_11').removeClass("hidden");
            // $('#enroll_Grade_11').addClass("show");

            // $('#last_Grade_12').removeClass("show");
            // $('#last_Grade_12').addClass("hidden"); 
            // $('#enroll_Grade_12').removeClass("hidden");
            // $('#enroll_Grade_12').addClass("show"); 
    } else {
            $('#last_Grade_6').removeClass("hidden");
            $('#last_Grade_6').addClass("hidden");
            $('#enroll_Grade_6').removeClass("hidden");
            $('#enroll_Grade_6').addClass("hidden");

            $('#last_Grade_7').removeClass("hidden");
            $('#last_Grade_7').addClass("hidden");
            $('#enroll_Grade_7').removeClass("hidden");
            $('#enroll_Grade_7').addClass("hidden");

            $('#last_Grade_8').removeClass("hidden");
            $('#last_Grade_8').addClass("hidden");
            $('#enroll_Grade_8').removeClass("hidden");
            $('#enroll_Grade_8').addClass("hidden");

            $('#last_Grade_9').removeClass("hidden");
            $('#last_Grade_9').addClass("hidden");
            $('#enroll_Grade_9').removeClass("hidden");
            $('#enroll_Grade_9').addClass("hidden");

            $('#last_Grade_10').removeClass("hidden");
            $('#last_Grade_10').addClass("hidden");
            $('#enroll_Grade_10').removeClass("hidden");
            $('#enroll_Grade_10').addClass("hidden");

            // $('#last_Grade_11').removeClass("hidden");
            // $('#last_Grade_11').addClass("hidden");
            // $('#enroll_Grade_11').removeClass("hidden");
            // $('#enroll_Grade_11').addClass("hidden");

            // $('#last_Grade_12').removeClass("hidden");
            // $('#last_Grade_12').addClass("hidden"); 
            // $('#enroll_Grade_12').removeClass("hidden");
            // $('#enroll_Grade_12').addClass("hidden");
    }
            //console.log(responseID);
            });
</script>


<!-- FOR SENIOR HIGH SCHOOL -->
<script>
    $('.senior_type').change(function(){
    var senior_type = $(this).val();
    if(senior_type =="Regular" || senior_type =="Returnee") {

            $('#senior_last_Grade_10').removeClass("hidden");
            $('#senior_last_Grade_10').addClass("show"); 

            $('#senior_last_Grade_11').removeClass("hidden");
            $('#senior_last_Grade_11').addClass("show"); 
            $('#enroll_senior_Grade_11').removeClass("hidden");
            $('#enroll_senior_Grade_11').addClass("show");

            
            $('#enroll_senior_Grade_12').removeClass("hidden");
            $('#enroll_senior_Grade_12').addClass("show"); 

    } else if(senior_type =="Transferee" ) {
           
            $('#senior_last_Grade_10').removeClass("hidden");
            $('#senior_last_Grade_10').addClass("show"); 

            $('#senior_last_Grade_11').removeClass("hidden");
            $('#senior_last_Grade_11').addClass("show"); 
            $('#enroll_senior_Grade_11').removeClass("hidden");
            $('#enroll_senior_Grade_11').addClass("show");

            
            $('#enroll_senior_Grade_12').removeClass("hidden");
            $('#enroll_senior_Grade_12').addClass("show");

    } else {
           
            $('#senior_last_Grade_10').removeClass("hidden");
            $('#senior_last_Grade_10').addClass("show"); 

            $('#senior_last_Grade_11').removeClass("hidden");
            $('#senior_last_Grade_11').addClass("show"); 
            $('#enroll_senior_Grade_11').removeClass("hidden");
            $('#enroll_senior_Grade_11').addClass("show");

            
            $('#enroll_senior_Grade_12').removeClass("hidden");
            $('#enroll_senior_Grade_12').addClass("show"); 
    }
            //console.log(responseID);
            });
</script>

            



<!-- GETTING AUTOMATICALLY AGE VALUE FROM SETTING BIRTHDATE -->
<script type="text/javascript">
    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
    }
// JUNIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->
    function getAge(dateString){
        var birthdate = new Date().getTime();
        if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
        // variable is undefined or null value
        birthdate = new Date().getTime();
        }
        birthdate = new Date(dateString).getTime();
        var now = new Date().getTime();
        // now find the difference between now and the birthdate
        var n = (now - birthdate)/1000;
        if (n < 378683112) { // less than 12 years(378683112 seconds)
            var day_n = Math.floor(n/86400);
            if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
            // variable is undefined or null
            return '';
            } else {   
                 return '';  
                 //return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';   
            }
        } else {
            var year_n = Math.floor(n/31556926);
            if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
            return year_n = '';
            } else {
                return year_n + (year_n > 1 ? '' : '') ;
                //return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
            }
        }
    }

    function getAgeVal(pid) {
        var birthdate = formatDate(document.getElementById("txtbirthdate").value);
        var count = document.getElementById("txtbirthdate").value.length;
        if (count=='10') {
                var age = getAge(birthdate);
                var str = age;
                var res = str.substring(0, 1);
                if (res =='-' || res =='0') {
                    document.getElementById("txtbirthdate").value = "";
                    document.getElementById("txtage").value = "";
                    $('#txtbirthdate').focus();
                    return false;
                } else {
                        document.getElementById("txtage").value = age;
                        // DISPLAYING AUTOMATICALLY THE ERROR MESSAGE IF AGE IS LESS THAN 12 YEARS OLD
                        if(document.getElementById("txtage").value == "") {
                            document.getElementById("agestatus").style.display = "block";
                            return false;
                        } else {
                            document.getElementById("agestatus").style.display = "none";
                            return true;
                        }
                }
        } else {
            document.getElementById("txtage").value = "";
            return false;
        }
    }

// END JUNIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->

// SENIOR HIGH GETTING AGE VALUE--------------------------------------------------------------------->
// -------------------------------------------------------------------------------------------------->
    function seniorgetAgeVal(pid) {
        var birthdate = formatDate(document.getElementById("seniorbirthdate").value);
        var count = document.getElementById("seniorbirthdate").value.length;
        if (count=='10') {
                var age = getAge(birthdate);
                var str = age;
                var res = str.substring(0, 1);
                if (res =='-' || res =='0') {
                document.getElementById("seniorbirthdate").value = "";
                document.getElementById("seniorage").value = "";
                $('#seniorbirthdate').focus();
                return false;
                } else {
                        document.getElementById("seniortxtage").value = age;
                        // DISPLAYING AUTOMATICALLY THE ERROR MESSAGE IF AGE IS LESS THAN 12 YEARS OLD
                        if(document.getElementById("seniortxtage").value == "") {
                            document.getElementById("senioragestatus").style.display = "block";
                            return false;
                        } else {
                            document.getElementById("senioragestatus").style.display = "none";
                            return true;
                        }
                }
        } else {
            document.getElementById("seniorage").value = "";
            return false;
        }
    }
// END SENIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->
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







