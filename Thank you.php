<?php
require_once "config.php";
 
// $username = $password = $confirm_password = $dob= $gender="";
// $username_err = $password_err = $confirm_password_err = $dob_err= "";

// if ($_SERVER['REQUEST_METHOD'] == "POST"){

//     $password = trim($_POST['password']);
//     $username = trim($_POST['username']);
//     $gender = ($_POST['gender']);
//     $dob = ($_POST['dob']);

//     $sql = "INSERT INTO users (username, password,gender,dob) VALUES (?, ?,?,?)";
//     $stmt = mysqli_prepare($conn, $sql);
//     if ($stmt)
//     {
//         mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password,$param_gender,$param_dob);

//         // Set these parameters
//         $param_username = $username;
//         // $param_password = password_hash($password, PASSWORD_DEFAULT);
// $param_password =$password;
// $param_gender =$gender;
// $param_dob=$dob;
//         // Try to execute the query
//         if(isset($_POST['submit']))
//        {  
//         if (mysqli_stmt_execute($stmt) )
//         {
//            $choice =$_POST['choose'];
//            if($choice=="NGO")
//           {header("location: welcome.php");}
//               else if($choice=="Orphanage")
//               {header("location: Orphanage_register.php");}
//                 else 
//                 {header("location: School_register.php");}
//           }
//         else{
//             echo "Something went wrong... cannot redirect!";
//         }
//       }

//     }
//     mysqli_stmt_close($stmt);
// //}
// mysqli_close($conn);
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="index_css.css?v=<?php echo time(); ?>">
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
    
 <img src="img/Thank you.jpg" alt=""> 
</main>
       

 
<footer>
        <a href="#">FAQ</a>
        <a href="#">Contact Us</a>
        <a href="#">Terms of Use</a>
        <a href="#">privacy policy</a>
        <a href="#"> refund policy</a>
        <a href="#">&COPY;2021| Apni website</a>
    </footer>
 
       
     
</body>
</html>