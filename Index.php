<?php
    $xsldoc = new DOMDocument();
    $xsldoc->load('Home/KitchnerRSS/rssKitchner.xsl');  //load XSLT file

    $xmldoc = new DOMDocument();
    $xmldoc->load('http://www.cbc.ca/cmlink/rss-canada-kitchenerwaterloo');  //Load XML file

    $xsl = new XSLTProcessor();
    $xsl->importStyleSheet($xsldoc);
    $result = $xsl->transformToXML($xmldoc);

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Kitchner Airport</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">

    <h1 style="text-align: center">Welcome to the Kitchner Airport</h1>
    <div class="row">

        <div class="col-md-9">
           <!-- <img src="images/pickup.jpg" class="img-responsive" alt="Responsive image" id="banner">-->
            <!--displaying SlideShow on HomePage-->
            <div id="homepage" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#homepage" data-slide-to="0" class="active"></li>
                    <li data-target="#homepage" data-slide-to="1"></li>
                    <li data-target="#homepage" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="Images/AirportUpdates.jpg" alt="Slider 1">
                        <div class="carousel-caption">
                            <h1>Airport Updates</h1>
                            <p>Normal operations are underway. As always, please check your flight status.</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="Images/Slider1.jpg" alt="Slider 2">
                        <div class="carousel-caption">
                            <h1>Plan your spring travel escape</h1>
                            <p>Pick up a free copy of the latest issue of AWAY for everything you need to make the most
                                of your next vacation - whether it’s a family vacation or a serene getaway!</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="Images/Sunwing.jpg" alt="Slider 3">
                        <div class="carousel-caption">
                            <h1>American Airlines is moving to Terminal 3</h1>
                            <p>As of May 1, American Airlines will be located at Terminal 3.</p>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#homepage" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#homepage" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <!--SlideShow Ends here-->

        </div>
        <div class="slider">
            <div class="col-md-3">
                <a href="Home/Place_details_API/place_details_api.html">
                    <img src="Images/google_maps.gif" class="img-responsive" alt="Responsive image" id="googleMap">
                </a>

            <div id="googleTransit">
                <a href="Home/Place_details_API/place_details_api.html">Get the Public Transit ></a>
                <hr />
            </div>
            <div>
                <!-- Begin WeatherLink Fragment -->
                <iframe title="Environment Canada Weather" width="287px" height="191px" src="//weather.gc.ca/wxlink/wxlink.html?cityCode=on-82&amp;lang=e" allowtransparency="true" frameborder="0"></iframe>
                <!-- End WeatherLink Fragment -->
            </div>
                <div id="googleTransit">
                    <a href="Home/twitter/twitterAPI.php">View Tweets by Airport  <img src="Images/twitter.png" id="twitterPic"></a>
                </div>
          </div>
      </div>
    </div>
<!-- Second Row contain -Flight Table and News-->
    <div class="row">
        <div class="col-md-6">
<!--If you put the index.php file outside and running from there then you have specify Home/ otherwise not needed-->
            <?php include 'Home/airport.php'; ?> <br>
            <h3><a href="Home/find_near_airports/search_airport.html"> Find the nearest list of Airports. Click Here !</a></h3>

        </div>
        <div class="col-md-6" id="headerH">
            <?php
            if(empty($result))
            {
                echo "Please wait..News is loading !..";
            }
            else
            {
                echo $result;
            }

            ?>
        </div>
    </div>

 <!-- Third Row contain -Footer-->
    <div class="row">
        <div class="col-md-12" id="footer">
            <p>&#169; Copyright Abarar Sheikh, 2016.</p>
        </div>

    </div>
</div>
</body>
</html>