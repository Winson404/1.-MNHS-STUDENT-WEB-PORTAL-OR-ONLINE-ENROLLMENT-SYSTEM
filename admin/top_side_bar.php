<!DOCTYPE html>
<?php
    session_start();
    include 'config.php';
    if(isset($_SESSION['faculty_username']) && isset($_SESSION['faculty_id'])) {
    // if(isset($_SESSION['admin_username'])   && isset($_SESSION['admin_id'])) {
    $id = $_SESSION['faculty_id'];  //USED to FETCH INFORMATION OF THE SPECIFIC ADMIN WHO LOGGED IN
?>
<html>
<head>
	  <title>Dashboard | MNHS</title>

    <meta charset="UTF-8">

    <!--AUTOREFRESH PAGE-->
    <!-- <meta http-equiv="refresh" content="5"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CUSTOMIZED CSS-->
    <link rel="stylesheet" href="../css/admin_style.css">
    <!---ICON FOR WEBSITE--->
    <link rel="shortcut icon" type="image/png" href="../images/MNHS LOGO.png">
	  <!---DATATABLES LAYOUT-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!--BOOTSTRAP LAYOUT-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--POP UP MODAL--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--FONTAWESOME ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!--GOOFLE FONTS-->
    <link href='https://fonts.googleapis.com/css?family=Luckiest Guy' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire|neon|outline|emboss|shadow-multiple">

    <!--DROPWDOWN MENU-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">




    <!-- <script>
          function preventBack(){window.history.forward()};
          setTimeout("preventBack()", 0);
          window.onunload= function(){null;}
    </script> -->

    
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

    #navbar{
    background-color:#292F33;
    padding: 5px;
    transition: .2s;
    }

    #header #mnhs_logo{
    top: 8px;
    position: absolute;
    left: 22px;
    height: 45px;
    width: 35px;
    z-index: 1;
    transition: .4s;
    }

    #header #mnhs_logo:hover{
    height: 49px;
    width: 39px;
    top: 6px;
    left: 21px;
    }

    #MNHS{
    color:#e60000;
    font-family: 'Luckiest Guy';
    top: 2px;
    position: relative;
    left: 50px;
    font-size: 32px;
    }

    #MNHS:hover{
    color: #ff3300;
    }

    #logout{
    float: right;
    position: absolute;
    right: 1px;
    top: 6px;
    transition: 0.3s;
    color: gray;
    }

    #logout:hover{
    text-decoration: none;
    opacity: .5;
    }

    /* The side navigation menu */
    .sidebar{
    z-index: 1;
    top: 58px;
    margin: 0;
    padding: 0;
    width: 205px;
    background-color: #e6e6e6;
    position: fixed;
    height: 100%;
    overflow: auto;
    transition: .3s;
    box-shadow: 3px 3px 5px #cccccc;
    }

    .sidebar:hover{
    background-color: #f2f2f2;
    }

    /* Sidebar links */
    .sidebar a{
    display: block;
    color: #262626;
    padding: 16px;
    font-size: 16px;
    text-decoration: none;
    
    
    transition: .5s;
    }

    .sidebar a:hover{
    padding-left: 28px;
    }

    /* Active/current link */
    .sidebar a.active {
    background-color:#3B5998;
    color: white;
    }

    /* Links on mouse-over */
    .sidebar a:hover:not(.active) {
    background-color: #cccccc;
    color: #262626;
    }



    .dropdown-link{
      width: 250px;
      box-shadow: -5px 5px 5px #cccccc;
      background-color: #e6e6e6;
    }

    .dropdown-link:hover{
      background-color: #f2f2f2;
    }

    .student{
   
    margin-left: -5px;  
    color: #262626;
    padding: 9px;
    text-decoration: none;
    transition: .5s; 
    }

    .student .student-btn{
      background-color: transparent;
      font-size: 16px;
      transition: .5s;
      border:none;
      outline: none;
    }

    .student-btn:hover{
      padding-left: 28px;
    }

    #student-link{
    padding: 16px;
    color: #262626;
    text-decoration: none;
    
    border-top: 2px solid white;
    transition: .5s;
    }

    #student-link:hover{
    padding-left: 28px;
    }


/*-----------------------ADMIN-------------------------*/
    #admin{
      position: fixed;
      right: 12px;
      top: 14px;
    }

    #admin img{
      height: 30px; 
      width: 30px;
      border-radius: 50%; 
      margin-right: -11px;
      border: 1px solid #fff;
    }

    #admin .admin-btn{
      background-color: transparent;
      font-size: 16px;
      color: white;
      outline: none;
    }

    #dropdown-link{
      width: 250px;
      box-shadow: none;
      background-color:#292F33;
      color: #fff;

    }
    #admin-profile{
      margin-top: 11px;
    }
     #admin-profile,#admin-logout{
      font-size: 15px;
      float: right;
      text-decoration: none;
      box-shadow: none;
      transition: .5s;  
      
    }

    #admin-profile:hover,#admin-logout:hover{
    padding-left: 28px;
    }


    /*-----------------------END ADMIN-------------------------*/

    /* On screens that are less than 700px wide, make the sidebar into a topbar */
    @media screen and (max-width: 700px) {
      .sidebar {
      width: 100%;
      height: auto;
      position: relative;
      }

      .sidebar a {
      float: left;
      }

      div.content {
      margin-left: 0;
      }

    }

    
    /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
    @media screen and (max-width: 400px) {
    .sidebar a {
    text-align: left;
    float: none;
    }
    }
