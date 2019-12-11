<?php session_start(); ?>
<?php if(!isset($_SESSION["logged-in"]) || !$_SESSION["medewerker"] === true) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $nieuws->toevoegenNieuws(date("d-m-Y"), $_POST["titel"], $_SESSION["u_realname"], $_POST["content"]);
 
} 
else {
    $content = $nieuws->toevoegenNieuwsForm();
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
                <h1 class="mt-4">Nieuws</h1>
                <!-- CODE -->
                <?php echo $content; ?>
                </div>
        </div>
    </div>
    <?php echo $template->loadFooter(); ?>
</body>
</html>