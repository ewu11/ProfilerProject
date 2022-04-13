<!DOCTYPE html>
<html>
    <!-- cdn js is here so that the nav button works -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

    <div id="headerContainer">
        <div id="firstHeader">
            <nav class="navbar navbar-expand">
                <a class="navbar-brand text-dark" href="#">
                    <img id="profilerImg" src="./resources/images/smile.png" width="50px" height="50px" alt="siteIcon">
                    Profiler
                </a>
                <?php
                    // add additional navigation item once loggedIn
                    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
                        echo 
                        "
                        <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                            <ul class='navbar-nav ms-auto' id='navItems'>
                                <li class='nav-item active'>
                                    <a class='nav-link text-dark' href='./homePage.php'>Home</a>
                                </li>
                                <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle text-dark' href='#' id='navbarDarkDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                        Options
                                    </a>
                                    <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDarkDropdownMenuLink'>
                                        <li><a class='dropdown-item' href='./profilePage.php'>Profile</a></li>
                                        <li><a class='dropdown-item' href='./processor/logoutProcessor.php'>Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        ";
                    }
                ?>
            </nav>
        </div>
    </div>
</html>