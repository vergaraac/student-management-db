<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="design.css">

</head>
<body>

<div class="row">
  <div class="column left">
    <ul class="ba"> 
      <li> <a href="menu.php">Student</a></li>
      <li> Program </li>
      <li> Course </li>
      <li> Instructor </li>
      <li> Grade </li>
    </div>

  <div class="column right">
    </br>
    <div class = "labelcontainer"><p class ="label">Student / Delete Student</p></div>

      <?php 
      
      include "sql-db-connect.php"; // php file to connect to database 

      $id = $_GET['id'];
  
      //query part to take row with equivalent student number for deletion

      $sql = "SELECT * FROM `tblstudent` 
      WHERE `fldindex` = $id";
      $result = $con->query($sql);
      if ($result->num_rows > 0) {
      // outputs the row data with fldindex equal to the associated id 
      while($row = $result->fetch_assoc()) {

      ?>

    <form method="post">
      <table class='formtable'>
      <tr>
      <th>Student No.:</th>
      <input type='hidden' value ='<?php echo $row['fldindex']?>' name="index" />
      <th><input type='text' name='StudentNum' value="<?php echo $row["fldstudentno"] ?>" placeholder='Student Number' class = "input-readonly" readonly></th>
      </tr>
      <tr>
      <th>Last Name:</th>
      <th><input type='text' name='LastName' value="<?php echo $row["fldlastname"] ?>" placeholder='Last Name' class = "input-readonly" readonly></th>
      </tr>
      <tr>
      <th>First Name:</th>
      <th><input type='text' name='FirstName' value="<?php echo $row["fldfirstname"] ?>" placeholder='First Name' class = "input-readonly" readonly></th>
      </tr>
      <tr>
      <th>Middle Name:</th>
      <th><input type='text' name='MiddleName' value="<?php echo $row["fldmiddlename"] ?>" placeholder='Middle Name' class = "input-readonly" readonly></th>
      </tr>
      <tr>
      <th>Gender:</th>
      <th><input type='text' name='Gender' value="<?php echo $row["fldgender"] ?>" placeholder='Gender' class = "input-readonly" readonly></th>
      </tr>
      </table>
      <div class = 'labelcontainer '>
      <input type='submit' class ='bottombuttons' name='deletebutton' value='Delete Student' onclick="action='deletestudent-sql.php'" /> 
      <input type='submit' value='Cancel' onclick="action='menu.php'" />
      </div> 
      </form>
      <?php
        }
      }
      ?>
</div>

</body>
</html>