</style>


<?php   
    // <!-- FETCHING ADMIN INFORMATION -->                
    $query ="SELECT * FROM faculty WHERE fac_Id ='$id' ";
    $sql = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($sql)) {
?>

  <nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
    <div class="container-fluid" id="header">
      <div class="navbar-header">
        <img src="../images/MNHS LOGO.png" id="mnhs_logo">
        <a class="navbar-brand font-effect-fire" href="dashboard.php" id="MNHS">M N H S</a>
        <!-- <a class="navbar-brand font-effect-emboss" href="logout.php" id="logout"><b>Signout </b><i class="fa fa-power-off" aria-hidden="true"></i></a> -->
          
              <div class="w3-dropdown-hover" id="admin">
              <img src="../images-faculty/<?php echo $row['image'];?>" alt="image">
              <button class="btn admin-btn"><strong><?php echo $row['username'];?></strong> &nbsp;<i class="fa fa-caret-down"></i></button>
              <div class="w3-dropdown-content w3-bar-block dropdown-link" id="dropdown-link">
                
                
                <a href="admin_profile.php?admin_id=<?php echo $row['fac_Id'];?>" class="w3-bar-item w3-button" id="admin-profile"> 
                <!-- <a href="admin_profile.php" class="w3-bar-item w3-button" id="admin-link"> -->
                    <i class="fa fa-user" aria-hidden="true"></i><strong> Profile </strong>

                </a>
              
                <a href="" class="w3-bar-item w3-button" id="admin-logout" data-toggle="modal" data-target="#logoutmodal">
                    <i class="fa fa-power-off" aria-hidden="true"></i><strong> Logout </strong>
                </a>
              </div>
           </div>
      </div>
    </div>
  </nav>


<!--##########################################################################-->
<!-------------------------------LOGOUT MODAL------------------------------------>

  <!-- Modal -->
  <div class="modal fade" id="logoutmodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header" style="background-color: #55ACEE; color: #fff;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Admin logout</h3>
          </div>
          <div class="modal-body">
            <?php if($row['gender'] === 'Male'):?>
                <h4>Sir   <?php echo $row['lastname'];?>, are you sure you want to logout?</h4>
            <?php else: ?>
                <h4>Ma'am <?php echo $row['lastname'];?>, are you sure you want to logout?</h4>
            <?php endif; ?>
          </div>
          <div class="modal-footer">
                <a class="btn btn-info" href="logout.php" class="w3-bar-item w3-button">Yes</a>
                <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
          </div>
      </div>
    </div>
  </div>

<!-------------------------------END LOGOUT MODAL-------------------------------->
<!--##########################################################################-->


<?php
    } 
?>

 <!-- The sidebar -->
  <div class="sidebar">
     <a href="dashboard.php" class="active"> <i class="fa fa-tachometer"     aria-hidden="true"></i><b> Dashboard</b></a>
     <a href="schoolyear.php">     <i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Academic Year</b></a>
     <a href="courses.php">        <i class="fa fa-user-secret"    aria-hidden="true"></i><b> SHS Courses</b></a>
     <a href="level_section.php">  <i class="fa fa-puzzle-piece"   aria-hidden="true"></i><b> Level and Section</b></a>
     <a href="faculty.php">        <i class="fa fa-users"          aria-hidden="true"></i><b> Faculty</b></a>
     <div class="w3-dropdown-hover student">
        <button class="btn student-btn"><i class="fa fa-users" aria-hidden="true"></i> <strong>Student List</strong> &nbsp;<i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block dropdown-link">
          <a href="enrolled_students.php" class="w3-bar-item w3-button" id="student-link">
              <i class="fa fa-users" aria-hidden="true"></i><strong> Enrolled Students </strong>
          </a>
          <a href="registered_students.php" class="w3-bar-item w3-button" id="student-link">
              <i class="fa fa-users" aria-hidden="true"></i><strong> Registered Students </strong>
          </a>
        </div>
     </div>
  </div>

<body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>

//-----------------------------DATATABLE-----------------------------//
	$(document).ready(function() {
		$('#example').DataTable();
	} );



//-----------------------------ALERT TIMEOUT-------------------------//
  $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,3000);
  }
  );


</script>


<!-- FOR AUTORELAOD PAGE -->
<!--  -->
<!-- <script>
  let counter = 1;
  setInterval(() => {
    document.querySelector('h1').innerText = counter;
    counter++;
  }, 1000);
</script> -->

<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../index.php');
    }
?>

</body>
</html>