<!DOCTYPE html>
<html>
<head>
	<!--AUTOREFRESH PAGE-->
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title>Student | MNHS Web Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CUSTOMIZED CSS-->
    
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

#logout{
	float: right;
	position: absolute;
	right: 1px;
	top: 0px;
	transition: 0.3s;
	color:#f2f2f2;
}

#logout:hover{
	text-decoration: none;
	opacity: .5;
}

.sidebar {
z-index: 1;
top: 45px;
margin: 0;
padding: 0;
width: 200px;
background-color:#292F33;
position: fixed;
height: 100%;
overflow: auto;
transition: .3s;
box-shadow: 3px 3px 5px #cccccc;
}

/* Sidebar links */
.sidebar a{
display: block;
color: #fff;
padding: 16px;
font-size: 16px;
text-decoration: none;
transition: .5s;
border-bottom: 1px solid #221F1F;
border-top: 1px solid #221F1F;
}

.sidebar a:hover{
padding-left: 28px;
}

/* Active/current link */
.sidebar a.active {
background-color:#66757F;
color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
background-color: #cccccc;
color: #262626;
}


/*---------------ADD MODAL-----------------*/
#add_modalheader{
background-color: #0047b3;
}

/*---------------UPDATE MODAL--------------*/
#update_modalheader{
background-color:#53c653;
}

/*---------------DELETE MODAL--------------*/
#delete_modalheader{
background-color: #e6ac00;
}

/*---------------VIEW PROFILE MODAL--------------*/
#view_modalheader{
background-color: #3385ff;
}

/*---------------ADD, UPDATE, DELETE LABEL---------------*/
#add_modallabel, #delete_modallabel, #update_modallabel, #view_modallabel{
color: white;
}

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

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }

}
</style>
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
    <div class="container-fluid" id="header">
      <div class="navbar-header">
        <a class="navbar-brand" href="../logout.php" id="logout">Logout <i class="fa fa-power-off" aria-hidden="true"></i></a> 
        <!-- <a class="navbar-brand font-effect-emboss" href="logout.php" id="logout"><b>Logout </b><i class="fa fa-power-off" aria-hidden="true"></i></a>  -->
      </div>
    </div>
</nav>



<!-- The sidebar -->
  <div class="sidebar">
     <a href="home.php" class="active"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
     <a href="student_profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>
  </div>




<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
</html>
