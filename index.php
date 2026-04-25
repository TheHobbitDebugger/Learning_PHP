<?php
    
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
    <form action="index.php" method="post">
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
    <form action="index.php" method="post">
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
    <form action="index.php" method="post">
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
    <form action="index.php" method="post">
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
    <form action="index.php" method="post">
        <label>Cambia in "z" l' elemento alla xesima posizione</label><br>
        <input type="text" name="posizione" placeholder="posizione" required><br>
        <input type="text" name="lettera" placeholder="valore" required><br>
        <input type="submit">
    </form>
</body>
</html>
<?php 

    //ARRAY

$letters = array("a","b","c", "d");
echo "Array inziale: <br>";

$posizione = $_POST["posizione"] ?? ""; 
$nuovaLettera = $_POST["lettera"] ?? ""; 

$letters[$posizione] = $nuovaLettera;

foreach($letters as $letter){
    echo "$letter  ";
};
    echo "<br><br>";

/*
//Stampa di tutti gli elementi
foreach($letters as $letter){
    echo $letter;
}
echo "<br><br>";

// cambia elemento a posizione [x], O(1)
$x =  $_POST["xesimaPosizione"] ?? "";
$letters[$x] = "z";  

foreach($letters as $letter){
    echo $letter;   
}
echo "<br> modifica elemento array[x], O(1) <br>";


// aggiunge elemento alla fine O(1)
array_push($letters, "e");   

foreach($letters as $letter){
    echo $letter;
}
echo "<br> array_push, aggiunge elemento alla fine O(1) <br>";


// elimina ultimo elemento O(1)
array_pop($letters); 

foreach($letters as $letter){
    echo $letter;
}
echo "<br> array_pop, elimina ultimo elemento O(1) <br>";


// elimina il primo elemento, spostando tutti gli altri elementi indietro di uno O(N)
array_shift($letters);

foreach($letters as $letter){
    echo $letter;
}
echo "<br> array_shift, elimina primo elemento, spostando tutti gli elementi a dx, O(N) <br>";


//inverte un array, ma va assegnato ad una nuova variabile O(N)
$reversed_letters = array_reverse($letters);

foreach($letters as $letter){
    echo $letter;
}
echo "<br> array_reverse, inverte l' array, va inserito in nuova variabile, O(N) <br>";



// conta gli elementi al suo interno O(N)
echo count($letters);
echo "<br> count(nomeArray), conta numero elementi, O(N) <br>";


// unisce due array in un nuovo array O(N)
$more_letters = array("d", "e", "f");
$merged_letters = array_merge($letters, $more_letters);

foreach($merged_letters as $letter){
    echo $letter;
}
echo "<br> array_merge, unisce due array in un nuovo array, O(N) <br>";


// controlla se un valore e' presente nell' array O(N)
if(in_array("b", $letters)){
    echo "b e' presente nell' array";
}
else{
    echo "b non e' presente nell' array";
}
echo "<br> in_array, controlla se un valore e' presente nell' array, O(N) <br>";


// restituisce le chiavi dell' array O(N)
$keys = array_keys($letters);

foreach($keys as $key){
    echo $key;
}
echo "<br> array_keys, restituisce le chiavi dell' array, O(N) <br>";


// restituisce i valori dell' array O(N)
$values = array_values($letters);

foreach($values as $value){
    echo $value;
}
echo "<br> array_values, restituisce i valori dell' array, O(N) <br>";


// filtra gli elementi dell' array in base ad una condizione O(N)
$filtered_letters = array_filter($letters, function($letter){
    return $letter != "b";
});

foreach($filtered_letters as $letter){
    echo $letter;
}
echo "<br> array_filter, filtra elementi in base ad una condizione, O(N) <br>";


// modifica ogni elemento dell' array con una funzione O(N)
$mapped_letters = array_map(function($letter){
    return strtoupper($letter);
}, $letters);

foreach($mapped_letters as $letter){
    echo $letter;
}
echo "<br> array_map, modifica ogni elemento dell' array con una funzione, strtoupper() per casing-up, O(N) <br>";


// ordina i valori in ordine crescente e resetta le chiavi O(N log N)
$sorted_letters = $letters;
sort($sorted_letters);

foreach($sorted_letters as $letter){
    echo $letter;
}
echo "<br> sort, ordina valori in ordine crescente e resetta le chiavi, O(N log N) <br>";


// ordina i valori in ordine crescente mantenendo le chiavi O(N log N)
$asorted_letters = $letters;
asort($asorted_letters);

foreach($asorted_letters as $letter){
    echo $letter;
}
echo "<br> asort, ordina valori in ordine crescente mantenendo le chiavi, O(N log N) <br>";


// ordina i valori in ordine decrescente e resetta le chiavi O(N log N)
$rsorted_letters = $letters;
rsort($rsorted_letters);

foreach($rsorted_letters as $letter){
    echo $letter;
}
echo "<br> rsort, ordina valori in ordine decrescente e resetta le chiavi, O(N log N) <br>";


// ordina l' array in base alle chiavi O(N log N)
$ksorted_letters = $letters;
ksort($ksorted_letters);

foreach($ksorted_letters as $letter){
    echo $letter;
}
echo "<br> ksort, ordina l' array in base alle chiavi, O(N log N) <br>";
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
    <form action="index.php" method="post"> <br>
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

        echo "La capitale è {$capital}";
?>
