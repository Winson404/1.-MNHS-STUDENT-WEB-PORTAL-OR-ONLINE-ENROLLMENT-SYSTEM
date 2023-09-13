<!DOCTYPE html>
<head>
    <title>Manage School Year | MNHS Enrollment System</title>
    <link rel="stylesheet" href="CSS-Admin/enrolled_registered_student.css">
    <style>
      .content .container-fluid .row .profile #udpate_enrollment {
        margin-left: 5px;
      }
    </style>
</head>
<?php include 'sidebar.php'; ?>

<div class="content">
  <div class="container-fluid p-3">
      <div class="row justify-content-center">
        
          <div class="col-md-7 edit_student_enrollment">
                <h3 class="p-3 bg-success"><i class="bi bi-pencil-square"></i> Edit enrollment</h3>
              <?php
                  include("../config.php");
                  if(isset($_GET['edit_enrollment'])){
                    $id = $_GET['edit_enrollment'];
                  }
                  $query =mysqli_query($conn,"SELECT enrollment.*, level_section.*, faculty.*, registered_students.*  FROM enrollment, registered_students, level_section, faculty WHERE enrollment.student_id=registered_students.stud_Id AND enrollment.level_section_id=level_section.lev_sec_Id AND enrollment.faculty_id=faculty.fac_Id AND enrollment_id='$id' ");
                  while($row = mysqli_fetch_array($query)) {
                  $year_level_to_enroll = $row['year_level_to_enroll'];
                  $level_id = $row['level_section_id']; 
              ?>
              <img src="../images-students/<?php echo $row['image'];?>">
          </div>
          <div class="col-md-7 p-4 profile">
            <form action="process_update.php" method="POST" enctype="multipart/form-data">
               <input class="form-control" type="hidden" name="enrollment_id"  value="<?php echo $row['enrollment_id']; ?>" > 
               <!-------sAVING ID OF THE STUDENT------->                       
               <input class="form-control" type="hidden" name="student_id"  value="<?php echo $row['stud_Id']; ?>" > 
               <label for="studentname">Name</label>
               <input class="form-control" type="text"   name="studentname" value="<?php echo $row['student_firstname'];?> <?php echo $row['student_middlename'];?> <?php echo $row['student_lastname'];?> <?php echo $row['student_extname'];?>"  readonly>
               <label for="level">Year level</label>
               <input class="form-control" type="text" name="level" value="<?php echo $row['year_level_to_enroll']; ?>" readonly>
               <?php } ?>
             <div class="row">
                <div class="col-sm-5 col-md-5 info">
                    <?php
                          $level  = mysqli_query($conn, "SELECT enrollment.level_section_id, level_section.* FROM level_section LEFT OUTER JOIN enrollment ON level_section.lev_sec_Id=enrollment.level_section_id WHERE level='$year_level_to_enroll' ");

                          $all_level = mysqli_query($conn, "SELECT * FROM level_section  where lev_sec_Id = '$level_id' ");
                          $row = mysqli_fetch_array($all_level);
                    ?>
                      <label for="level_section">Enroll to:</label>
                      <select class="form-control form-select" name="level_section_id" id="" onchange="FetchAdviser(this.value)"  required>
                      <option value="" selected="">Select Section</option>
                    <?php foreach($level as $rows):?>
                          <option value="<?php echo $rows['lev_sec_Id']; ?>"
                              <?php if( $row['lev_sec_Id'] == $rows['level_section_id'] )  echo 'selected="selected"'; ?>  >
                              <!-- <?php if( $row['lev_sec_Id'] == $rows['level_section_id'] )  echo 'selected="selected"'; ?>  > -->
                              <?php echo $rows['level']; ?> - <?php echo $rows['section']; ?>   
                          </option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="col-sm-7 col-md-7info">
                    <label for="adviser">Adviser</label>
                    <select name="faculty_id" id="adviser" class="form-control form-select" required>
                        <option value="">Select Adviser</option>
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
                <button type="submit" class="btn btn-success" name="edit_enrollment" id="udpate_enrollment"><i class="bi bi-pencil-square"></i> Update</button>
                <a href="enrolled_students.php" class="btn btn-danger"><i class="bi bi-arrow-left-square"></i> Cancel</a>
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

