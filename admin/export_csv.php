<?php       
   include 'config.php';

/*##########################################################################*/
// ------------ENROLLMENT CONVERSION TO CSV---------------------------------//
   if(isset($_POST["export"])) 
   {  
      $same_level_section = $_POST['same_level_section'];
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Enrollment report.csv');  
      $output = fopen("php://output", "w");

      fputcsv($output, array('Id', 'Student name', 'Section', 'Adviser', 'Date enrolled'));  //-----------------------table header-----------------------//
 
      //------------------------content---------------------------//     
      $whitespace = " ";    
      $query ="SELECT enrollment.enrollment_id,
      concat(registered_students.student_firstname, '$whitespace', registered_students.student_middlename, '$whitespace', registered_students.student_lastname, '$whitespace',registered_students.student_extname), 
      concat(level_section.level,  '$whitespace - ', level_section.section), 
      concat(faculty.firstname,  '$whitespace', faculty.middlename,  '$whitespace', faculty.lastname),  enrollment.date FROM enrollment INNER JOIN registered_students ON enrollment.student_id=registered_students.stud_Id INNER JOIN level_section ON enrollment.level_section_id=level_section.lev_sec_Id INNER JOIN faculty ON enrollment.faculty_id=faculty.fac_Id WHERE enrollment.level_section_id = '$same_level_section' ORDER BY student_lastname ASC";
      
      $result = mysqli_query($conn,$query);
      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);  
      }  
      fclose($output);  
   } 
// ------------END ENROLLMENT CONVERSION TO CSV-----------------------------//
/*##########################################################################*/




/*##########################################################################*/
// ------------FACULTY CONVERSION TO CSV------------------------------------//

if(isset($_POST["faculty_export"])) 
   {  
      $same_level = $_POST['faculty_level'];
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Faculty report.csv');  
      $output = fopen("php://output", "w");

      fputcsv($output, array('Id', 'Name of Teacher', 'Advisory'));  //-----------------------table header-----------------------//
 
      //------------------------content---------------------------//     
      $whitespace = " ";   
      

      $query ="SELECT faculty.fac_Id,
      concat(faculty.firstname, '$whitespace', faculty.middlename, '$whitespace', faculty.lastname), 
      concat(level_section.level,  '$whitespace - ', level_section.section) FROM faculty INNER JOIN level_section ON faculty.level_section_id=level_section.lev_sec_Id WHERE level_section.level = '$same_level' ORDER BY lastname ASC";

      $result = mysqli_query($conn,$query);
      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);  
      }  
      fclose($output);  
   } 

// ------------END FACULTY CONVERSION TO CSV--------------------------------//
/*##########################################################################*/ 
?>  