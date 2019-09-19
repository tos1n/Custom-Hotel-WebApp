<?php
 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "Hotel_App";
 
 
 
 $connection = mysqli_connect($server, $username, $password, $database);
     
 //adding customer to database
 if(isset($_POST["cSubmit"])){
   

   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $regDate = $_POST['regDate'];
   $phoneNumber = $_POST['cphoneNumber'];
   $email_address = $_POST['cEmailAddress'];
   $customer_SSN = $_POST['customer_SSN'];

   if($firstname == '' OR $lastname == '' OR $regDate == '' OR $phoneNumber == '' OR $email_address == '' OR $customer_SSN == ''){
      echo ("<script>alert('All fields must be filled')</script>");
      //exit();
   }
   else {
 
   $contact_query = "INSERT INTO Customer (Customer_FirstName, Customer_LastName, cRegistrationDate, cPhoneNumber, cEmailAddress, Customer_id, Customer_SSN) 
    VALUES ('$firstname', '$lastname', '$regDate', '$phoneNumber', '$email_address', 'NULL', '$customer_SSN')";

   
   if (mysqli_query($connection, $contact_query)){
      echo ("<script>alert('Contact info has been stored')</script>");
      //header('Location: bookings2.php');
  } else {
     echo("<script>alert (Error adding your details at this time.</script>");
  }

}
}
// Create a booking !
if(isset($_POST["bookings"])){
   

   $customer_SSN= $_POST['ssnRoom'];
   $RoomNum = $_POST['roomNo'];
   $CheckIn = $_POST['Check-inDate'];
   $CheckOut = $_POST['Check-outDate'];
  

   if($customer_SSN == '' OR $RoomNum == '' OR $CheckIn == '' OR $CheckOut == ''){
      echo ("<script>alert('All fields with customer SSN, Room Number, Check In and Check Out dates must be filled')</script>");
      //exit();
   }
   else {
 
   $booking_query = "INSERT INTO Booking (Customer_SSN, RoomNum, CheckIn, CheckOut, id) 
    VALUES ('$customer_SSN', '$RoomNum', '$CheckIn','$CheckOut', 'NULL')";

    $booking_archive_query = "INSERT INTO BookingArchives( CustomerSSN, RoomNo, CheckIn, CheckOut, id) 
    VALUES ('$customer_SSN', '$RoomNum', '$CheckIn', '$CheckOut', 'NULL')";

   
   if (mysqli_query($connection, $booking_query) && mysqli_query($connection, $booking_archive_query)){
      echo ("<script>alert('Booking has been made')</script>");
      //header('Location: bookings2.php');
  } else {
     echo("<script>alert (Error adding your details at this time.</script>");
     echo("huge error");
  }

}

}

