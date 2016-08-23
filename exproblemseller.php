<?php
setcookie("Problem", "Prob", time() + 3600);
?>

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

                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader">

                    </div>

                    <div class="info">


                    </div>

                    <div class="bottom">
                        <h2>Problems?</h2>
                        <div class="desc" style="margin-top:10px; margin-bottom:30px; text-align:left;">
                            Sorry for the inconvenience. Please state your problem below. Note that no temporary points are given out for the holder of the spot. It is still worth noting any problems you experienced in this transaction. 
                        </div>

                        <form class="form-register" method="post" action="Problems.php" autocomplete="on" id="joinTroy">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Comment</div></div>
                            <textarea class="form-control" rows="5" required placeholder="Enter your problem here." id="comment" name="Description"></textarea>                 

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button class="btn btn-lg btn-primary btn-block btn-find" type="submit" id="Submit">File Problem</button>

                      </form>

                      
                        <button onclick="location.href = 'home.php?cookie=delete';" class="btn btn-lg btn-primary btn-block btn-problem" style="margin-top: 5px;">Cancel</button>
                      

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <hr />
                        <a href="http://www.facebook.com/troyparking" target="_blank">
                            <div style="width: 100%; text-align: left; padding-right: 0px; margin-top: 10px; display:inline-block;">
                                <i class="fa fa-facebook-square" style="font-size:50px; color: rgb(17, 49, 81);" aria-hidden="true"></i>
                                <div style="display: inline; color: rgb(17, 49, 81); font-size: 12px;">Facebook</div>

                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>