<?php // added -R
  if(isset($_SESSION['user'])){
    header("Location:../User/index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Prevent Back button as of 25-10-22 -->
    <script type="text/javascript">
        function preback(){window.history.forward();}
        setTimeout("preback()", 0);
        window.onunload=function(){null};

        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
  
  <?php include('../User/functions.php') ?>

    <div class="container-fluid">
      <div class="row no-gutter">
        <div class="col-lg-4 d-none d-lg-block vh-100 left-side">
          <img src="library.png" class="img-fluid image-resize">
        </div>

        <div class="col-lg-8 d-flex justify-content-center vh-100 right-side">
          <form id="form-custom" action="login.php" method="post">
          
            <?php echo display_error(); ?>

              <!-- Email input -->
              <div class="form-floating mb-4">
                <input type="text" id="email" class="form-control" placeholder="Email" name="username" required>
                <label class="form-label" for="email">Email</label>
              </div>

              <!-- Password input -->
              <div class="form-floating mb-4">
                <input type="password" id="myInput" class="form-control" placeholder="Password" name="password" required>
                <label class="form-label" for="password">Password</label>
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-3">
                <div class="col d-flex justify-content-center">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="show-password" onclick="showPassword()">
                    <label class="form-check-label" for="showpassword"> Show Password </label>
                  </div>
                  <div class="col">
                    <!-- Simple link -->
                    <a href="#" class="link-light" onclick="Forgotpass();">Forgot password?</a>
                  </div>
                </div>
              </div>

              <!-- Submit button -->
              <div class="row">
                <button type="submit" class="btn btn-primary btn-block mb-4" name="login_btn">Sign in</button>
              </div>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Not a member? <a href="../Register/register.php" class="link-light">Register</a></p>
              </div>
          </form>
        </div>
      </div>
    </div>
  <script src="script.js"></script>
</body>
</html>