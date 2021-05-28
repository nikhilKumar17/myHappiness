 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orphanage</title>
    <link rel="stylesheet" href="Orphanage_CSS.css?v=<?php echo time(); ?>">
    <style>
            /* table,
 tr,
 th,
 td{
     border: 2px solid black;
   border-collapse: collapse;
   padding: 10px;
   border-spacing: 5px;
    }
th
{
   /* background-color: blue; */
}
td{
    /* background-color: coral; */
} */
 </style>   
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
             


    <header>
    <img src="img/orphan.jpg" alt="" >
    </header>
            
            <!-- <img src="img/pic3.jpeg" alt="" >  -->
  <div  class="mainBackground" style="background-image: url('img/pic15.jpg');">
           
    <main>
    <!-- <img src="img/pic3.jpeg" alt="" > -->
    <aside >
        <h1>Filter</h1>
        
        <form method="POST" >
        <p>Location:
         <select name="location" id="car">
             <option value="">--Select Location--</option>
           <option value="Arunachal Pradesh">Arunachal Pradesh</option>
           <option value="Andhra pradesh">Andhra Pradesh</option>
           <option value="Bihar">Bihar</option>
           <option value="New Delhi">New Delhi</option>
            </select>
     <br>
      <br>

             <p>Organisation:
            <select name="Organisation" id="a">
             <option value="">--Select Organisation --</option>
           <option value="Government">Government</option>
           <option value="Private">Private</option>
           </select>
           <br>
       <br>
               
         <input type="submit" name="submit" value="Search">
         <br>
         <br><br>
  
        </form>
    </aside>
    <section >
        <h1>Orphanage List</h1>
        
     
            <div class= "table-responsive">
            <table>    
                <tbody>
                                
            <?php
                    include 'config.php';
                     
                        $query1=  "  select Location,id, Home_name,Address,Contact
                        FROM home_details
                        ORDER BY  Location";
                    $selectquery = $query1  ;
                    
                           
                               if(isset($_POST['submit']))
                                     {
                           $area =$_POST['location'];
                           $agency =$_POST['Organisation'];
                          

                          function returnStatment($area,$agency)
                           {   if($area=='' || $agency=='' )
                                             {
                                             $joinLine ='or';
                                             }
                                                         else
                     { 
                                          $joinLine ='and';
                     }
                     $query1 = " select Location,id, Home_name,Address,Contact
                     FROM home_details 
                   WHERE (home_details.Location= '$area') $joinLine (home_details.Organisation='$agency') ";
                     return $query1 ;
                     
                            }
                       
                       // $selectquery = returnStatment($area) ;
                         $selectquery = returnStatment($area,$agency)  ;

                        if( $area=='' && $agency==''){
                            $query1=  "  select Location,id, Home_name,Address,Contact
                            FROM home_details
                            ORDER BY  Location";
                        $selectquery = $query1  ;
                        }
                     }
                        


                            $query = mysqli_query($conn, $selectquery);
                            $num =mysqli_num_rows( $query);
     
                        //      echo $num;
                        if($num==0)
                              {
                                echo "<h1>Result Not found</h1>";
                                
                            }
                            else
                        {
                                   
                           $res = mysqli_fetch_array($query);
                      // echo $res[1] ;
                      
                    
                      ?>
                    <thead>
                           <tr>
                                
                                 <th>NAME</th>
                                  
                                 <th>ADDRESS</th>
                                 <th>LOCATION</th>
                                 <th>CONTACT</th>
                           </tr>
                        </thead>
     
                             <thead> 
                              <tbody>
                                       <?php
                                       do {
                                       ?>
                              <tr>
                              
                              <td><?php echo $res['Home_name'] ?> </td>
                              <td><?php echo $res['Address'] ?> </td>
                              <td><?php echo $res['Location'] ?> </td>
                              <td><?php echo $res['Contact'] ?> </td>
                               
                              </tr>
                              </tbody>
                            <?php }
                             while($res = mysqli_fetch_array($query)) ;
                              }
                             
                            ?>
                          </thead> 
                       
            </table>
            </div>
         <!-- </div> -->
         
    </section>
   
    </main>
  
    <footer>
        <a href="#">FAQ</a>
        <a href="#">Contact Us</a>
        <a href="#">Terms of Use</a>
        <a href="#">privacy policy</a>
        <a href="#"> refund policy</a>
        <a href="#">&COPY;2021| Apni website</a>
    </footer>
  </div>
   
</body>
</html>