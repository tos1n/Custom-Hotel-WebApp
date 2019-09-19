<?php
 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "Hotel_App";
 
 $connection = mysqli_connect($server, $username, $password, $database);
      
  //adding hotel to database
  if(isset($_POST["hSumbmit"])){
   
   
   $hotelChainName = $_POST['hotelChainName'];
   $hotelRooms = $_POST['hRooms'];
   $hotelRatings = $_POST['hRatings'];
   $hotelAddress = $_POST['hAddress'];
   $hotelEmails = $_POST['hEmail'];
   $area = $_POST['Hotel_area'];
   $hotelManager = " ".$_POST['hManager'];
   
     
   if($hotelChainName == '' OR $hotelRooms == '' OR $hotelRatings =='' OR  $hotelAddress=='' OR $hotelEmails == ''){ 
      
      echo "<script>alert('All fields with hotel Manager SSN as optional must be filled to add hotels')</script>";

   }
   else {
   
   $hotel_query = "INSERT INTO Hotel(HotelAddress, HotelRooms, HotelEmails, HotelRatings, HotelChain_name, area, Hotel_Manager) 
   VALUES ( '$hotelChainName','$hotelRooms','$hotelEmails','$hotelRatings','$hotelChainName','$area' ,'$hotelManager') ";
   
   $hotelManagerQuery = "INSERT INTO Hotel_Manager (Employee_SSN, HAddress)
   VALUES  ('$hotelManager', '$hotelAddress')";
   

   if ( mysqli_query($connection, $hotel_query) && mysqli_query($connection, $hotelManagerQuery)){
  
   echo "<script>alert('Hotel info has been stored')</script>";
   //header('Location: viewEmployees.php');
  } else {
   
   echo("<script>alert (Error adding your details at this time.</script>");
  }
}
}

//adding hotel Rooms to databases

