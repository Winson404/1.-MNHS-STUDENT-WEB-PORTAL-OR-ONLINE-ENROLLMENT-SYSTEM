<?php 
session_start();
include 'header.php';
?>

<style>
	#container {
		margin-top: 54px;
		width: auto;
	}
	.school-text{
		font-size: 45px;
		margin: 20px 0 -20px 30px;
	}
	.big-text {
		font-size: 52px;
		color: darkorange;
		margin: 20px 0 20px 30px;
	}
	.small-text {
		font-size: 45px;
		color: darkred;
		margin: -25px 0 10px 30px;
	}

	#enroll {
		position: relative;
		z-index: 3;
		background-color: darkorange;
		color: #fff;
		margin: 20px 0 20px 30px;
		width: 150px;
		padding: 10px;
		border-radius: 20px;
		box-shadow: 1px 1px 3px #999;
		transition: .3s
	}

	#enroll:hover{
		background-color: transparent;
		color: darkorange;
		border: 1px solid darkorange;
		box-shadow: 5px 5px 10px #999;
	}

	.banner-info .paragraph{
		margin: -10px 0 20px 30px;	
	}

	.banner-image {
		padding-top: 35px;
		
	}

	 .banner-image img {
	 	height: 580px;
	 	display: block;
	 	margin: auto;
	 }

	  @media only screen and (max-width : 349px) {
		.school-text{
		font-size: 30px;
		margin: -20px -20px;
		}
		.big-text {
		font-size: 27px;
		margin: 15px -20px;
		}

		.small-text {
		margin: -20px -20px;
		font-size: 25px;
		}

		.banner-info .paragraph{
		margin: 20px -20px;
		font-size: 14px;	
		}

		#enroll{
		position: relative;
		z-index: 3;
		margin: 15px -20px;
		width: 140px;
		padding: 7px;
		}

		.banner-image img{
		margin-top: -65px;
		margin-right: 5px;
		height: 310px;
		}
	}

	 @media only screen and (min-width : 350px) and (max-width : 480px){
		.school-text{
		font-size: 35px;
		margin: -30px -30px;
		}
		.big-text {
		font-size: 32px;
		margin: 18px -30px;
		}

		.small-text {
		margin: -30px -30px;
		font-size: 30px;
		}

		.banner-info .paragraph{
		margin: 25px -30px;	
		}

		#enroll {
	    position: relative;
		z-index: 3;
		margin: 35px -30px;
		width: 140px;
		padding: 7px;
		}

		.banner-image img{
		margin-top: -210px;
		margin-right: 5px;
		height: 437px;
		}
	}

	@media screen and (min-width: 481px) and (max-width: 768px) { 
    	.school-text{
		font-size: 45px;
		margin: -10px -20px;
		}
		.big-text {
		margin: -10px -20px;
		font-size: 42px;
		}

		.small-text {
		margin: -10px -20px;
		font-size: 40px;
		}

		.banner-info .paragraph{
		margin: 10px -20px;
		}

		#enroll {
		position: relative;
		z-index: 3;
		margin: 40px -20px;
		position: absolute;
		}

		.banner-image img{
		margin-top: -100px;
		margin-right: 5px;
		height: 450px;
		}
    }

    @media screen and (min-width: 769px) and (max-width: 960px) {
    	.content {
    	padding: 0;	
    	}
   	 	.school-text{
		font-size: 45px;
		margin: -10px -20px;
		}
		.big-text {
		margin: -10px -20px;
		font-size: 42px;
		}
		.small-text {
		font-size: 40px;
		margin: 10px -20px;
		}
		.banner-info .paragraph{
		margin: -10px -20px;
		}
		#enroll {
		position: relative;
		z-index: 3;
		margin: 60px -20px;
		position: absolute;
		}

		.banner-image img{
		margin-top: 30px;
		margin-left: -100px;
		height: 590px;
		}
     }

</style>

	<div class="container-fluid  mb-5 bg-light" id="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 banner-info p-5 content">
				<h1 class="school-text"><strong>SCHOOL</strong></h1>
				<p class="big-text"><strong>ADMISSION</strong></p>
				<p class="small-text"><strong>OPEN NOW</strong></p>
				<p class="paragraph">Another school year is about to start and we can't wait to meet our new set of students and enjoy learning with us!</p>
				<a href="" class="btn" data-bs-toggle="modal" data-bs-target="#register_student" id="enroll"><strong>Enroll Now</strong></a>
			</div>
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 banner-image content">
				<img src="images/enroll.png" class="img-responsive">
			</div>
		</div>
	</div>

	<?php include 'admission.php'; ?>

</body>
	<?php include 'footer.php'; ?>
</html>
