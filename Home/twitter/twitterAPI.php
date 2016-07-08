<?php
session_start();

require "../twitter/twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$twitterUsername = "FlyYKF"; //user name you want to reference
$noofTweets = 10; //how many tweets you want to retrieve
$consumerKey = "WrTHh98HK852hXyu7JXFzeGsd";
$consumerSecretKey = "MBL9QT2ZgWXs2HdognRMK3yK70eG5OIlBQ71VOqpNdx361tc8U";
$accessToken = "2293431442-HcomS1JlnILSv6H0yPsOVlTvOjoVLoA2VKN67RE";
$accessTokenSecret = "kzc5zwNSiKkHCDhTCwhnl7H2nroMCMUOckWOj04NpO7mM";

$connection = new TwitterOAuth($consumerKey, $consumerSecretKey, $accessToken, $accessTokenSecret);


$tweets = $connection->get("statuses/user_timeline",["count" => $noofTweets,"screen_name" => $twitterUsername]);



?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Kitchner Airport</title>

        <!-- Bootstrap -->
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../bootstrap/css/style.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="../../Images/airport.jpg" class="img-responsive img-thumbnail" alt="Responsive image" id="banner">
            </div>

            <div class="row">
                <div class="col-md-3 resize">
                    <img src="../../Images/air.jpg" class="img-thumbnail" alt="Responsive image" id="twitterPhoto"><br>
                    <p style="font-weight: bold;font-size: 20px;">Waterloo Airport</p>
                     <p style="color:#0a568c"> @FlyYKF </p>
                    <p> Official Airport Feed. Fly from Home. Tweet us M-F 8:30am to 4:30pm. #flyfromhome For immediate assistance 1-866-648-2256 or</p>
                        <p>contact your airline directly.</p>

                </div>
                <div class="col-md-8">
                    <br>
                    <?php
                    foreach($tweets as $items)
                    {
                        echo "<span style='color: #0a568c'>". "Time and Date of Tweet : "."</span>".$items->created_at ."<br />";
                        echo "<span style='color: #0a568c'>"."Tweet : "."</span>" .$items->text."<br />";
                        echo "<span style='color: #0a568c'>"."Tweeted by : "."</span>"."<span style='font-weight:bold;font-size:17px'>". $items->user->name."</span>"."<br />";
                        echo "<hr style='border-top: 1px solid black;'>";

                    }

                    ?>


                </div>

            </div>


        </div>
    </div>
    </body>
</html>



