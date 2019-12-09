<?php session_start(); ?>
<?php if(!isset($_SESSION["logged-in"])) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
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
                <h1 class="mt-4">Dashboard</h1>
                <p>Welkom, <b><?php echo $_SESSION["username"]; ?></b> Dit is de CRM webapplicatie van KrasHosting</p>
                <p><?php // echo $_SESSION["r_verwijderen"]; ?></p>
                </div>
        </div>
    </div>

</body>
</html>