// FUNCTIONS

<?php

$radius = $_POST["radius"];
$circumference = null;
$area = null;
$volume = null;

$circumference = 2* pi() * $radius;
$circumference = round($circumference, 2);

$area = pi() * pow($radius, 2);
$area = round($area, 2);

$volume = 4/3 * pi() * pow($r, 3);
$volume = round($volume, 2);

echo "Circonferenza = {$circumference}cm <br>";
echo "Area = {$Area}cm^2 <br>";
echo "Volume = {$Volume}cm^ <br>";

?>



// CONDITIONS

<?php
    $hours =  40;
    $rate = 15;
    $weekly_pay = null;

    if($hours <= 0){
        $weekly_pay = 0;
    }
    elseif($hours <= 40){
        $weekly_pay = $hours * $rate;
    }
    else{
        $weekly_pay = ($rate * 40) + (($hours - 40) * $rate);
    }

    echo "Hai guadagnato \${$weekly_pay} questa settimana"
?>