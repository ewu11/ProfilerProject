<?php
    //CLASS FOR MANAGING CONNECTION AND SQL QUERIES

    class MyConnection {
        //----variables----
        private $svName = "localhost";
        private $svUName = "root";
        private $svPass = "";

        private $conn;
        //----variables----

        //----member methods----
        public function __construct()
        {
            $this->conn = new mysqli($this->svName, $this->svUName, $this->svPass);

            if($this->conn->connect_error) {
                echo "Connection to <u>" . $this->svName . "</u> error: ".mysqli_error($this->conn). "<br>";
            }
            else {
                echo "Connection to <u>" . $this->svName . "</u> succeeded!<br>";
            }
        }

        public function closeConn() {
            if($this->conn->close()) {
                echo "Connection to <u>" .$this->svName. "</u> closed!<br>";
            }
            else {
                echo "Close connection error: ".mysqli_error($this->conn). "<br>";
            }
        }

        public function getConn() {
            return $this->conn;
        }

        public function exeQuery($query) {
            return $this->conn->query($query);
        }
        //----member methods----
    }

    //-----testing-----
    // $hmm = new MyConnection();

    // $hmm->closeConn();

?>