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

    <?php
        //---debugging purposes---
        $skipFill = true; //set false for debugging purposes
        $required = "required"; //by default

        if($skipFill === false) {
            $required = "";
        }
        //---debugging purposes---
    ?>

    <body>
        <!-- insert here -->
        <div id="mainContainer">
            <div id="firstBody">
                <center>
                <h2>Register</h2>
                <hr id="horiLine1">
                <div class="container">
                    <div class="row bottom-gap">
                        <div class="col-sm">
                            <p>Already a user? <a id="earlyLink" href="./index.php">Login</a></p>
                        </div>
                    </div>
                    <div class="row bottom-gap">
                        <div class="col-sm">
                            or
                        </div>
                    </div>
                    <form id="boxGroup" method="POST" action="./processor/registerProcessor.php">
                        <div class="row bottom-gap">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="fnameInput">Full Name</label>
                                    <input type="text" name="fullName" id="fnameInput" class="form-control" placeholder="Enter full name" <?php echo $required; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row bottom-gap">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="unameInput">Username</label>
                                    <input type="text" name="username" id="unameInput" class="form-control" placeholder="Enter username" <?php echo $required; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row bottom-gap">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="emailInput">Email</label>
                                    <input type="text" name="email" id="emailInput" class="form-control" placeholder="Enter email" <?php echo $required; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row bottom-gap">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="passInput">Password</label>
                                    <input type="password" name="password" id="passInput" class="form-control" placeholder="Enter password" <?php echo $required; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row bottom-gap">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="cpassInput">Confirm Password</label>
                                    <input type="password" name="cpassword" id="cpassInput" class="form-control" placeholder="Re-enter password" <?php echo $required; ?>>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <!-- name attribute is needed for 'registerProcessor.php' -->
                                    <!-- button tag not working for submitting form, use input instead -->
                                    <input type="submit" name="signup" value="Signup" class="btn btn-primary">
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
        <!-- footer -->
        <?php require "./footer.php"; ?>
    </footer>
</html> 