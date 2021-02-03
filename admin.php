<?php
session_start();

/** @var $db */
require_once "connection.php";

if (!isset($_SESSION["loggedInUser"])){
    header("location: login.php");
    exit;
}

$query = "SELECT * FROM `klantgegevens`";
$result = mysqli_query($db, $query) or die ("error" . $query);

$klantenlijsten = [];
while ($row = mysqli_fetch_assoc($result)) {
    $klantenlijsten[] = $row;
}

mysqli_close($db);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<header>
    Welkom : Admin
</header>

<main>
    <?php foreach ($klantenlijsten as $klantenlijst) { ?>
       <section>
            <tr>
                <td>Voornaam: <?= $klantenlijst['voornaam'] ?></td> <br>
                <td>Tussenvoegsel: <?= $klantenlijst['tussenvoegsel'] ?></td> <br>
                <td>Achternaam: <?= $klantenlijst['achternaam'] ?></td> <br>
                <td>Email: <?= $klantenlijst['email'] ?></td> <br>
                <td>Telefoonnummer: <?= $klantenlijst['telefoonnummer'] ?></td> <br>
                <td>Woonplaats: <?= $klantenlijst['woonplaats'] ?></td> <br>
                <td>Postcode: <?= $klantenlijst['postcode'] ?></td> <br>
                <td>Straatnaam: <?= $klantenlijst['straatnaam'] ?></td> <br>
                <td>Huisnummer: <?= $klantenlijst['huisnummer'] ?></td> <br>
                <form action="" method="get" enctype="multipart/form-data">
                <td><a href="edit.php?id=<?= $klantenlijst['id']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $klantenlijst['id'];?>">Delete</a></td>
                </form>
            </tr>
       </section>
    <?php } ?>
</main>
<footer>
    <a href="logout.php" style="color:#79c879;"> Uitloggen</a>
</footer>
</body>
</html>
