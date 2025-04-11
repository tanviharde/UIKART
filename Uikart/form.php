<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>

    <div class="container" id="signUp" style="display: none;">
        <h1 class="form-title">SIGN UP</h1>
        <form method="post" action="register.php">
            <input type="hidden" name="signUp" value="1"> <!-- ✅ Fixes form submission -->

            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" placeholder="First Name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" placeholder="Last Name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" class="btn" value="SIGN UP">
        </form>
        <p class="or">----------- OR -----------</p>
        <div class="links">
            <p>Already have an account?</p>
            <button id="SignInButton">SIGN IN</button>
        </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">SIGN IN</h1>
        <form method="post" action="register.php">
            <input type="hidden" name="signIn" value="1"> <!-- ✅ Ensures correct form handling -->

            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
           
            <input type="submit" class="btn" value="SIGN IN">
        </form>
        <p class="or">----------- OR -----------</p>
    
        <div class="links">
            <p>Don't have an account yet?</p>
            <button id="SignUpButton">SIGN UP</button>
        </div>
    </div>

    <script src="script.js"></script>
