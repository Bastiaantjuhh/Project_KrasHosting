<?php
include "autoload.php";

$registratie = new Registratie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index_KrasHosting.php">Home</a>
            <a href="pakketen.php">Pakketen</a>
            <a href="overons.php">Over ons</a>
            <a href="contact.php">Contact</a>
            <a href="inloggen.php" class="inloggen">Inloggen/registreren</a>
        </div>

<h1>Registreren</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($registratie->postRegistratie($_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["password"], $_POST["password_herhaling"], $_POST["address"], $_POST["huisnummer"], $_POST["postcode"], $_POST["woonplaats"]) === true) {
        $postVoornaam       = mysqli_real_escape_string($mysql, $_POST["voornaam"]);
        $postAchternaam     = mysqli_real_escape_string($mysql, $_POST["achternaam"]);
        $postEmail          = mysqli_real_escape_string($mysql, $_POST["email"]);
        $postPassword       = mysqli_real_escape_string($mysql, hash("sha1", $_POST["password"]));
        $postAddress        = mysqli_real_escape_string($mysql, $_POST["address"]);
        $postHuisnummer     = mysqli_real_escape_string($mysql, $_POST["huisnummer"]);
        $postPostcode       = mysqli_real_escape_string($mysql, $_POST["postcode"]);
        $postWoonplaats     = mysqli_real_escape_string($mysql, $_POST["woonplaats"]);

        $mysql->query("INSERT INTO login_klanten (voornaam, achternaam, email, wachtwoord, address, huisnummer, postcode, woonplaats) VALUES ('{$postVoornaam}', '{$postAchternaam}', '{$postEmail}', '{$postPassword}', '{$postAddress}', '{$postHuisnummer}', '{$postPostcode}', '{$postWoonplaats}')");
   } else {
       echo "Een of meerdere van de ingevulde velden is onjuist ingevuld";
   }
} else {
    echo $registratie->showRegistratie();
}
?>
</body>
</html>