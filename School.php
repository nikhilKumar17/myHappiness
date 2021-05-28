  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School </title>
    <link rel="stylesheet" href="Orphanage_CSS.css?v=<?php echo time(); ?>">
    <style>
            table,
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
}
 </style>   
</head>
<body>
   

<nav>
 <?php 
            include 'navBar.php'
  ?>
    </nav>

    <header>
    <img src="img/happy-NGO.jpg" alt="" width="100%" >
    </header>
    <div  class="mainBackground" style="background-image: url('img/pic13.jpg');">
    <main>
    <aside >
        <h1>Filter</h1>
        
        <form method="POST" >
        <p>Location: </p>
         <select name="location" id="car">
             <option value="">--Select Location--</option>
           <option value="Bengaluru">Bengaluru</option>
           <option value="Kolkata">Kolkata</option>
           <option value="Mumbai">Mumbai</option>
           <option value="New Delhi">New Delhi</option>
            </select>
  <br>
  <br>

             <p>Organisation: </p>
            <select name="Organisation" id="a">
             <option value="">--Select Orgnaization --</option>
           <option value="Government">Government</option>
           <option value="Private">Private</option>
           </select>
           <br>
           <br>

           <p>School Type: </p>
         <select name="school_type" id="school_type">
             <option value="">--Select School Type--</option>
           <option value="coed">Co-Ed</option>
           <option value="Boys">Boys</option>
           <option value="Girls">Girls</option>
         
            </select>
            <br>
  <br>
               
         <input type="submit" name="submit" value="Search">
         <br>
  <br><br>
  
        </form>
    </aside>
    <section >
        <h1>School List</h1>
       
         
                 
        <div  class="main div">
            <!-- <h1>List of data</h1> -->
     
            <div class= "table-responsive">
            <table>      <tbody>
                                
            <?php
                    include 'config.php';
                     
                        $query1=  "SELECT * FROM `school_details`
                        ORDER BY  Location";
                    $selectquery = $query1  ;
                    
                           
                               if(isset($_POST['submit']))
                                     {
                           $area =$_POST['location'];
                           $agency =$_POST['Organisation'];
                           $schoolType=  $_POST['school_type'];
                           
                          

                            
                                 if($area!='' xor $agency!='' xor $schoolType!='')
                                             {
                                             $joinLine ='or';
                                             $query1 = " SELECT * FROM `school_details` WHERE Location='$area' $joinLine organisation='$agency' $joinLine school_type='$schoolType' ";
                                

                                             }
                          
                            if ($area!='' && $agency!='')
                                    {               $joinLine ='and';
                                        $query1 = " SELECT * FROM `school_details` WHERE Location='$area' $joinLine organisation='$agency'   ";}
                                    if ( $agency!=''  && $schoolType!='')
                                    { $joinLine ='and';
                                        $query1 = " SELECT * FROM `school_details` WHERE   organisation='$agency' $joinLine school_type='$schoolType' ";}
                                    if ( $area!=''   && $schoolType!='')
                                    {  $joinLine ='and';
                                        $query1 = " SELECT * FROM `school_details` WHERE Location='$area' $joinLine  $joinLine school_type='$schoolType' ";}
                                     
                              // }
                        // $query1 = " SELECT * FROM `school_details` WHERE Location='$area' $joinLine organisation='$agency' $joinLine school_type='$schoolType' ";
                       $selectquery = $query1  ; 
                    
                        if( $area!='' && $agency!=''  && $schoolType!='') {
                            $joinLine='and';
                            $query1 = " SELECT * FROM `school_details` WHERE Location='$area' $joinLine organisation='$agency' $joinLine school_type='$schoolType' ";
                        $selectquery = $query1  ; 
                        
                     }
                        }
                       
                      
                        

                     
                            $query = mysqli_query($conn, $selectquery);
                            $num =mysqli_num_rows( $query);
     
                              
                              if($num==0)
                              {
                                  echo "<h1>Result Not found</h1>";
                                  
                              }
                              else
                          { $res = mysqli_fetch_array($query);
                      // echo $res[1] ;
                      
                    
                      ?>
                    <thead>
                           <tr>
                                
                                 <th>NAME</th>
                                 <th>ADDRESS</th>
                                 <th>LOCATION</th>
                                 <th>CONTACT</th>
                                 <th>School Type</th>
                           </tr>
                           </tr>
                        </thead>
     
                             <thead> 
                              <tbody>
                                       <?php
                                      do {
                                       ?>
                              <tr>
                              
                              <td><?php echo $res['school_name'] ?> </td>
                              <td><?php echo $res['Address'] ?> </td>
                              <td><?php echo $res['Location'] ?> </td>
                              <td><?php echo $res['Contact'] ?> </td>
                              <td><?php echo $res['school_type'] ?> </td>
                               
                              </tr>
                              </tbody>
                            <?php }
                             while($res = mysqli_fetch_array($query)) ;
                              }
                             
                            ?>
                        </thead> 
                       
            </table>
            </div>
         
         
    </section>
     
</main>

<?php   include 'footer.php' ?> </div>
</body>
</html>