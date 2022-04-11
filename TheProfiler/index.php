<?php
    // start session
    session_start();

    //check for database and tables first, since this is first main page
    //order: index.php calls table.php calls database.php
    // include_once "/xampp/htdocs/testProfile/database/database/table.php";

    // if(isset($_POST["signin"]) && $_SESSION["loggedIn"] === true) {

    //if user was is logged in, redirect to homepage
    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
        header("Location: homePage.php");
        exit; //not sure what this does, but can test by commenting out
    }
    else { //if first time open
        $_SESSION["loggedIn"] = false; //initialize the session variable
    }
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

    <div id="headerContainer">
        <div id="firstHeader">
            <nav class="navbar">
                <a class="navbar-brand text-dark" href="#">
                    <img src="./resources/images/smile.png" width="55" height="55" alt="siteIcon">
                    Profiler
                </a>
            </nav>
        </div>
    </div>
    </header>

    <body>
        <!-- insert here -->
        <div id="mainContainer">
            <div id="firstBody">
                <center>
                <h2>Home</h2>
                <hr id="horiLine1">
                <div class="container">
                    <div class="row bottom-gap">
                        <div class="col-sm">
                            <p>Are you new? <a href="./registerPage.php">Signup</a></p>
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
                                    <input type="text" name="username" id="unameInput" class="form-control" placeholder="Enter username" >
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="row bottom-gap">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="passInput">Password</label>
                                    <input type="password" name="password" id="passInput" class="form-control" placeholder="Enter password" >
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <input type="submit" name="signin" value="Login" class="btn btn-primary"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </center>
            </div>
        </div>
    </body>

    <footer>
        <!-- insert here... -->
        <div id="footerContainer">
            <div id="firstFooter">
                <small>©ewu11</small>
            </div>
        </div>
    </footer>
</html> 