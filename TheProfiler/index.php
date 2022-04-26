<?php
    session_start();

    //for debugging purposes
    $_SESSION["onDebug"] = false; //edit to 'true', to show message -- !---NOT VISIBLE, UNLESS COMMENT OUT ALL THE HEADER CODES---!
    //for debugging purposes

    //if user was is logged in, redirect to homepage
    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
        header("Location: homePage.php");
        exit; //not sure what this does, but can test by commenting out
    }
    else { //if first time on the page
        $_SESSION["loggedIn"] = null; //initialize the session variable
    }

    //---debugging purposes---
    $skipFill = true; //set 'true' for debugging purposes
    $required = "required"; //by default

    if($skipFill === true) {
        $required = "";
    }
    //---debugging purposes---

    //---display msg output---
    if(isset($_SESSION["msg"])) {
        echo 
        "<script>
            alert('".$_SESSION["msg"]."');
        </script>
        ";
    }
    unset($_SESSION["msg"]); //->this way, no output when page loaded
    //---display msg output---
?>

<!DOCTYPE html>
<html>
    <header>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- set tab icon -->
        <link rel="shortcut icon" type="image/x-icon" href="./resources/images/smile.ico" />

        <!-- page title -->
        <title>Profiler</title>

        <!-- the default css -->
        <link rel="stylesheet" href="./css/mainStyle.css">

        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- header -->
        <?php require "./header.php"; ?>
    </header>

    <body>
        <div id="mainContainer">
            <div id="firstBody">
                <center>
                <h2>Login</h2>
                <hr id="horiLine1">
                <div class="container">
                    <div class="row bottom-gap">
                        <div class="col-sm">
                            <p>Are you new? <a id="earlyLink" href="./registerPage.php">Register</a></p>
                        </div>
                    </div>
                    <div class="row bottom-gap">
                        <div class="col-sm">
                            or
                        </div>
                    </div>
                    <form id="boxGroup" method="POST" action="./processor/loginProcessor.php">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="unameInput">Username</label>
                                    <input type="text" name="username" id="unameInput" class="form-control" placeholder="Enter username" <?php echo $required; ?>>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="row bottom-gap">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="passInput">Password</label><span id="helpText" data-toggle="tooltip" data-placement="top" title="Double click the password field to show password"> ? </span>
                                    <input type="password" name="password" id="passInput" class="form-control" placeholder="Enter password" ondblclick="showPass()" <?php echo $required; ?>>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <input type="submit" name="signin" value="Login" onclick="return checkPass()" class="btn btn-primary"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </center>
            </div>
        </div>
        <script>
        function showPass() {
            var passInput = document.getElementById("passInput");
            if (passInput.type === "password") {
                passInput.type = "text";
            } else {
                passInput.type = "password";
            }
        }

        function checkPass() {
            var uNInput = document.getElementById("unameInput").value;
            var pInput = document.getElementById("passInput");

            if(uNInput=="" || pInput=="") {
                alert("Fill in all the inputs!");
                return false;
            }
        }
        </script>
    </body>

    <footer>
        <?php require "./footer.php"; ?>
    </footer>
</html> 