<div class="" id="junior"> 
        <form action="" method="POST" enctype="multipart/form-data">
                <div class="row" id="junior_type_option">
                    <div class="form-group col-md-6">
                        <label>Student type</label>
                        <select class="form-control form-select junior_type" name="student_type" required>
                            <option value="" selected="" disabled>Select Student Type</option>
                            <option value ="New">New</option>
                            <option value ="Regular">Regular</option>
                            <option value ="Returnee">Returnee</option>
                            <option value ="Transferee">Transferee</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Learner Reference Number</label>
                        <input type="number" class="form-control" name="lrn"  placeholder="Learner Reference Number"  autocomplete="off" required>
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
                        <label>Ext.(Jr./Sr.)</label>
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
                        <input type="Date" class="form-control"  name="dob"  autocomplete="off" id="txtbirthdate" onchange="getAgeVal(0)" onblur="getAgeVal(0);" required>
                    </div>
                    <div class="form-group col-md-4">                               
                        <label>Age</label>
                        <input type="text" class="form-control"  name="age"  placeholder="Age" autocomplete="off" id="txtage" required  readonly>
                        <span id="agestatus"><b>Age must be at least 12yrs old and above.</b></span>
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
                        <input type="text" class="form-control" name="father"         placeholder="Father's name..."  autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name/ First name/ Middle name</label>
                        <input type="text" class="form-control" name="mother"         placeholder="Mother's name..."  autocomplete="off" required>
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
                    <div class="form-group col-md-6" id="junior_year_level">
                        <label>Last grade level completed</label>
                        <select class="form-control form-select" name="lastgradelevel" required>
                            <option value="" selected="" disabled="">Select student type first</option>
                            <option value="Grade 6"  class="hidden" id="last_Grade_6">Grade 6</option>
                            <option value="Grade 7"  class="hidden" id="last_Grade_7">Grade 7</option>
                            <option value="Grade 8"  class="hidden" id="last_Grade_8">Grade 8</option>
                            <option value="Grade 9"  class="hidden" id="last_Grade_9">Grade 9</option>
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
                    <div class="form-group col-md-6" id="enroll_junior_year_level">
                        <label>Year level</label>
                        <select class="form-control form-select" name="level_to_enroll" required>
                            <option value="" selected="" disabled="">Select student type first</option>
                            <option value="Grade 6"  class="hidden" id="enroll_Grade_6">Grade 6</option>
                            <option value="Grade 7"  class="hidden" id="enroll_Grade_7">Grade 7</option>
                            <option value="Grade 8"  class="hidden" id="enroll_Grade_8">Grade 8</option>
                            <option value="Grade 9"  class="hidden" id="enroll_Grade_9">Grade 9</option>
                            <option value="Grade 10" class="hidden" id="enroll_Grade_10">Grade 10</option>  
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
                <div class="modal-footer mt-3">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary" name="save_junior" id="junior-save-btn"><i class="bi bi-save2"></i> Save</button>
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal" id="junior-cancel-btn"><i class="bi bi-x-square"></i> Close</button>
                </div>              
            </form>
</div>


