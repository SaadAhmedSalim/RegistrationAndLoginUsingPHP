<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>

    <div class="container">

      <div class="header">

        <h2>Register</h2>

          <form action="registration.php" method="post">

            <?php include('errors.php') ?>

                <div>
                  <label for="username">UserName</label>
                  <input type="text" name="username" required>
                </div>

                <div>
                  <label for="age">Age</label>
                  <input type="text" name="age" required>
                </div>

                <div>
                  <label for="gender">Gender</label>
                  <input type="radio" name="gender" value="male">Male
                  <input type="radio" name="gender" value="female">Female
                  <input type="radio" name="gender" value="other">Other
                </div>

                <div>
                  <label for="email">Email</label>
                  <input type="text" name="email" required>
                </div>

                <div>
                  <label for="password">Password</label>
                  <input type="text" name="password" required>
                </div>

                <div>
                  <label for="cpassword">Confirm Password</label>
                  <input type="text" name="cpassword" required>
                </div>

                <button type="submit" name="signup">Sign Up</button>

                <p>Already Have an Account? <a href="login.php"><b>Log in</b></a></p>




          </form>

      </div>

    </div>

  </body>
</html>
