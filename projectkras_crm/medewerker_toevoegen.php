<?php //if(!isset($_SESSION["logged-in"])) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php
if ($rechten->getRechten("r_admin", $_SESSION["medewerker"]) === "0") {
    $content = $template->loadToegangError();
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       echo $medewerkerBeheer->nieuweMedewerker($_POST["naam"], $_POST["achternaam"], $_POST["email"], hash("sha1", $_POST["wachtwoord"]));
       // TODO: label
       $content = "OK";
    
    } else {
        $content = '<form action="" method="POST">';
        $content .= '<input type="text" name="naam" placeholder="Voornaam">';
        $content .= '<input type="text" name="achternaam" placeholder="Achternaam">';
        $content .= '<input type="text" name="email" placeholder="E-mail">';
        $content .= '<input type="password" name="wachtwoord" placeholder="Wachtwoord">';
        $content .= '<input type="submit">';
        $content .= '</form>';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <?php echo $template->loadHead(); ?>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper"><?php echo $template->loadSidebar(); ?></div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"><?php echo $template->loadNav(); ?></nav>
            <div class="container-fluid">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
    <?php echo $template->loadFooter(); ?>
</body>
</html>