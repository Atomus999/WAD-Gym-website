<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="javascript/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>

    </title>
  </head>

  <body>
    
    <?php
    if(isset($_POST['create'])){
      echo 'User submitted!';
    }
    ?>

    <?php include 'includes/menu.php'; ?>

    <form action="signup.php" method="POST" id="submitForm" style="border:1px solid gray">
        <div class="container">
          <h1>Sign Up</h1>
          <p>Fill in this form to create an account.</p>

          <label for="name"><b>Name</b></label><span id="nameErrorMsg">smth</span> 
          <input type="text" placeholder="Name" name="name" class="name" id="nameCheckForm" required>

          <label for="email"><b>Email</b></label><span id="emailErrorMsg">sth</span>  
          <input type="email" placeholder="Enter Email" name="email" class="inputPass" id="emailCheckForm" required>
          
          <label for="psw"><b>Password</b></label><span id="passLenErrorMsg">smth</span> 
          <input type="password" placeholder="Enter Password" name="psw" class="inputPass" id="passLenCheckForm" required>

          <label for="psw-repeat"><b>Repeat Password</b></label><span id="passRepeatErrorMsg">smth</span> 
          <input type="password" placeholder="Repeat Password" name="psw-repeat" class="inputPass" id="passRepeatCheckForm" required>

          <label for="weight"><b>Weight(kg)</b></label><span id="weightErrorMsg">smth</span> 
          <input type="text" placeholder="Enter weight" name="weight" class="inputPass" id="weightCheckForm" required>

          <label for="height"><b>Height(cm)</b></label><span id="heightErrorMsg">smth</span> 
          <input type="text" placeholder="Enter height" name="height" class="inputPass" id="heightCheckForm" required>

          <div class="clearfix">
            <button type="button" class="signFormBtns cancelbtn">Cancel</button>
            <button type="submit" name = "create" class=" signFormBtns signupbtn" style="background-color:green">Sign Up</button>
          </div>
        </div>
      </form>

      

  </body>
</html>
