<?php
    // start session
    session_start();

    //make a connection to database
    include_once "../database/database/table.php";

    //----variables----
    // $_SESSION["loggedIn"] = false; //by default is false

    $username = $_POST["username"];
    $password = $_POST["password"];

    //select account with selected username && password
    $selectUser = $conn->query("SELECT username, password FROM ".$accTblName." WHERE username = '".$username."' AND password = '".$password."'" );
    // $selectUser = $conn->query("SELECT * FROM ".$accTblName); //->testing purposes
    //----variables----

    if($selectUser->num_rows > 0) {
        // while($row = $selectUser->fetch_assoc()) {
        //     echo "Username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
        // }
        $_SESSION["loggedIn"] = true;
        header("Location: ../homePage.php");
    }
    else {
        // echo "Error: " .mysqli_error($conn). "<br>";
        echo "Invalid account details!<br>";
    }

    $conn->close();
?>