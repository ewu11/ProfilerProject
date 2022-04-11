<?php
    class myConnection {
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
                echo "Connection to <u>" . $this->svName . "</u> failed!<br>";
            }
            else {
                echo "Connection to <u>" . $this->svName . "</u> succeeded!<br>";
            }
        }

        public function closeConn() {
            if($this->conn->close()) {
                echo "Connection closed!<br>";
            }
            else {
                echo "Close connection error: ".mysqli_error($this->conn). "<br>";
            }
        }

        public function getConn() {
            return $this->conn;
        }
        //----member methods----
    }

    //-----testing-----
    // $hmm = new myConnection();

    // $hmm->closeConn();

?>