if(isset($_POST["hotelRoomAdd"])){

   $hotelRoomNumber = $_POST['hotelRoomNumber'];
   $hotelAddress = $_POST['hotelAddress'];
   $hotelRoomCapacity = $_POST['roomCapacity'];
   $Extendabilty= $_POST['extendability'];
   $roomViewType = $_POST['viewtype'];
   $roomPrice = $_POST['roomPrice'];
   $area1 = $_POST['Hotel_area1'];
   
   $Description = $_POST['description'];
   
   $Damages = $_POST['damages'];

   if($hotelRoomNumber == '' OR $hotelAddress == '' OR  $hotelRoomCapacity=='' OR $Extendabilty == '' OR $roomViewType =='' OR  $roomPrice == ''){ 
      echo "<script>alert('All fields must be filled to find hotels')</script>";
   }
   else {
      $hotelRoom_query = "INSERT INTO Room ( RoomNum, Room_ViewType, RoomCapacity, isExtendable, HotelAddress, roomPrice, ifBooked, area) 
      VALUES ('$hotelRoomNumber ', '$roomViewType', '$hotelRoomCapacity', '$Extendabilty', '$hotelAddress', '$roomPrice', 'No', '$area1' )";

     $hotelAmenities_query = "INSERT INTO Amenities ( Description_, RoomNum, RoomAddress) 
      VALUES ('$Description','$hotelRoomNumber','$hotelAddress')";

      $hotelDamages_query = "INSERT INTO Damages ( damageDescription, RoomNum, roomAddress ) 
      VALUES ('$Damages ', '$hotelRoomNumber','$hotelAddress')";


      if (mysqli_query($connection, $hotelRoom_query) && mysqli_query($connection, $hotelAmenities_query) && mysqli_query($connection, $hotelDamages_query)){
         echo "<script>alert('Hotel Room info has been stored')</script>";
         //header('Location: employee2.php');
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
                  <h2>Modify Hotel Info</h2>
               </div>
               <div class="col-md-9">
                  
       
                  <!--form post starting here -->
   
                  <form method="post"> 
                 
                  <!-- Add hotel here --->
                     <fieldset>
                        <legend> Add Hotel:</legend>
                        Hotel Chain Name:<br>
                        <select type="text" name="hotelChainName">
                            <option value="Sheraton">Sheraton</option>
                            <option value="Novotel">Novotel</option>
                            <option value="Stay Inn">Stay Inn</option>
                            <option value="La Quinta">La Quinta</option>
                            <option value="The Westin">The Westin</option><br>
                            <br>
                        </select><br>
                        <br>
                        Hotel Email:<br>
                        <input type="text" name="hEmail"><br>
                        <br>
                        Hotel Ratings:<br>
                        <select type="int" name="hRatings">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                            <br>
                        Hotel Rooms: (Number greater than 5)<br>
                        <select type = "int" name="hRooms">
                            <option value="5"> 5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option><br>
                            <br>
                        </select><br>
                        Hotel Address:<br>
                        <input type="text" name="hAddress"><br>
                        Area/Location:<br>
                        <select type="text" name="Hotel_area">
                            <option value="Ottawa"> Ottawa</option>
                            <option value="Edmonton">Edmonton</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="Calgary">Calgary</option>
                            <option value="Winipeg">Winipeg</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Montreal">Montreal</option>
                            <option value="Mississauga">Mississauga</option>
                        </select><br>
                        Hotel Manager SSN:<br>
                        <input type="int" name="hManager"><br>
                        <br>
                        <input type="submit" name="hSumbmit" value="add">
                        <br>
                     </fieldset>
                     <br>
                     <br>
                     
                     </form>


                     
                     <form method ='post'>

                     <!--Add hotel Rooms-->

                     <fieldset>
                        <legend> Add Hotel Rooms:</legend>
                        Hotel Room Number: <br>
                        <input type="int" name="hotelRoomNumber"><br>
                        Hotel Address: <br>
                        <input type="text" name="hotelAddress"><br>
                        Extendability (Convenience in adding one or more bed):<br>
                        <select type="text" name="extendability"><br>
                            <option value="NULL">----select----</option>
                            <option value="Yes">Yes</option>
                            <option value="NO" >No</option><br>
                        </select><br>
                        Room Capacity:<br>
                        <select type="text" name="roomCapacity">
                            <option value="NULL">----select----</option>
                            <option value="single">Single</option>
                            <option value="double" >Double</option><br>
                        </select><br>
                        Room View Type:<br>
                        <select type= "text" name="viewtype">
                            <option  value="NULL">----select----</option>
                            <option  value="mountain_view">Mountain-View</option>
                            <option  value="sea_view">Sea-View</option> 
                        </select><br>
                        Room Price:<br>
                        <select type= "int" name="roomPrice">
                            <option  value="NULL">----select----</option>
                            <option  value="100">$80</option>
                            <option  value="150">$150</option> 
                            <option  value="200">$200</option>
                            <option  value="300">$300</option>
                            <option  value="400">$400</option> 
                        </select> <br>
                        <br>

                        Area/Location:<br>
                        <select type="text" name="Hotel_area1">
                            <option value="Ottawa"> Ottawa</option>
                            <option value="Edmonton">Edmonton</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="Calgary">Calgary</option>
                            <option value="Winipeg">Winipeg</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Montreal">Montreal</option>
                            <option value="Mississauga"> Mississauga </option>
                        </select><br>


                        Hotel Description<br>
                        <textarea rows ="5" cols ="50" name='description'></textarea><br>
                        <br>
                        
                        Hotel Damages<br>
                        <textarea rows ="5" cols ="50" name='damages'></textarea>

                        <br>
                        <input type="submit" name="hotelRoomAdd" value="add">
                      </fieldset>
                      </form> 
                  </p>
                 <br>
                  <!-- Go to the next page "viewEmployees" -->
                  
                  <p>  
                  <a href="viewEmployees.php"> Next Page -></a>
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

      <script> $(document).ready(function() {
         $("empDisplay").click(function(){
            $("employees").toggle();
         });
      }) </script>
   </body>
</html>