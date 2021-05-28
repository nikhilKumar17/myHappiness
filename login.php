<?php  session_start();
if( isset($_POST['submit']) &&   $_SERVER['REQUEST_METHOD'] == "POST"){
      //  $_SERVER['REQUEST_METHOD'] ; 
   include 'config.php';
  $username = ($_POST['username']);
 $password = ($_POST['password']);

   $sql = "SELECT id, username, password FROM users WHERE username =  '$username'";
    
    
  
  
   $res= mysqli_query($conn, $sql)or die ("query fail");
    
   if(mysqli_num_rows($res)>0)
   {
           // while ($row = mysqli_fetch_assoc( $res))
            // { 
              $r = mysqli_fetch_array($res);
              session_start();
                          $_SESSION["username"] = $username;
                     
                     $_SESSION["loggedin"] = true;
                     $id =$r['id'] ;
                          $id ; 
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
           
              
         //  }
   }
   else 
   {
     echo '<div class="alert"> sodd</div>' ;
   }
  }

?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     
    <link rel="stylesheet" href="signUp_css.css?v=<?php echo time(); ?>">
    <title>PHP login system!</title>
  </head>
  <body>

  
  <nav>
  <?php
 include 'navbar.php' ;

?>
<!-- <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a> -->
               </div> 
               </div>
                 </nav>
  
 
             
<main>
<img src="img/pic21.jpg" alt="" width=100%>
<div class="container mt-4">
<h3>Please Login Here:</h3>
<hr>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <div class="form-group col-md-5">
     
  <select name="choose" id="a">
  <label for="inputPassword4">Organisation</label>
             <option value="">--Select Orgnaization --</option>
           <option value="NGO">NGO</option>
           <option value="Orphanage">Orphanage</option>
           <option value="School">School</option>
           </select>
           </div>
  <button type="submit" class="bt" name ="submit">Submit</button>
</form>



</div>
</main>
  </body>
</html>
