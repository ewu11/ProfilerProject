<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";

    //create connection
    $conn = new mysqli($serverName, $username, $password);

    //check connection
    if($conn->connect_error) {
        echo "Connection to <u>" . $serverName . "</u> failed!<br>";
    }
    else {
        echo "Connection to <u>" . $serverName . "</u> succeeded!<br>";
    }

    //---variables---
    //set the database name
    $dbName = "profilerDB";

    //get object list of available database
    // $checkDB = "SHOW DATABASES LIKE '" .$dbName. "'";

    //create database if not exists
    $createDB = "CREATE DATABASE " .$dbName;

    //select the database
    $checkDB = $conn->select_db($dbName); //-> to check whether database exists
    $useDB = "USE " .$dbName;


    //drop the database
    $dropDB = "DROP DATABASE " .$dbName;

    //---variables---

    //---check if db already exists, else create it---
    //check if db is available and selected
    echo "Checking for database...<br>";

    if($checkDB) {
        echo "Database named <u>" .$dbName. "</u> already exists!<br>";
    }
    else {
        // if db successfully created, output message
        if($conn->query($createDB)) {
            echo "Database not yet created...<br>";
            echo "Creating database named <u>" .$dbName. "</u>...<br>";
            echo "Database named <u>" .$dbName. "</u> successfully created!<br>";
        }
        // if db not created, show error output
        else {
            "Error: " .mysqli_error($conn). "<br>";
        }
    }

    //drop the database
    // if($conn->query($dropDB)) {
    //     echo "Database named <u>" .$dbName. "</u> successfully dropped!<br>";
    // }
    // else {
    //     echo "Database named <u>" .$dbName. "</u> failed to be dropped!<br>";
    // }

    //solution for: "no database selected"
    //after creating database, tell mysql to select which database
    if($conn->query($useDB)) {
        echo "Database named <u>" .$dbName. "</u> selected!<br>";
    }
    else {
        "Error: " .mysqli_error($conn). "<br>";
    }
?>