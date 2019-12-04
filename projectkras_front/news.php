<?php

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>news</title>
    <style>
        * {
            margin:0;
            padding: 0;
        }


    </style>

</head>
<body>
<form action="news_toevogen.php" method="post">

    <div>
        <input name="datum" type="text" value="00/00/00">
        <input name="titel" type="text" value="titel">
        <input name="autuer" type="text" value="Autuer">
        <input name="content" type="text" value="content">
    </div>
    <input type="submit" name="submit" value="submit">

</form>
</body>
</html>