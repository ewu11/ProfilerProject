<?php
    //TO MANAGE THE HOMEPAGE

    require "./databases/database/database.php"; //path relative to homePage.php
    //-----variables-----

    //-----queries-----
    $getUserQuery = "SELECT id, fullName, username, email, password, cPassword FROM " .$accTblName. " WHERE username ='" .$_SESSION["s_username"]. "' AND password = '" .$_SESSION["s_password"]. "'";
    // $testGetUserQuery = "SELECT id, fullName, username, email, password, cPassword FROM " .$accTblName;
    $getUser = $connObj->exeQuery($getUserQuery);
    //-----queries-----

    //-----operations-----
    if($getUser->num_rows > 0) {
        while($row = $getUser->fetch_assoc()) {
            echo "
            <h2>Hi <span id='nameSpan'>".$row["fullName"]."</span> !</h2>
            ";
        }
    }
    else {
        echo "Error: " .mysqli_error($connObj->getConn()). "<br>";
    }
    //-----operations-----

    $connObj->closeConn();
?>