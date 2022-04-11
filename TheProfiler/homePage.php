<?php
    session_start();

    include "./database/database/table.php";
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
            <nav class="navbar navbar-expand">
                <a class="navbar-brand text-dark" href="#">
                    <img src="./resources/images/smile.png" width="55" height="55" alt="siteIcon">
                    Profiler
                </a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto" id="navItems">
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="./homePage.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="./processor/logoutProcessor.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    </header>
    <body>
        <!-- insert here -->
        <div id="mainContainer">
            <!-- insert here... -->
            <center><p>Hello World!</p></center>
        </div>

        <!-- bootstrap javascript bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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

<?php
    // take username
    $query = "SELECT username";
?>