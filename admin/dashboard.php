<!DOCTYPE html>
<head>
    <title>Dashboard | MNHS Enrollment System</title>
    <style>
      div.content .container-fluid .row{
        justify-content: space-between;
      }
      div.content .container-fluid .row h2 {
        color: white; 
        margin-left: -10px;
      }
      div.content .container-fluid .row hr {
        color: white;
      }
      div.content .container-fluid .row .containers{
        width: 24%;
        height: 145px;
        border-radius: 3px;
        position: relative;
      }
      div.content .container-fluid .row .containers h5 {
          color: #fff;
          position: absolute;
          top: 10px; 
          left: 15px;
      }
      div.content .container-fluid .row .containers .numbers {
        text-align: center;
        margin-top: 15px;
        color: #fff;
      }
      div.content .container-fluid .row .containers .numbers h1 {
        font-size: 60px;
      }
    </style>
</head>
<?php include 'sidebar.php'; ?>

  <div class="content">
    <div class="container-fluid bg-dark">
      <div class="row p-4">
          <!-- FOR ACTIVE YEAR -->
          <?php
            $active = mysqli_query($conn, "SELECT * FROM school_year WHERE status='Active' ");
            while($row = mysqli_fetch_array($active)) {
          ?>
          <h2><b>ACADEMIC YEAR <?php echo $row['schoolyear']; ?></b></h2>
          <hr>
          <?php } ?>

          <!-- FOR NUMBER OF ENROLLED STUDENTS -->
          <div class="col-12 col-sm-6 col-md-2 col-lg-2 bg-info p-4 containers">
              <h5>Enrolled students</h5>
              <div class="numbers">
                  <?php 
                    $enrolled = mysqli_query($conn, "SELECT enrollment_id FROM enrollment, school_year WHERE enrollment.school_year_id=school_year.year_Id AND school_year.status ='Active' ");
                    $row_enrolled = mysqli_num_rows($enrolled);
                  ?>
                  <h1><strong> <?php echo $row_enrolled; ?> </strong></h1>
              </div>
          </div>

          <!-- FOR NUMBER OF REGISTERED STUDENTS -->
          <div class="col-12 col-sm-6 col-md-2 col-lg-2 bg-warning p-4 containers">
              <h5>Registered students</h5>
              <div class="numbers">
                  <?php 
                    $regitered = mysqli_query($conn,"SELECT stud_Id FROM registered_students WHERE status='Pending' ");
                    $row_registered = mysqli_num_rows($regitered);
                  ?>
                  <h1><strong> <?php echo $row_registered; ?> </strong></h1>
              </div>
          </div>

          <!-- FOR NUMBER OF FACULTY -->
          <div class="col-12 col-sm-6 col-md-2 col-lg-2 bg-danger p-4 containers">
              <h5>Faculty</h5>
              <div class="numbers">
                  <?php 
                    $faculty = mysqli_query($conn,"SELECT fac_Id FROM faculty");
                    $row_faculty = mysqli_num_rows($faculty);
                  ?>
                  <h1><strong> <?php echo $row_faculty; ?> </strong></h1>
              </div>
          </div>

          <!-- FOR NUMBER OF SECTION -->
          <div class="col-12 col-sm-6 col-md-2 col-lg-2 bg-success p-4 containers">
              <h5>Section</h5>
              <div class="numbers">
                  <?php 
                    $section = mysqli_query($conn,"SELECT lev_sec_Id FROM level_section");
                    $row_section = mysqli_num_rows($section);
                  ?>
                  <h1><strong> <?php echo $row_section; ?> </strong></h1>
              </div>
          </div>

      </div>
      <div class="row p-3">
        <img src="../images/MNHS LOGO.png" alt="image" style="height: 367px; width: 300px; ">
      </div>
    </div>
  </div>

</html>


