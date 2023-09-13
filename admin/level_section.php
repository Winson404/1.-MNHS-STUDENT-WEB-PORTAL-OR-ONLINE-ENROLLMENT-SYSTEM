<!DOCTYPE html>
<head>
    <title>Manage Level and Section | MNHS Enrollment System</title>
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
    <h4 class="bg-light p-3" align="center"><strong>Manage Level and Section</strong></h4>  
    
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
            <th>Level</th>
            <th>Section</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
             include("config.php");
             $query ="SELECT * FROM level_section";
             $sql = mysqli_query($conn,$query);
             while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
              <td><?php echo $row["lev_sec_Id"];?></td>
              <td><?php echo $row["level"];?></td>
              <td><?php echo $row["section"];?></td>
              <td>
                  <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updatelevel_section_modal<?php echo $row['lev_sec_Id']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletelevel_section_modal<?php echo $row['lev_sec_Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
              </td>                
          </tr>
          <?php 
               include 'level_section_delete.php';
               include 'level_section_update.php';
            }    
          ?>
        </tbody>
      </table>
    </div>
        <?php include 'level_section_create.php'; ?>
  </div>
</div>


</html>


