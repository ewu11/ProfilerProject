<?php
    //TO CREATE DATABASE

    //import to access class    
    require_once "../databases/connection/connectionNew.php";
    // require("/xampp/htdocs/testProfile/databases/connection/connectionNew.php");

    //-----variables-----
    $dbName = "profilerDB2";

    $accTblName = "account";
    //-----variables-----
    
    //-----queries-----
    $createDB = "CREATE DATABASE " .$dbName; //create database
    $dropDB = "DROP DATABASE " .$dbName; //drop database
    $useDB = "USE " .$dbName; //select database
    //-----queries-----

    //-----operations------
    $connObj = new MyConnection();

    echo "Checking for database...<br>";
    //if db exists, check if selected, else, create it
    if($connObj->getConn()->select_db($dbName)) {
        echo "Database named <u>" .$dbName. "</u> already exists!<br>";
    }
    else {
        //if database done create, show message
        if($connObj->exeQuery($createDB)) {
            echo "Database not yet created...<br>";
            echo "Creating database named <u>" .$dbName. "</u>...<br>";
            echo "Database named <u>" .$dbName. "</u> successfully created!<br>";
        }
        //else show error output
        else {
            "Database creation error: " .mysqli_error($connObj->getConn()). "<br>";
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