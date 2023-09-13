 <!-- The Modal -->
<div class="modal fade" id="viewfaculty<?php echo $row['fac_Id']; ?>">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="bi bi-eye"></i> Faculty profile</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_delete.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
                 <div class="col-md-12 col-lg-12">
                    <img src="../images-faculty/<?php echo $row['image'];?>" alt="image" class="view_photo">
                    <div>
                      <button  type="button" class="btn btn-info mt-2 mb-3"  data-bs-toggle="modal" data-bs-target="#photo_update<?php echo $row['fac_Id']; ?>"> <i class="bi bi-pencil-square"></i> Change photo</button>
                    </div>                           
                    <h5 align="center"><strong><?php echo $row["firstname"];?> <?php echo $row["middlename"];?> <?php echo $row["lastname"];?></strong></h5>
                    <p align="center"><?php echo $row["username"];?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <h5 class="form-control"><strong>Age:</strong>&nbsp;<?php echo $row['age']; ?> years old</h5>
                </div>
                <?php 
                    //CONVERTING DATE FORMAT TO STRING
                    $timestamp = $row['date_of_birth'];
                ?> 
                <div class="col-md-6 col-lg-6">
                    <h5 class="form-control"><strong>Birthday:</strong>&nbsp;<?php echo date("F d, Y", strtotime($timestamp)); ?></h5>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h5 class="form-control"><strong>Gender:</strong>&nbsp;<?php echo $row['gender']; ?> </h5>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h5 class="form-control"><strong>Address:</strong>&nbsp;<?php echo $row['address']; ?></h5>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h5 class="form-control"><strong>Contact #:</strong>&nbsp;<?php echo $row["contact"];?></h5>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h5 class="form-control"><strong>Email:</strong>&nbsp;<?php echo $row["email"];?></h5>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h5 class="form-control"><strong>Advisory:</strong>&nbsp;<?php echo $row["level"];?> - <?php echo $row["section"];?></h5> 
                </div>
            </div>     
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button class="btn btn-info" data-bs-toggle="modal" type="button"  data-bs-target="#updatefaculty_modal<?php echo $row['fac_Id']?>"><i class="bi bi-pencil-square"></i> Edit</button>
          </div>
      </form>
    </div>
  </div>
</div>