<!-- FOR JUNIOR HIGH SCHOOL -->
<script>
    $('.junior_type').change(function(){
    var stud_type = $(this).val();
    if(stud_type =="New") {
            $('#last_Grade_6').removeClass("hidden");
            $('#last_Grade_6').addClass("show"); 

            $('#last_Grade_7').removeClass("show");
            $('#last_Grade_7').addClass("hidden");
            $('#enroll_Grade_7').removeClass("hidden");
            $('#enroll_Grade_7').addClass("show");

            $('#last_Grade_8').removeClass("show");
            $('#last_Grade_8').addClass("hidden");
            $('#enroll_Grade_8').removeClass("show");
            $('#enroll_Grade_8').addClass("hidden");

            $('#last_Grade_9').removeClass("show")
            $('#last_Grade_9').addClass("hidden");
            $('#enroll_Grade_9').removeClass("show")
            $('#enroll_Grade_9').addClass("hidden");

            $('#last_Grade_10').removeClass("show")
            $('#last_Grade_10').addClass("hidden");
            $('#enroll_Grade_10').removeClass("show")
            $('#enroll_Grade_10').addClass("hidden");

    } else if(stud_type =="Transferee" || stud_type =="Returnee") {
            $('#last_Grade_6').removeClass("hidden");
            $('#last_Grade_6').addClass("show");

            $('#last_Grade_7').removeClass("hidden");
            $('#last_Grade_7').addClass("show");
            $('#enroll_Grade_7').removeClass("hidden");
            $('#enroll_Grade_7').addClass("show");

            $('#last_Grade_8').removeClass("hidden");
            $('#last_Grade_8').addClass("show");
            $('#enroll_Grade_8').removeClass("hidden");
            $('#enroll_Grade_8').addClass("show");

            $('#last_Grade_9').removeClass("hidden");
            $('#last_Grade_9').addClass("show");
            $('#enroll_Grade_9').removeClass("hidden");
            $('#enroll_Grade_9').addClass("show");

            $('#last_Grade_10').removeClass("hidden");
            $('#last_Grade_10').addClass("show");
            $('#enroll_Grade_10').removeClass("hidden");
            $('#enroll_Grade_10').addClass("show");
    } else if(stud_type =="Regular"){
            $('#last_Grade_6').removeClass("show");
            $('#last_Grade_6').addClass("hidden");
            $('#enroll_Grade_6').removeClass("show");
            $('#enroll_Grade_6').addClass("hidden");

            $('#last_Grade_7').removeClass("hidden");
            $('#last_Grade_7').addClass("show");
            $('#enroll_Grade_7').removeClass("show");
            $('#enroll_Grade_7').addClass("hidden");

            $('#last_Grade_8').removeClass("hidden");
            $('#last_Grade_8').addClass("show");
            $('#enroll_Grade_8').removeClass("hidden");
            $('#enroll_Grade_8').addClass("show");

            $('#last_Grade_9').removeClass("hidden");
            $('#last_Grade_9').addClass("show");
            $('#enroll_Grade_9').removeClass("hidden");
            $('#enroll_Grade_9').addClass("show");

            $('#last_Grade_10').removeClass("hidden");
            $('#last_Grade_10').addClass("show");
            $('#enroll_Grade_10').removeClass("hidden");
            $('#enroll_Grade_10').addClass("show");
    } else {
            
    }
            //console.log(responseID);

</script>

<script>
    $('.junior_type').change(function(){
    var junior_type = $(this).val();
    if(junior_type =="New" || junior_type =="New") {

            $('#last_Grade_6').removeClass("hidden");
            $('#last_Grade_6').addClass("show"); 

            $('#last_Grade_7').removeClass("show");
            $('#last_Grade_7').addClass("hidden");
            $('#enroll_Grade_7').removeClass("hidden");
            $('#enroll_Grade_7').addClass("show");

            $('#last_Grade_8').removeClass("show");
            $('#last_Grade_8').addClass("hidden");
            $('#enroll_Grade_8').removeClass("show");
            $('#enroll_Grade_8').addClass("hidden");

            $('#last_Grade_9').removeClass("show")
            $('#last_Grade_9').addClass("hidden");
            $('#enroll_Grade_9').removeClass("show")
            $('#enroll_Grade_9').addClass("hidden");

            $('#last_Grade_10').removeClass("show")
            $('#last_Grade_10').addClass("hidden");
            $('#enroll_Grade_10').removeClass("show")
            $('#enroll_Grade_10').addClass("hidden");

    } else if(junior_type =="Transferee" || junior_type =="Returnee" ) {
           
            $('#last_Grade_6').removeClass("hidden");
            $('#last_Grade_6').addClass("show");

            $('#last_Grade_7').removeClass("hidden");
            $('#last_Grade_7').addClass("show");
            $('#enroll_Grade_7').removeClass("hidden");
            $('#enroll_Grade_7').addClass("show");

            $('#last_Grade_8').removeClass("hidden");
            $('#last_Grade_8').addClass("show");
            $('#enroll_Grade_8').removeClass("hidden");
            $('#enroll_Grade_8').addClass("show");

            $('#last_Grade_9').removeClass("hidden");
            $('#last_Grade_9').addClass("show");
            $('#enroll_Grade_9').removeClass("hidden");
            $('#enroll_Grade_9').addClass("show");

            $('#last_Grade_10').removeClass("hidden");
            $('#last_Grade_10').addClass("show");
            $('#enroll_Grade_10').removeClass("hidden");
            $('#enroll_Grade_10').addClass("show");

            
            $('#enroll_senior_Grade_12').removeClass("hidden");
            $('#enroll_senior_Grade_12').addClass("show");

    } else if(junior_type =="Regular"){
            $('#last_Grade_6').removeClass("show");
            $('#last_Grade_6').addClass("hidden");
            $('#enroll_Grade_6').removeClass("show");
            $('#enroll_Grade_6').addClass("hidden");

            $('#last_Grade_7').removeClass("hidden");
            $('#last_Grade_7').addClass("show");
            $('#enroll_Grade_7').removeClass("show");
            $('#enroll_Grade_7').addClass("hidden");

            $('#last_Grade_8').removeClass("hidden");
            $('#last_Grade_8').addClass("show");
            $('#enroll_Grade_8').removeClass("hidden");
            $('#enroll_Grade_8').addClass("show");

            $('#last_Grade_9').removeClass("hidden");
            $('#last_Grade_9').addClass("show");
            $('#enroll_Grade_9').removeClass("hidden");
            $('#enroll_Grade_9').addClass("show");

            $('#last_Grade_10').removeClass("hidden");
            $('#last_Grade_10').addClass("show");
            $('#enroll_Grade_10').removeClass("hidden");
            $('#enroll_Grade_10').addClass("show");
    } else {
            
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
// JUNIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->
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

// END JUNIOR HIGH GETTING AGE VALUE----------------------------------------------------------------->
</script>