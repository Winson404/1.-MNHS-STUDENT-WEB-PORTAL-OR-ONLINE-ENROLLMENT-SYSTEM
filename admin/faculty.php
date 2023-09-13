<!DOCTYPE html>
<?php include 'sidebar.php'; ?>
<head>
    <title>Manage Faculty | MNHS Enrollment System</title>
    <style>
        .table-responsive .pdf-exel-conversion {
            position: relative;
        }
        .table-responsive .pdf-exel-conversion form .d-flex {
            position: absolute; 
            right: 0; 
            margin-top: -15px;
        }
        .table-responsive .pdf-exel-conversion form #level_filter {
            margin-right: 60px;
        }
        .table-responsive .pdf-exel-conversion form #faculty_level {
            left: 718px; 
            top: -42px; 
            position: absolute;
            width: 20%;
            margin-top: -15px;
        }
        .table-responsive .pdf-exel-conversion form #csv-btn {
            margin-left: 930px; 
            position: relative;
            margin-top: -20px;
        }
        /* FACULTY CREATE MODAL */
        .modal-body .row .form-group span {
            color: red; 
            display: none;
        }
        label {
          font-weight: bold;
        }
        div input {
          margin-bottom: 10px;
        }
    </style>

</head>


<div class="content">
  <div class="container-fluid p-2 bg-dark">
    <h4 class="bg-light p-3" align="center"><strong>Manage Faculty</strong></h4>  
    
    <div class="table-responsive p-4">
        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-plus-square"></i> Create new</button>
<!--###################################################################################################################################-->
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

        <div class="col-md-12 col-lg-12 mt-3 pdf-exel-conversion">
            <!-- FOR PDF FORMAT -->
            <form class="" action="export_faculty_pdf.php" method="POST" target="_blank">
                <div class="col-md-12 col-lg-12 d-flex">
                        <?php 
                        include("config.php");
                        $levelsection = mysqli_query($conn, "SELECT DISTINCT level FROM level_section ORDER BY level ASC");
                        while($row = mysqli_fetch_array($levelsection)) {
                        ?>
                        <select class="form-control form-select" name="level_filter" id="level_filter" onchange="Fetchlevel(this.value)" required="">
                            <option value="" selected="" disabled="">Select level to convert</option>
                            <?php foreach($levelsection as $row): ?>
                            <option value="<?php echo $row['level'];?>"><?php echo $row['level'];?></option>
                        <?php endforeach;?>
                        </select>
                        <?php } ?>
                
                     <button class="btn btn-danger" type="submit" name="export_faculty_pdf"> PDF</button>
                </div>
            </form>
            <!-- FOR CSV FORMAT -->
            <form class="mb-1" action="export_csv.php" method="post" enctype="multipart/form-data">
                <select  name="faculty_level" id="faculty_level" class="form-control form-select d-none" required>
                    <option value=""></option>
                </select>     
                 <button class="btn btn-success " type="submit" name="faculty_export" id="csv-btn"> CSV</button>
            </form>
        </div>
      <table class="table table-bordered table-dark table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="example">
        <thead>
            <tr>
                <th>Id</th>
                <!--  <th>Image</th>  -->
                <th>Faculty name</th>    
                <th>Advisory</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
         <?php
            include("config.php");
            $query ="SELECT faculty.*, level_section.level, level_section.section FROM faculty, level_section WHERE faculty.level_section_id=level_section.lev_sec_Id AND faculty.usertype != 'Admin' ";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result))
             {
           ?>
            <tr>
                <td><?php echo $row["fac_Id"];?></td>
                <!-- <td>
                  <img src="../images-faculty/<?php echo $row['image'];?>"  style="width: 35px; height: 35px;border: 3px solid #e6f2ff;" alt="image">
                </td> -->
                <td><?php echo $row["firstname"];?> <?php echo $row["middlename"];?> <?php echo $row["lastname"];?></td>
                <td><?php echo $row["level"];?> - <?php echo $row["section"];?></td>
                <td>
                  <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updatefaculty_modal<?php echo $row['fac_Id']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                  <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#viewfaculty<?php echo $row['fac_Id']; ?>"><i class="bi bi-eye"></i> View</button>
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletefaculty<?php echo $row['fac_Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
                </td>               
          </tr>
          <?php  
             include 'faculty_delete.php';  
             include 'faculty_view_profile.php'; 
             include 'faculty_update_info.php'; 
             include 'faculty_update_picture.php'; 
            
             }    
          ?>
        </tbody>
    </table>
    <?php  include 'faculty_create.php'; ?>
    </div>
  </div>
</div>


<script>
function Fetchlevel(level){ //Id refers to the Id of the Section
    $('#faculty_level').html('');
    $.ajax({
        type:'post',
        url: 'ajaxdata/ajaxdata.php',
        data : { level_filter : level}, //Id refers to the Id of the section
        success : function(data){
            $('#faculty_level').html(data);
        }
    })
}
</script>

<!-- GETTING AUTOMATICALLY AGE VALUE FROM SETTING BIRTHDATE -->
<script type="text/javascript">
    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
    }
