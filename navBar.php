
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
                              <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php  session_start();
                              if($_SESSION){echo "Welcome ". $_SESSION['username'];}?></a>
               </div> 
               </div>
                 </nav>