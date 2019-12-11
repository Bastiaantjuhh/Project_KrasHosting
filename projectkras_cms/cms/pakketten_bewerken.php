<?php session_start(); ?>
<?php if(!isset($_SESSION["logged-in"]) || !$_SESSION["medewerker"] === true) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $pakketten->updatePakket($_GET["id"], $_POST["naam"], $_POST["prijs"], $_POST["inhoud"]);
    header("Location: pakketten.php");
} 
else {
    $content = $pakketten->updatePakketForm($_GET["id"]);
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
                <h1 class="mt-4">Pakketten</h1>
                <?php echo $content; ?>
                </div>
        </div>
    </div>
    <?php echo $template->loadFooter(); ?>
</body>
</html>