<?php
    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: index.php");
        exit;
    }
?>



<div class="colonne">
    <div class="colonna">
        <!DOCTYPE html>
<html lang="en">

    <style>
    .colonne {
        display: flex;
        gap: 20px;
    }

    .colonna {
        flex: 1;
        padding: 15px;
        border: 1px solid black;
    }
</style>

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
    </div>
    <div class="colonna">
        <?php 

    // ARRAY
    // Form lettera
    
if (!isset($_SESSION["letters"])) {
    $_SESSION["letters"] = array("a", "b", "c", "d");
}

$letters = $_SESSION["letters"];
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

    // Form Conta

if (isset($_POST["conta"])) {
    echo "Numero elementi presenti nell' array: " . count($letters);
    echo "<br><br>";
}

    // Form aggiungi elemento

$find = $_POST["find"] ?? "";
$new_value = $_POST["new_value"] ?? "";

if ($find !== "" && $new_value !== "") {
    $posizione = array_search($find, $letters);

    if ($posizione !== false) {
        echo "L'elemento si trova alla posizione: " . ($posizione+1) . "<br>";

        $letters[$posizione] = $new_value;
        $_SESSION["letters"] = $letters;


        echo "Il nuovo array è: <br>";
        foreach ($letters as $letter) {
            echo $letter . " ";
        }
    echo "<br><br>";

    } else {
        echo "L'elemento non è presente nell'array";
        echo "<br><br>";

    }
}


// Aggiungi elemento alla fine dell' array

$add = $_POST["elemento_da_aggiungere"] ?? "";

if(isset($_POST["add"])){
        array_push($letters, $add);
        $_SESSION["letters"] = $letters;
        echo "Nuovo array: ";
        foreach($letters as $lett){
            echo $lett ." ";
        }
        echo "<br><br>";
}


// Elimina ultimo elemento

if(isset($_POST["delete"])){
    array_pop($letters);
    $_SESSION["letters"] = $letters;
    echo "Nuovo array: ";
    foreach($letters as $let){
        echo $let . " ";
    }
    echo "<br><br>";
}


// Cerca valore nell' array

$value_to_find = $_POST["find_value"] ?? "";

if (isset($_POST["find"])) {
    if (in_array($value_to_find, $letters)) {
        echo "Il valore $value_to_find è presente nell' array" . "<br><br>";
    } else {
        echo "Il valore $value_to_find NON è presente nell' array" . "<br><br>";
    }
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
        <label>Cambia in un valore a tua scelta, l' elemento alla xesima posizione</label><br>
        <input type="text" name="posizione" placeholder="posizione" required><br>
        <input type="text" name="lettera" placeholder="valore" required><br>
        <input type="submit">
    </form>
    <form action="Learn.php" method="post">
        <label>Clicca per contare gli elementi dell' array</label><br>
        <input type="submit" name="conta" value="Conta"><br>
    </form>
    <form action="Learn.php" method="post">
        <label>Scegli elemento da sostituire nell'array</label><br>
        <input type="text" name="find" placeholder="elemento da cercare"><br>
        <input type="text" name="new_value" placeholder="nuovo valore"><br>
        <input type="submit" name="Sostituisci" value="Sostituisci"> 
    </form>
    <form action="Learn.php" method="post">
        Aggiungi elemento in fondo all' array: <br>
        <input type="text" name="elemento_da_aggiungere"><br>
        <input type="submit" name="add" value="Add"><br>
    </form>
    <form action="Learn.php" method="post">
        Rimuovi ultimo elemento dell' array<br>
        <input type="submit" name="delete" value="Delete"><br>
    </form><br>
    <form action="Learn.php" method="post">
        Cerca se un valore è presente nell' array<br>
        <input type="text" name="find_value" ><br>
        <input type="submit" name="find" value="Find"><br>
    </form><br>
</body>
</html>
<?php 
?>
    </div>
</div>




