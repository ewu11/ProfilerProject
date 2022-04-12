<?php
    //TO MANAGE THE HOMEPAGE

    // session_start();

    //-----variables-----
    // require __DIR__."./databases/database/database.php";
    // require_once "/xampp/htdocs/TheProfiler/databases/database/database.php";
    
    require __DIR__."../../databases/database/database.php";
    //-----variables-----

    //-----queries-----
    $getUserQuery = "SELECT fullName, username, email, password, cPassword FROM " .$accTblName. " WHERE username ='" .$_SESSION["s_username"]. "' AND password = '" .$_SESSION["s_password"]. "'";
    $getUser = $connObj->exeQuery($getUserQuery);
    //-----queries-----

    //-----operations-----
    if($getUser->num_rows > 0) {
        while($row = $getUser->fetch_assoc()) {
            echo "<p>Full Name: ". $row["fullName"] . " - Username: " . $row["username"]. " - Email: " .$row["email"]. " - Password: " . $row["password"]. "</p><br>";
        }
    }
    else {
        echo "Error: " .mysqli_error($connObj->getConn()). "<br>";
    }
    //-----operations-----
?>