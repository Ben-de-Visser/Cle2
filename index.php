<?php

if (isset($_POST['submit'])) {

    /** @var $db */
    require_once "connection.php";

    $voornaam = mysqli_escape_string($db, $_POST['voornaam']);
    $tussenvoegsel = mysqli_escape_string($db, $_POST['tussenvoegsel']);
    $achternaam = mysqli_escape_string($db, $_POST['achternaam']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $telefoonnummer = mysqli_escape_string($db, $_POST['telefoonnummer']);
    $woonplaats = mysqli_escape_string($db, $_POST['woonplaats']);
    $postcode = mysqli_escape_string($db, $_POST['postcode']);
    $straatnaam = mysqli_escape_string($db, $_POST['straatnaam']);
    $huisnummer = mysqli_escape_string($db, $_POST['huisnummer']);


    if (empty($errors)) {

        $query = "INSERT INTO klantgegevens(voornaam, tussenvoegsel, achternaam, email, telefoonnummer, woonplaats, postcode, straatnaam, huisnummer) 
                  VALUES('$voornaam', '$tussenvoegsel', '$achternaam', '$email', '$telefoonnummer', '$woonplaats', '$postcode', '$straatnaam', '$huisnummer')";
        $result = mysqli_query($db, $query) or die('Error: ' . $query. '<br>' . mysqli_error($db));

        if ($result) {
            header('Location: done.php');
            exit;
        } else {
            $errors['db'] = 'Er ging iets mis in je database query: ' . mysqli_error($db);
        }

        mysqli_close($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reserveringssysteem</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<header>Reseveren Diëtistenpraktijk Bijdevier</header>

<nav>
    <div id="reserveren">Reserveren</div>
    <div id="contact">Andere contact mogelijkheden</div>
</nav>

<main>
    <section id="reserverensection">
        <h1>Reserveren</h1>
        <p>Wij vragen u om hier uw persoonsgegevens intevullen en vervolgens op "versturen" te klikken om te reserveren.</p>
        <br>

        <?php if (isset($errors['db'])) { ?>
            <div><span class="errors"><?= $errors['db']; ?></span></div>
        <?php } ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="voornaam">Voornaam:</label>
                <input type="text" id="voornaam" name="voornaam" value="<?= isset($voornaam) ? htmlentities($voornaam) : '' ?>"/>
                <span class="errors"><?= isset($errors['voornaam']) ? $errors['voornaam'] : '' ?></span>
            </div>

            <div>
                <label for="tussenvoegsel">Tussenvoegsel:</label>
                <input type="text" id="tussenvoegsel" name="tussenvoegsel" value="<?= isset($tussenvoegsel) ? htmlentities($tussenvoegsel) : '' ?>"/>
            </div>

            <div>
                <label for="achternaam">Achternaam:</label>
                <input type="text" id="achternaam" name="achternaam" value="<?= isset($achternaam) ? htmlentities($achternaam) : '' ?>"/>
                <span class="errors"><?= isset($errors['achternaam']) ? $errors['achternaam'] : '' ?></span>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= isset($email) ? htmlentities($email) : '' ?>"/>
                <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
            </div>

            <div>
                <label for="telefoonnummer">telefoonnummer:</label>
                <input type="telefoonnummer" id="telefoonnummer" name="telefoonnummer" value="<?= isset($telefoonnummer) ? htmlentities($telefoonnummer) : '' ?>"/>
                <span class="errors"><?= isset($errors['telefoonnummer']) ? $errors['telefoonnummer'] : '' ?></span>
            </div>

            <div>
                <label for="woonplaats">Woonplaats:</label>
                <input type="text" id="woonplaats" name="woonplaats" value="<?= isset($woonplaats) ? htmlentities($woonplaats) : '' ?>"/>
                <span class="errors"><?= isset($errors['woonplaats']) ? $errors['woonplaats'] : '' ?></span>
            </div>

            <div>
                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" name="postcode" value="<?= isset($postcode) ? htmlentities($postcode) : '' ?>"/>
                <span class="errors"><?= isset($errors['postcode']) ? $errors['postcode'] : '' ?></span>
            </div>

            <div>
                <label for="straatnaam">Straatnaam:</label>
                <input type="text" id="straatnaam" name="straatnaam" value="<?= isset($straatnaam) ? htmlentities($straatnaam) : '' ?>"/>
                <span class="errors"><?= isset($errors['straatnaam']) ? $errors['straatnaam'] : '' ?></span>
            </div>

            <div>
                <label for="huisnummer">Huisnummer:</label>
                <input type="number" id="huisnummer" name="huisnummer" value="<?= isset($huisnummer) ? htmlentities($huisnummer) : '' ?>"/>
                <span class="errors"><?= isset($errors['huisnummer']) ? $errors['huisnummer'] : '' ?></span>
            </div>
            <br>
            <div>
                <input type="submit" name="submit" value="Versturen"/>
            </div>
        </form>
    </section>

    <section id="contactsection">
        <h1>Andere contact mogelijkheden</h1>
        <br>
        <p>Naast het reserveringsformulier zijn er ook andere manier om contact op te leggen met diëtistenpraktijk bijdevier. Dit kan via email en telefoonnummer.</p>
        <p>E-mail: info@dieet-bijdevier.nl</p>
        <p>Praktijk telefoonnummer: 0181 882288</p>
        <p>Mobiele telefoonnummer: 06 53411283</p>
    </section>

</main>

<footer>
    <a href="https://www.dieet-bijdevier.nl/Privacyverklaring_DPB.pdf" style="color:#79c879;"> Privacyverklaring</a>
    <br>
    <a href="login.php" style="color:#79c879;"> Inloggen</a>
</footer>
<script type="text/javascript" src="interaction.js"></script>
</body>
</html>
