<?php
    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: index.php");
        exit;
    }

    
    /* BASIC ARITHMETIC

 Math operators
    + - *  ** %

 Increment and decrement
    ++, --

 Operator precedence
    () 
    **
    *, /, %
    +, -

 Logical operators
 ||     or
 &&     and
 !      not

*/
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Learn.php" method="post">
        <label>Assegna un raggio al cerchio</label><br>
        <input type="text" name="radius">
        <input type="submit" name="conferma">
    </form>
</body>
</html>
<?php

    // FUNCTIONS

$radius = (float) ($_POST["radius"] ?? "");     // if inserted by a button we could use: $_POST["radius"];
$circumference = null;
$area = null;
$volume = null;

$circumference = 2* pi() * $radius;
$circumference = round($circumference, 2);

$area = pi() * pow($radius, 2);
$area = round($area, 2);

$volume = 4/3 * pi() * pow($radius, 3);
$volume = round($volume, 2);

echo "Circonferenza = {$circumference}cm <br>";
echo "Area = {$area}cm^2 <br>";
echo "Volume = {$volume}cm^3 <br>";
echo "<br><br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Learn.php" method="post">
        <label>Ore lavorate ad un hourly wage di 15$/h</label> <br>
        <input type="text"  name="hours">
        <input type="submit" name="conferma">
    </form>
</body>
</html>
<?php

    // CONDITIONS

    $hours = (int) ($_POST["hours"] ?? "");
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

    echo "Hai guadagnato \${$weekly_pay} questa settimana";
    echo "<br><br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switches</title>
</head>
<body>
    <form action="Learn.php" method="post">
        <label>Assegna un voto tra: 0 e 10</label> <br>
        <input type="text" name="grade"> 
        <input type= "submit" name="Conferma">
    </form> 
</body>
</html>
<?php 

    // Swithces

$grade = $_POST["grade"] ?? "";


switch($grade){
    case "10": 
        echo "Eccellente";
        break;
    case "9": 
        echo "Eccellente";    
        break;
    case "8":
        echo "Ottimo";
        break;
    case "7": 
        echo "Discreto";
        break;
    case "6":
        echo "Sufficiente";
        break;
    default:
        echo "Insufficiente";
    }
    echo "<br><br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Loop</title>
</head>
<body>
    <form action="Learn.php" method="post">
        <label>Inserisci un numero da cui contare alla rovescia:</label><br>
        <input type="text" name="counter"> 
        <input type="submit" name="Start">
    </form>
</body>
</html>
<?php 

    // For loop  (conto alla rovescia)

    $counter = $_POST["counter"] ?? "";

    for ($i = $counter; $i > 0; $i--){
                echo "$i - ";
    }            
    echo "0";
    echo "<br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Learn.php" method="post"> <br>
        <label>Inserisci un paese del nord America</label> <br>
        <input type="text" name="country">
        <input type="submit">
    </form>
</body>
</html>
<?php 

        // Associative array

        $capitals = array("Canada" => "Ottawa",
                          "USA" => "Washinghton D.C.",
                          "Messico" => "Città del Messico",
                          "Groenlandia" => "Nuuk");
        
        $country = $_POST["country"] ?? "";
        $capital = $capitals[$country] ?? "";

        echo "La capitale è {$capital}  ";
        echo "<br><br>";

?>



<?php 

    // ARRAY
    
$letters = array("a","b","c", "d");
echo "Array inziale: <br>";


foreach($letters as $letter){
    echo "$letter  ";
};
echo "<br><br>";

$posizione = $_POST["posizione"] ?? ""; 
$nuovaLettera = $_POST["lettera"] ?? ""; 

if ($posizione !== "" && $nuovaLettera !== "") {
    $letters[$posizione] = $nuovaLettera;

    echo "Array modificato: <br>";
    foreach($letters as $letter){
        echo "$letter  ";
    };
    echo "<br><br>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Learn.php" method="post">
        <label>Cambia in un valore a tua scelta l' elemento alla xesima posizione</label><br>
        <input type="text" name="posizione" placeholder="posizione" required><br>
        <input type="text" name="lettera" placeholder="valore" required><br>
        <input type="submit">
    </form>
</body>
</html>
<?php 



?>




