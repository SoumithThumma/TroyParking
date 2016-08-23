<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="images/car-icon2.png">
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reg.css" type="text/css" />
    <title>TroyParking</title>


</head>
<body>
    <!-- the form action attribute needs to be changed -->


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">

<div style="margin-top: 10px; margin-bottom: -5px;">
<div style="color: white; text-align: left; width: 100%;">
<a href="home.php" style="color: white;"><span style="font-size: 12px;"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a></div>
<!--<div style="color: white; text-align: right; width: 49%; display: inline-block;">
<a href="#"><span style="font-size: 12px;">Sign Out <i class="fa fa-sign-out" aria-hidden="true"></i></span></a></div>--></div>



                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader">

                    </div>

                    <div class="info">


                    </div>

                    <div class="bottom">
                        <h2>Sign Up</h2>
                        <div class="desc" style="margin-top:20px; margin-bottom:30px; text-align:left;">
                            Troy parking was created in an effort to help commuter students and faculty find parking in a timely manner.
                            As such, we require a valid Troy.edu email address in order to sign up. We hope you enjoy this service!
                        </div>

                        <form class="form-register" method="post" action="register.php" autocomplete="on" id="joinTroy">
                            <script>

                                function ConfirmPass() {
                                    var Pass = document.getElementById('Pass');
                                    var Cpass = document.getElementById('Cpass');
                                    //var checkmark = document.getElementById('checkmark');
                                    //var redx = document.getElementById('redx');
                                    var submit = document.getElementById('Submit');
                                    
                                    if (Pass.value == Cpass.value) {
                                        Passcon.style.display = "none";
                                        //checkmark.style.display = "";
                                        //redx.style.display = "none";
                                        submit.disabled = false;
                                    }
                                    else {
                                        Passcon.style.display = "";
                                        //redx.style.display = "";
                                        //checkmark.style.display = "none";
                                        submit.disabled = true;
                                    }
                                }

                                function ConfirmTroy() {
                                    var submit = document.getElementById('Submit');
                                    var emailInput = document.getElementById('inputEmail').value;
                                    emailInput.toLowerCase;
                                    var findMe = "@troy.edu"

                                    if (emailInput.indexOf(findMe) >= 1) {
                                        var troyText = document.getElementById('Troyedu');
                                        troyText.style.display = "none";
                                        submit.disabled = false;
                                    }
                                    else {
                                        var troyText = document.getElementById('Troyedu');
                                        troyText.style.display = "";
                                        submit.disabled = true;
                                    }
                                }


                                function Start() {
                                    document.getElementById('Pass').addEventListener("change", ConfirmPass);
                                    document.getElementById('Cpass').addEventListener("change", ConfirmPass);
                                    document.getElementById('inputEmail').addEventListener("change", ConfirmTroy);
                                }

                                window.addEventListener("load", Start, false);
                            </script>

                            <input type="text" class="form-control" maxlength="30" required placeholder="First Name" pattern="[a-zA-Z]+" name=Fname>
                            <input type="text" class="form-control" maxlength="30" required placeholder="Last Name" pattern="[a-zA-Z]+" name=Lname>
                            <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address: id@troy.edu" required pattern="[a-z0-9._%+-]+@troy.edu">
                            <div class="desc">
                                <label id="Troyedu">Email must be a valid troy.edu account!</label>
                            </div>
                            <input type="password" id=Pass name="Pass" class="form-control" placeholder="Password" required>
                            <input type="password" id=Cpass class="form-control" placeholder="Confirm Password" required>
                            <div class="desc">
                                <label id="Passcon">Passwords must match!</label>
                            </div>

                            <h3 style="margin-top: 30px;">Parking Type</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul>
                                    <li>
                                        <input name="radioBtn" type="radio" value="Student" id="student">
                                        <label for="student">Student</label>
                                        <div class="check"></div>
                                    </li>

                                    <li>
                                        <input name="radioBtn" type="radio" value="Faculty" id="faculty">
                                        <label for="faculty">Faculty</label>
                                        <div class="check"></div>
                                    </li>
                                </ul>
                                
                                
                                
                                
                            </div>

<button class="btn btn-lg btn-primary btn-block btn-find" type="submit" id="Submit" form="joinTroy">Join</button>
                        </form>

                    </div>
                <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button class="btn btn-lg btn-primary btn-block btn-find" type="submit" id="Submit" form="joinTroy">Join</button></div>-->

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <hr />
                    	<a href="http://www.facebook.com/troyparking" target="_blank"><div style="width: 100%; text-align: left; padding-right: 0px; margin-top: 10px; display:inline-block;">
                    <i class="fa fa-facebook-square" style="font-size:50px; color: rgb(17, 49, 81);" aria-hidden="true"></i>
                    <div style="display: inline; color: rgb(17, 49, 81); font-size: 12px;">Facebook</div>
                    
                </div></a>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <!--<form method = "post" action = "connectivity.php" autocomplete = "on">


        <h2> Troy Parking Registration Page </h2></br>

        <p>
            <label><strong>First Name: </strong> <input type ="text" size = "25" maxlength = "30" required placeholder="First Name" pattern = "[a-zA-Z]+" id=Fname></label>
        </P>

        <p>
            <label><strong>Last Name: </strong> <input type ="text" size = "25" maxlength = "30" required placeholder="Last Name" pattern = "[a-zA-Z]+" id=Lname></label>
        </P>

        <p>
            <label><strong>Password: </strong> <input type ="password" size = "25" maxlength = "30" required placeholder="Password" id=Pass></label>
        </P>

        <p>
            <label><strong>Confirm Password: </strong><input type ="password" size = "25" maxlength = "30" required placeholder="Confirm Password" id=Cpass></label>
            <img src = "images/checkmark.jpg" style='display:none;' id=checkmark />
            <img src = "images/redx.jpg" style='display:none;' id=redx />
        </P>

        <p>
            <label><strong>Email: </strong><input type ="email" size = "25" maxlength = "30" placeholder="name@troy.edu" required id=Email pattern="[a-z0-9._%+-]+@troy.edu"></label>
            <label id="emaillbl">Ex. name123@troy.edu </label>
        </p>

        <p>
            <strong>Parking Type:</strong>

            <label>Student-Commuter <input name = "radioBtn" type = "radio" value = "Student" checked ></label>
            <label>Faculty <input name = "radioBtn" type = "radio" value = "Faculty"></label>
        </p>




        <p>
            <input type = "submit" value = "Register" style="width:125px; height:25px;" id="Submit" />
        </p>

    </form>-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>