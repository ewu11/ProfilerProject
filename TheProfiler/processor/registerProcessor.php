<?php
    session_start();
    //TO REGISTER USERS

    //-----variables-----
    require_once "../databases/database/database.php";
    // require("/xampp/htdocs/testProfile/databases/database/database.php");

    $fullName = $_POST["fullName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // $accTblName = "account";
    //-----variables-----

    //-----queries-----   
    $createTable = "CREATE TABLE " .$accTblName. "(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullName VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL,
        cPassword VARCHAR(50) NOT NUll
    );";

    $insertData = "INSERT INTO ".$accTblName." (fullName, username, email, password, cPassword) VALUES ('$fullName', '$username', '$email', '$password', '$cpassword')";
    //-----queries-----

    //-----operations-----
    //---create account tables---
    if($connObj->exeQuery($createTable)) {
        echo "Table named <u> " .$accTblName. "</u> successfully created!<br>";
    }
    else {
        echo "Table creation error: " .mysqli_error($connObj->getConn()). "<br>";
    }
    //---create account tables---

    //---insert data into the table---
    if(!empty($fullName) && !empty($username) && !empty($email) && !empty($password) && !empty($cpassword)) { //make sure fields are not empty
        if(isset($_POST["signup"])) { // if 'signup' button was clicked
            if($connObj->exeQuery($insertData)) {
                echo "Data successfully inserted!<br>";
                $_SESSION["msg"] = "Successfully registered! Please signin.";
                //if success registration, back to index.php
                header("Location: ../index.php");
            }
            else {
                echo "Table insertion error: " .mysqli_error($connObj->getConn()). "<br>";
                $_SESSION["msg"] = "Error registering your account! Account already exists!";
                header("Location: ../registerPage.php");
            }
        }
    }
    else {
        echo "Fill in all the inputs!<br>";
        $_SESSION["msg"] = "Fill in all the inputs!";
    }
    //---insert data into the table---
    //-----operations-----

    //close the database connection
    $connObj->closeConn();

    
?>