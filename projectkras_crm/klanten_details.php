<?php //if(!isset($_SESSION["logged-in"])) { header('Location: login.php'); } ?>
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
                <h1 class="mt-4">Klanten</h1>
                <?php echo $crm->getKlantDetails($_GET["id"]); ?>
                
                <h1 class="mt-4">Diensten</h1>
                <?php echo $crm->getKlantDiensten($_GET["id"]); ?>
                <!-- Diensten van klant komen hier -->
                </div>
        </div>
    </div>
    <?php echo $template->loadFooter(); ?>
</body>
</html>