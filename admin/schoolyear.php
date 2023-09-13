<!DOCTYPE html>
<head>
    <title>Manage School Year | MNHS Enrollment System</title>
    
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
    <h4 class="bg-light p-3" align="center"><strong>Manage School Year</strong></h4>  
    
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
            <th>School Year</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include("config.php");
            $query ="SELECT * FROM school_year ORDER BY schoolyear";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
                <td><?php echo $row["year_Id"];?></td>
                <td><?php echo $row["schoolyear"];?></td>

                <?php if($row['status'] == "Active"): ?>
                <td>
                    <span class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#deactivateschoolyear_modal<?php echo $row['year_Id']; ?>"><?php echo $row['status'];?></span>
                </td>
                <?php elseif($row['status'] == "Deactivated"): ?>
                <td>
                    <span class="btn btn-secondary"><?php echo $row['status'];?></span>
                </td> 
                <?php else: ?>
                <td>
                    <span class="btn btn-danger"><?php echo $row['status'];?></span>
                </td>                              
                <?php endif; ?>
              <td>               
                  <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updateschoolyear_modal<?php echo $row['year_Id']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteschoolyear_modal<?php echo $row['year_Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
              </td>                
          </tr>

            <?php 
                
                include 'schoolyear_delete.php';
                include 'schoolyear_update.php';
                include 'schoolyear_deactivate.php';                            
                }  
            ?> 
        </tbody>
      </table>
      <?php include 'schoolyear_create.php'; ?>
      <p><b>NOTE:</b> To deactivate an active year status, just click the <b>Active</b> button above.</p>
    </div>
  </div>
</div>


</html>


