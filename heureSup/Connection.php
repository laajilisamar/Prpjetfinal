<?php
class Connection{

    private $dbhost = "localhost";
    private  $dbuser = "root";
    private $dbpass = "";
    private $dbname = "scolarite";
    private $con;

    public function __construct(){
        $this->con = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if ($this->con->connect_error) {
            die("Failed to connect: ");
        }
    }

    public function getConnection(){
        return $this->con;
    }
}

?>