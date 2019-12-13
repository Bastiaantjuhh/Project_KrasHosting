<!-- Bovenaan pagina -->
<?php include "autoload.php"; ?>

<!-- CSS CLassess die mogenlijk zijn -->
<!--
    - .table-nieuws (hele tabel)
    - .td-datum
    - .td-titel
    - .td-auteur
    - .td-content
-->
<!-- In pagina waar nieuws moet komen -->
<?php echo $nieuws->getNieuws(false); ?>