<?php
    //TO CREATE DATABASE
    
    //--import to access class--
    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) { //if user was already logged in, no need go to index.php
        require "./databases/connection/connectionNew.php";
    }
    else if(isset($_POST["signin"])) { //used by "manageHomePage.php" -- signin button clicked
        require "../databases/connection/connectionNew.php";
    }
    else if(isset($_POST["signup"])) { //if signup button clicked
        require "../databases/connection/connectionNew.php"; //used by registorProcessor
    }
    else {
        if($_SESSION["onDebug"] === true) {
            echo "<h1>ERROR!</h1>";
        }
    }
    //--import to access class--

    //-----variables-----
    $dbName = "profilerDB"; //used globally

    $accTblName = "account"; //used globally
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

    //--finally, select the database for processing--
    if($connObj->getConn()->select_db($dbName)) { //select profiledb as current database
        if($_SESSION["onDebug"] === true) {
            echo "Database named <u>" .$dbName. "</u> selected!<br>";
        }
        else {
            if($_SESSION["onDebug"] === true) {
                echo "Database selection error!<br>";
            }
        }
    }
    //--finally, select the database for processing--
?>