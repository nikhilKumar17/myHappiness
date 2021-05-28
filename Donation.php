 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orphanage</title>
    <link rel="stylesheet" href="Donation_CSS.css?v=<?php echo time(); ?>">
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
 include 'navbar.php' ;

?>
    </nav>


    <header>
    <img src="img/donate.png" alt="" width="100%" >
    </header>
    <main>
    <aside >
         
    
    </aside>
    <section >
    <div class="container">
    <form action="">   <!-- there give server location -->
       <h1 class="Main_heading">Payment Form</h1>
       <h2>Contact information</h2>
       <p>required fileds are followed by *</p>
       <p>Name: * <input type="text"  required name="name" placeholder="om kumar"></p>
       <fieldset>
           <legend>Gender *</legend>
       <p>
          Male <input type="radio" name="gender" id="male" required>
         Female <input type="radio" name="gender" id="female" required>
       </p>
    </fieldset>
    <p>Address:
         <textarea name="Address" id="address" cols="30" row="10"  ></textarea></p>
     <p> Email: * <input type="email" name="email" id="email"required></p> 
    <p>Pincode: <input type="number" name="pincode" id="pincode"></p>
    <hr>
     <h2>Payment Information</h2>
     
     <p>Card Type:
         <select name="card_type" id="card_type">
             <option value="">--Select Card Type--</option>
           <option value="visa">Visa</option>
           <option value="rupay">Rupay</option>
           <option value="masterCard">masterCard</option>
         </select>
     </p>
     <p>
         card Number <input type="number" name="Card_number" id="card_type">
     </p>
     <p>Expiration Date: <input type="date" name="exp_date" id="exp_date">
    </p>
    <p>CVV <input type="password" name="cvv" id=""cvv></p>
    <p><input type="submit" value="pay Now"></p>

</form>
</div>
    </section>
    


 
</main>
</main>
 <?php
 include 'footer.php';
 ?>
</body>
</html>