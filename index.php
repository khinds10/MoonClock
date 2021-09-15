<?php
date_default_timezone_set('America/New_York');
include 'classes/moon.php';
include 'classes/sun.php';
include 'settings/settings.php';
$moon = new Moon();
$sun = new Sun();

// get current temperature and current daily high
$currentConditions = json_decode(cURL($weatherAPIURL));
$currentTemperature = round($currentConditions->current->feels_like);
$todaysHigh = round($currentConditions->daily[0]->temp->max);
$tempColor = cURL("{$temperatureColorAPI}/?temperature=" . $currentTemperature);
$tempHighColor = cURL("{$temperatureColorAPI}/?temperature=" . $todaysHigh);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/script.js"></script>
        <link rel="apple-touch-icon" href="/images/Icons/apple-touch-icon.png">
        <link rel="icon" href="/images/Icons/favicon.ico" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    </head>
    <body onload="startTime()">
        <div class="row">
            <div class="col-sm-5">
                <img id="earth-image" src="/images/Earth/<?=$sun->getEarthFromSun()?>"/>
                <?php
                    if ($sun->importantDateDaysleft > 0) {
                ?>
                    <h1 class="nowrap"><img src="/images/<?=$sun->getImportantDateImage()?>.png" class="important-date-image"/> <?=$sun->importantDateName?> <?=$sun->importantDateDaysleft?> <?=$sun->importantDateUnit?></h1>
                <?php
                 } else {
                ?>
                    <h1 class="nowrap"><?=$sun->importantDateName?> is TODAY</h1>
                <?php
                 }
                ?>
            </div>
            <div class="col-sm-4">
                <img src="/images/Moon/<?=$moon->phase_image()?>" class="moon-image-large"/>                
                <h3 class="nowrap"><?=round( $moon->age() )?> day old <br/> <span style="padding-left:10px;"><?=$moon->phase_name()?></span></h3>
            </div>
            <div class="col-sm-3" class="padding-top">  
                <div class="col-sm-12">
                    <div id="dateBox">
                        <div class="dateBoxText"><?=date("D");?></div>
                        <div class="dateBoxText"><?=date("j");?></div>
                    </div>
                </div>
                <div class="col-sm-12 no-margin-padding">
                    <div class="col-sm-6 text-center no-margin-padding">
                        <img src="/images/NewMoon.png" class="moon-image padding-top"/>
                        <h4><?=$moon->get_next_new_moon_time()?></h4>
                    </div>
                    <div class="col-sm-6 text-center no-margin-padding">
                        <img src="/images/FullMoon.png" class="moon-image padding-top"/>
                        <h4><?=$moon->get_next_full_moon_time()?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1 id="time"></h1>
            </div>
            <div class="col-sm-6">
                <h1 id="temp" class="pull-right" style="color: <?=$tempColor?>"><?=$currentTemperature?>&deg;</h1>
                <h3 id="today-high-temp">High: <span style="color: <?=$tempHighColor?>"><?=$todaysHigh?>&deg;</span></h3>
            </div>
        </div>        
    </body>
</html>
