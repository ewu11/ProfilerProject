<?php
    //TO MANAGE THE HOMEPAGE

    session_start();hahaha

    //-----variables-----
    require_once "../database/database.php"; //access database
    //-----variables-----

    //-----queries-----
    $getUserQuery = "SELECT (fullName, username, email, password, cPassword) FROM " .$accTblName. " WHERE username ='" .$_SESSION["s_username"]. "' AND password = '" .$_SESSION["s_password"]. "'";
    $getUser = $connObj->exeQuery($getUserQuery);
    //-----queries-----

    //-----operations-----
    if($getUser->num_rows > 0) {
        while($row = $selectUser->fetch_assoc()) {
            echo "Full Name: ". $row["fullName"] . " - Username: " . $row["username"]. " - Email: " .$row["email"]. " - Password: " . $row["password"]. "<br>";
        }
    }
    else {
        echo "Error: " .mysqli_error($connObj->getConn()). "<br>";
    }
    //-----operations-----
?>