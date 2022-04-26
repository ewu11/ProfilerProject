<?php
    session_start();

    require "../databases/database/database.php";

    //---variables---
    $updteQuery = "";
    //---variables---

    //organized by selection
    if(isset($_POST["sbmtBtn"])) {
        //if delete account filled
        if(isset($_POST["delAcc"]) && $_POST["delAcc"] != "") {
            // echo "<script> alert('1'); </script>";

            //set sql query here
            $updteQuery = "DELETE FROM " .$accTblName. " WHERE username = '" .$_SESSION["s_username"]. "' AND password = '" .$_SESSION["s_password"]. "'";
            $delUserAcc = $connObj->exeQuery($updteQuery);

            if($delUserAcc === true) {
                if($_SESSION["onDebug"] === true) {
                    echo "Account successfully deleted!";
                }

                //clear session, so that cant login
                unset($_SESSION["loggedIn"]);

                $_SESSION["msg"] = "Your account has successfully deleted!";

                //logout
                header("Location: ../index.php");
            }
            else {
                if($_SESSION["onDebug"] === true) {
                    echo "Account deletion error: " .$connObj->getConn()->error;
                }

                $_SESSION["msg"] = "Account deletion error!";
                
                //if failed, redirect back
                header("Location: ../profilePage.php");
            }
        }

        //else if change username filled
        else if(isset($_POST["uname"]) && $_POST["uname"] != "") {
            // echo "<script> alert('2'); </script>";

            //set sql query here
            $updteQuery = "UPDATE " .$accTblName. " SET username = '" .$_POST["uname"]. "' WHERE username = '" .$_SESSION["s_username"]. "' AND password = '" .$_SESSION["s_password"]. "'";
            $updteUsername = $connObj->exeQuery($updteQuery);

            //if success, show output, redirect homePage.php
            if($updteUsername === true) {
                if($_SESSION["onDebug"] === true) {
                    echo "Username successfully changed!";
                }

                $_SESSION["s_username"] = $_POST["uname"]; //change username session value

                $_SESSION["msg"] = "Your username has successfully changed!";

                //logout
                header("Location: ../index.php");
            }
            //else, show output, back to same page
            else {
                if($_SESSION["onDebug"] === true) {
                    echo "Username change error: " .$connObj->getConn()->error;
                }

                $_SESSION["msg"] = "Username already exist! Please choose different username!";
                
                //if failed, redirect back
                header("Location: ../profilePage.php");
            }
        }

        //else if change password
        else if(isset($_POST["pwd"]) && isset($_POST["cPwd"]) && $_POST["pwd"] != "" && $_POST["cPwd"] != "") {
            // echo "<script> alert('3'); </script>";

            //set sql query here
            $updteQuery = "UPDATE " .$accTblName. " SET password = '" .$_POST["pwd"]. "' WHERE username = '" .$_SESSION["s_username"]. "' AND password = '" .$_SESSION["s_password"]. "'";
            $chgePass = $connObj->exeQuery($updteQuery);

            //if success, change password session value and redirect to profilePage.php
            if($chgePass === true) {
                $_SESSION["s_password"] = $_POST["pwd"];

                if($_SESSION["onDebug"] === true) {
                    echo "Password successfully changed!";
                }
                $_SESSION["msg"] = "Your password has successfully changed!";

                //logout
                header("Location: ../homePage.php");
            }
            else { //else on the same page, show error
                if($_SESSION["onDebug"] === true) {
                    echo "Password change error: " .$connObj->getConn()->error;
                }

                $_SESSION["msg"] = "Password change error!";
                
                //if failed, redirect back
                header("Location: ../profilePage.php");
            }
        }

        //else error msg
        else {
            if($_SESSION["onDebug"] === true) {
                echo "Error laa!";
            }
            echo "<script> alert('Error on updating profile!'); </script>";
        }
    }
?>