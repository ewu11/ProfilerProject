<?php
    session_start();

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
    <body onload="disableBtn()">
      
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-bs-target
    </button>
        <div id="mainContainer">
            <div id="firstBody">
                <center>
                    <h2>Profile</h2>
                    <hr id="horiLine1">
                    <?php require "./processor/manageProfilePage.php"; ?>
                    <hr id="horiLine1">
                    <!-- Update profile data -->
                    <div class="updtContainer">
                        <label for="updtSelId">I would like to:</label>
                        <!-- ---easier way--- -->
                        <select class="form-select text-center" name="updtSel" id="updtSelId" onchange="disableBtn()">
                            <option value="" selected disabled>Select</option>
                            <option value="delAcc">Delete account</option>
                            <option value="chgeUn">Change username</option>
                            <option value="chgePass">Change password</option>
                        </select>
                        <!-- ---easier way--- -->

                        <button type="button" id="collapseBtn" class="btn btnCollapse" data-bs-toggle="collapse" data-bs-target="#collapseDiv" aria-expanded="false" aria-controls="collapseDiv" onclick="return continueBtn()">Continue</button> <!--data bs toggle and target are needed to work properly-->
                    </div>
                    <!-- ---advanced way--- -->
                    <form action="./processor/updaterProcessor.php" onsubmit="return verifyInput();" method="POST">
                        <div class="collapse" id="collapseDiv"> <!--class collapse is needed so that div is hidden onload-->
                            <div id="collapseContent" class="delAccDiv">
                                <div class="form-group">
                                    <label for="deleteAccInput">Confirm deletion?</label>
                                    <input type="text" id="deleteAccInput" class="form-control" name="delAcc" placeholder="Type 'Confirm' to proceed.">
                                </div>
                            </div>
                            <div id="collapseContent" class="chgeUnDiv">
                                <div class="form-group">
                                    <label for="chgeUnInput">What is your new username?</label>
                                    <input type="text" id="chgeUnInput" class="form-control" name="uname" placeholder="Enter new username">
                                </div>
                            </div>
                            <div id="collapseContent" class="chgePassDiv">
                                <div class="form-group">
                                    <label for="passInput">What is your new password?</label>
                                    <input type="password" id="passInput" class="form-control" name="pwd" placeholder="Enter new password" ondblclick="showPass()">
                                    <br>
                                    <label for="cPassInput">Please re-enter your new password</label>
                                    <input type="password" id="cPassInput" class="form-control" name="cPwd" placeholder="Re-enter new password" ondblclick="showPass()">
                                </div>
                            </div>
                            <div id="collapseContent" class="submitDiv">
                                <input type="submit" class="btn btnCollapse" id="sbmtBtnId" name="sbmtBtn" value="Submit">
                            </div>
                        </div>
                    </form>
                    <!-- ---advanced way--- -->
                </center>
            </div>
        </div>
        <script>
            function continueBtn() {
                //get value from option
                // var e = document.getElementById("updtSelId");
                // var selectedOpt = e.options[e.selectedIndex].text;

                var selectedOpt = document.getElementById("updtSelId").value;
                var delAccDiv = document.getElementsByClassName("delAccDiv")[0];
                var chgeUnDiv = document.getElementsByClassName("chgeUnDiv")[0];
                var chgePassDiv = document.getElementsByClassName("chgePassDiv")[0];
                var submitBtn = document.getElementsByClassName("submitDiv")[0];

                // // //refresh -> make all visible
                // delAccDiv.style.visibility = "visible";
                // chgeUnDiv.style.visibility = "visible";
                // chgePassDiv.style.visibility = "visible";

                // //hide the unselected
                // if(selectedOpt == "delAcc") {
                //     // alert("1");
                //     chgeUnDiv.style.visibility = "hidden";
                //     chgePassDiv.style.visibility = "hidden";
                // }
                // else if(selectedOpt == "chgeUn") {
                //     // alert("2");
                //     delAccDiv.style.visibility = "hidden";
                //     chgePassDiv.style.visibility = "hidden";
                // }
                // else if(selectedOpt == "chgePass") {
                //     // alert("3");
                //     delAccDiv.style.visibility = "hidden";
                //     chgeUnDiv.style.visibility = "hidden";
                // }
                // else {
                //     alert("Selection error!");
                // }
                
                if(selectedOpt != "") {
                    // //refresh -> make all visible
                    delAccDiv.style.display = "block";
                    chgeUnDiv.style.display = "block";
                    chgePassDiv.style.display = "block";
                    submitBtn.style.display = "block";

                    //hide the unselected
                    if(selectedOpt == "delAcc") {
                        // alert("1");
                        chgeUnDiv.style.display = "none";
                        chgePassDiv.style.display = "none";
                    }
                    else if(selectedOpt == "chgeUn") {
                        // alert("2");
                        delAccDiv.style.display = "none";
                        chgePassDiv.style.display = "none";
                    }
                    else if(selectedOpt == "chgePass") {
                        // alert("3");
                        delAccDiv.style.display = "none";
                        chgeUnDiv.style.display = "none";
                    }
                }
                //no need bcuz already managed by "disabledBtn()" and "onload"
                // else {
                //     return false;
                //     delAccDiv.style.display = "none";
                //     chgeUnDiv.style.display = "none";
                //     chgePassDiv.style.display = "none";
                //     submitBtn.style.display = "none";
                //     alert("Selection error!");
                // }
            }

            function disableBtn() {
                var selectedOpt = document.getElementById("updtSelId").value;
                var collapseBtn = document.getElementById("collapseBtn");

                //disable the button when value == ""
                if(selectedOpt == "") {
                    collapseBtn.disabled = true;
                }
                else {
                    collapseBtn.disabled = false;
                }

                //-----PLAN TO TO FIX LAST-----
                //if attr is collapse, change to "", else, change to collapse
                // if(collapseBtn.getAttribute("data-bs-toggle") == "collapse") {
                //     alert("heyy!");
                // }
                //-----PLAN TO TO FIX LAST-----
            }

            function showPass() {
                var passInput = document.getElementById("passInput");
                var cPassInput = document.getElementById("cPassInput");
                if (passInput.type === "password" || cPassInput.type === "password") {
                    passInput.type = "text";
                    cPassInput.type = "text";
                } else {
                    passInput.type = "password";
                    cPassInput.type = "password";
                }
            }

            function verifyInput() {
                var selectedOpt = document.getElementById("updtSelId").value;
                var passInput = document.getElementById("passInput").value;
                var cPassInput = document.getElementById("cPassInput").value;
                var delAccInput = document.getElementById("deleteAccInput").value;
                var usernameInput = document.getElementById("chgeUnInput").value;

                // first, check which option was selected
                if(selectedOpt == "delAcc") {
                    //check if empty first, then if confirm was properly typed, proceed
                    if(delAccInput != "") {
                        if(delAccInput != "Confirm") {
                            alert("Please type correctly!");
                            return false;
                        }
                        else {
                            var deleteDialog = window.confirm("Are you sure to proceed? This action is irreversible!");
                            if(deleteDialog == false) {
                                return false;
                            }
                        }
                    }
                    else {
                        alert("Please fill in all inputs!");
                        return false;
                    }
                }
                else if(selectedOpt == "chgeUn") {
                    //cannot be empty
                    if(usernameInput == "") {
                        alert("Please insert your desired new username!");
                        return false;
                    }
                    else {
                        var uNameChgeDlg = window.confirm("Confirm changing your username?");
                        if(uNameChgeDlg == false) {
                            return false;
                        }
                    }
                }
                else if(selectedOpt == "chgePass") {
                    //if not empty, check for matching
                    if(passInput != "" && cPassInput != "") {
                        if(passInput != cPassInput) {
                            alert("Passwords not matching! Please try again!");
                            return false;
                        }
                        else {
                            var passDlg = window.confirm("Confirm changing password?");
                            if(passDlg == false) {
                                return false;
                            }
                        }
                    }
                    else {
                        alert("Please fill in all inputs!");
                        return false;
                    }
                }
            }
        </script>
    </body>

    <footer>
        <?php require "./footer.php"; ?>
    </footer>
</html>