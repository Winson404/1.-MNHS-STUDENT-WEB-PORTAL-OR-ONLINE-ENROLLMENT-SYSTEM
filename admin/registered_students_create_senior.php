<div class="hidden" id="senior"> 
        <form action="" method="POST" enctype="multipart/form-data">

                
                <!-- FOR SENIOR HIGH SCHOOL STUDENT_TYPE -->
                <div class="row " id="senior_type_option">
                    <div class="form-group col-md-6">
                        <label>Student type</label>
                        <select class="form-control senior_type form-select" name="student_type" required>
                            <option value="" selected="" disabled>Select Student Type</option>
                            <option value ="Regular">Regular</option>
                            <option value ="Returnee">Returnee</option>
                            <option value ="Transferee">Transferee</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Learner Reference Number</label>
                        <input type="number" class="form-control" name="lrn" placeholder="Learner Reference Number" autocomplete="off" required>
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label class="hidden">Roll number</label>
                        <input type="text" class="form-control hidden" name="rollnumber" id="rollnumber" value="<?php echo $number;?>" readonly>
                    </div> -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="bg-info p-2 mt-4"><b>Student information</b></h5>
                    </div>
                    <div class="form-group col-md-6">                                      
                        <label>First name</label>
                        <input type="text" class="form-control" name="firstname"  placeholder="First name"  autocomplete="off" required>
                    </div>                                   
                    <div class="form-group col-md-6">                                        
                        <label>Middle name</label>
                        <input type="text" class="form-control" name="middlename" placeholder="Middle name" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="lastname"   placeholder="Last name"   autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Ext. (Jr./Sr.)</label>
                        <input type="text" class="form-control" name="extname"    placeholder="Jr./Sr."   autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Gender</label>
                        <select class="form-control form-select" name="gender" required>
                            <option value="" selected="" disabled>Choose your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>         
                </div>
                <div class="row">
                    <div class="form-group col-md-4">                 
                        <label>Date of Birth</label>
                        <input type="Date" class="form-control"  name="dob"  autocomplete="off" id="txtbirthdates" onchange="getAgeVals(0)" onblur="getAgeVals(0);" required>
                    </div>
                    <div class="form-group col-md-4">                               
                        <label>Age</label>
                        <input type="text" class="form-control"  name="age"  placeholder="Age" autocomplete="off" id="txtages" required  readonly>
                        <span id="agestatuss"><b>Age must be at least 12yrs old and above.</b></span>
                    </div>   
                    <div class="form-group col-md-4">
                        <label>Contact number</label>
                        <input type="number" class="form-control"  name="contact" placeholder="9123456789" pattern="[7-9]{1}[0-9]{9}" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email"   placeholder="sample@gmail.com" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password"  autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" name="cpassword" autocomplete="off" required>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="bg-info p-2 mt-4"><b>Address</b></h5>
                    </div>
                    <div class="form-group col-md-10">
                        <label>House number/Barangay/Municipality/Province</label>
                        <input type="text" class="form-control" name="address"  placeholder="Home Address" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Zipcode</label>
                        <input type="number" class="form-control" name="zipcode"  placeholder="Zipcode" autocomplete="off" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="bg-info p-2 mt-4"><b>Parent's information</b></h5>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name/ First name Middle name</label>
                        <input type="text" class="form-control" name="father" placeholder="Father's name..."  autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name/ First name/ Middle name</label>
                        <input type="text" class="form-control" name="mother" placeholder="Mother's name..."  autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Contact number</label>
                        <input type="number" class="form-control" name="parentscontact" placeholder="9123456789" pattern="[7-9]{1}[0-9]{9}" autocomplete="off" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="bg-info p-2 mt-4"><b>School information last attended</b></h5>
                    </div>
                   
                    <!-- FOR SENIOR HIGH SCHOOL -->
                    <div class="form-group col-md-6" id="senior_year_level">
                        <label>Last grade level completed</label>
                        <select class="form-control form-select" name="lastgradelevel" required>
                            <option value="" selected="" disabled="">Select student type first</option>
                            <option value="Grade 10" class="hidden" id="senior_last_Grade_10">Grade 10</option> 
                            <option value="Grade 11" class="hidden" id="senior_last_Grade_11">Grade 11</option>                   
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last school year completed</label>
                        <select class="form-control form-select" name="lastschoolyear" required>
                            <option value="" selected="" disabled="">Select school year</option> 
                            <option value="2015-2016">2015-2016</option>
                            <option value="2016-2017">2016-2017</option>
                            <option value="2017-2018">2017-2018</option>
                            <option value="2018-2019">2018-2019</option>
                            <option value="2019-2020">2019-2020</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2022-2023">2022-2023</option>
                            <option value="2023-2024">2023-2024</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>School name last attended</label>
                        <input type="text" class="form-control" name="schoolname"     placeholder="School Name..." autocomplete="off" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="bg-info p-2 mt-4"><b>School Information To Enroll</b></h5>
                    </div>             
                    <div class="form-group col-md-6" id="enroll_senior_year_level">
                        <label>Year level</label>
                        <select class="form-control form-select" name="level_to_enroll" required>
                            <option value="" selected="" disabled="">Select student type first</option> 
                            <option value="Grade 11" class="hidden" id="enroll_senior_Grade_11">Grade 11</option>
                            <option value="Grade 12" class="hidden" id="enroll_senior_Grade_12">Grade 12</option> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Name of School</label>                 
                        <input type="text" class="form-control" name="school_to_enroll" value="Medellin National High School"  autocomplete="off" readonly>      
                    </div>
                    <div class="form-group col-md-6">
                        <label>School Address</label>
                        <input type="text" class="form-control" name="school_add_to_enroll" value="Poblacion, Medellin, Cebu" autocomplete="off" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Upload image (2MB in size or lower)</label>
                        <input type="file" class="form-control" name="fileToUpload" required>
                    </div>
                </div>
                 <div class="" id="senior">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="bg-info p-2 mt-4"><b>For Learners in Senior High School</b></h5>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Semester</label>
                                <select class="form-control form-select" name="semester">
                                <option value="" selected="" disabled>Select semester</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Academic Track</label>
                                <select class="form-control form-select" name="track">
                                    <?php
                                        include 'config.php';
                                        $fetch = mysqli_query($conn, "SELECT course_name FROM courses");
                                        while ($row=mysqli_fetch_array($fetch)) {
                                    ?>
                                    <option value="<?php echo $row['course_name']; ?>"><?php echo $row['course_name']; ?></option>
                                    <?php 
                                        } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6" >
                                <label>Academic Strand (If any)</label>
                                <input type="text" class="form-control" name="strand" placeholder="Academic Strand ..." autocomplete="off">
                            </div>
                           
                        </div>
                    </div>    
                <div class="modal-footer mt-3">
                    <br>
                    <br>
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal" id="senior-cancel-btn"><i class="bi bi-x-square"></i> Close</button>
                    <button type="submit" class="btn btn-primary" name="save_senior" id="senior-save-btn"><i class="bi bi-save2"></i> Save</button>              
                </div>               
            </form>
            </div>



