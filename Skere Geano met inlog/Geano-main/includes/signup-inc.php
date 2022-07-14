<?php

if(isset($_POST["submit"])){

    // Grabbing the data
    $uid = $_POST["uid"]
    $pwd = $_POST["pwd"]
    $pwdRepeat = $_POST["pwdrepeat"]
    $email = $_POST["email"]

    // Instantiate signupContr class
    include "../geano-main/classes/dbh-classes.php"; //Database needs to be first
    include "../geano-main/classes/signup-classes.php"; //Signup needs to be before signup-contr
    include "../geano-main/classes/signup-contr-classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going to back to front page
    header("location: ../geano%20beta/?error=none");
}