if (isset($_POST["hRSumbmit"])){
   $CheckIn = $_POST['Check-inDate'];
   $CheckOut = $_POST['Check-outDate'];
   
   $RoomCapacity = $_POST['roomCapacity'];
   $Extendabilty= $_POST['extendability'];
   $roomViewType = $_POST['viewtype'];
   $roomPrice = $_POST['roomPrice'];
   $HotelArea = $_POST['area'];
   $HRating = $_POST['hRating'];


   //CREATE TRIGGER `InsertLog` AFTER INSERT ON `Booking` FOR EACH ROW INSERT INTO BookingLogs VALUES(null, NEW.ID, 'INSERTED', NOW());
   
   //CREATE VIEW  `RoomView` AS SELECT RoomNum, RoomCapacity, HotelChain_name FROM Room Hotel
   //Room_ViewType, RoomCapacity, isExtendable, HotelAddress, roomPrice, area
   $sqlDisplayRoomType ="SELECT RoomNum  
                           FROM Room WHERE Room_ViewType = '$roomViewType' AND RoomCapacity = '$RoomCapacity' AND isExtendable = '$Extendabilty' AND roomPrice = $roomPrice AND area = '$HotelArea' 
                           IN( SELECT RoomNum FROM Booking 
                           WHERE Room.RoomNum = RoomNum AND ('$CheckIn' NOT BETWEEN CheckIn AND CheckOut) AND ('$CheckOut'NOT BETWEEN CheckIn AND CheckOut) )";
   
   $results = mysqli_query($connection, $sqlDisplayRoomType);
   
   //if (mysqli_num_row(results)>0)
   if ($results){
      echo "<script> alert('Okay') </script>";
      //header('Location: viewEmployees.php');

      echo"<h3> Rooms Available </h3>";
   
      echo "<div id ='Rooms'; style ='border: 1px solid #40204B; padding: 15px; margin-bottom:10px'>";
      echo "<table>";
      echo "<tr><th> Room Number </th><th> Room View Type </th> <th> Room Capacity </th> <th> Extendability </th> <th> Hotel Address </th> <th> Room Price </th> <th> Area </th></tr>";

   
   while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
      echo "<tr><td>";
      echo $row['RoomNum'];
      echo "</td>";
     
   }
   echo "</table>";
   echo "</div>";
 
   
   } else {
      echo("<script>alert (Error displaying your details at this time.</script>");
      echo("couldn't work");
      
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
            <a class="navbar-brand" href="index.php"> Hotel-Nuvo</a>
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
                     Select Your Ideal Hotel Room from available Hotel Chains
                     <br>
                     We would like to know you better 
                  </h1>
                  <br>
               
               </div>
            </div>
            <br>
            <div class="row margin-top-45">
               <div class="col-md-3">
                  <h2>Personal Info</h2>
               </div>
               <div class="col-md-9">
                  <p>
                     <form method="post">
                        First name:<br>
                        <input type="text" name="firstname"/>
                        <br>
                        <br>
                        Last name:<br>
                        <input type="text" name="lastname"/>
                        <br>
                        <br>
                        Registration Date: <br>
                        <input type="date" name="regDate" placeholder="yyyy-mm-dd"/>
                        <br>
                        <br>
                        PhoneNumber:<br>
                        <input type="tel" name="cphoneNumber"/>
                        <br>
                        <br>
                        email-Address:<br>
                        <input type="text" name="cEmailAddress"/>
                        <br>
                        <br>
                        Customer SSN:<br>
                        <input type="int" name="customer_SSN"/>
                        <input type="submit" name= "cSubmit" value="Submit"/>
                      
                      <br>
                      <br> 

                     
                     <!--- find hotel rooms ---->
         
                        Check-In:<br>
                        <input type="date" name="Check-inDate" placeholder="yyyy-mm-dd"/>
                        <br>
                        Check-Out:<br>
                        <input type="date" name="Check-outDate" placeholder="yyyy-mm-dd"/>
                        <br>
                        <br>

                     <!--- Hotel Stuff -----> 
                     <legend><h2>Search for Rooms</h2></legend>
                     Hotel Area: <br>
                     <select name="area">
                            <option value="Ottawa"> Ottawa</option>
                            <option value="Edmonton">Edmonton</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="Calgary">Calgary</option>
                            <option value="Winipeg">Winipeg</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Montreal">Montreal</option>
                            <option value="Mississauga">Mississauga</option>
                     </select><br>
                     <br>
                        Hotel Ratings: <br>
                        <select type="int" name="hRating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select> <br>
                        <br>
                        Extendability (Convenience in adding one or more bed):<br>
                        <select  type= "text" name="extendability">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select><br>
                        <br>
                        
                        Room Capacity:<br>
                        <select type="text" name="roomCapacity">
                            <option  value="NULL">----select----</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option><br>
                        </select><br>
                        <br>
                        Room View Type:<br>
                        <select type="text" name="viewtype">
                            <option  value="NULL">----select----</option>
                            <option  value="mountain_view">Mountain-View</option>
                            <option  value="sea_view">Sea-View</option> 
                        </select><br>
                        <br>
                        Room Price:<br>
                        <select int ="int" name="roomPrice">
                            <option  value="NULL">----select----</option>
                            <option  value="100">$80</option>
                            <option  value="150">$150</option> 
                            <option  value="200">$200</option>
                            <option  value="300">$300</option>
                            <option  value="400">$400</option> 
                        </select><br>
                        
                        <br>
                        <br>
                        <input type="submit" name="hRSumbmit" value="search">
                        <br>
                        <br>

                        <!----find a room to book-->
                        Enter your customer SSN <br>
                        <input type = int name ="ssnRoom"><br>
                        <br>
                        Enter a room number you would like to book<br>
                        <br>
                        <input type="int" name="roomNo"/>
                        <br>
                        <br>

                        <input type="submit" name= "bookings" value="Book"/>
                       


                      </form> 
                      
                  </p>
                  <br>
                  <p>  
                     Before we get you into a room, you have to fill in a little bit of details
                     <br>
                     <p> Or you can just skip that, what the heck. </p>
                  <a href ="bookings2.php"> Next Page </a>
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