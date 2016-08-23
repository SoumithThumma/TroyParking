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
                        <h2>Forgot Password?</h2>
                        <div class="desc" style="margin-top:10px; margin-bottom:30px; text-align:left;">
                            Enter your email and we will send you an email to change your password.
                        </div>

                        <form class="form-register" method="post" action="forgotemail.php" autocomplete="on">
                            <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address: id@troy.edu" required pattern="[a-z0-9._%+-]+@troy.edu">
                            <div class="desc">
<?php
if (isset($_GET["account"])){
echo '<label id="Troyedu" style="margin-bottom: 20px;">Account not found!</label>';
}
?>
                                
                            </div>

                            <button class="btn btn-lg btn-primary btn-block btn-find" type="submit" id="Submit">Reset Password</button>
                        </form>

                    </div>


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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

