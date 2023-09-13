  <!DOCTYPE html>
<?php
    session_start();
    include 'config.php';
    if(isset($_SESSION['faculty_username']) && isset($_SESSION['faculty_id'])) {
    // if(isset($_SESSION['admin_username'])   && isset($_SESSION['admin_id'])) {
    $id = $_SESSION['faculty_id'];  //USED to FETCH INFORMATION OF THE SPECIFIC ADMIN WHO LOGGED IN
?>
<html lang="en">
<head>
  <title>Enrollment System | MNHS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!---FAVICON ICON FOR WEBSITE--->
  <link rel="shortcut icon" type="image/png" href="../images/MNHS LOGO.png">

  <!-- BOOTSTRAP LINK / BOOTSTRAP LAYOUT -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/bootstrap.bundle.min.js"></script>
  
  <!-- TO ENABLE AUTO FETCH/ PASSING SAME VALUES ON TWO DROPDOWN AND ENABLE PAGINATION -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

  <!-- SIDEBAR CUSTOMIZED CSS -->
  <link rel="stylesheet" href="CSS-Admin/sidebar-style.css">
  <!-- CONTENT-TABLES CUSTOMIZED CSS -->
  <link rel="stylesheet" href="CSS-Admin/content-tables.css">

  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <!-- CSS FOR DATATABLES -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

</head>
<body>

<?php   
    // <!-- FETCHING ADMIN INFORMATION -->                
    $query ="SELECT * FROM faculty WHERE fac_Id ='$id' ";
    $sql = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($sql)) {
?>

  <div class="sidebar bg-dark">
      <div class="img-container">
        <a href="admin_profile.php?admin_id=<?php echo $row['fac_Id'];?>" class="profile"><img class="img-responsive mb-3" src="../images-faculty/<?php echo $row['image'];?>" alt="image"></a>
        <span data-bs-toggle="modal" data-bs-target="#photo_update_sidebar<?php echo $row['fac_Id']?>"><i class="bi bi-camera-fill camera"></i></span>
      </div>
      <a class="active bg-success" href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
      <a href="schoolyear.php"><i class="bi bi-mortarboard-fill"></i> Academic Year</a>
      <a href="course.php"><i class="bi bi-card-checklist"></i> SHS Courses</a>
      <a href="level_section.php"><i class="bi bi-puzzle-fill"></i> Level and Section</a>
      <a href="subject.php"><i class="bi bi-puzzle-fill"></i> Subjects</a>
      <a href="faculty.php"><i class="bi bi-people-fill"></i> Faculty</a>
        <button class="dropdown-btn"><i class="bi bi-people-fill"></i> Student Lists 
          <i class="bi bi-caret-down-fill dropdown-icon"></i>
        </button>
        <div class="w3-dropdown-hover dropdown-container">
          <a href="registered_students.php"><i class="bi bi-hourglass-split"></i> Registered students</a>
          <a href="enrolled_students.php"><i class="bi bi-check-circle"></i> Enrolled students</a>
          <!-- <a href="previous_enrollment.php"><i class="bi bi-check-circle"></i> Previous Enrollment</a> -->
        </div>
      <a href="logout.php" data-bs-toggle="modal" data-bs-target="#logoutmodal" class="logout"><span id="logout">Admin Logout</span> <i class="bi bi-box-arrow-right" id="door"></i></a>
  </div>

<!-------------------------------LOGOUT MODAL------------------------------------>
<!-- The Modal -->
<div class="modal" id="logoutmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="bi bi-person-circle"></i> Admin logout</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
        <!-- Modal body -->
        <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <?php if($row['gender'] === 'Male'):?>
              <h5>Sir   <?php echo $row['lastname'];?>, are you sure you want to logout?</h5>
          <?php else: ?>
              <h5>Ma'am <?php echo $row['lastname'];?>, are you sure you want to logout?</h5>
          <?php endif; ?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
              <a class="btn btn-danger" href="logout.php"><i class="bi bi-check-circle"></i> Confirm</a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        </div>
        </form>
    </div>
  </div>
</div>
<!-------------------------------END LOGOUT MODAL-------------------------------->
<?php 
  } 
?>


<!-- FOR DATATABLES LINKS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- END FOR DATATABLES LINKS -->

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

<script>
//-----------------------------DATATABLE-----------------------------//

// FIRST SCRIPT FOR DATATABLE ---------------------------------------//

/* $(document).ready(function() {
     $('#example').DataTable();
   });  */
// END FIRST SCRIPT FOR DATATABLE -----------------------------------//

 $(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[6, 10, 25, 50, -1], [6, 10, 25, 50, "All"]]
    } );
} );
//-----------------------------END DATATABLE-------------------------//

// *******************************************************************

//-----------------------------ALERT TIMEOUT-------------------------//
  $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,6000);
  }
  );
//-----------------------------END ALERT TIMEOUT---------------------//
</script>

<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../index.php');
    }
?>
</html>


