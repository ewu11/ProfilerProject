<?php
    // session_start();
    //TO CREATE DATABASE

    //import to access class
    if($_SESSION["loggedIn"] === true) { //if login button clicked
        require "./databases/connection/connectionNew.php";
    }
    else if($_SESSION["loggedIn"] === false) { //used by "manageHomePage.php"
        require "../databases/connection/connectionNew.php";
    }
    else if(isset($_POST["signup"])) { //if signup button clicked
        require "../databases/connection/connectionNew.php";
    }
    else {
        if($_SESSION["onDebug"] === true) {
            echo "<h1>ERROR!</h1>";
        }
    }
    // require __DIR__."databases/connection/connectionNew.php";
    // require_once "/xampp/htdocs/TheProfiler/databases/connection/connectionNew.php";

    //-----variables-----
    $dbName = "profilerDB";

    $accTblName = "account";
    //-----variables-----
    
    //-----queries-----
    $createDB = "CREATE DATABASE " .$dbName; //create database
    $dropDB = "DROP DATABASE " .$dbName; //drop database
    $useDB = "USE " .$dbName; //select database
    //-----queries-----

    //-----operations------
    $connObj = new MyConnection();

    if($_SESSION["onDebug"] === true) {
        echo "Checking for database...<br>";
    }
    
    //if db exists, check if selected, else, create it
    if($connObj->getConn()->select_db($dbName)) {
        if($_SESSION["onDebug"] === true) {
            echo "Database named <u>" .$dbName. "</u> already exists!<br>";
        }
    }
    else {
        //if database done create, show message
        if($connObj->exeQuery($createDB)) {
            if($_SESSION["onDebug"] === true) {
                echo "Database not yet created...<br>";
                echo "Creating database named <u>" .$dbName. "</u>...<br>";
                echo "Database named <u>" .$dbName. "</u> successfully created!<br>";
            }
        }
        //else show error output
        else {
            if($_SESSION["onDebug"] === true) {
                "Database creation error: " .mysqli_error($connObj->getConn()). "<br>";
            }
        }
    }

    //lastly use the created db
    // if($connObj->exeQuery($useDB)) {
    //     echo "Database named <u>" .$dbName. "</u> selected!<br>";
    // }
    // else {
    //     "Database selection error: " .mysqli_error($conn). "<br>";
    // }
    //-----operations-----
?>