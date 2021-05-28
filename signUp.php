<?php 
    // include 'config.php';
    // //  $NGO_name = $Address =  $Website_link=$Contact="";
    // // session_start();
   
    //      if(isset($_POST['submit']))
  
    //   { 
        
    //     $password = trim($_POST['password']);
    //         $username = trim($_POST['username']);
    //        $gender = ($_POST['gender']);
    //         $dob = ($_POST['dob']);
     
    include 'config.php';
    //  $NGO_name = $Address =  $Website_link=$Contact="";
    // session_start();
   
         if(isset($_POST['submit'])||$_SERVER['REQUEST_METHOD'] == "POST")
  
      { 
      $password = trim($_POST['password']);
       // $username = trim($_POST['username']);
        $username = "";
        $username_err = $password_err = $confirm_password_err = "";
           $gender = ($_POST['gender']);
            $dob = ($_POST['dob']);

             if(empty(trim($_POST["username"])))
          //  if(mysqli_stmt_num_rows($stmt) == 1)
            {
              $username_err = "Username cannot be blank";
          }  else{
            $sql1 = "SELECT id FROM users WHERE username =?";
            $stmt = mysqli_prepare($conn, $sql1);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt, "s", $param_username);
    
                // Set the value of param username
                $param_username = trim($_POST['username']);
    
                // Try to execute this statement
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1)
                    {
                      ?>
                      <script>
                     alert("This username is already taken")
                     </script>
           <?php
                        $username_err = "This username is already taken"; 
                    }
                    else{
                        $username = trim($_POST['username']);
                    }
                }
                else{
                    echo "Something went wrong";
                }
            }}

        mysqli_stmt_close($stmt);

                 // Check for password
if(empty(trim($_POST['password']))){
  $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) <3 ){
  $password_err = "Password cannot be less than 3 characters";
}
else{
  $password = trim($_POST['password']);
}


// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
  ?>
                      <script>
                     alert("Passwords are not matching")
                     </script>
           <?php

  $password_err = "Passwords should match";
}
     // If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{    
       
          $sql = "INSERT INTO users (username, password,gender,dob) VALUES ( '$username','$password','$gender', '$dob' )";
       $res= mysqli_query($conn, $sql);
      
         if($res){

          $add = "SELECT id FROM users WHERE username='$username' ";
          $a1= mysqli_query($conn,  $add);
          $r1 = mysqli_fetch_array($a1);

          session_start();
          $_SESSION["username"] = $username;
       $id =   $r1['id'] ;
              $_SESSION["id"] = $id;   
 
          $choice =$_POST['choose'];
                                            if($choice=="NGO")
                                            {header("location:NGO_register.php?id='$id'");}
                                            if($choice=="Orphanage")
                                           {header("location: Orphanage_register.php?id='$id' ");}
                                              if($choice=="School")
                                            {header("location: School_register.php?id='$id' ");} //?id='$id give id in url
                                       else{
                                          echo "something wrong";
                                            }

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


?>

<?php
// if(isset($_POST['submit'])) {
//   $password = trim($_POST['password']);
//       $username = trim($_POST['username']);
//      $gender = ($_POST['gender']);
//      $dob = ($_POST['dob']);

//      $choice =$_POST['choose'];
//            if($choice=="NGO")
//            {header("location: NGO_register.php");}
//               else if($choice=="Orphanage")
//               {header("location: Orphanage_register.php");}
//                 else if($choice=="School")
//                 {header("location: School_register.php");}
//                 else {echo "invalid ";}

// }
?>

<?php

// require_once "config.php";
 
// $username = $password = $confirm_password = $dob= $gender="";
// $username_err = $password_err = $confirm_password_err = $dob_err= "";

// // if ($_SERVER['REQUEST_METHOD'] == "POST")
// if(isset($_POST['submit']))
// {

//     $password = $_POST['password'];
//     $username = ($_POST['username']);
//     $gender = ($_POST['gender']);
//     $dob = ($_POST['dob']);

//     $sql1 = "INSERT INTO users (username, password,gender,dob) VALUES ( $username,$password,$gender, $dob )";
//     $stmt = mysqli_prepare($conn, $sql1);
//     if ($stmt)
//     {
//      // $sql2 = "SELECT id, username, password FROM users WHERE username =  '$username'";
    
//      header("location: NGO_register.php");
  
  
//       // $res= mysqli_query($conn, $sql2)or die ("query fail");
//       // $r = mysqli_fetch_array($res);
//       // session_start();
//       //             $_SESSION["username"] = $username;
             
//             //  $_SESSION["loggedin"] = true;
//             //  $id =$r['id'] ;
//             //  //  echo   $id ; 
//             //           $_SESSION["id"] = $id;               
                                 
//             //                       $choice =$_POST['choose'];
//             //                       if($choice=="NGO")
//             //                       {header("location:NGO_register.php?id='$id'");}
//             //                       if($choice=="Orphanage")
//             //                      {header("location: Orphanage_register.php?id='$id' ");}
//             //                         if($choice=="School")
//             //                       {header("location: School_register.php?id='$id' ");} //?id='$id give id in url
//             //                  else{
//             //                     echo "something wrong";
//             //                       }

//     }
//     mysqli_stmt_close($stmt);
// //}
// mysqli_close($conn);
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signUp_css.css?v=<?php echo time(); ?>">
    <!-- ?v=<?php //echo time(); ?> -->
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
  </div> 
  </div>
    </nav>

             



    <main>
    <img src="img/pic19.jpg" alt="">
     <!-- <section> -->
<div class="container">
<h3>Please Register Here:</h3>
     
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail" placeholder="Email" required>
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group col-md-5">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password" required>
    </div>

  <div class="form-row">
   
    <label for="gender">Male</label>
      <input type="radio" name="gender" id="male" value="Male" required>
      <label for="gender">Female</label>
        <input type="radio" name="gender" id="female" value ="Female" required >
          
  </div>
  <div class="form-group">
  <label for="dateOfBirth">Date Of Birth</label>
  <input type="date" name="dob" id="dob">
      </div>
  <!-- <div class="form-group"> -->
  <div class="form-group col-md-5">
     <label for="choose">Select choose</label>
     <select name="choose" id="a">
     
                <option value="">--Select --</option>
              <option value="NGO">NGO</option>
              <option value="Orphanage">Orphanage</option>
              <option value="School">School</option>
              </select>
              </div>
  
  <!-- <input type="submit" name="submit" value="Submit"> -->
  <button type="submit" class="bt" name ="submit">Submit</button>
</form> 
</div> 
</main>
       

 
 
       
    
    <script>
                var myIndex=0;
            carousel();
        
                function carousel(){
                    var i;
                    var x=document.getElementsByClassName("mySlides");
                    for (i=0;i<x.length;i++)
                    {
                        x[i].style.display= "none";
        
                    }
                    myIndex++;
                    if(i=myIndex>x.length){
                        MyIndex=1;
                    }
                    x[myIndex-1].style.display="block";
                    setTimeout(carousel,3000)// change image every 3 second
                }
            </script>
</body>
</html>