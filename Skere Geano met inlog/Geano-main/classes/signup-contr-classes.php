<?php

class SignupContr extends Signup {
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../geano%20beta/?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false) {
            // echo "Invalid username!";
            header("location: ../geano%20beta/?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            // echo "Invalid email!";
            header("location: ../geano%20beta/?error=email");
            exit();
        }
        if($this->pwdMatch() == false) {
            // echo "Passwords don't match!";
            header("location: ../geano%20beta/?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false) {
            // echo "Username or email taken!";
            header("location: ../geano%20beta/?error=emailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput() { // Returns a "false" value if an input field is empty 
        $result;
        if(empty($this-uid) || empty($this-pwd) || empty($this-pwdRepeat) || empty($this-email) ) {
            $result = false
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid() { // Returns a "false" value if the username contains any invalid characters
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() { // Returns a "false" value if email is invalid
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() { // Checks if repeated password is correct
        $result;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() { // Checks if username is already taken
        $result;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}