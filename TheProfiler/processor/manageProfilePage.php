<?php
    //TO MANAGE THE HOMEPAGE

    // session_start();

    //-----variables-----
    // require __DIR__."./databases/database/database.php";
    // require_once "/xampp/htdocs/TheProfiler/databases/database/database.php";
    
    require __DIR__."../../databases/database/database.php";
    //-----variables-----

    //-----queries-----
    $getUserQuery = "SELECT id, fullName, username, email, password, cPassword FROM " .$accTblName. " WHERE username ='" .$_SESSION["s_username"]. "' AND password = '" .$_SESSION["s_password"]. "'";
    $getUser = $connObj->exeQuery($getUserQuery);
    //-----queries-----

    //-----operations-----
    if($getUser->num_rows > 0) {
        echo 
        "
        <div id='tableContainer' class='table-responsive'>
            <table class='table table-md table-bordered table-striped text-center'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
        ";
        while($row = $getUser->fetch_assoc()) {
            echo
            "
                <tr>
                    <th>".$row["id"]."</th>
                    <td>".$row["fullName"]."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["password"]."</td>
                </tr>
            ";

            // echo "<p>Full Name: ". $row["fullName"]. " - Username: " . $row["username"]. " - Email: " .$row["email"]. " - Password: " . $row["password"]. "</p><br>";
        }
        echo 
        "
                </tbody>
            </table>
        </div>
        ";

    }
    else {
        echo "Error: " .mysqli_error($connObj->getConn()). "<br>";
    }
    //-----operations-----
?>