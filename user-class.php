<?php

class User{
    public $email = "";
    public $password = "";
    public $username = "";
    private $connection;

    function __construct($connection, $email, $password, $username) {
        $this->username = mysqli_real_escape_string($connection , $username);
        $this->email = mysqli_real_escape_string($connection, $email);
        $this->password = mysqli_real_escape_string($connection, $password);
        $this->connection = $connection;
    }

    function authenticate() {
        $sql = "SELECT user_id, username, email, password FROM users WHERE email=\"{$this->email}\";";
        $result = $this->connection->query($sql);
        if ($row = $result->fetch_assoc()) {
            if ($row["password"] == $this->password) {
                $this->authenticated=True;
            }
        }
    }
    function is_logged_in() {
        return $this->authenticated;
    }
}