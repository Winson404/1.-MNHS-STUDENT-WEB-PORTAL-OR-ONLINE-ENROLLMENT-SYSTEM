<!DOCTYPE html>
<head>
    <title>Manage Courses | MNHS Web Portal</title>
</head>

<?php include 'top_side_bar.php'; ?>

<style>

    table{
    background-color: #343a40;
    border: 1px solid #404040;
    }

    thead{
    color: white;
    }

    .update_photo img{
    margin: 20px;
    width: 150px;
    height: 150px;
    display: block;
    margin-right: auto;
    margin-left: auto;
    box-shadow: 4px 4px 7px #b3b3b3;
    border: 5px solid  #33cc33;
    position: relative;
    } 

    .update_photo img:hover{
    opacity: .8;
    }

    #edit{
    margin-top: -43px;
    margin-left: 300px;
    }
    #edit button{
    background-color: transparent;
    border: none;
    border-radius: 60px;
    color: white;
    outline: none;
    }

    #edit button #icon{
    font-size: 15px;
    background-color: #4d4d4d;
    padding: 5px;
    border-radius: 50%;
    }

    #edit button #icon:hover{
    background-color: #737373; 
    }

    .alert{
    border: 2px solid #d9d9d9;
    margin: 16px 0 -15px;
    text-align: center;
    }
</style>



<div class="container-fluid">
        <div class="row" style="padding-right: 19px;">
            <div class="col-md-2 "></div>
                <div class="col-md-10" id="container-table">
                <h3 align="center"><strong>Manage SHS Courses</strong></h3>  
<!-----------------------------------------SUCCESS SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php 
            if(isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <strong>Hey! &nbsp;</strong> <?php echo $_SESSION['success']; ?>
            </div>
        <?php
            unset($_SESSION['success']);  }
        ?>

<!-----------------------------------------DELETE  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php 
            if(isset($_SESSION['delete'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Hey! &nbsp;</strong> <?php echo $_SESSION['delete']; ?>
            </div>
        <?php
        unset($_SESSION['delete']);  }
        ?>

<!-----------------------------------------UPDATE  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php 
            if(isset($_SESSION['update'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <strong>Hey! &nbsp;</strong> <?php echo $_SESSION['update']; ?>
            </div>
        <?php
        unset($_SESSION['update']);  }
        ?>

<!-----------------------------------------EXISTS  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php 
            if(isset($_SESSION['exists'])) {
        ?>
            <div class="alert alert-warning" role="alert">
                <strong>Hey! &nbsp;</strong> <?php echo $_SESSION['exists']; ?>
            </div>
        <?php
        unset($_SESSION['exists']);  }
        ?>

<!-----------------------------------------DANGER  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php 
            if(isset($_SESSION['danger'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Hey! &nbsp;</strong> <?php echo $_SESSION['danger']; ?>
            </div>
        <?php
            unset($_SESSION['danger']);  }
        ?>
<!-----------------------------------------END DANGER  SESSION ALERT MESSAGES------------------------------------------------------------>


<!--###################################################################################################################################-->
<!-----------------------------------------------------DISPLAY COURSES TABLE------------------------------------------------------------->    
                <hr>
                <div class="button-container">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="btn-create">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create New
                    </button>
                </div>
                    <table id="example" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Course name</th>
                                <!-- <th>Course description</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("config.php");
                                $query ="SELECT * FROM courses";
                                $sql = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?php echo $row["course_Id"];?></td>
                                <td><?php echo $row["course_name"];?></td>
                                <!-- <td><?php echo $row["course_description"];?></td> -->
                                <td>
                                    <button class="btn btn-success" data-toggle="modal" type="button" data-target="#updatecourse_modal<?php echo $row["course_Id"];?>" id="btn_no-outline"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                                    <button class="btn btn-warning"  data-toggle="modal" type="button" data-target="#deletecourse_modal<?php echo $row["course_Id"];?>" id="btn_no-outline"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                </td>                
                            </tr>
<!-----------------------------------------------------END DISPLAY COURSES TABLE--------------------------------------------------------->
<!--###################################################################################################################################-->

                          <?php 
                           include 'courses_create.php';
                           include 'courses_delete.php';
                           include 'courses_update_info.php';
                           include 'courses_update_picture.php'; 
                          ?> 
                          <?php  
                                 }    
                          ?>
                        </tbody>
                    </table>
                </div>
        </div>
   </div>
</html>
 