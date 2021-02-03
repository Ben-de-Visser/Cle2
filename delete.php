<?php
/** @var $db */
require_once "connection.php";

$klant = $_GET['id'];

$query = "DELETE FROM klantgegevens WHERE id = " . mysqli_escape_string($db, $klant);

mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

mysqli_close($db);

header("Location: admin.php");
exit;