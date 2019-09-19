<?php
 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "Hotel_App";
 
 
 
 $connection = mysqli_connect($server, $username, $password, $database);
     
 

 if(isset($_POST["eSubmit"])){

   $firstname = $_POST['efirstname'];
   $lastname = $_POST['elastname'];
   $phoneNumber = $_POST['ephoneNumber'];
   $email_address = $_POST['eEmailAddress'];
   $address = $_POST['eAddress'];
   $essn = $_POST['employee_ssn'];

   if($firstname == '' OR $lastname == '' OR $phoneNumber == '' OR $email_address == '' OR $address == '' OR $essn == ''){
      echo "<script>alert('All fields must be filled')</script>";
      //exit();
   }
   else {
 
   $econtact_query = "INSERT INTO Employee_Table (Employee_FirstName, Employee_LastName, Employee_Address, Employee_SSN, Employee_Contact, Employee_EmailAddress) 
   VALUES ('$firstname', '$lastname', '$address', '$essn', '$phoneNumber ', '$email_address')";

   if (mysqli_query($connection, $econtact_query)){
      echo "<script>alert('Contact info has been stored')</script>";
      header('Location: employee2.php');
  } else {
     echo("<script>alert (Error adding your details at this time.</script>");
  }

}
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Hotel-nuvo</title>
      <!-- Css -->
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <nav class="navbar navbar-default color-fill navbar-fixed-top">
         <div class="col-md-12">
            <div class="nav">
               <button class="btn-nav">
               <span class="icon-bar top"></span>
               <span class="icon-bar middle"></span>
               <span class="icon-bar bottom"></span>
               </button>
            </div>
            <a class="navbar-brand" href="index.html"> Hotel-Nuvo</a>
            </a>
            <div class="nav-content hideNav hidden">
               <ul class="nav-list vcenter">
               <li class="nav-item"><a class="item-anchor" href="index.php">Home</a></li>
                  <li class="nav-item"><a class="item-anchor" href="bookings.php">Bookings</a></li>
                  <li class="nav-item"><a class="item-anchor" href="employee.php">Employee</a></li>
                  <li class="nav-item"><a class="item-anchor" href="contact.php">Contact</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <section id="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1>
                     Get access to Hotel Data as an Employee
                     <br>
                     You can modify the amount of rooms, create bookings for clients and so much more  
                  </h1>
                  <br>
               </div>
            </div>
            <br>
            <div class="row margin-top-45">
               <div class="col-md-3">
                  <h2>Employee Personal Info</h2>
               </div>
               <div class="col-md-9">
                  <p>
                     <form method="post">
                        First name:<br>
                        <input type="text" name="efirstname">
                        <br>
                        Last name:<br>
                        <input type="text" name="elastname">
                        <br>
                        PhoneNumber:<br>
                        <input type="tel" name="ephoneNumber">
                        <br>
                        email-Address:<br>
                        <input type="text" name="eEmailAddress">
                        <br>
                        Address:<br>
                        <input type="text" name="eAddress">
                        <br>
                        SSN:<br>
                        <input type="int" name="employee_ssn">
                        <br>
                        <br>
                        <input type="submit" name= "eSubmit" value="Submit"> 
                      </form> 

                  </p>
                  <br>
                  <p>  
                  <a href="employee2.php"> Next Page -> </a>
                  </p>
               </div>
            </div>
            <div class="row margin-top-45">
            </div>
       
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- script -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/modernizr.js"></script>
      <script src="js/script.js"></script>
   </body>
</html>