<?php

class LoginContr extends Login {
    private $uid;
    private $pwd;

    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../index.php");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }

    private function emptyInput() { // Returns a "false" value if an input field is empty 
        $result;
        if(empty($this->uid) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}