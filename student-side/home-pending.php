<!DOCTYPE html>
<?php include 'header.php'; ?>

<style>

	.content {
		 padding:50px; 
		 margin-top: 25px;
		 max-width: 1100px;
		 display: block;
		 margin-left: auto;
		 margin-right: auto;
	}
	.jumbotron {
		 border-radius: 5px;   
		 padding: 0 10px; 
		 box-shadow: 1px 1px 5px 1px #ccc; 
		 border: 1px solid #ccc; 
		 background-color: #fff;
	}
	.jumbotron .row {
		 padding: 10px; 
		 color: #F7F7F7;
		 background-color: #292F33; 
	}
	.jumbotron .row .warning{
		 font-size: 15px;
		 color: red;
	}
	.jumbotron .row .img-container {
		 padding: 20px;
	}
	.jumbotron .row .img-container img {
		margin-top: 10px; 
		border: 5px solid #f2f2f2; 
		height: 165px; 
		width: 165px; 
		display: block;
		margin-right: auto;
		margin-left: auto;	
	}
	.jumbotron .row .name-status-section {
		background-color: #292F33;  
		padding: 20px;
	}
	.jumbotron .row .name-status-section h5 span {
		color: #cc0000;
	}
	/*------------------FOR RESPONSIVE--------------------*/

		@media screen and (max-width: 400px) {
			.content {
				 padding:5px;
				 display: block;
				 margin: 55px auto;
				 overflow: hidden;
			}
			.jumbotron {
				 font-size: 11px;
				 padding: 2px; 
				 margin: 0;
				 
				 border-radius: 0;
			}
			.jumbotron .row {
				 margin-top: -7px;
				 padding: 1px; 
				 color: #F7F7F7;
				 background-color: #292F33; 

			}
			.jumbotron .row .img-container {
				 margin: 0;
				 margin-top: 10px;
			}
			.jumbotron .row .img-container img {
				height: 125px; 
				width: 125px; 
			}
			.jumbotron .row .name-status-section h1 {
				 text-align: center;
				 margin-top: -30px;
				 font-size: 16px;
			}
			.jumbotron .row .name-status-section hr {
				margin-bottom: -10px;
			}
			.jumbotron .row .name-status-section h5 {
				font-size: 14px;
			}
			.jumbotron .row .name-status-section #adviser{
				margin-bottom: -20px;
			}
			.jumbotron .row .table-container {
				margin-bottom: -10px;
			}
			.jumbotron .row .table-container h3 {
				font-size: 15px;
			}
		}

	/* Small devices (portrait tablets and large phones, 600px and up) */
		@media only screen and (min-width: 401px) and (max-width: 600px) {
			.content {
				 padding:10px; 
				 display: block;
				 margin: 55px auto;
			}
			.jumbotron .row .name-status-section h1 {
				 text-align: center;
				 margin-top: -30px;
				 font-size: 23px;
			}
			.jumbotron .row .name-status-section h5 {
				font-size: 18px;
			}		
			.jumbotron {
				font-size: 13px;
			}
			.jumbotron .row .table-container h3 {
				font-size: 20px;
			}
		}
		/* Medium devices (landscape tablets, 768px and up) */
		@media only screen and (min-width: 601px) and (max-width: 768px) {
			.content {
				 padding:10px; 
				 display: block;
				 margin: 55px auto;
			}
			.jumbotron .row .name-status-section h1 {
				 text-align: center;
				 margin-top: -30px;
				 font-size: 25px;
			}

			.jumbotron {
				font-size: 13px;
			}
		} 
		/* Large devices (laptops/desktops, 992px and up) */
		@media only screen and (min-width: 769px) and (max-width: 991px) {
		    .content {
				 padding:30px; 
				 display: block;
				 margin: 30px auto;
			}
			.jumbotron {
				 display: block;
				 margin: 20px auto;
			}
		} 
		@media only screen and (min-width: 992px) and (max-width: 1115px) {
			
		}
		/* Extra large devices (large laptops and desktops, 1200px and up) */
		@media only screen and (min-width: 1200px) {

		}

		

	/*------------------END FOR RESPONSIVE--------------------*/
</style>


	<?php
		$sql_query = mysqli_query($conn, "SELECT * FROM registered_students WHERE stud_Id='$id' ");
		while($row = mysqli_fetch_array($sql_query)) {
	?>

<div class="content">
	<div class="jumbotron">
		<div class="row">
		  	<div class="col-md-3 img-container">
				<img src="../images-students/<?php  echo $row['image'];?>" alt="image" class="img-responsive">	
			</div>
			<div class="col-md-9 name-status-section">
				<h1><b><?php echo $row['student_firstname'];?> <?php echo $row['student_middlename'];?> <?php echo $row['student_lastname'];?> <?php echo $row['student_extname'];?></b></h1>
				<hr>
				<h5 class="mt-4">Status: <b><span>&nbsp;&nbsp;<?php echo $row['status'];?></span></b></h5>
				<h5>Section: <b>Section is not applicable due to unconfirmed enrollment</b></h5>
				<h5>Adviser: <b>Adviser is not applicable due to unconfirmed enrollment</b></h5>
			</div>	
		  	<div class="col-md-12 col-lg-12 table-container">
		  		<hr>
		  		<h3><b>My Subjects</b> <span class="warning">- Subjects are applicable for those who are officially enrolled.</span></h3>
		  		<div class="table-responsive">
				<table class="table table-light">
				  <thead>
				    <tr>
				      <th scope="col">Id</th>
				      <th scope="col">Subject Name</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td scope="row">Not applicable</td>
				      <td>Not applicable</td>
				    </tr>
				  </tbody>
				</table>
			
			</div>	
		</div>
	</div>
</div>

	<?php } ?>



