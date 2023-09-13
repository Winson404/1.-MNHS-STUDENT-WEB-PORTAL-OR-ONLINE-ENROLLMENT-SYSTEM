<!DOCTYPE html>
<?php 
    include 'config.php';
    if(isset($_GET['edit_info'])) {
    $id = $_GET['edit_info'];

    }
      $query ="SELECT * FROM faculty WHERE fac_Id ='$id' ";
      $sql = mysqli_query($conn,$query);
      while($row = mysqli_fetch_array($sql)) {
?>
<head>
    <title><?php  echo ' '.$row['firstname'].' '.$row['lastname'].' ' ?>| MNHS Web Portal</title> <?php } ?>
    <link rel="stylesheet" href="CSS-Admin/admin_profile.css">
</head>
<?php include 'sidebar.php'; ?>

<div class="content">
  <div class="container-fluid bg-dark">
    <!-- FETCHING ADMIN INFORMATION -->
    <?php 
        include 'config.php';
        if(isset($_GET['edit_info'])) {
        $id = $_GET['edit_info'];
        }
          $query ="SELECT * FROM faculty WHERE fac_Id ='$id' ";
          $sql = mysqli_query($conn,$query);
          while($row = mysqli_fetch_array($sql)) {
    ?>
    <div class="row p-4">
        <h3 class="bg-light p-2"><i class="bi bi-person-circle"></i> <b>Administrator</b></h3>
        <div class="col-md-3 bg-secondary p-4 profile">
            <div align="center">
                <img src="../images-faculty/<?php echo $row['image'];?>" alt="image">
                    <button  type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#photo_update<?php echo $row['fac_Id']?>"><i class="bi bi-camera-fill"></i>
                    </button>
                <h5 class="form-control" align="left"><i class="bi bi-person-fill"></i> <b><?php echo $row['username']; ?></b></h5>
            </div>
                <div align="left">
                <h5 class="form-control"><i class="bi bi-telephone-plus-fill"></i> 0<?php echo $row['contact']; ?></h5>
                <h5 class="form-control" id="email"><i class="bi bi-envelope-fill"></i> <?php echo $row['email']; ?></h5>
            </div>
        </div>
        <div class="col-md-9 bg-light p-4">
            <form action="admin_edit_info_code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <h4><b>General information</b></h4>
                    </div>                        
                </div>
                <div class="row">
                    <input type="hidden" name="faculty_id" class="form-control" placeholder="First name" value="<?php echo $row['fac_Id']?>">
                    <div class="col-md-6">
                        <label>First name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First name"  value="<?php echo $row['firstname']?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                        <label>Middle name</label>
                        <input type="text" name="middlename" class="form-control" placeholder="Middle name" value="<?php echo $row['middlename']?>" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Last name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last name" value="<?php echo $row['lastname']?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                         <?php                           
                            $gender  = mysqli_query($conn, "SELECT DISTINCT gender FROM faculty");

                            $id = $row['fac_Id'];

                          $all_gender = mysqli_query($conn, "SELECT * FROM faculty  where fac_Id = '$id' ");
                          $row = mysqli_fetch_array($all_gender);
                         ?>
                            <label>Gender</label>
                             <select class="form-control form-select" name="gender" id="gender" required="">
                              <?php foreach($gender as $rows):?>
                                    <option value="<?php echo $rows['gender']; ?>"  
                                        <?php if($row['gender'] == $rows['gender']) echo 'selected="selected"'; ?> 
                                         > <!--/////   CLOSING OPTION TAG  -->
                                        <?php echo $rows['gender']; ?>                                           
                                    </option>

                             <?php endforeach;?>
                           </select>
                    </div>
                </div>
                <div class="row">
                <?php 
                    //CONVERTING DATE FORMAT TO STRING
                    $timestamp = $row['date_of_birth'];
                ?> 
                    <div class="col-md-4">
                        <label>Date of Birth</label>
                        <input type="Date" class="form-control"  name="dob" value="<?php echo $row['date_of_birth']?>" autocomplete="off" id="txtbirthdate" onchange="getAgeVal(0)" onblur="getAgeVal(0);" required>
                    </div>
                    <div class="col-md-2">
                        <label>Age</label>
                        <input type="text" class="form-control"  name="age" value="<?php echo $row['age']?>" placeholder="Age" autocomplete="off" id="txtage" required  readonly>
                        <span id="agestatus"><b>Age is to young to be a faculty.</b></span>
                    </div>
                    <div class="col-md-6">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $row['address']?>" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">                       
                    <div class="col-md-6">
                        <label>Contact number</label>
                        <input type="text" name="contact" class="form-control" placeholder="Contact number" pattern="[7-9]{1}[0-9]{9}" value="<?php echo $row['contact']?>" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="sample@gmail.com"  value="<?php echo $row['email']?>" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">                                           
                    <div class="col-md-6">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username']?>" autocomplete="off" required>
                    </div>
                    <?php
                        $id = $row['fac_Id'];
                        $advisory = mysqli_query($conn, "SELECT faculty.*, level_section.level, level_section.section FROM faculty, level_section WHERE faculty.level_section_id=level_section.lev_sec_Id AND fac_Id='$id' ");
                        $row = mysqli_fetch_array($advisory);
                    ?>
                    <div class="col-md-6">
                        <?php                           
                            $unused_advisory  = mysqli_query($conn, "SELECT faculty.level_section_id, level_section.* FROM level_section LEFT OUTER JOIN faculty ON level_section.lev_sec_Id=faculty.level_section_id");

                           $id = $row['fac_Id'];

                          $all_faculty = mysqli_query($conn, "SELECT * FROM faculty  where fac_Id = '$id' ");
                          $row = mysqli_fetch_array($all_faculty);
                        ?>
                        <label>Advisory</label>
                         <select class="form-control form-select" name="advisory" id="advisory" required="">
                          <?php foreach($unused_advisory as $rows):?>
                                <option value="<?php echo $rows['lev_sec_Id']; ?>"  
                                    <?php if($row['level_section_id'] == $rows['lev_sec_Id']) echo 'selected="selected"'; ?> 
                                     > <!--/////   CLOSING OPTION TAG  -->
                                    <?php echo $rows['level']; ?> - <?php echo $rows['section']; ?>                                           
                                </option>

                         <?php endforeach;?>
                       </select>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-12" align="right">
                        <button type="submit" class="btn btn-success" name="updatefaculty"><i class="bi bi-pencil-square"></i> Save changes</button>
                        <a href="admin_profile.php?admin_id=<?php echo $row['fac_Id'];?>" class="btn btn-danger"><i class="bi bi-arrow-left-square"></i> Cancel</a>
                    </div>
            </form>        
                </div>              
        </div>
        <!-- END FETCHING ADMIN INFORMATION -->
        <?php 
                include 'admin_edit_photo.php';
            } 
        ?>     
    </div>
</div>


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
// GETTING AGE VALUE OF THE ADMIN----------------------------------------------------------------->
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
// END GETTING AGE VALUE OF THE ADMIN----------------------------------------------------------------->
</script>


</body>
</html>