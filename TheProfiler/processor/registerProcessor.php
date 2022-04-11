<?php
    //---make a connection to database---

    //way 1
    include_once "../database/database/table.php";

    //way 2
    //include_once("/xampp/htdocs/testProfile/database/connection/connection.php");
    //---make a connection to database---

    //---variables---
    // $accTblName = "account";

    $fullName = $_POST["fullName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // $createTable = "CREATE TABLE " .$accTblName. "(
    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     fullName VARCHAR(50) NOT NULL,
    //     userName VARCHAR(50) NOT NULL UNIQUE,
    //     email VARCHAR(50) NOT NULL UNIQUE,
    //     password VARCHAR(50) NOT NULL,
    //     cPassword VARCHAR(50) NOT NUll
    // );";

    // $sql = "INSERT INTO employee (first_name,last_name,city_name,email) VALUES ('$first_name','$last_name','$city_name','$email')";

    $insertData = "INSERT INTO ".$accTblName." (fullName, username, email, password, cPassword) VALUES ('$fullName', '$username', '$email', '$password', '$cpassword')";
    //---variables---

    //-----manage user's registration-----
    //--create the table--
    // if($conn->query($createTable)) {
    //     echo "Table named <u> " .$accTblName. " successfully created!<br>";
    // }
    // else {
    //     echo "Error: " .mysqli_error($conn). "<br>";
    // }
    //--create the table--

    //--insert data into the table--
    // make sure fields are not empty
    // if 'signup' button was clicked
    if(!empty($fullName) && !empty($username) && !empty($email) && !empty($password) && !empty($cpassword)) {
        if(isset($_POST["signup"])) {
            if($conn->query($insertData)) {
                echo "Data successfully inserted!<br>";
            }
            else {
                echo "Error: " .mysqli_error($conn). "<br>";
            }
        }
    }
    else {
        echo "Fill in all the inputs!<br>";
    }
    //--insert data into the table--
    //-----manage user's registration-----

    //close the database connection
    $conn->close();
    echo "Connection to <u>" .$dbName. "</u> closed!";
?>