//  GETTING AGE VALUE OF THE FACULTY----------------------------------------------------------------->
    function getAge(dateString){
        var birthdate = new Date().getTime();
        if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
        // variable is undefined or null value
        birthdate = new Date().getTime();
        }
        birthdate = new Date(dateString).getTime();
        var now = new Date().getTime();
        // now find the difference between now and the birthdate
        var n = (now - birthdate)/1000;
        if (n < 378683112) { // less than 12 years(378683112 seconds)
            var day_n = Math.floor(n/86400);
            if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
            // variable is undefined or null
            return '';
            } else {   
                 return '';  
                 //return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';   
            }
        } else {
            var year_n = Math.floor(n/31556926);
            if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
            return year_n = '';
            } else {
                return year_n + (year_n > 1 ? '' : '') ;
                //return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
            }
        }
    }

    function getAgeVal(pid) {
        var birthdate = formatDate(document.getElementById("txtbirthdate").value);
        var count = document.getElementById("txtbirthdate").value.length;
        if (count=='10') {
                var age = getAge(birthdate);
                var str = age;
                var res = str.substring(0, 1);
                if (res =='-' || res =='0') {
                    document.getElementById("txtbirthdate").value = "";
                    document.getElementById("txtage").value = "";
                    $('#txtbirthdate').focus();
                    return false;
                } else {
                        document.getElementById("txtage").value = age;
                        // DISPLAYING AUTOMATICALLY THE ERROR MESSAGE IF AGE IS LESS THAN 12 YEARS OLD
                        if(document.getElementById("txtage").value == "") {
                            document.getElementById("agestatus").style.display = "block";
                            return false;
                        } else {
                            document.getElementById("agestatus").style.display = "none";
                            return true;
                        }
                }
        } else {
            document.getElementById("txtage").value = "";
            return false;
        }
    }
    function updategetAgeVal(pid) {
        var birthdate = formatDate(document.getElementById("updatetxtbirthdate").value);
        var count = document.getElementById("updatetxtbirthdate").value.length;
        if (count=='10') {
                var age = getAge(birthdate);
                var str = age;
                var res = str.substring(0, 1);
                if (res =='-' || res =='0') {
                    document.getElementById("updatetxtbirthdate").value = "";
                    document.getElementById("updatetxtage").value = "";
                    $('#updatetxtbirthdate').focus();
                    return false;
                } else {
                        document.getElementById("updatetxtage").value = age;
                        // DISPLAYING AUTOMATICALLY THE ERROR MESSAGE IF AGE IS LESS THAN 12 YEARS OLD
                        if(document.getElementById("updatetxtage").value == "") {
                            //document.getElementById("updateagestatus").style.display = "block";
                            document.getElementById("updatetxtage").style.border = "2px solid red";
                            return false;
                        } else {
                            //document.getElementById("updateagestatus").style.display = "none";
                            document.getElementById("updatetxtage").style.border = "none";
                            return true;
                        }
                }
        } else {
            document.getElementById("updatetxtage").value = "";
            return false;
        }
    }

// END GETTING AGE VALUE OF THE FACULTY----------------------------------------------------------------->

</script>

</html>

