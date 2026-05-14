<?php
    session_start();
    include("database.php");

    $message = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST["password"] ?? "";

        if(empty($username)){
            $message = "Inserisci un username";
        }
        elseif(empty($password)){
            $message = "Inserisci una password";
        }
        elseif(isset($_POST["register"])){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (user, password)
                    VALUES (?, ?)";

            try{
                //Prepara la query per MySQL. Da qui MySQL sa che i ? verranno riempiti dopo.
                $stmt = mysqli_prepare($conn, $sql);
                //Collega i valori ai ? , "ss" significa: s = stringa, ripetuto       
                //function mysqli_stmt_bind_param(mysqli_stmt $statement, string $types, mixed &...$vars)
                mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
                //Esegue la query in Mysql
                mysqli_stmt_execute($stmt);

                $_SESSION["username"] = $username;
                //prende l’id dell’ultimo utente appena inserito
                $_SESSION["user_id"] = mysqli_insert_id($conn);

                mysqli_stmt_close($stmt);
                mysqli_close($conn);

                header("Location: Learn.php");
                exit;
            }
            catch(mysqli_sql_exception $e){
                    $message = "Errore DB: " . $e->getMessage();
            }
        }
        elseif(isset($_POST["login"])){
            $sql = "SELECT id, user, password
                    FROM user
                    WHERE user = ?";

            try{
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    //Trasforma la riga trovata in un array associativo
                    $row = mysqli_fetch_assoc($result);

                    if(password_verify($password, $row["password"])){
                        $_SESSION["username"] = $row["user"];
                        $_SESSION["user_id"] = $row["id"];

                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);

                        header("Location: Learn.php");
                        exit;
                    }
                    else{
                        $message = "Password non corretta";
                    }
                }
                else{
                    $message = "Username non trovato";
                }

                mysqli_stmt_close($stmt);
            }
            catch(mysqli_sql_exception $e){
                $message = "Errore DB: " . $e->getMessage();
            }
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
    <h2>Benvenuto in Learning PHP!</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Login</h3>
        username: <br>
        <input type="text" name="username"><br>
        password: <br>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="login">
    </form>

    <br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Registrazione</h3>
        username: <br>
        <input type="text" name="username"><br>
        password: <br>
        <input type="password" name="password"><br>
        <input type="submit" name="register" value="registrati">
    </form>

    <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>

<?php
    if(isset($conn) && $conn instanceof mysqli){
        mysqli_close($conn);
    }
?>
