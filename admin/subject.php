<!DOCTYPE html>
<head>
    <title>Manage Subject | MNHS Enrollment System</title>
    <style>
        label {
          font-weight: bold;
        }
        div input, div select {
          margin-bottom: 10px;
        }
    </style>
</head>
<?php include 'sidebar.php'; ?>

<div class="content">
  <div class="container-fluid p-2 bg-dark">
    <h4 class="bg-light p-3" align="center"><strong>Manage Subjects</strong></h4>  
    
    <div class="table-responsive p-4">
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-plus-square"></i> Create new</button>
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
      <table class="table table-bordered table-dark table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="example">
        <thead>
          <tr>
              <th>Id</th>
              <th>Year level</th>
              <th>Subject name</th>
              <th>Strand</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
              include("config.php");
              $query ="SELECT * FROM subject";
              $sql = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
              <td><?php echo $row["sub_Id"];?></td>
              <td><?php echo $row["subject_level"];?></td>
              <td><?php echo $row["subject_name"];?></td>
              <td><?php echo $row["strand"];?></td>
              <td>
                  <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updatesubject_modal<?php echo $row['sub_Id']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletesubject_modal<?php echo $row['sub_Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
              </td>                
          </tr>
          <?php 
               
               include 'subject_delete.php';
               include 'subject_update.php';
               include 'course_update_picture.php';
               }  
          ?> 
        </tbody>
      </table>
    </div>
    <?php include 'subject_create.php';  ?>
  </div>
</div>


</html>


