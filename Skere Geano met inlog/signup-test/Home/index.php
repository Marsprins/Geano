<?php session_start(); ?> <!-- Session has to start so you can see changes when signed in e.g. a profile picture/name -->

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="description" content="Download your favourite community made games here and also upload your own FOR FREE!">
    <meta name="keywords" content="steam, games, download">
    <meta name="author" content="David Miller">
    <title>Geano</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='index.css'>
</head>
<body>

    <div class="header">
        <a href="index.html" id="logo">Geano</a>
        <ul id="nav" class="nav">
            <li><a class="links" href="index.html">Home</a></li>
            <div class="dropdown">
                <button class="dropdown-btn">Categories 🡇</button>
                <div class="dropdown-content">
                    <li><a class="links-hidden" href="#">Featured</a></li>
                    <li><a class="links-hidden" href="#">Geano Recommends</a></li>
                    <li><a class="links-hidden" href="#">Action</a></li>
                    <li><a class="links-hidden" href="#">Survival</a></li>
                    <li><a class="links-hidden" href="#">Free</a></li>
                    <li><a class="links-hidden" href="#">Tripple A</a></li>
                    <li><a class="links-hidden" href="#">Platofrmer</a></li>
                    <li><a class="links-hidden" href="#">VR</a></li>
                    <li><a class="links-hidden" href="#">Shooter</a></li>
                </div>
            </div>
            <li><a class="links" href="#">About Us</a></li>
            <li><a class="links" href="#">Contact</a></li>

            <!-- Changes links when user is signed in --> 
            <?php
                if(isset($_SESSION["userid"])) // Signed in
                {
            ?>
                <li><a class="links" href="geano-main/Account/Signup Page/signup.html"><?php echo $_SESSION["useruid"]; ?></a></li>
                <li><a class="links" href="includes/logout-inc.php">Logout</a></li>
            <?php
                } 
                else // Not signed in
                {
            ?>
                <li><a class="links" href="geano-main/Account/Signup Page/signup.html">Register</a></li>
                <li><a class="links" href="geano-main/Account/Login Page/login.html">Login</a></li>
            <?php
                }
            ?>
            
        </ul>
    </div>

    <div class="signup-overlay">
    <p class="signup-header">Sign-up</p>    
    <hr/>

    <!-- Signup input -->
    <form action="includes/signup-inc.php" method="post">
      <input name="uid" id="username-input" type="text" placeholder="Username">
      <input name="pwd" id="password-input" type="password" placeholder="Password">
      <input name="pwdrepeat" id="password-input" type="password" placeholder="Repeat Password" >
      <input id="email-input" type="text" name="email" placeholder="E-mail">
      <button class="signup-button" type="submit" name="submit" href="../geano%20beta/?error=stmtfailed">Sign-up</button>
    </form>

    <!-- Login input -->
    <form action="includes/login-inc.php" method="post">
      <input id="username-input" type="text" placeholder="Username" name="uid">
      <input id="password-input" type="password" placeholder="Password" name="pwd">
      <a class="forgot-password" href="#">Forgot Password?</a>
      <button class="login-button" type="submit" name="submit">Login</button>
    </form>
    
    <p class="member-question">Already a member? <a class="login-link" href="#">Log in</a></p>
  </div>
      
</body>
</html>
