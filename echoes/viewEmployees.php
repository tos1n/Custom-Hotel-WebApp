<?php
   $server = "localhost";
   $username = "root";
   $password = "";
   $database = "Hotel_App";
   
   $connection = mysqli_connect($server, $username, $password, $database);

   //View Employees
   
   if (isset($_POST["empSubmit"])){
      $sqlDisplayEmployees="SELECT * FROM Employee_Table";
      $results = mysqli_query($connection, $sqlDisplayEmployees);
      
      
      //if (mysqli_num_row(results)>0)
      if ($results){
         echo "<script> alert('Okay') </script>";
         //header('Location: viewEmployees.php');

         echo"<h3> Employees </h3>";
      
         echo "<div id ='ViewEmployees'; style ='border: 1px solid #40204B; padding: 15px; margin-bottom:10px'>";
         echo "<table>";
         echo "<tr><th> Employee First Name </th><th> Employee Last Name </th> <th> Employee_Address </th> <th> Employee_SSN </th> <th> Employee Contact </th> <th> Employee Email Address</th></tr>";

      
      while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
         echo "<tr><td>";
         echo $row['Employee_FirstName'];
         echo "</td><td>";
         echo $row['Employee_LastName'];
         echo "</td> <td>";
         echo $row['Employee_Address'];
         echo "</td><td>";
         echo $row['Employee_SSN'];
         echo "</td><td>";
         echo $row['Employee_Contact'];
         echo "</td><td>";
         echo $row['Employee_EmailAddress'];
         echo "</td> <td>";
      
      }
      echo "</table>";
      echo "</div>";
    
      
      } else {
         echo("<script>alert (Error displaying your details at this time.</script>");
      }      
   }
   //Delete All Employees
   if(isset($_POST["deleteEmployee"])){
      

      //Names to use to identify shit to change
      $essn = $_POST['employee_ssn0'];   
      
      if($essn == ''){
         echo "<script>alert('The field must be filled to delete employee')</script>";
         //exit();
      }
      else {
      $employeeDelete_query = "DELETE FROM Employee_Table WHERE Employee_SSN = $essn";
   
      if (mysqli_query($connection, $employeeDelete_query)){
         echo "<script>alert('Employee info has been deleted ')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error deleting your details at this time.</script>");
     }
   
   }
   //Update Employee Submit
   }
   if(isset($_POST["updateEmployeeSubmit"])){

      $essn = $_POST['employee_ssn0'];

      $ChangeFirstname = $_POST['eCfirstname'];
      $ChangeLastname = $_POST['eClastname'];
      $ChangePhoneNumber = $_POST['eCphoneNumber'];
      $ChangeEmail_address = $_POST['eCEmailAddress'];
      $ChangeAddress = $_POST['eCAddress'];
   
      if($essn == ''){
         echo "<script>alert('The field must be filled to update employee')</script>";
         //exit();
      }
      else {
    
      $employeeUpdate_query = "UPDATE Employee_Table SET Employee_FirstName = '$ChangeFirstname', Employee_LastName = '$ChangeLastname', Employee_Address = '$ChangeAddress', Employee_Contact ='$ChangePhoneNumber', Employee_EmailAddress = '$ChangeEmail_address' 
      WHERE Employee_SSN = $essn";
   
      if (mysqli_query($connection, $employeeUpdate_query)){
         echo "<script>alert('Employee info has been stored')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }
  
//update employee name  -----------------------------------------------
   if(isset($_POST["updateEmployeeName"])){
      $essn1 = $_POST['employee_ssn0'];
      $ChangeFirstname1 = $_POST['eCfirstname'];
      $ChangeLastname1 = $_POST['eClastname'];
      
   
      if($essn1 == ''){
         echo "<script>alert('The ssn field must be filled to update employee')</script>";
         //exit();
      }
      else {
    
      $employeeUpdateName_query = "UPDATE Employee_Table SET Employee_FirstName = '$ChangeFirstname1', Employee_LastName = '$ChangeLastname1'
      WHERE Employee_SSN = $essn1";
   
      if (mysqli_query($connection, $employeeUpdateName_query)){
         echo "<script>alert('Employee name has been updated')</script>";
         //header('Location: viewEmployees.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }

   //Update Employee Contact------------------------------------
   if(isset($_POST["updateEmployeeContact"])){
      $essn2 = $_POST['employee_ssn0'];
      $ChangePhoneNumber1 = $_POST['eCphoneNumber'];
      $ChangeEmail_address1 = $_POST['eCEmailAddress'];

   
      if($essn2 == ''){
         echo "<script>alert('The ssn field must be filled to update employee')</script>";
         //exit();
      }
      else {
    
      $employeeUpdateContact_query =  "UPDATE Employee_Table SET Employee_Contact ='$ChangePhoneNumber1', Employee_EmailAddress = '$ChangeEmail_address1' 
      WHERE Employee_SSN = $essn2";
   
      if (mysqli_query($connection, $employeeUpdateContact_query )){
         echo "<script>alert('Employee contact has been updated')</script>";
         //header('Location: viewEmployees.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }
   //Change Employee Address info-------------------------------
   if(isset($_POST["updateEmployeeAddress"])){
      $essn3 = $_POST['employee_ssn0'];
      $ChangeAddress1 = $_POST['eCAddress'];
   
      if($essn3 == ''){
         echo "<script>alert('The ssn field must be filled to update employee')</script>";
         //exit();
      }
      else {
    
      $employeeUpdateAddress_query = "UPDATE Employee_Table SET Employee_Address ='$ChangeAddress1' 
      WHERE Employee_SSN = $essn3";
   
      if (mysqli_query($connection, $employeeUpdateAddress_query )){
         echo "<script>alert('Employee Address has been updated')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }

   //View Hotels---------------------------------------------------

   if (isset($_POST["viewHotels"])){
      $sqlDisplayHotels="SELECT HotelAddress, HotelRooms, HotelEmails, HotelRatings, HotelChain_name, area, Hotel_Manager FROM Hotel";
      $HotelResults = mysqli_query($connection, $sqlDisplayHotels);
      
      
      //if (mysqli_num_row(results)>0)
      if ($HotelResults){
         echo "<script> alert('Okay') </script>";
         //header('Location: viewEmployees.php');

         echo"<h3> Hotels </h3>";
      
         echo "<div id ='viewHotels'; style ='border: 1px solid #40204B; padding: 15px; margin-bottom:10px'>";
         echo "<table>";
         echo "<tr><th> Hotel Address </th><th> Employee Rooms </th> <th> Hotel Emails </th> <th> Hotel Ratings </th> <th> Hotel_Chain Name </th> <th> Hotel Area</th><th> Hotel Manager</th> </tr>";

      
      while($row = mysqli_fetch_array($HotelResults, MYSQLI_ASSOC)){
         echo "<tr><td>";
         echo $row['HotelAddress'];
         echo "</td><td>";
         echo $row['HotelRooms'];
         echo "</td> <td>";
         echo $row['HotelEmails'];
         echo "</td><td>";
         echo $row['HotelRatings'];
         echo "</td><td>";
         echo $row['HotelChain_name'];
         echo "</td> <td>";
         echo $row['area'];
         echo "</td> <td>";
         echo $row['Hotel_Manager'];
         echo "</td>";
      
      }
      echo "</table>";
      echo "</div>";
    
      
      } else {
         echo("<script>alert (Error displaying your details at this time.</script>");
      }      
   }
   
   //delete hotels
   if(isset($_POST["deleteHotel"])){

      //Names to use to identify stuff to change
      $HotelAddressStable1 = $_POST['UhotelAddress'];
      $HotelChainNameStable1 = $_POST['UhotelChainName'];
      $HotelArea1 = $_POST['Uarea'];
   
      if($HotelAddressStable1 == '' OR $HotelChainNameStable1 == '' OR $HotelArea1 == ''){
         echo "<script>alert('These Hotel fields must be filled to delete hotel')</script>";
         //exit();
      }
      else {
    
      $deleteHotel_query = "DELETE FROM Hotel 
      WHERE HotelAddress = '$HotelAddressStable1' AND HotelChain_name = '$HotelChainNameStable1' AND area = '$HotelArea1'";
      
   
      if (mysqli_query($connection, $deleteHotel_query)){
         echo "<script>alert('Hotel info has been deleted')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
        echo("Damn it didn't go hunh");
     }
   }
   }


   //Update All Hotel Variables------------------------------------------>
   
   if(isset($_POST["updateHotelSubmit"])){
      //Names to use to identify shit to change
   $HotelAddressStable = $_POST['UhotelAddress'];
   $HotelChainNameStable = $_POST['UhotelChainName'];
   $HotelAreaStable = $_POST['Uarea'];


   //Things we are changing
   $HotelAddress = $_POST['CAddress'];
   $NoOfHotelRooms = $_POST['ChRooms'];
   $HotelEmails = $_POST['CEmails'];
   $HotelRatings = $_POST['ChRating'];
   $HotelArea = $_POST['Carea'];
   $HotelManager =$_POST['eCManager'];
   
   
      if($HotelAddressStable == '' OR $HotelChainNameStable == '' OR $HotelAreaStable == ''){
         echo "<script>alert('These Hotel fields must be filled to update hotel')</script>";
         //exit();
      }
      else {
         
      $FullHotelUpdate_query = "UPDATE Hotel SET HotelAddress = '$HotelAddress', HotelRooms = '$NoOfHotelRooms', HotelEmails = '$HotelEmails', HotelRatings ='$HotelRatings', area = '$HotelArea', Hotel_Manager ='$HotelManager' 
      WHERE HotelAddress = '$HotelAddressStable' AND HotelChain_name = '$HotelChainNameStable' AND area = '$HotelAreaStable'";
   
      if (mysqli_query($connection, $FullHotelUpdate_query)){
         echo "<script>alert('Hotel info has been updated')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
        
     } 
   }
   }
   //HotelAddress to be Changed--------------------------------------------------------------->
   
   if(isset($_POST["updateHotelAddress"])){

      //Names to use to identify shit to change
      $HotelAddressStable1 = $_POST['UhotelAddress'];
      $HotelChainNameStable1 = $_POST['UhotelChainName'];
      $HotelArea1 = $_POST['Uarea'];


      //Things we are changing
      $HotelAddress1 = $_POST['CAddress'];
   
      if($HotelAddressStable1 == '' OR $HotelChainNameStable1 == '' OR $HotelArea1 == ''){
         echo "<script>alert('These Hotel fields must be filled to update hotel')</script>";
         //exit();
      }
      else {
    
      $addressHotelUpdate_query = "UPDATE Hotel SET HotelAddress = '$HotelAddress1'
      WHERE HotelAddress = '$HotelAddressStable1' AND HotelChain_name = '$HotelChainNameStable1' AND area = '$HotelArea1'";
   
      if (mysqli_query($connection, $addressHotelUpdate_query)){
         echo "<script>alert('Hotel info has been updated')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
       
     }
   
   }
   }

//Changing hotel Rooms------------------------------------------------------------------>
   if(isset($_POST["updateHotelRoomNo"])){

      //Names to use to identify shit to change
      $HotelAddressStable2 = $_POST['UhotelAddress'];
      $HotelChainNameStable2 = $_POST['UhotelChainName'];
      $HotelArea2 = $_POST['Uarea'];


      //Things we are changing
      $NoOfHotelRooms1 = $_POST['ChRooms'];
   
      if($HotelAddressStable2 == '' OR $HotelChainNameStable2 == '' OR $HotelArea2 == ''){
         echo "<script>alert('These Hotel fields must be filled to update hotel')</script>";
         //exit();
      }
      else {
    
      $HotelRoomUpdate_query = "UPDATE Hotel SET HotelRooms = $NoOfHotelRooms1
      WHERE HotelAddress = '$HotelAddressStable2' AND HotelChain_name = '$HotelChainNameStable2' AND area = '$HotelArea2'";
   
      if (mysqli_query($connection, $HotelRoomUpdate_query)){
         echo "<script>alert('Hotel info has been updated')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }

//Update Hotel Emails--------------------------------------------->

   if(isset($_POST["updateHotelEmailAddress"])){

      //Names to use to identify shit to change
      $HotelAddressStable3 = $_POST['UhotelAddress'];
      $HotelChainNameStable3 = $_POST['UhotelChainName'];
      $HotelArea3 = $_POST['Uarea'];

      //Things we are changing
      $HotelEmails1 = $_POST['CEmails'];

      if($HotelAddressStable3 == '' OR $HotelChainNameStable3 == '' OR $HotelArea3 == ''){
         echo "<script>alert('These Hotel fields must be filled to update hotel')</script>";
         //exit();
      }
      else {
    
      $HotelEmailUpdate_query = "UPDATE Hotel SET HotelEmails = '$HotelEmails1'
      WHERE HotelAddress = '$HotelAddressStable3' AND HotelChain_name = '$HotelChainNameStable3' AND area = '$HotelArea3'";
   
      if (mysqli_query($connection, $HotelEmailUpdate_query)){
         echo "<script>alert('Hotel info has been updated')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }


//Update Hotel Ratings
   if(isset($_POST["updateHotelRatings"])){

      //Names to use to identify shit to change
      $HotelAddressStable4 = $_POST['UhotelAddress'];
      $HotelChainNameStable4 = $_POST['UhotelChainName'];
      $HotelArea4 = $_POST['Uarea'];


      //Things we are changing
      $HotelRatings1 = $_POST['ChRating'];
   
      if($HotelAddressStable4 == '' OR $HotelChainNameStable4 == '' OR $HotelArea4 == ''){
         echo "<script>alert('These Hotel fields must be filled to update employee')</script>";
         //exit();
      }
      else {
    
      $HotelRatings_query = "UPDATE Hotel SET HotelRatings = '$HotelRatings1'
      WHERE HotelAddress = '$HotelAddressStable4' AND HotelChain_name = '$HotelChainNameStable4' AND area = '$HotelArea4'";
   
      if (mysqli_query($connection, $HotelRatings_query)){
         echo "<script>alert('Hotel info has been stored')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }
   //Update Hotel Area

   if(isset($_POST["updateHotelArea"])){

      //Names to use to identify shit to change
      $HotelAddressStable5 = $_POST['UhotelAddress'];
      $HotelChainNameStable5 = $_POST['UhotelChainName'];
      $HotelArea5 = $_POST['Uarea'];


      //Things we are changing
      $HotelArea = $_POST['Carea'];
      
   
      if($HotelAddressStable5 == '' OR $HotelChainNameStable5 == '' OR $HotelArea5 == ''){
         echo "<script>alert('These Hotel fields must be filled to update hotel area')</script>";
         //exit();
      }
      else {
    
      $HotelAreaUpdate_query = "UPDATE Hotel SET area = '$HotelArea'
      WHERE HotelAddress = '$HotelAddressStable5' AND HotelChain_name = '$HotelChainNameStable5' AND area = '$HotelArea5'";
   
      if (mysqli_query($connection, $HotelAreaUpdate_query)){
         echo "<script>alert('Hotel info has been stored')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }
   //Update Hotel Manager

   if(isset($_POST["updateHotelManager"])){

      //Names to use to identify shit to change
      $HotelAddressStable6 = $_POST['UhotelAddress'];
      $HotelChainNameStable6 = $_POST['UhotelChainName'];
      $HotelArea6 = $_POST['Uarea'];


      //Things we are changing
     
      $HotelManager1 =$_POST['eCManager'];
   
      if($HotelAddressStable6 == '' OR $HotelChainNameStable6 == '' OR $HotelArea6 == ''){
         echo "<script>alert('These Hotel fields must be filled to update employee')</script>";
         //exit();
      }
      else {
    
      $HotelManagerUpdate_query = "UPDATE Hotel SET Hotel_Manager = $HotelManager1 
      WHERE HotelAddress = '$HotelAddressStable6' AND HotelChain_name = '$HotelChainNameStable6' AND area = '$HotelArea6'";
   
      if (mysqli_query($connection, $HotelManagerUpdate_query )){
         echo "<script>alert('Hotel info has been stored')</script>";
         //header('Location: employee2.php');
     } else {
        echo("<script>alert (Error adding your details at this time.</script>");
     }
   
   }
   }
   //Update/Delete a Hotel Room----------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
   
   //delete a hotel rooom
   if(isset($_POST["deleteHotelRoom"])){
      //dependents
     $HotelRoomNumberStable = $_POST['UNhotelRoomNumber'];
     $HotelAddressStable= $_POST['UNhotelAddress'];
  
     if($HotelRoomNumberStable  == '' OR $HotelAddressStable == ''){
        echo "<script>alert('These Hotel fields must be filled to delete employee')</script>";
        //exit();
     }
     else {
   
     $HotelRoomsdelete_query = "DELETE FROM Room 
     WHERE HotelAddress = '$HotelAddressStable' AND RoomNum  = $HotelRoomNumberStable";
  
     if (mysqli_query($connection, $HotelRoomsdelete_query  )){
        echo "<script>alert('Hotel Room info has been dleted')</script>";
        echo("done");
        //header('Location: employee2.php');
    } else {
       echo("<script>alert (Error adding your details at this time.</script>");
       echo("it didnt go");
    }
  
  }
  }
      //Update All(Hotel Rooms)

      if(isset($_POST["hRSumbmit"])){
          //dependents
         $HotelRoomNumberStable = $_POST['UNhotelRoomNumber'];
         $HotelAddressStable = $_POST['UNhotelAddress'];

      //Things to change
         $HotelRoomNumber = $_POST['AhotelRoomNumber'];
         $HotelExtendability = $_POST['Aextendability'];
         $RoomCapacity = $_POST['AroomCapacity'];
         $RoomViewType = $_POST['Aviewtype'];
         $RoomPrice =$_POST['AroomPrice'];
      
         if($HotelRoomNumberStable  == '' OR $HotelAddressStable == ''){
            echo "<script>alert('These Hotel fields must be filled to update employee')</script>";
            //exit();
         }
         else {
       
         $HotelRoomsAllUpdate_query = "UPDATE Room SET RoomNum = '$HotelRoomNumber', Room_ViewType = '$RoomViewType', RoomCapacity ='$RoomCapacity', isExtendable = '$HotelExtendability', roomPrice = '$RoomPrice'
         WHERE HotelAddress = '$HotelAddressStable' AND RoomNum = $HotelRoomNumberStable";
      
         if (mysqli_query($connection, $HotelRoomsAllUpdate_query )){
            echo "<script>alert('Hotel Room info has been Updated')</script>";
            //header('Location: employee2.php');
        } else {
           echo("<script>alert (Error adding your details at this time.</script>");
        }
      
      }
      }
      //Update Room Number

      if(isset($_POST["updateHotelRoomNo"])){
          //dependents
         $HotelRoomNumberStable = $_POST['UNhotelRoomNumber'];
         $HotelAddressStable= $_POST['UNhotelAddress'];

      //Things to change
         $HotelRoomNumber = $_POST['AhotelRoomNumber'];
      
         if($HotelRoomNumberStable  == '' OR $HotelAddressStable == ''){
            echo "<script>alert('These Hotel fields must be filled to update employee')</script>";
            //exit();
         }
         else {
       
         $HotelRoomsNumUpdate_query = "UPDATE Room SET RoomNum = '$HotelRoomNumber'
         WHERE HotelAddress = '$HotelAddressStable' AND RoomNum  = $HotelRoomNumberStable";
      
         if (mysqli_query($connection, $HotelRoomsNumUpdate_query )){
            echo "<script>alert('Hotel Room info has been Updated')</script>";
            //header('Location: employee2.php');
        } else {
           echo("<script>alert (Error adding your details at this time.</script>");
        }
      
      }
      }

//Update Hotel Extendability
      if(isset($_POST["updateHotelX"])){
          //dependent
         $HotelRoomNumberStable = $_POST['UNhotelRoomNumber'];
         $HotelAddressStable= $_POST['UNhotelAddress'];

         //Things to change
   
         $HotelExtendability = $_POST['Aextendability'];
         
         if($HotelRoomNumberStable == '' OR $HotelAddressStable == ''){
            echo "<script>alert('These Hotel fields must be filled to update employee')</script>";
            //exit();
         }
         else {
       
         $HotelRoomsExUpdate_query = "UPDATE Room SET isExtendable = '$HotelExtendability',  
         WHERE HotelAddress = '$HotelAddressStable' AND RoomNum = $HotelRoomNumberStable";
      
         if (mysqli_query($connection, $HotelRoomsExUpdate_query )){
            echo "<script>alert('Hotel Room info has been Updated')</script>";
            //header('Location: employee2.php');
        } else {
           echo("<script>alert (Error adding your details at this time.</script>");
        }
      
      }
   }
      
      //Change Hotel Capacity
      if(isset($_POST["updateHotelCapacity"])){
          //dependents
         $HotelRoomNumberStable = $_POST['UNhotelRoomNumber'];
         $HotelAddressStable= $_POST['UNhotelAddress'];

         //Things to change
    
         $RoomCapacity = $_POST['AroomCapacity'];
        
      
         if($HotelRoomNumberStable  == '' OR $HotelAddressStable == ''){
            echo "<script>alert('These Hotel fields must be filled to update employee')</script>";
            //exit();
         }
         else {
       
         $HotelRoomsCapacity_query = "UPDATE Room SET RoomCapacity ='$RoomCapacity' 
         WHERE HotelAddress = '$HotelAddressStable' AND RoomNum = $HotelRoomNumberStable";
      
         if (mysqli_query($connection, $HotelRoomsCapacity_query )){
            echo "<script>alert('Hotel Room info has been Updated')</script>";
            //header('Location: employee2.php');
        } else {
           echo("<script>alert (Error adding your details at this time.</script>");
        }
      
      }
      }

//Change Room View Tyoe
if(isset($_POST["updateHotelView"])){
         //dependents
         $HotelRoomNumberStable = $_POST['UNhotelRoomNumber'];
         $HotelAddressStable= $_POST['UNhotelAddress'];

         //Things to change
         $RoomViewType = $_POST['Aviewtype'];
   
      
         if($HotelRoomNumberStable  == '' OR $HotelAddressStable == ''){
            echo "<script>alert('These Hotel fields must be filled to update employee')</script>";
            //exit();
         }
         else {
       
         $HotelAddressllUpdate_query = "UPDATE Room SET Room_ViewType = '$RoomViewType' 
         WHERE HotelAddress = '$HotelAddressStable' AND RoomNum = $HotelRoomNumberStable";
      
         if (mysqli_query($connection, $HotelAddressllUpdate_query )){
            echo "<script>alert('Hotel Room info has been Updated')</script>";
            //header('Location: employee2.php');
        } else {
           echo("<script>alert (Error adding your details at this time.</script>");
        }
      
   }
}

//Change Room Price
if(isset($_POST["updateHotelPrice"])){
      //dependents
      $HotelRoomNumberStable = $_POST['UNhotelRoomNumber'];
      $HotelAddressStable= $_POST['UNhotelAddress'];

      //Things to change
      $RoomPrice =$_POST['AroomPrice'];
      
   if($HotelRoomNumberStable  == '' OR $HotelAddressStable == ''){
          echo "<script>alert('These Hotel fields must be filled to update employee')</script>";
            //exit();
         }
         else {
       
         $HotelRoomsPriceUpdate_query= "UPDATE Room SET roomPrice ='$RoomPrice' 
         WHERE HotelAddress = '$HotelAddressStable' AND RoomNum = $HotelRoomNumberStable";
      
         if (mysqli_query($connection, $HotelRoomsPriceUpdate_query )){
            echo "<script>alert('Hotel Room info has been Updated')</script>";
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
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1>
                     Edit/Update, Delete Employee, Hotel Data and Hotel Room Data <br>
                       
                  </h1>
                  <a href ="viewRooms.php"> view Rooms </a>
                  
                  

               <form method = "post">
                  <fieldset>
                  <legend> View Employees</legend>
                     
                     <div id = "ViewEmployees">
                     <button type="submit" id="empSubmit" name="empSubmit" value="View Employees" onclick = "viewEmp();"> View Employees</button> <br>
                     <a href ="viewEmployees.php"> Go Back </a>
                     </div>
                     
                  </fieldset>
                  </form>
                  <br>
                  <br>

                  <!--Update Employee-->
                  <form method = "post">

                  <fieldset>
                  <legend>Update Employees</legend>
                  <p>Type the Employee SSN you wish to update or delete</p>
                   Employee SSN:&nbsp;
                  <input type="int" name="employee_ssn0"> &nbsp;
                  
                  <!--delete employee-->
                  <input type="submit" name= "deleteEmployee" value="delete"> 

                  <br>
                  <br>
                  
                  <p>Type in the name of the changes you would like to see in the Employee Database<p>
                 </p><br>

                 <p> Update Employee Name></p>
                  
                  First name:
                  <input type="text" name="eCfirstname"> &nbsp;
                  &nbsp;
                  Last name:
                  <input type="text" name="eClastname"> &nbsp;
                  <input type="submit" name= "updateEmployeeName" value="update Name"> 
                  <br>
                  <br>
                  
                  PhoneNumber:
                  <input type="tel" name="eCphoneNumber">&nbsp;
                  &nbsp;
                  email-Address:
                  <input type="text" name="eCEmailAddress">&nbsp;
                  <input type="submit" name= "updateEmployeeContact" value="update Contact"> 
                  <br>
                  <br>

                  Address:
                  <input type="text" name="eCAddress">&nbsp;
                  <input type="submit" name= "updateEmployeeAddress" value="update Address">
                  <br>
                  <br>

                  <input type="submit" name= "updateEmployeeSubmit" value="update All"> 
                  </fieldset>
                  <br>
                  <br>
                  </form>

                  <!--View Hotels-->

                  <form method = "post">

                  <fieldset>
                  <legend>View Hotels</legend>
                  <div id='viewHotels1'>
                     
                     <p> Click to view Names of the Hotels</p><br>
                     <button type="submit" id="viewHotels" name="viewHotels" value="View Employees" onclick = "viewHotels();"> View Hotels</button> <br>

                  <div>
                  <br>
                  <br>

                  </fieldset>

                  <fieldset>
                  <!---Update Hotels------>

                  <legend><h2>Update Hotel</h2></legend>
                  <p>Select which Hotel you would like to update/delete</p><br>
                  Hotel Address:&nbsp;
                  <input type="text" name="UhotelAddress"> 
                  &nbsp;
                  Hotel Chain Name:&nbsp;
                  <select type="text" name="UhotelChainName">
                            <option value="Sheraton">Sheraton</option>
                            <option value="Novotel">Novotel</option>
                            <option value="Stay Inn">Stay Inn</option>
                            <option value="La Quinta">La Quinta</option>
                            <option value="The Westin">The Westin</option><br>
                            <br>
                        </select>&nbsp;
                  
                  
                  Hotel Area: &nbsp;
                  <select type="text" name="Uarea">
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
                  <input type="submit" name= "deleteHotel" value="delete"> <br>
                  <br>
                  
                  

                  <p>Select the changes you would like to see</p><br>
                  
                  
                  Hotel Address:&nbsp;
                  <input type="text" name="CAddress"> 
                  
                  <input type="submit" name= "updateHotelAddress" value="update Address"> 
                  &nbsp;
                 
                  Number of Hotel Rooms: &nbsp;
                  <select type="int" name="ChRooms">
                            <option value="5"> 5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option><br>
                            <br>
                        </select>&nbsp;
                        &nbsp;
               <input type="submit" name= "updateHotelRoomNo" value="update No of Rooms">  <br>
                        <br>
                  
                  Hotel Emails: &nbsp;
                  <input type="text" name="CEmails"> 
                  <input type="submit" name= "updateHotelEmailAddress" value="update Email Address"> 
                  &nbsp;
                  
                  Hotel Ratings: &nbsp;
                  <select type="int" name="ChRating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>&nbsp;
                        <input type="submit" name= "updateHotelRatings" value="update Hotel Ratings"> <br>
                        <br>
                  
                  Hotel Area:&nbsp;
                  <select type="text" name="Carea">
                            <option value="Ottawa">Ottawa</option>
                            <option value="Edmonton">Edmonton</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="Calgary">Calgary</option>
                            <option value="Winipeg">Winipeg</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Montreal">Montreal</option>
                            <option value="Mississauga">Mississauga</option>
                  </select>&nbsp;
                  &nbsp;
                  <input type="submit" name= "updateHotelArea" value="update Hotel Area">&nbsp;
                  
                  Hotel Manager &nbsp;
                  <input type="text" name="eCManager">
                  &nbsp;
              
                  <input type="submit" name= "updateHotelManager" value="update Hotel Manager"> <br>
                  
                  <br>
                  <br>
                  <input type = "submit" name= "updateHotelSubmit" value="Update all Hotels"><br>
                  <br>
                  
                  </fieldset>


                  <!----Hotel Rooms----->

                  <legend><h2> Hotel Rooms</h2></legend>
                  <div id ='viewHotelRooms'>

                  <p>Click to view number of Hotel Rooms</p>
                  <button type="submit" id="viewHotels" name="viewHotels\Rooms" value="View Hotels" onclick = "viewHotels();"> View Hotel Rooms</button> <br>
                  <br>
                  </div>


                  <fieldset>
                  <legend>Update Hotel Rooms</legend>
                  <p>Select which hotel room you would like to delete/update hotel</p>

                  Hotel Room Number: &nbsp;
                  <input type="int" name="UNhotelRoomNumber">&nbsp;
               
                  Hotel Address: &nbsp;
                  <input type="text" name="UNhotelAddress"> &nbsp;
                  <br>
                  <input type="submit" name= "deleteHotelRoom" value="delete"> 
                  <br>
                  <br>


                  


                  <p> Select Which part you would wish to update</p><br>
                  <br>
                        Hotel Room Number: &nbsp;
                        <input type="int" name="AhotelRoomNumber">&nbsp;
                        <input type = "submit" name= "updateHotelRoomNo" value="Update"><br>
                        <br>
                     
                        Extendability (Convenience in adding one or more bed):&nbsp;
                        <select type='text' name="Aextendability">
                            <option value="NULL">----select----</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option> 
                        </select>&nbsp;
                        <input type = "submit" name= "updateHotelX" value="Update"><br>
                        <br>
                        
                        Room Capacity: &nbsp;
                        <select type= 'text' name="AroomCapacity">
                            <option value="NULL">----select----</option>
                            <option value= "single">Single</option>
                            <option value= "double">Double</option><br>
                        </select> &nbsp;
                        <input type = "submit" name= "updateHotelCapacity" value="Update"><br>
                        <br>
                        
                        Room View Type: &nbsp;
                        <select type = 'text' name="Aviewtype">
                            <option value="NULL">----select----</option>
                            <option value="mountain_view">Mountain-View</option>
                            <option value="sea_view">Sea-View</option> 
                        </select>
                        <input type = "submit" name= "updateHotelView" value="Update">&nbsp;
                  
                        
                        Room Price:&nbsp;
                        <select  type='int' name="AroomPrice">
                            <option  value="NULL">----select----</option>
                            <option  value="100">$80</option>
                            <option  value="150">$150</option> 
                            <option  value="200">$200</option>
                            <option  value="300">$300</option>
                            <option  value="400">$400</option> 
                        </select>
                        <input type = "submit" name= "updateHotelPrice" value="Update"><br>
                        <br>
                        <br>
                        <p>Update all Room Hotels</p>
                        
                        
                        <input type="submit" name="hRSumbmit" value="Update All">
                        </fieldset>



                  <a href ="index.php"> Go Back </a>


               </form>
                  
               </div>
            </div>
            <div class="row margin-top-45">
               <div class="col-md-12">
                  
               </div>
            </div>
         </div>
         </div>
      </section>
      <!-- script -->
      
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      
      <!--<script src="js/jquery.js"></script>-->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/modernizr.js"></script>
      <script src="js/script.js"></script>
      <script type = "text/javascript">
      function viewEmp(){
         var emp = document.getElementById("ViewEmployees");
         if (emp.style.display === "none"){
            emp.style.display="block";
            else{
               emp.style.display = '"none';
            }
         }
      }
     
      
      </script>

   </body>
</html>