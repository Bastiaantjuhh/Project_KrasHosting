<?php
class Template {
    public function loadHead() {
        $content = '<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Krashosting | CMS</title>
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/simple-sidebar.css" rel="stylesheet">';
        return $content;
    }

    public function loadNav() {
        $content = '<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0"><li class="nav-item"><a class="nav-link" href="uitloggen.php">Uitloggen</a></li></ul>
        </div>';
        return $content;
    }

    public function loadSidebar() {
        $content = '<div class="sidebar-heading">Krashosting | CMS</div>
        <div class="list-group list-group-flush">
            <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="nieuws.php" class="list-group-item list-group-item-action bg-light">Nieuws</a>
            <a href="pakketten.php" class="list-group-item list-group-item-action bg-light">Pakketten</a>
        </div>';
        return $content;
    }

    public function loadFooter() {
        $content = '<script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>';
        return $content;
    }
}
?>