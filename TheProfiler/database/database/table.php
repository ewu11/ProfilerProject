<?php
    //decided to separate between creating table and processors
    //reason: readability && granularity 

    // include_once "../database/connection/connection.php";
    include_once "/xampp/htdocs/testProfile/database/connection/connection.php";

    //---variables---
    //--table names--
    $accTblName = "account";
    //--table names--

    // $fullName = $_POST["fullName"];
    // $username = $_POST["username"];
    // $email = $_POST["email"];
    // $password = $_POST["password"];
    // $cpassword = $_POST["cpassword"];

    $createTable = "CREATE TABLE " .$accTblName. "(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullName VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL,
        cPassword VARCHAR(50) NOT NUll
    );";
    //---variables---

    //---manage creating tables---
    //"account" table
    if($conn->query($createTable)) {
        echo "Table named <u> " .$accTblName. "</u> successfully created!<br>";
    }
    else {
        echo "Error: " .mysqli_error($conn). "<br>";
    }
    //---manage creating tables
?>