<?php
$errors = [];
if ($voornaam == "") {
    $errors['voornaam'] = 'voornaam kan niet leeg zijn';
}
if ($achternaam == "") {
    $errors['achternaam'] = 'achternaam kan niet leeg zijn';
}
if ($email == "") {
    $errors['email'] = 'email kan niet leeg zijn';
}
if (!is_numeric($telefoonnummer)) {
    $errors['telefoonnummer'] = 'telefoonnummer moet een getal zijn';
}
if ($telefoonnummer == "") {
    $errors['telefoonnummer'] = 'telefoonnummer kan niet leeg zijn';
}
if ($woonplaats == "") {
    $errors['woonplaats'] = 'woonplaats kan niet leeg zijn';
}
if ($postcode == "") {
    $errors['postcode'] = 'postcode kan niet leeg zijn';
}
if ($straatnaam == "") {
    $errors['straatnaam'] = 'straatnaam kan niet leeg zijn';
}
if (!is_numeric($huisnummer)) {
    $errors['huisnummer'] = 'huisnummer moet een getal zijn';
}
if ($huisnummer == "") {
    $errors['huisnummer'] = 'huisnummer kan niet leeg zijn';
}