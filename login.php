<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

    <div class="container">

      <div class="header">

        <h2>Login</h2>

          <form action="login.php" method="post">


                <div>
                  <label for="username">UserName</label>
                  <input type="text" name="username" required>
                </div>

                <div>
                  <label for="password">Password</label>
                  <input type="text" name="password" required>
                </div>


                <button type="submit" name="login_btn">LOGIN</button>

                <p>Don't have an Account? <a href="registration.php"><b>Sign up</b></a></p>




          </form>

      </div>

    </div>

  </body>
</html>
