<!DOCTYPE html>
<head>
    <title>Manage School Year | MNHS Enrollment System</title>
    <link rel="stylesheet" href="CSS-Admin/enrolled_registered_student.css">
    <style>
      .btn-primary {
        margin-left: 5px;
      }
    </style>
</head>
<?php include 'sidebar.php'; ?>

<div class="content">
  <div class="container-fluid p-3">
      <div class="row justify-content-center">
        
          <div class="col-md-7 confirm_student_enrollment">
                <h3 class="p-3 bg-primary"><i class="bi bi-check-circle"></i> Confirm student enrollment</h3>
              <?php
                if(isset($_GET['confirm_id'])) {
                $id =  $_GET['confirm_id'];
                }
                $query ="SELECT * FROM registered_students WHERE stud_Id ='$id' ";
                $sql = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($sql)) {
                $level = $row['year_level_to_enroll']; 
              ?>
              <img src="../images-students/<?php echo $row['image'];?>">
          </div>
          <div class="col-md-7 p-4 profile">
            <form action="process_save.php" method="POST" enctype="multipart/form-data">
               <!-------sAVING ID OF THE STUDENT------->                       
               <input class="form-control" type="hidden" name="student_id"  value="<?php echo $row['stud_Id']; ?>" > 
               <label for="studentname"><b>Name</b></label>
               <input class="form-control" type="text"   name="studentname" value="<?php echo $row['student_firstname'];?> <?php echo $row['student_middlename'];?> <?php echo $row['student_lastname'];?> <?php echo $row['student_extname'];?>"  readonly>
               <label for="level"><b>Year level</b></label>
               <input class="form-control" type="text" name="level" value="<?php echo $row['year_level_to_enroll']; ?>" readonly>
               <?php } ?>
             <div class="row">
                <div class="col-sm-5 col-md-5 info">
                    <label for="level_section"><b>Enroll to:</b></label>
                    <select class="form-control form-select" name="level_section" id="" onchange="FetchAdviser(this.value)"  required>
                        <option value="">Select Section</option>
                        <?php
                            $query = "SELECT * FROM level_section WHERE level ='$level' Order by level";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $row['lev_sec_Id']; ?>" > <?php echo $row['level']; ?> <?php echo $row['section']; ?>  </option>;
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-7 col-md-7info">
                    <label for="adviser"><b>Adviser</b></label>
                    <select name="adviser" id="adviser" class="form-control form-select" required>
                        <option value="">Select a section first</option>
                    </select>
                </div>
             </div>
                <?php
                    $query ="SELECT * FROM school_year WHERE status='Active' ";
                    $sql = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($sql)) {    
                ?>
                <label for="schoolyear"><b>Academic School Year</b></label>
                <select class="form-control form-select" name="schoolyear"  required >
                    <option value="" disabled> --Select School Year-- </option>
                    <option value="<?php echo $row['year_Id']; ?>" selected>   <?php echo $row['schoolyear']; ?>   </option>;
                </select>
                <?php } ?>
                <hr>
                <button type="submit" class="btn btn-primary" name="enroll"><i class="bi bi-check-circle"></i> Enroll</button>
                <a href="registered_students.php" class="btn btn-danger"><i class="bi bi-arrow-left-square"></i>  Cancel</a>
                </form>
          </div>
      </div>
  </div>
</div>

</body>
</html>


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

