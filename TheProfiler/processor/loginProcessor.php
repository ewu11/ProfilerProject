<?php
    // start session
    session_start();

    //make a connection to database
    // require_once "../../databases/database/database.php";
    // require "/xampp/htdocs/testProfile/databases/database/database.php";

    // require_once "./databases/database/database.php";
    require_once "../databases/database/database.php";

    //----variables----
    $username = $_POST["username"];
    $password = $_POST["password"];
    //----variables----

    //----queries----
    //select account with selected 'username' && 'password'
    $selectUser = $connObj->exeQuery("SELECT username, password FROM ".$accTblName." WHERE username = '".$username."' AND password = '".$password."'" );
    // $selectUser = $conn->query("SELECT * FROM ".$accTblName); //->testing purposes
    //----queries----

    //----operations----
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
        echo "<script> window.alert('Invalid account details!'); </script>";
    }
    //----operations----

    $connObj->closeConn();

    // header("Location: ../index.php");

?>