
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      
      <?php if(file_exists("images/Fuerzo Logo.png")){
        ?>
      <a href="index.php"><img src="images/Fuerzo Logo.png" class="logo" ></a>

      <?php } else if(file_exists("../images/Fuerzo Logo.png")){
        ?>
      <a href="../index.php"><img src="../images/Fuerzo Logo.png" class="logo" ></a>

      <?php } ?>
      
      
      
      
      <?php
      if(isset($_SESSION['userId']))
      {?>
          <div class="logobuttons">
            <?php if(file_exists("login.php")){ ?>
            <a href="login.php"> Profile</a><br>
            <a href="handlers/userLogoutHandler.php"> Logout</a> <br>  
            <?php } else{ ?>
              <a href="../login.php"> Profile</a><br>
              <a href="../handlers/userLogoutHandler.php"> Logout</a> <br>  
           <?php } ?>
          
          <?php echo 'Welcome, '.$_SESSION['Name'];  ?>     
          </div>
         
      <?php }
       else
      { if(file_exists("loginform.php")){ ?>
      
            <div class="logobuttons">
          <a href="loginform.php">Log in</a><br>
          <a href="signupform.php">Sign up</a><br>
          </div>

      <?php } else if(file_exists("../loginform.php")){?>    
        <div class="logobuttons">
          <a href="../loginform.php">Log in</a><br>
          <a href="../signupform.php">Sign up</a><br>
          </div>
      <?php } 
    }?>
      <ul class = "menu">
        <li><a href="index.php" class="active">Home</a></li>

        <?php 
        if(isset($_SESSION['userId']))
        { 
          if(isset($_SESSION['role']))
          {
            if($_SESSION['role']=='admin'){
              if(file_exists("adminPage.php")){              
                      ?> <li><a href="adminPage.php">Admin Page</a></li> <?php
                    }
                    else{ ?>
                      <li><a href="../adminPage.php">Admin Page</a></li>
                    <?php }
                  }

            else{
              if(file_exists("personalPage.php")){
                  ?> <li><a href="personalPage.php">Personal Page</a></li>  <?php
              }
              else{ ?>
                <li><a href="../personalPage.php">Personal Page</a></li>  <?php
              }
              ?> 
            <?php
            }
          }
        }
        ?>
            
      
        <?php if(file_exists("exercises.php")){ ?>
        <li><a href="exercises.php">Exercises</a></li>
        <li><a href="beginnertips.php">Beginner tips</a></li>
        <li><a href="aboutus.php">About us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php } else if(file_exists("../exercises.php")){?>

        <li><a href="../exercises.php">Exercises</a></li>
        <li><a href="../beginnertips.php">Beginner tips</a></li>
        <li><a href="../aboutus.php">About us</a></li>
        <li><a href="../contact.php">Contact</a></li>

        <?php } ?>
        
        


        </ul>
    </nav>