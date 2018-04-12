<?php 
  include 'include/config.php';
  include 'include/classes/Account.php';
  include 'include/classes/Constants.php';
  $account = new Account($con);

  function getInputValue($input) {
    return isset($_POST[$input]) ? $_POST[$input] : '';
  }
?>
<?php include 'include/handlers/register-handler.php'; ?>
<?php include 'include/handlers/login-handler.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Spotify - Listen to your needs!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/style.css" >
  </head>
  <body>
   
    
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <form action="register.php" id="login-form" method="post">
          <h2 class="text-center">Login To Your Account</h2>
            <div class="form-group">
              <p><?php echo $account->getError(Constants::$loginFailed); ?></p>
              <label for="loginUsername">Username</label>
              <input type="text" id="loginUsername" name="loginUsername" class="form-control" placeholder="e.g. bartSimpson" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="loginPassword">Password</label>
              <input type="password" id="loginPassword" name="loginPassword" class="form-control" placeholder="Enter password" required>
            </div>

          <button type="submit" name="loginButton" class="btn btn-primary">Login</button>
          <div class="hasAccountText">
            <span id="hideLogin">Don't have an account yet? Signup here.</span>
          </div>
        </form><!-- end of form -->

        <form action="register.php" id="register-form" method="post">
          <h2 class="text-center">Create New Account</h2>

          <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input type="text" id="firstname" name="firstname" value="<?= getInputValue('firstname'); ?>" class="form-control" placeholder="Enter firstname" required>
            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
          </div>

          <div class="form-group">
            <label for="lastname">Lastname:</label>
            <input type="text" id="lastname" name="lastname" value="<?= getInputValue('lastname'); ?>" class="form-control" placeholder="Enter lastname" required>
            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= getInputValue('email'); ?>" class="form-control" placeholder="Enter email" required>
            <?php echo $account->getError(Constants::$emailInvalid); ?>
            <?php echo $account->getError(Constants::$emailTaken); ?>
          </div>
          
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" id="username" name="username" value="<?= getInputValue('username'); ?>" class="form-control" placeholder="Enter username" required>
                <?php 
                  echo $account->getError(Constants::$usernameCharacters);
                  echo $account->getError(Constants::$usernameTaken);
                ?>
            </div>

            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
             <?php 
                  echo $account->getError(Constants::$passwordCharacters);
                  echo $account->getError(Constants::$passwordNotAlphaNumeric);
                  echo $account->getError(Constants::$passwordDoNotMatch);
                ?>
            </div>

            <div class="form-group">
              <label for="password2">Confirm Password:</label>
              <input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm password" required>
            </div>

          <button type="submit" name="registerSubmit" class="btn btn-primary">Submit</button>
          <div class="hasAccountText">
            <span id="hideRegister">Already have an account? Login here!</span>
          </div>
        </form><!-- end of form -->
      </div><!-- col-lg-12 -->
    </div><!-- row -->
  </div><!-- container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripting.js"></script>

     <?php 
      if (isset($_POST['registerSubmit'])) {
        echo '<script>
                jQuery(document).ready(function() {
                  $("#login-form").hide();
                  $("#register-form").show()
                });
              </script>';
      } else {
        echo '<script>
                jQuery(document).ready(function() {
                  $("#login-form").show();
                  $("#register-form").hide()
                });
              </script>';
      }
     ?>
  </body>
</html>