<?php
session_start();

/** @var $db */
require_once "connection.php";

if (isset($_POST['submit'])) {
    $naam = mysqli_escape_string($db, $_POST['naam']);
    $wachtwoord = $_POST['wachtwoord'];

    $query = "SELECT *
              FROM admins
              WHERE naam = '$naam'";
    $result = mysqli_query($db, $query) or die('Error: '.$query);
    $user = mysqli_fetch_assoc($result);

    $errors = [];
    if ($user) {
        if (password_verify($wachtwoord, $user['wachtwoord'])) {
            $_SESSION['loggedInUser'] = [
                'name' => $user['name'],
                'id' => $user['id']
            ];
            header("Location: admin.php");
            exit;
        } else {
            $errors[] = 'Uw logingegevens zijn onjuist';
        }
    } else {
        $errors[] = 'Uw logingegevens zijn onjuist';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<header>Inloggen</header>

<main>
    <section>
        <h1>Inloggen</h1>
        <p>Vul hier uw naam en wachtwoord in als u wilt inloggen op de admin pagina van deze site.
            <br>
            <br>

        <form action="" method="post">
            <div>
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" value="<?= isset($naam) ? htmlentities($naam) : '' ?>"/>
            </div>

            <div>
                <label for="wachtwoord">Wachtwoord:</label>
                <input type="password" id="wachtwoord" name="wachtwoord" value="<?= isset($wachtwoord) ? htmlentities($wachtwoord) : '' ?>"/>
            </div>
            <br>
            <div>
                <input type="submit" name="submit" value="Inloggen"/>
            </div>
        </form>
    </section>

</main>

<footer>
    <a href="https://www.dieet-bijdevier.nl/Privacyverklaring_DPB.pdf" style="color:#79c879;"> Privacyverklaring</a>
    <br>
    <a href="index.php" style="color:#79c879;"> Terug</a>
</footer>

</body>
</html>