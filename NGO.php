 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO </title>
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
             
<?php include 'navBar.php' ?>
    </nav>

    <header>
    <img src="img/pic20.png" alt="" width="100%" >
    </header>
    <div  class="mainBackground" style="background-image: url('img/pic14.jpg');">
    <main>
    <aside >
        <h1>Filter</h1>
        
        <form method="POST" >
        <p>Location:</p>
         <select name="location" id="car">
             <option value="">--Select Location--</option>
             <option value="Bengaluru">Bengaluru</option>
           <option value="Kolkata">Kolkata</option>
           <option value="Mumbai">Mumbai</option>
           <option value="New Delhi">New Delhi</option>
            </select>
  <br>
  <br>

             
               
         <input type="submit" name="submit" value="Search">
         <br>
  <br><br>
  
        </form>
    </aside>
    <section >
        <h1>NGO List</h1>
       
     
        <div  class="main div">
            <!-- <h1>List of data</h1> -->
     
            <div class= "table-responsive">
            <table>      <tbody>
                                
            <?php
                    include 'config.php';
                     
                        $query1=  " SELECT * FROM ngo_details
                        ORDER BY  Location";
                    $selectquery = $query1  ;
                    
                           
                               if(isset($_POST['submit']))
                                     {
                           $area =$_POST['location'];
                           
                          

                          function returnStatment($area)
                          {
                     $query1 = "SELECT * FROM ngo_details
                   WHERE (Location= '$area')   ";
                     return $query1 ;
                     
                            }
                       
                        $selectquery = returnStatment($area) ;
                        
                        }
                        


                            $query = mysqli_query($conn, $selectquery);
                            $num =mysqli_num_rows( $query);
     
                        //      echo $num;
                           $res = mysqli_fetch_array($query);
                      // echo $res[1] ;
                      
                    
                      ?>
                    <thead>
                           <tr>
                                
                                 <th>NAME</th>
                                 <th>ADDRESS</th>
                                 <th>LOCATION</th>
                                 <th>CONTACT</th>
                                 <th>Website_link</th>
                           </tr>
                        </thead>
     
                             <thead> 
                              <tbody>
                                       <?php
                                       do {
                                       ?>
                              <tr>
                              
                              <td><?php echo $res['NGO_name'] ?> </td>
                              <td><?php echo $res['Address'] ?> </td>
                              <td><?php echo $res['Location'] ?> </td>
                              <td><?php echo $res['Contact'] ?> </td>
                              <td>  <a href="<?php  echo $res['Website_link'] ?>   ">Link</a></td>
                               
                              </tr>
                              </tbody>
                            <?php }
                             while($res = mysqli_fetch_array($query)) ;
                             // }
                             
                            ?>
                        </thead> 
                       
            </table>
            </div>
         </div>
         
    </section>
    


  
</main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>
    </div>
</body>
</html>