<?php
    session_start();
    include 'config.php';
?>

<?php
  if(isset($_POST['deactivate_schoolyear'])) {
    $id     = $_POST['Id'];
    $status = $_POST['status'];

    if($status === 'Active') {
        $_SESSION['exists'] = "you have to select deactivate option first to deactivate school year."; 
        header("Location: schoolyear.php");
    } else {
          $deactivate = mysqli_query($conn, "UPDATE school_year SET status= '$status' WHERE year_Id='$id' ");
          if($deactivate) {
              $_SESSION['success'] = "school year has been updated."; 
              header("Location: schoolyear.php");
          } else {
              $_SESSION['exists'] = "something went wrong while updating the data.";   
              header("Location: schoolyear.php");
          }
    }
  }
?>