<!-- FOR SENIOR HIGH SCHOOL -->
<script>
    $('.senior_type').change(function(){
    var senior_type = $(this).val();
    if(senior_type =="Regular" || senior_type =="Returnee") {

            $('#senior_last_Grade_10').removeClass("hidden");
            $('#senior_last_Grade_10').addClass("show"); 

            $('#senior_last_Grade_11').removeClass("hidden");
            $('#senior_last_Grade_11').addClass("show"); 
            $('#enroll_senior_Grade_11').removeClass("hidden");
            $('#enroll_senior_Grade_11').addClass("show");

            
            $('#enroll_senior_Grade_12').removeClass("hidden");
            $('#enroll_senior_Grade_12').addClass("show"); 

    } else if(senior_type =="Transferee" ) {
           
            $('#senior_last_Grade_10').removeClass("hidden");
            $('#senior_last_Grade_10').addClass("show"); 

            $('#senior_last_Grade_11').removeClass("hidden");
            $('#senior_last_Grade_11').addClass("show"); 
            $('#enroll_senior_Grade_11').removeClass("hidden");
            $('#enroll_senior_Grade_11').addClass("show");

            
            $('#enroll_senior_Grade_12').removeClass("hidden");
            $('#enroll_senior_Grade_12').addClass("show");

    } else {
           
            $('#senior_last_Grade_10').removeClass("hidden");
            $('#senior_last_Grade_10').addClass("show"); 

            $('#senior_last_Grade_11').removeClass("hidden");
            $('#senior_last_Grade_11').addClass("show"); 
            $('#enroll_senior_Grade_11').removeClass("hidden");
            $('#enroll_senior_Grade_11').addClass("show");

            
            $('#enroll_senior_Grade_12').removeClass("hidden");
            $('#enroll_senior_Grade_12').addClass("show"); 
    }
            //console.log(responseID);
            });
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
// SENIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->
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

// SENIOR HIGH GETTING AGE VALUE--------------------------------------------------------------------->
// -------------------------------------------------------------------------------------------------->
 function getAgeVals(pid) {
        var birthdate = formatDate(document.getElementById("txtbirthdates").value);
        var count = document.getElementById("txtbirthdates").value.length;
        if (count=='10') {
                var age = getAge(birthdate);
                var str = age;
                var res = str.substring(0, 1);
                if (res =='-' || res =='0') {
                    document.getElementById("txtbirthdates").value = "";
                    document.getElementById("txtages").value = "";
                    $('#txtbirthdates').focus();
                    return false;
                } else {
                        document.getElementById("txtages").value = age;
                        // DISPLAYING AUTOMATICALLY THE ERROR MESSAGE IF AGE IS LESS THAN 12 YEARS OLD
                        if(document.getElementById("txtages").value == "") {
                            document.getElementById("agestatuss").style.display = "block";
                            return false;
                        } else {
                            document.getElementById("agestatuss").style.display = "none";
                            return true;
                        }
                }
        } else {
            document.getElementById("txtages").value = "";
            return false;
        }
    }
// END SENIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->
</script>
