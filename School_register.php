<?php

// session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
// {
//    // header("location: index.php");
// }
// require_once "config.php";
 
// $school_name =  $Address =  $Contact= $Organisation=$Location= $school_type="";
 

 
 
// if ($_SERVER['REQUEST_METHOD'] == "POST")
// {  

//     $school_name = ($_POST['school_name']);
//     $Address = $_POST['Address'];
//      $Contact = ($_POST['Contact']);
//      $Organisation =$_POST['Organisation'];
//      $Location= $_POST['Location'];
//      $school_type= $_POST['school_type'];

//     $sql = "INSERT INTO school_details (school_name,Address,Contact,Organisation,Location,school_type) VALUES (?,?,?,  ?,?,?)";
//     $stmt = mysqli_prepare($conn, $sql);
//     if ($stmt)
//     {
//         mysqli_stmt_bind_param($stmt, "ssssss", $param_school_name, $param_Address,$param_Contact, $param_Organisation, $param_Location,  $param_school_type);

//         // Set these parameters
//         $param_school_name = $school_name;
//         $param_Location = $Location;
//         $param_school_type = $school_type;
         
// $param_Address =$Address;
// $param_Contact =$Contact;
//  $param_Organisation=$Organisation;
//         // Try to execute the query
//         if (mysqli_stmt_execute($stmt))
//         {
//             // header("location: welcome.php");
//             echo "sss";
//         }
//         else{
//             echo "Something went wrong... cannot redirect!";
//         }
//     }
//     mysqli_stmt_close($stmt);
// //}
// mysqli_close($conn);
// }



?>
 



 <?php 
    include 'config.php'; 
  //  session_start();
         if(isset($_POST['submit']))
  
      {   $school_name = ($_POST['school_name']);
        $Address = $_POST['Address'];
         $Contact = ($_POST['Contact']);
         $Organisation =$_POST['Organisation'];
         $Location= $_POST['Location'];
           $school_type = $_POST['school_type'];


         $add = "SELECT id FROM users ";


         $a1= mysqli_query($conn,  $add);
         $r1 = mysqli_fetch_array($a1);
     $id =   $r1['id'] ;
       
          $sql = "INSERT INTO school_details (school_name,Address,Contact,Organisation,Location,school_type,id)
           VALUES (  '$school_name', '$Address',  '$Organisation' ,  '$Contact'  ,'$Location', '$school_type', '$id')"; 
       $res= mysqli_query($conn, $sql);
      
         if($res){
         ?>
         <script>
         alert("data inserted properly");
         </script>
         <?php
        }    else{
          ?>
           <script>
          alert("data not  inserted properly")
          </script>
         
          <?php
         }
         
       
     }

     if(isset($_POST['update']))

      {  
           $school_name = ($_POST['school_name']);
        $Address = $_POST['Address'];
         $Contact = ($_POST['Contact']);
         $Organisation =$_POST['Organisation'];
         $Location= $_POST['Location'];
           $school_type = $_POST['school_type'];

          
        $idupdate = $_GET['id'];

      
  $sql =   "  UPDATE school_details SET  school_name='$school_name' , Address='$Address',Location=' $Location' ,
  Contact= '$Contact',Organisation= '$Organisation' , school_type ='$school_type'  WHERE school_details.id=$idupdate " ;

   
        $res= mysqli_query($conn, $sql);

        if($res){
          ?>
          <script>
          alert("data updated properly");
          </script>
          <?php
         }    else{
           ?>
            <script>
           alert("data not updated properly")
           </script>
          
           <?php
          }

      }
      
      
     if(isset($_POST['delete']))

     {   $iddelete = $_GET['id'];
      $sql = "DELETE FROM school_details WHERE school_details.id=$iddelete ";
      
      $res= mysqli_query($conn, $sql);

        if($res){
          ?>
          <script>
        //  header("location: School_register.php?id='$id' ");
          alert("data deleted properly");
          </script>
          <?php
         }    else{
           ?>
            <script>
           alert("data not deleted properly")
           </script>
          
           <?php
          }

      }

      if(isset($_POST['edit']))

      { 
      $idedit =$_GET['id'];
            
      $edit_school= "SELECT * FROM school_details WHERE school_details.id=$idedit " ;
      $resedit_school= mysqli_query($conn, $edit_school);
     
     
      if($resedit_school)
      $row = mysqli_fetch_array($edit_school);
      
      
     }
      
     
   ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="signUp_CSS.css">
    

    <title>My happiness</title>
  </head>
  <body>
  <nav>
             
           <?php  include 'navBar.php'; ?>
                 </nav>
           <main>
           <main>
                 <img src="img/pic12.jpg" alt="" width=100%>
<div class="container">
<h3>Please Register For School Here:</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">School name</label>
      <input type="text" class="form-control" name="school_name" id="school_name" value="<?php  if(isset($_POST['edit'])){ echo $row['school_name'];} ?>" >
    </div>
    <div class="form-group col-md-5"> 
      <label for="inputPassword4">Address</label>
      <input type="text" class="form-control" name ="Address" id="Address" placeholder="Address" value="<?php  if(isset($_POST['edit'])){ echo $row['Address'];} ?>" >
    </div>
    <div class="form-group col-md-5">
      <label for="text">Contact</label>
      <input type="text" class="form-control" name ="Contact" id="Contact_no" placeholder="Contact no" value="<?php  if(isset($_POST['edit'])){ echo $row['Contact'];} ?>">
    </div>
     
  </div>
    <div class="form-group col-md-5">
     
  <!-- <select name="Organ" id="a"> -->
  <label for="Organisation">Organisation</label>
  <select name="Organisation" id="a">
             <option value="">--Select Orgnaisation --</option>
           <option value="Government">Government</option>
           <option value="Private">Private</option>
           </select>
           </div> 

           <div class="form-group col-md-5">
      <label for="Location">Location</label>
      <select name="Location" id="Location">
             <option value="">--Select Location--</option>
           <option value="Bengaluru">Bengaluru</option>
           <option value="Kolkata">Kolkata</option>
           <option value="Mumbai">Mumbai</option>
           <option value="New Delhi">New Delhi</option>
            </select>
    </div>

    <div class="form-group col-md-5">
      <label for="school_type">School type</label>
      <select name="school_type" id="school_type">
             <option value="">--Select School Type--</option>
           <option value="coed">Co-Ed</option>
           <option value="Boys">Boys</option>
           <option value="Girls">Girls</option>
         
            </select>
    </div>


    <button type="submit" class="btn  " name="submit">Submit</button>

    <button type="update" class="btn btn-primary" name="update" >Update</button>

<button type="edit" class="btn btn-primary" name="edit" >Edit</button>

<button type="delete" class="btn btn-primary" name="delete" >Delete</button>

</form>
</div>

    </main>
  </body>
</html> 
