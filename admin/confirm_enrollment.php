<!DOCTYPE html>
<head>
    <title>Confirm Enrollment | MNHS Web Portal</title>
    <!---ICON FOR WEBSITE--->
    <link rel="shortcut icon" type="image/png" href="../../images/MNHS LOGO.png">
</head>

<?php include 'top_side_bar.php'; ?>

<style>
    body{
      overflow: visible;
    }
    .container{
    margin-top: 80px;
    }

    .col-md-6 {
      box-shadow: 2px 2px 8px #b3b3b3;
      border-radius: 5px; 
      padding-bottom: 25px;
    }
    .col-md-12 img{
    margin: 15px 0 10px 0;
    box-shadow: 2px 2px 8px #b3b3b3; 
    border-radius: 50%; 
    height: 140px; 
    width: 140px; 
    display: block;
    margin-right: auto;
    margin-left: auto;
    border: 4px solid #3B5998;
    }

    .col-md-12 h3{
      padding: 20px;
      background-color:#3B5998;
      margin: -10px -30px;
      color: white;
    }

    .info{
      margin-bottom: 15px;
    }
    #stud_info input{
      background-color: white;
    }

    .button_container{
      margin: -10px 0;
    }

</style>


  <body>

    <div class="container">

        <div class="col-md-4"></div>
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="col-md-6">

                  <div class="col-md-12">
                    <h3><strong>Enroll student</strong></h3>
                    <br>
                  </div>


              <div class="wrapper">
<!--##########################################################################################################################-->
                  <div class="col-md-12">
                  <?php
                      include("../config.php");
                      if(isset($_GET['confirm_id'])) {
                      $id =  $_GET['confirm_id'];
                      }
                      $query ="SELECT * FROM registered_students WHERE stud_Id ='$id' ";
                      $sql = mysqli_query($conn,$query);
                      while($row = mysqli_fetch_array($sql)) {
                      $level = $row['year_level_to_enroll']; 
                  ?>
                  <img src="../images-students/<?php echo $row['image'];?>">
                  <br>
                  </div>
<!--##########################################################################################################################-->
                 <div class="col-sm-8 info" id="stud_info">
                        <!-------sAVING ID OF THE STUDENT------->                       
                        <input class="form-control" type="hidden" name="student_id"  value="<?php echo $row['stud_Id']; ?>" > 
                        <label for="studentname">Name</label>
                        <input class="form-control" type="text"   name="studentname" value="<?php echo $row['student_firstname'];?> <?php echo $row['student_middlename'];?> <?php echo $row['student_lastname'];?> <?php echo $row['student_extname'];?>"  readonly>
                 </div>

                 <div class="col-sm-4"  id="stud_info">
                     <label for="level">Year level</label>
                     <input class="form-control" type="text" name="level" value="<?php echo $row['year_level_to_enroll']; ?>" readonly>
                 </div>

                    <?php 
                        } 
                    ?>
             
<!--##########################################################################################################################-->
                    <div class="col-sm-5 info">
                          <label for="level_section">Enroll to:</label>
                          <select class="form-control" name="level_section" id="" onchange="FetchAdviser(this.value)"  required>
                              <option value="">Select Section</option>
                              <?php
                                  include_once '../config.php';
                                  $query = "SELECT * FROM level_section WHERE level ='$level' Order by level";
                                  $result = mysqli_query($conn, $query);
                                  while($row = mysqli_fetch_assoc($result)) {
                              ?>
                                  <option value="<?php echo $row['lev_sec_Id']; ?>" > <?php echo $row['level']; ?> <?php echo $row['section']; ?>  </option>;
                              <?php
                                  }
                              ?>
                          </select>
                    </div>
                    <div class="col-sm-7 info">
                            <label for="adviser">Adviser</label>
                            <select name="adviser" id="adviser" class="form-control" required>
                                <option value="">Select Adviser</option>
                            </select>
                    </div>
<!--##########################################################################################################################-->
                    <div class="col-sm-6 info">
                            <?php
                            include("../config.php");

                                $query ="SELECT * FROM school_year WHERE status='Active' ";
                                $sql = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_array($sql)) {    
                            ?>
                            <label for="schoolyear">Academic School Year</label>
                            <select class="form-control" name="schoolyear"  required >
                                <option value="" disabled> --Select School Year-- </option>
                                <option value="<?php echo $row['year_Id']; ?>" selected>   <?php echo $row['schoolyear']; ?>   </option>;
                            </select>
                            <?php 
                                } 
                            ?>     
                   </div>
                   
<!--##########################################################################################################################-->
                <div class="col-sm-12 button_container" align="right">
                  <hr>  
                    <button type="submit" class="btn btn-primary" name="enroll" id="btn_no-outline"><i class="fa fa-save" aria-hidden="true"></i> Enroll</button>
                    <a href="registered_students.php" class="btn btn-danger" id="btn_no-outline"><i class="fa fa-times" aria-hidden="true"></i>  Cancel</a>
                </div>
<!--##########################################################################################################################-->
            </div>

          </div>
       </form>
     
    </div>




    <script>
        function FetchAdviser(fac_Id){ //Id refers to the Id of the adviser
        $('#adviser').html('');
        $.ajax({
        type:'post',
        url: 'ajaxdata/ajaxdata.php',
        data : { level_section : fac_Id}, //Id refers to the Id of the adviser
        success : function(data){
        $('#adviser').html(data);
        }
        })
        }
    </script>

  </body>
</html>
