<?php

/**
 * @var $db
 * @var array $klantenlijsten
 */

require_once "connection.php";

if (isset($_POST['submit'])) {

    $reserveringId = mysqli_escape_string($db, $_POST['id']);
    $voornaam = mysqli_escape_string($db, $_POST['voornaam']);
    $tussenvoegsel = mysqli_escape_string($db, $_POST['tussenvoegsel']);
    $achternaam = mysqli_escape_string($db, $_POST['achternaam']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $telefoonnummer = mysqli_escape_string($db, $_POST['telefoonnummer']);
    $woonplaats = mysqli_escape_string($db, $_POST['woonplaats']);
    $postcode = mysqli_escape_string($db, $_POST['postcode']);
    $straatnaam = mysqli_escape_string($db, $_POST['straatnaam']);
    $huisnummer = mysqli_escape_string($db, $_POST['huisnummer']);

    require_once "form-validation.php";

    $klant = [
        'voornaam' => $voornaam,
        'tussenvoegsel' => $tussenvoegsel,
        'achternaam' => $achternaam,
        'email' => $email,
        'telefoonnummer' => $telefoonnummer,
        'woonplaats' => $woonplaats,
        'postcode' => $postcode,
        'straatnaam' => $straatnaam,
        'huisnummer' => $huisnummer,
    ];


        $query = "UPDATE klantgegevens
                  SET voornaam = '$voornaam', tussenvoegsel = '$tussenvoegsel', achternaam = '$achternaam', email = '$email', telefoonnummer = '$telefoonnummer', woonplaats = '$woonplaats', postcode = '$postcode', straatnaam = '$straatnaam', huisnummer = '$huisnummer'
                  WHERE id = '$reserveringId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: admin.php');
            exit;
        } else {
            $errors[] = 'Er ging iets mis in je database query: ' . mysqli_error($db);
        }
}else {
        //Retrieve the GET parameter from the 'Super global'
        $reserveringId = $_GET['id'];

        //Get the record from the database result
        $query = "
            SELECT *
            FROM klantgegevens 
            WHERE id = " . mysqli_escape_string($db, $reserveringId);
        $result = mysqli_query($db, $query);
        $klant = mysqli_fetch_assoc($result);


}

mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<header>Aanpassen</header>

<main>
    <section>

        <?php if (isset($errors['db'])) { ?>
            <div><span class="errors"><?= $errors['db']; ?></span></div>
        <?php } ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="voornaam">Voornaam:</label>
                <input type="text" id="voornaam" name="voornaam" value="<?= $klant['voornaam']; ?>"/>
            </div>

            <div>
                <label for="tussenvoegsel">Tussenvoegsel:</label>
                <input type="text" id="tussenvoegsel" name="tussenvoegsel" value="<?= $klant['tussenvoegsel']; ?>"/>
            </div>

            <div>
                <label for="achternaam">Achternaam:</label>
                <input type="text" id="achternaam" name="achternaam" value="<?= $klant['achternaam']; ?>"/>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $klant['email']; ?>"/>
            </div>

            <div>
                <label for="telefoonnummer">telefoonnummer:</label>
                <input type="telefoonnummer" id="telefoonnummer" name="telefoonnummer" value="<?= $klant['telefoonnummer']; ?>"/>
            </div>

            <div>
                <label for="woonplaats">Woonplaats:</label>
                <input type="text" id="woonplaats" name="woonplaats" value="<?= $klant['woonplaats']; ?>"/>
            </div>

            <div>
                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" name="postcode" value="<?= $klant['postcode']; ?>"/>
            </div>

            <div>
                <label for="straatnaam">Straatnaam:</label>
                <input type="text" id="straatnaam" name="straatnaam" value="<?= $klant['straatnaam']; ?>"/>
            </div>

            <div>
                <label for="huisnummer">Huisnummer:</label>
                <input type="number" id="huisnummer" name="huisnummer" value="<?= $klant['huisnummer']; ?>"/>
            </div>
            <div class="data-submit">
                <input type="hidden" name="id" value="<?= $reserveringId; ?>"/>
                <input type="submit" name="submit" value="Opslaan"/>
            </div>
        </form>
    </section>
</main>
<footer>
    <a href="admin.php">Terug naar de lijst.</a>
</footer>
</body>
</html>

