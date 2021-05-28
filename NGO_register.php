 

   

  <?php // session_start();
    // include 'config.php';
    // //  $NGO_name = $Address =  $Website_link=$Contact="";
   
    //      if(isset($_POST['submit']))
  
    //   {   $NGO_name = ($_POST['NGO_name']);
    //    $Address = $_POST['Address'];
    //       $Contact = ($_POST['Contact']);
    //      $Website_link = ($_POST['Website_link']);

    //      $add = "SELECT id FROM users ";
    //      $a1= mysqli_query($conn,  $add);
    //      $r1 = mysqli_fetch_array($a1);
    //  $id =   $r1['id'] ;
       
    //       $sql = "INSERT INTO ngo_details (NGO_name,Address ,Website_link,Contact,id) VALUES (  '$NGO_name', '$Address',  '$Website_link' ,  '$Contact','$id')";
    //    $res= mysqli_query($conn, $sql);
      
    //      if($res){
    //      ?>
    <!--      <script> -->
    <!-- //      alert("data inserted properly"); -->
    <!-- //      </script>
    //      <?php
    //     }    else{
    //       ?>
    //        <script>
    //       alert("data not  inserted properly")
    //       </script>



          
         
    //       <?php
    //      }
         
       
    //  }

    //  if(isset($_POST['update']))

    //   {   $NGO_name = ($_POST['NGO_name']);
    //     $Address = $_POST['Address'];
    //        $Contact = ($_POST['Contact']);
    //       $Website_link = ($_POST['Website_link']);
    //     $ids = $_GET['id'];

      
    //     $sql =   "  UPDATE ngo_details SET  NGO_name= '$NGO_name', Address='$Address',Contact='$Contact', Website_link= '$Website_link' WHERE  ngo_details.id=$ids " ;
    //     $res= mysqli_query($conn, $sql);

    //     if($res){
    //       ?>
    //       <script>
    //       alert("data updated properly");
    //       </script>
    //       <?php
    //      }    else{
    //        ?>
    //         <script>
    //        alert("data not updated properly")
    //        </script>
          
    //        <?php
    //       }

    //   }


    //   if(isset($_POST['delete']))

    //   {   $iddelete = $_GET['id'];
    //     $sql = "DELETE FROM ngo_details WHERE ngo_details.id=$iddelete ";
    //   //  die ();
    //    $res= mysqli_query($conn, $sql);
 
    //      if($res){ 
    //        header("location: NGO_register.php?id='$id' ");
    //        ?>
    //        <script>alert("data deleted properly");
          
           
    //        </script>
    //        <?php
    //       }    else{
    //         ?>
    //          <script>
    //         alert("data not deleted properly")
    //         </script>
           
    //         <?php
    //        }
 
    //    }
       
   ?> -->

<!doctype html>
<html lang="en">
  <head>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="signUp_CSS.css">
    
    <title>My happiness</title>
  </head>
  <body>
  
  
             
  <nav>
  <?php   
   include 'navBar.php' ?>
                 </nav>

<?php 
    include 'config.php';
    //  $NGO_name = $Address =  $Website_link=$Contact="";
    // session_start();
   
         if(isset($_POST['submit']))
  
      {   $NGO_name = ($_POST['NGO_name']);
       $Address = $_POST['Address'];
          $Contact = ($_POST['Contact']);
         $Website_link = ($_POST['Website_link']) ;

        //  $add = "SELECT id FROM users ";
        //  $a1= mysqli_query($conn,  $add);
        //  $r1 = mysqli_fetch_array($a1);
 //  $id =   $r1['id'] ;
    $id = $_GET['id'];
       
     $sql = "INSERT INTO ngo_details (NGO_name,Address ,Website_link,Contact,id)
      VALUES (  '$NGO_name', '$Address',  '$Website_link' ,  '$Contact',$id   )";
    
     
     
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

      {   $NGO_name = ($_POST['NGO_name']);
        $Address = $_POST['Address'];
           $Contact = ($_POST['Contact']);
          $Website_link = ($_POST['Website_link']);
        $ids = $_GET['id'];

      
        $sql =   "  UPDATE ngo_details SET  NGO_name= '$NGO_name', Address='$Address',Contact='$Contact', Website_link= '$Website_link' 
        WHERE  ngo_details.id=$ids " ;
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
        $sql = "DELETE FROM ngo_details WHERE ngo_details.id=$iddelete ";
      //  die ();
       $res= mysqli_query($conn, $sql);
 
         if($res){ 
          //  header("location: NGO_register.php?id='$id' ");
           ?>
           <script>alert("data deleted properly");
          
           
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
                     
                     //  include 'config.php'; 
  
                if(isset($_POST['edit']))
                { 
       $idedit =$_GET['id'];
              
                   $sqledit= "SELECT * FROM ngo_details WHERE ngo_details.id=$idedit " ;
                   $resedit= mysqli_query($conn, $sqledit);
                  
                  
                   if($resedit)
                   $row = mysqli_fetch_array($resedit);
                   
                   
                  }
   
     ?>

 
 <main>
                 <img src="img/pic7.jpg" alt="" width=100%>
  <!-- <input type="submit" name="submit" value="Search"> -->
     <!-- <section> -->
<div class="container">
<h3>Please Register For NGO Here:</h3>
<hr>
<!-- <form action="<?php// $_SERVER['REQUEST_METHOD'] ; ?>" method="post"> -->
<form action=" " method="POST">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">NGO name</label>
      <input type="text" class="form-control" name="NGO_name" id="NGO_name" placeholder="NGO name"  value="<?php  if(isset($_POST['edit'])){ echo $row['NGO_name'];} ?>" >
    </div>
    <div class="form-group col-md-8">
      <label for="Address">Address</label>
      <input type="text" class="form-control" name ="Address" id="Address" placeholder="Address"  value="<?php  if(isset($_POST['edit'])){ echo $row['Address'];} ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="text">Contact no</label>
      <input type="text" class="form-control" name ="Contact" id="Contact" placeholder="Contact no" value="<?php  if(isset($_POST['edit'])){ echo $row['Contact'];} ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Website link</label>
      <input type="text" class="form-control" name ="Website_link" id="Website_link"  value="<?php  if(isset($_POST['edit'])){ echo $row['Website_link'];} ?>">
    </div>
  </div>
    <div class="form-group col-md-5">
     
 
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
