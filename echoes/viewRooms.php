<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "Hotel_App";

$connection = mysqli_connect($server, $username, $password, $database);

//Room  Capacity of rooms in a hotel
if (isset($_POST["viewHotels"])){
   $HotelAddress = $_POST['UhotelAddress'];
   $HotelChainNameStable = $_POST['UhotelChainName'];

   
   
   $sqlDisplayRoom="SELECT RoomNum, RoomCapacity FROM Room
                     WHERE HotelAddress = '$HotelAddress'";
   
   $RoomResults = mysqli_query($connection, $sqlDisplayRoom);
   
   
   //if (mysqli_num_row(results)>0)
   if ($RoomResults){
      echo "<script> alert('Okay') </script>";
      //header('Location: viewEmployees.php');

      echo"<h3> Hotels </h3>";
   
      echo "<div id ='viewHotels'; style ='border: 1px solid #40204B; padding: 15px; margin-bottom:10px'>";
      echo "<table>";
      echo "<tr><th> Room Number </th> <th> Room Capacity </th> </tr>";

   
   while($row = mysqli_fetch_array($RoomResults, MYSQLI_ASSOC)){
      echo "<tr><td>";
      echo $row['RoomNum'];
      echo "</td><td>";
      echo $row['RoomCapacity'];
      echo "</td>";
   }
   echo "</table>";
   echo "</div>";
 
   
   } else {
      echo("<script>alert (Error displaying your details at this time.</script>");
      echo("it didn't work");
      echo("it didn't work");
      echo("it didn't work");
      echo("it didn't work");
      echo("it didn't work");
      echo("it didn't work");
      
   }      
}

if (isset($_POST["displayHotelArea"])){
    $HotelArea = $_POST['Carea'];
    
    $sqlDisplayHotels="SELECT RoomNum, noOfHotels FROM Hotel, HotelChain 
    WHERE Hotel.area = $HotelArea";
    $HotelResultsArea = mysqli_query($connection, $sqlDisplayHotels);
    
    
    //if (mysqli_num_row(results)>0)
    if ($HotelResultsArea){
       echo "<script> alert('Okay') </script>";
       //header('Location: viewEmployees.php');
 
       echo"<h3> Hotels </h3>";
    
       echo "<div id ='viewHotels'; style ='border: 1px solid #40204B; padding: 15px; margin-bottom:10px'>";
       echo "<table>";
       echo "<tr><th> Number of rooms </th><</tr>";
 
    
    while($row = mysqli_fetch_array($HotelResults, MYSQLI_ASSOC)){
       echo "<tr><td>";
       echo $row['No Of Rooms'];
       echo "</td>";
    }
    echo "</table>";
    echo "</div>";
  
    
    } else {
       echo("<script>alert (Error displaying your details at this time.</script>");
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
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  

               </div>
            </div>
            <div class="row margin-top-45">
               <div class="col-md-12">
               
               <form method="post">
               
               <p>To find no of rooms per Hotel</p>
               
               Hotel Address:&nbsp;
                  <input type="text" name="UhotelAddress"> 
                  &nbsp;

               Hotel Chain Name:&nbsp;

                <select input type ="text" name="UhotelChainName">
                            <option value="Sheraton">Sheraton</option>
                            <option value="Novotel">Novotel</option>
                            <option value="Stay Inn">Stay Inn</option>
                            <option value="La Quinta">La Quinta</option>
                            <option value="The Westin">The Westin</option> <br>
                            <br>
                        </select> &nbsp;
                <input type="submit" id="viewHotelsp" name="viewHotels" value= "View Employees" >
                <br>
                <br>
                <a href ="viewEmployees.php"> Go Back </a>

            
            <!---No of rooms per area--->
            <p>No of rooms per area</p>
            
            Hotel Area:&nbsp;
                  <select input type = "text" name="Carea">
                            <option value="Ottawa"> Ottawa</option>
                            <option value="Edmonton">Edmonton</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="Calgary">Calgary</option>
                            <option value="Winipeg">Winipeg</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Montreal">Montreal</option>
                            <option value="Mississauga">Mississauga</option>
                  </select>&nbsp;
                  &nbsp;
                  <input type="submit" name= "displayHotelArea" value="Hotel Area"> &nbsp;

            </form>




                

                 
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