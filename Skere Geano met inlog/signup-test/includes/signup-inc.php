<?php

if(isset($_POST["submit"])){

    // Grabbing the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Instantiate signupContr class
    include "../classes/dbh-classes.php"; //Database needs to be first
    include "../classes/signup-classes.php"; //Signup needs to be before signup-contr
    include "../classes/signup-contr-classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going to back to front page
    header("location: ../index.php?error=none");
}