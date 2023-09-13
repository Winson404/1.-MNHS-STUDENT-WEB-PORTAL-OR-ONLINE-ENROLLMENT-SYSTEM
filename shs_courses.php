<!DOCTYPE html>
<head>
    <title>Manage School Year | MNHS Web Portal</title>
</head>
<?php
    include 'header.php';
?>

<style>
  /* Smartphones (portrait and landscape) ----------- */
  @media only screen and (min-width : 320px) and (max-width : 480px) {

  }

  @media screen and (min-width: 481px) and (max-width: 768px) { 

  }

  @media screen and (min-width: 769px) and (max-width: 960px) {

  }
</style>





<?php
    $query = "SELECT * FROM courses";
    $result = mysqli_query($conn, $query);

    $li ='';
    $i  =0;
    $div = '';

    while($row = mysqli_fetch_array($result)) {
          if($i == 0) {
            $li  .= ' <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="'.$i.'" class="active" aria-current="true" aria-label="Slide 1" style="margin-bottom: 30px;"></button> ';
            
                 
                 $div .= '
                    <div class="carousel-item  active" id="active">
                          <img src="images-course/'.$row['course_image'].' " style="width: 100%; height: 85vh; margin-top:40px; margin-bottom: 40px;">
                          <div class="carousel-caption">
                            <h3 style="margin-bottom: 30px;"> '.$row['course_name'].' </h3>
                            <!-- <p>  '.$row['course_description'].'</p> -->
                    </div>
                          '; 
          } else {
                  $li  .= ' <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="'.$i.'" class="active" aria-current="true" aria-label="Slide 1" style="margin-bottom: 30px;"></button> ';
                 $div .= '
                    <div class="carousel-item" id="item">
                          <img src="images-course/'.$row['course_image'].' " style="width: 100%; height: 85vh;  margin-top:40px; margin-bottom: 40px;">
                          <div class="carousel-caption">
                            <h3 style="margin-bottom: 30px;"> '.$row['course_name'].' </h3>
                         <!--   <p>  '.$row['course_description'].'</p> -->
                    </div>
                          '; 
          }
          $div .= '</div>';
          $i++;
    }
?>
     <div class="jumbotron p-4">
       <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
           <?php
             echo $li;
           ?>
        </div>
        <div class="carousel-inner">
          <?php
            echo $div;
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
     </div>

      <?php
            include 'footer.php';
      ?>

      </body>
      </html>



  