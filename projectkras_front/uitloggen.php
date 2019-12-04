<?php
    session_start();
    unset ($_SESSION["logged-in"]);
    unset ($_SESSION["user"]);
    session_destroy();
?>