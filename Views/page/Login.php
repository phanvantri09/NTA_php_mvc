
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login Mỹ Phẩm</title>
    <link rel='stylesheet' href="./public/css/login.css" type='text/css'>
</head>
<body>
<div class="login">
  <h2 class="active"> sign in </h2>

  <h2 class="nonactive"> sign up </h2>
  <form method="POST">
    <input type="text" class="text" name="usernameLogin">
     <span>username</span>

    <br>
    
    <br>

    <input type="password" class="text" name="passwordLogin">
    <span>password</span>
    <br>

    <input type="checkbox" id="checkbox-1-1" name="checkboxLogin" class="custom-checkbox" />
    <label for="checkbox-1-1">Keep me Signed in</label>
    
    <button type="submit" class="signin" name="btnLogin">
      Sign In
    </button>


    <hr>

    <a href="#">Forgot Password?</a>
  </form>

</div>
</body>
</html>