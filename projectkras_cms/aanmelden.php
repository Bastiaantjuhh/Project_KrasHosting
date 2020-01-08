<!-- Boven aan pagina -->
<?php session_start(); ?>
<?php include "autoload.php"; ?>
<?php
$content = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($registratie->postRegistratie($_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["password"], $_POST["address"], $_POST["huisnummer"], $_POST["postcode"], $_POST["woonplaats"]) == true) {
        //header('Location: index.php');
        echo "successvol";
    }
} else {
    $content = $registratie->showRegistratie();
}
?>

<!-- Content van de pagina -->
<?php echo $content; ?>