<!DOCTYPE html>
<head>
    <script src="previous_enrollment_fetch.js"></script>
    <title>Manage Faculty | MNHS Enrollment System</title>
    <style>
        .table-responsive .pdf-exel-conversion {
            position: relative;
        }
        .table-responsive .pdf-exel-conversion form .d-flex {
            position: absolute; 
            right: 0; 
            margin-top: -15px;
        }
        .table-responsive .pdf-exel-conversion form .d-flex #levelsection_filter{
            margin-right: 60px;
        }
        .table-responsive .pdf-exel-conversion form #same_level_section {
            left: 718px; 
            top: -42px; 
            position: absolute;
            width: 20%;
            margin-top: -15px;"
        }
        .table-responsive .pdf-exel-conversion form #student-csv-btn {
            margin-left: 930px; 
            position: relative;
            margin-top: -20px;
        }
        /*FOR PENDING STUDENTS*/
        .modal-body span.enrolled-status {
            color: green; 
        }
        /* FACULTY CREATE MODAL */
        .modal-body .row .form-group span {
            color: red; 
            display: none;
        }
    </style>
</head>
<?php include 'sidebar.php'; include 'config.php'; ?>

<div class="content">
  <div class="container-fluid p-2 bg-dark">
    <h4 class="bg-light p-3" align="center"><strong>Previous Enrolled Students</strong></h4>  
    
    <div class="table-responsive p-4">
        <button type="button" class="btn btn-primary mb-1 d-none" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-plus-square"></i> Create new</button>
<!--###################################################################################################################################-->
<!-----------------------------------------SUCCESS SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['success'])) { ?> 
            <h6 class="alert bg-success" role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h6> 
        <?php unset($_SESSION['success']); } ?>
<!-----------------------------------------EXISTS  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h6 class="alert bg-danger" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h6>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>

        <?php  if(isset($_SESSION['exists'])) { ?>
            <h6 class="alert bg-danger" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h6>
        <?php unset($_SESSION['exists']); } ?>
<!--###################################################################################################################################-->

        <div class="col-md-12 col-lg-12 mt-3 pdf-exel-conversion">
          <!-- FOR PDF FORMAT -->
          <form action="export_student_pdf.php" method="POST" target="_blank">
              <div class="col-md-12 col-lg-12 d-flex">
                     <?php 
                      include("config.php");
                      $levelsection = mysqli_query($conn, "SELECT DISTINCT level, section FROM level_section ORDER BY level ASC");
                      while($row = mysqli_fetch_array($levelsection)) {
                      ?>
                      <select class="form-control form-select" name="levelsection_filter" id="levelsection_filter" onchange="FetchSection(this.value)" required="">
                          <option value="" selected="" disabled="">Select section to convert</option>
                          <?php foreach($levelsection as $row): ?>
                          <option value="<?php echo $row ['section'];?>"><?php echo $row ['level'];?> <?php echo $row ['section'];?></option>
                      <?php endforeach;?>
                      </select>
                      <?php } ?>
                   <button class="btn btn-danger" type="submit" name="export_pdf"> PDF</button>
              </div>
          </form>
          <!-- FOR CSV FORMAT -->
          <form class="mb-1" action="export_csv.php" method="post" enctype="multipart/form-data">
              <select  name="same_level_section" id="same_level_section" class="form-control form-select d-none" required>
                  <option value=""></option>
              </select>     
              <button class="btn btn-success" type="submit" name="export" id="student-csv-btn"> CSV</button>
          </form>
      </div>
      <table class="table table-bordered table-dark table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="example">
        <thead>
            <tr>
               <tr>
                    <th>Id</th>
                    <th>School Year</th>
                   <!--  <th>Image</th>  -->
                    <th>Student name</th>    
                    <th>Level and Section</th>
                    <th>Adviser</th>
                    <th>Action</th>
               </tr>
            </tr>
        </thead>
        <tbody>
         <?php
            include("config.php");
            $query ="SELECT enrollment.*, level_section.*, faculty.*, registered_students.*, school_year.*  FROM enrollment, registered_students, level_section, faculty, school_year WHERE enrollment.student_id=registered_students.stud_Id AND enrollment.level_section_id=level_section.lev_sec_Id AND enrollment.faculty_id=faculty.fac_Id AND school_year.year_Id=enrollment.school_year_id AND school_year.status = 'Deactivated' ";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result))
             {
           ?>
            <tr>
                <td><?php echo $row["enrollment_id"];?></td>
                <td><?php echo $row["schoolyear"];?></td>
                <!-- <td>
                  <img src="../images-students/<?php echo $row['image'];?>" style="width: 45px; height: 45px; border: 3px solid #e6f2ff;" alt="image">
                </td> --> 
                <td><?php echo $row["student_firstname"];?> <?php echo $row["student_middlename"];?> <?php echo $row["student_lastname"];?> <?php echo $row["student_extname"];?></td>                            
                <td><?php echo $row["level"];?> - <?php echo $row["section"];?></td>
                <td><?php echo $row["firstname"];?> <?php echo $row["middlename"];?> <?php echo $row["lastname"];?></td>
                <td>
                    <a href="edit_enrollment.php?edit_enrollment=<?php echo $row['enrollment_id'];?>" class="btn btn-success disabled" ><i class="bi bi-pencil-square"></i> Edit</a>
                    <!-- <button class="btn btn-success" data-toggle="modal" type="button" data-target="#updatestudent_modal<?php echo $row['enrollment_id']?>" id="btn_no-outline"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button> -->
                    <button class="btn btn-primary"  data-bs-toggle="modal" type="button" data-bs-target="#viewstudent<?php echo $row['enrollment_id']; ?>" id="btn_no-outline"><i class="bi bi-eye"></i> View</button>
                    <!--
                    <a href="view_faculty.php?Id=<?php echo $row['Id']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> View Profile</a> -->
                    <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletestudent<?php echo $row['enrollment_id']; ?>" id="btn_no-outline" disabled><i class="bi bi-trash"></i> Delete</button>  
                </td>
            </tr>
          <?php  
             include 'enrolled_students_delete_student.php';
             include 'previous_enrollment_view_profile.php';
             include 'enrolled_students_update_picture.php';  
             }    
          ?>
        </tbody>
    </table>
    </div>
  </div>
</div>

<script>
function FetchSection(lev_sec_Id){ //Id refers to the Id of the Section
    $('#same_level_section').html('');
    $.ajax({
        type:'post',
        url: 'ajaxdata/ajaxdata.php',
        data : { levelsection_filter : lev_sec_Id}, //Id refers to the Id of the section
        success : function(data){
            $('#same_level_section').html(data);
        }
    })
}
</script>

<!-- TO FILTER DATATABLE -->
<script>
    $(document).ready(function() {
        $("#levelsection_filter").on('change', function() {
            var value = $(this).val();
            $.ajax({
                url: 'ajaxdata/ajaxdata.php',
                type: 'post',
                data: 'request=' + value,
                success: function() {
                    $('#example').html(data);
                }
            });
        });
    });
</script>


</html>