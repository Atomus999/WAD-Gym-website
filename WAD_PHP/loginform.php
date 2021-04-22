<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/loginform.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>
      Loginform
    </title>
  </head>

  <body>

    <?php include 'includes/menu.php'; ?>

      <div class="login">
        <form action="handlers/userLoginHandler.php" method="POST">
          <h2>Log In</h2>
          <ul>
            <li><input type="text" placeholder="Email address" title="Input ID" name="email"></li>
            <li><input type="password" placeholder="PASSWORD" title="Input password" name="password"></li>
            <li><input type="submit" name="loginButton"></li>
          </ul>
        </form>

            <li><a href="signupform.php">Sign up</a></li>
            <br>
          </div>
        </div>


  </body>
</html>
