<?php
include 'classes/moon.php';
include 'classes/sun.php';
include 'settings/settings.php';
$moon = new Moon();
$sun = new Sun();

// get current temperature and current daily high
$currentConditions = json_decode(cURL("{$weatherAPIURL}/"));
$currentTemperature = round($currentConditions->currently->apparentTemperature);
$todaysHigh = round($currentConditions->daily->data[0]->apparentTemperatureHigh);
$todaysHighTime = date("g:i a", $currentConditions->daily->data[0]->temperatureHighTime);
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
    </head>
    <body onload="startTime()">
        <div class="row">
            <div class="col-md-5">
                <img src="/images/Earth/<?=$sun->getEarthFromSun()?>"/>
                <?php
                    if ($sun->importantDateDaysleft > 0) {
                ?>
                    <h1 class="nowrap"><img src="/images/<?=$sun->getImportantDateImage()?>.png" style="max-height: 75px;"/> <?=$sun->importantDateName?> <?=$sun->importantDateDaysleft?> <?=$sun->importantDateUnit?></h1>
                <?php
                 } else {
                ?>
                    <h1 class="nowrap"><?=$sun->importantDateName?> is TODAY</h1>
                <?php
                 }
                ?>
            </div>
            <div class="col-md-4">
                <img src="/images/Moon/<?=$moon->phase_image()?>"/>                
                <h3 class="nowrap"><?=round( $moon->age() )?> day old <?=$moon->phase_name()?></h3>
            </div>
            <div class="col-md-3">  
                <br/><br/>              
                <div class="col-md-6">
                    <img src="/images/NewMoon.png" style="max-width: 100px;"/><br/>
                    <h4><?=$moon->get_next_new_moon_time()?></h4>
                </div>
                <div class="col-md-6">
                    <img src="/images/FullMoon.png" style="max-width: 100px;"/><br/>
                    <h4><?=$moon->get_next_full_moon_time()?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h1 id="time"></h1>
            </div>
            <div class="col-md-6">
                <h1 id="temp" class="pull-right" style="color: <?=$tempColor?>"><?=$currentTemperature?>&deg;</h1>
                <h3 style="position: absolute; bottom: 0px; right: 10px;">High: <span style="color: <?=$tempHighColor?>"><?=$todaysHigh?>&deg;</span> <?=$todaysHighTime?></h3>
            </div>
        </div>        
    </body>
</html>
