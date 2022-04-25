<?php
    session_start();

    require "../databases/database/database.php"; //path relative to itself

    //----variables----
    $username = $_POST["username"];
    $password = $_POST["password"];

    //to be used by "manageHomePage.php"
    $_SESSION["s_username"] = $username;
    $_SESSION["s_password"] = $password;
    //----variables----

    //----queries----
    //select account with selected 'username' && 'password'
    $selectUser = $connObj->exeQuery("SELECT username, password FROM ".$accTblName." WHERE username = '".$username."' AND password = '".$password."'" );
    // $selectUser = $conn->query("SELECT * FROM ".$accTblName); //->testing purposes
    //----queries----

    //----operations----
    if($selectUser->num_rows > 0) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["msg"] = "Successfully logged in!";
        header("Location: ../homePage.php");
    }
    else {
        if($_SESSION["onDebug"] === true) {
            // echo "Error: " .mysqli_error($conn). "<br>";
            echo "Invalid account details!<br>";
        }
        $_SESSION["msg"] = "Invalid account details!";
        header("Location: ../index.php");
    }
    //----operations----

    $connObj->closeConn();
?>