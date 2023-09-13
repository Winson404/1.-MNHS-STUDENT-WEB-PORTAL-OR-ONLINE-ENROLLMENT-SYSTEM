<!DOCTYPE html>
<head>
    <title>About Us | MNHS Web Portal</title>
    <style>
    	.container {
            margin: 70px;
           
    	}

        .jumbotron {
             padding: 3px;
        }
    	#image {
            height: 500px;
            width: auto; 
    		display: block;
    		margin: auto;
    	}

    	p, h2 {
            text-align: justify;
            color: black;
        }

    	@media only screen and (max-width : 480px) {
    	.container {
             margin-top: 55px;
        }
    	#image {
    		height: 360px; 
    	}	
    	}

        @media screen and (max-width: 559px){
        .container {
         margin-top: 55px;
        }
        #image {
            height: 250px;
        }
        }
        @media screen and (min-width: 560px) and (max-width: 767px){
        #image {
            height: 330px;
        }
        }
        @media screen and (min-width: 768px) and (max-width: 991px){
        #image {
            height: 380px;
        }
        }

    	@media screen and (min-width: 992px) and (max-width: 1115px){
    	#image {
            height: 400px;
        }
    	}
    </style>
</head>
<?php
    include 'header.php';
?>

<div class="container">
  <div class="jumbotron">
  	<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-4 bg-secondary p-3 img-container">
    	<img src="images/MNHS LOGO.png" alt="image" class="img-responsive" id="image">
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-8 bg-light p-3 text">
    	<h2><b>HISTORY</b></h2>
	    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medellin National High School is DepEd Managed Monograde Public 
		Secondary School located at Poblacion, Medellin, Cebu that was 
		established on January 01, 1994.
		</p>
	    
	    <h2><b>MISSION</b></h2>
	    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To protect the right of every Filipino to quality, equitable, culture-based and complete basic education where:
	    <br>
		<b>-</b> Students learn in a child-friendly, gender-sensitive, safe and motivating environment.
		<br>
		<b>-</b> Teachers facilitate learning and constantly nurture every learner.
		<br>
		<b>-</b> Administrators and staff as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.
		<br>
		<b>-</b> Family, community and other stake-holders are actively engaged and share responsibility for developing lifelong learners.
		</p>
	    
	    <h2><b>VISION</b></h2>
	    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We dream of Filipinos who passionately love  their country  and whose 
		competencies and values enable them to realize their full potential and 
		contribute meaningfully to building the nation.
		We are a learner-centered public institution that continuously improves 
		itself to pursue its mission.
		</p>
    </div>
  </div>
  </div>
</div>


<?php 
include 'footer.php';
?>
</body>
</html>