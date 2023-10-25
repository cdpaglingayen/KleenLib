<?php
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../User/login.php');
}

?>

<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>

<body>

<body>
    <div class="justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Library Management System</h1>
		</div>
	</div>
		
	  <form id="form-custom">
		<div>
				<h2 class="reg">Admin Login</h1>
	
					<!-- Password input -->
                    <div class="form-floating mb-4">
                      <input type="password" id="password" class="form-control" placeholder="Password">
                      <label class="form-label" for="password">Password</label>
                    </div>
					
                   
                    <!-- Submit button -->
					<div class="d-grid gap-2 col-6 mx-auto">
						<button type="button">Sign in</button>
					</div>
						  
		</div>
      </form>
				<!-- Register buttons -->
				  
			<div class="container">
        <a href="../Register/register.php" class="btn float-right ml-2 link-light">Register</a>
        <a href="../Login/login.php" class="btn float-right ml-2 link-light">Back to User Login</a>
      </div>
      
    </body>
</html>