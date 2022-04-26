<?php
    //TO CREATE DATABASE
    
    //--import to access class--
    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) { //if user was already logged in, no need go to index.php
        if(isset($_POST["sbmtBtn"])) { //relative to "updateProfileProcessor.php"
            require "../databases/connection/connectionNew.php";
        }
        else {
            // echo "<script> alert('test1'); </script>";
            require "./databases/connection/connectionNew.php";
        }
    }
    else if(isset($_POST["signin"])) { //used by "manageHomePage.php" -- signin button clicked
        // echo "<script> alert('test2'); </script>";
        require "../databases/connection/connectionNew.php";
    }
    else if(isset($_POST["signup"])) { //if signup button clicked
        // echo "<script> alert('test3'); </script>";
        require "../databases/connection/connectionNew.php"; //path relative to registorProcessor
        // require "./databases/connection/connectionNew.php"; //path relative to registerPage.php -- CANT AND WILL NEVER WORK!
    }
    else {
        // echo "<script> alert('test4'); </script>";
        if($_SESSION["onDebug"] === true) {
            echo "<h1>ERROR!</h1>";
        }
        // require "../connection/connectionNew.php";
    }
    //--import to access class--

    //-----variables-----
    //--to make connection to db--
    $svName = "localhost";
    $svUName = "root";
    $svPass = "";
    $localDbName = "profilerDB"; //used globally
    //--to make connection to db--
    $accTblName = "account"; //used globally
    //-----variables-----
    
    //-----queries-----
    $createDB = "CREATE DATABASE " .$localDbName; //create database
    $dropDB = "DROP DATABASE " .$localDbName; //drop database
    $useDB = "USE " .$localDbName; //select database
    //-----queries-----

    //-----operations------
    $connObj = new MyConnection();

    if($_SESSION["onDebug"] === true) {
        echo "Checking for database...<br>";
    }

    //try to select db, if failed, meaning db not yet created, so create db
    //this first 'if' clause is entered only after db was already created
    //else it will be selected only after the db creation below
    if($connObj->exeQuery($useDB)) { 
        if($_SESSION["onDebug"] === true) {
            echo "Database named <u>" .$localDbName. "</u> selected!<br>";
        }
    }
    else {
        //if database done create, show message
        if($connObj->exeQuery($createDB)) { //if not exists enter this clause
            if($_SESSION["onDebug"] === true) {
                echo "Database not yet created...<br>";
                echo "Creating database named <u>" .$localDbName. "</u>...<br>";
                echo "Database named <u>" .$localDbName. "</u> successfully created!<br>";
            }
            
            //after 'create' the db, 'select' it
            if($connObj->exeQuery($useDB)) { 
                if($_SESSION["onDebug"] === true) {
                    echo "Database named <u>" .$localDbName. "</u> selected!<br>";
                }
                else {
                    "Database selection error: " .mysqli_error($connObj->getConn()). "<br>";
                    echo "Database named <u>" .$localDbName. "</u> not selected!<br>";
                }
            }
        }
        //else show error output
        else {
            if($_SESSION["onDebug"] === true) {
                "Database creation error: " .mysqli_error($connObj->getConn()). "<br>";
                echo "Database named <u>" .$localDbName. "</u> already exists!<br>";
            }
        }
    }
?>