<?php

class Dbh {

    protected function Connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
            return $dbh;
        } catch (PDOExcepction $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}