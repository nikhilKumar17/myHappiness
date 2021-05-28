 



<?php 
    include 'config.php'; 
    session_start();
         if(isset($_POST['submit']))/// insert query
  
      {   $Home_name = ($_POST['Home_name']);
        $Address = $_POST['Address'];
         $Contact = ($_POST['Contact']);
         $Organisation =$_POST['Organisation'];
         $Location= $_POST['Location'];
 $id = $_GET['id'];
        
 $sql1= "SELECT id FROM home_details WHERE home_details.id=$id " ;
         
 $res1= mysqli_query($conn, $sql1);
 $num =mysqli_num_rows( $res1);
  if($num == 1)
  {                   echo "Please click update button if you want to update";}
        else {
          $sql = "INSERT INTO home_details (Home_name,Address ,Contact,Organisation,Location,id) VALUES 
          (  '$Home_name', '$Address',  '$Organisation' ,  '$Contact'  ,'$Location',$id)"; 
       $res= mysqli_query($conn, $sql);
      
         if($res==1){
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
       
     }

     if(isset($_POST['update']))// /////////////   update 

      {    $Home_name = ($_POST['Home_name']);
        $Address = $_POST['Address'];
         $Contact = ($_POST['Contact']);
         $Organisation =$_POST['Organisation'];
         $Location= $_POST['Location'];

        $idupdate = $_GET['id'];

      
    $sql =   "  UPDATE `home_details` SET  Home_name='$Home_name' ,Address='$Address',Location=' $Location' ,
    Contact= '$Contact',Organisation= '$Organisation'  WHERE home_details.id=$idupdate " ;
   
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
        $sql = "DELETE FROM home_details WHERE home_details.id=$iddelete ";
      
       $res= mysqli_query($conn, $sql);
 
         if($res){
           ?>
           <script>
          // header("location: Orphanage_register.php?id='$id' ");
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
       


   ?>


   <?php
//   include 'edit.php ';
              if(isset($_POST['edit']))
              {
                $idedit =$_GET['id'];
            
                 $sql= "SELECT * FROM home_details WHERE home_details.id=$idedit " ;
                 $res= mysqli_query($conn, $sql);
                
                
                 if($res)
                 $row = mysqli_fetch_array($res);
               

                 
                 
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
             
             <img src="img/MY HAPPINESS LOGO.png" alt="" width="70px" >
                  <div id="nav-divv">
                      <ul>
                     
                      <div class="right-menu">
                             <li>    <a href="index.php">Home</a>
                          <div class="dropdown-menu">
                              <a href="Orphanage.php">Orphanage</a>
                              <a href="School.php">School</a>
                              <a href="NGO.php">NGO</a>
               </div> 
               </div> </li> <!--# is mean empty -->
                    <li> <a href="Mission.php">Mission</a></li>
                    <li>  <a href="Donation.php">Donation</a></li>
                    <li> <a href="AboutUs.php">About us</a></li>
                    <li>  <a href="Registation.php">Registation</a>
                          </ul>
             
                     </div>
                     <div class="right-button">
                     <button class=menu-button>Setting</button> 
                          <div class="dropdown-menu">
                              <a href="login.php">Login</a>
                              <a href="signUp.php">Sign Up</a>
                              <a href="logout.php">Log out</a>
              
     <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>

               </div> 

               </div>
                 </nav>
                 <main>
                 <img src="img/pic6.jpg" alt="" width=100%>
     <!-- <section> -->
<div class="container">
<h3>Please Register For Orphanage Here:</h3>
<hr>

<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Home_name">Orphanage name</label>
      <input type="text" class="form-control" name="Home_name" id="HOME_name"  value="<?php   if(isset($_POST['edit'])){echo $row['Home_name']; }?>"  >
    </div>
    <div class="form-group col-md-5">
      <label for="Address4">Address</label>
      <input type="text" class="form-control" name ="Address" id="Address" placeholder="Address"  value="<?php  if(isset($_POST['edit'])){ echo $row['Address'];} ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="text">Contact</label>
      <input type="text" class="form-control" name ="Contact" id="Contact_no" placeholder="Contact no"   value="<?php  if(isset($_POST['edit'])){ echo $row['Address'];} ?>">
    </div>
    
  </div>
    <div class="form-group col-md-5">
     
  <!-- <select name="Organ" id="a"> -->
  <label for="Organisation">Organisation</label>
  <select name="Organisation" id="a">
             <option value="">--Select Organisation --</option>
           <option value="Government">Government</option>
           <option value="Private">Private</option>
           </select>
           </div> 

           <div class="form-group col-md-5">
      <label for="Location">Location</label>
      <select name="Location" id="Location">
             <option value="">--Select Location--</option>
           <option value="Arunachal Pradesh">Arunachal Pradesh</option>
           <option value="Andhra pradesh">Andhra Pradesh</option>
           <option value="Bihar">Bihar</option>
           <option value="New Delhi">New Delhi</option>
            </select>
    </div>
    <button type="submit" class="btn  " name="submit">Submit</button>
  <!-- <input type="submit" name="update" value="Search"> -->
  <button type="update" class="btn btn-primary" name="update" >Update</button>

  <button type="edit" class="btn btn-primary" name="edit" >Edit</button>
  
  <button type="delete" class="btn btn-primary" name="delete" >Delete</button>
  


</form>
</div>
</main>
   
  </body>
</html> 
