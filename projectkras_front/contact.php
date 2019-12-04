<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="reset.css" type="text/css">
</head>
<style>
    body{
        background-color: #fcfcfc;
        animation: back_animate 25s infinite linear;
        animation-iteration-count: infinite;
    }
    h1{
        font-family: raleway light;
        /*margin-right: 44%;*/
        /*margin-left: 43%;*/
        margin-top: 5%;
        text-align: center;
        font-size: 45px;
    }
    form{
        text-align: center;
        margin: 3%;
        line-height: 50px;
        font-family: raleway light;
    }
    input:hover{
        width: 260px;
        height: 35px;
    }
    input{
        width: 250px;
        height: 30px;
        transition: 112ms ease-in-out;
    }
    input:active{
        width: 260px;
        height: 45px;
    }
    input:focus{
        background-color: #f2fffb;
    }
    select{
        width: 254px;
        height: 30px;
        font-family: raleway light;
    }
    textarea{
        margin: 30px;
        margin-top: 5%;
        font-family: raleway medium;
    }
    textarea:focus{
        background-color: #f2fffb;
    }
    nav{
        width: 100%;
        height: 100px;
        background-color: #110002;
        font-family: raleway light;
        word-spacing: 80px;
    }
    a{
        color: #efeaeb;
        text-decoration: none;
        padding: 1vw;
        transition: 125ms ease-in-out;
    }
    a:hover{
        color: #d9fff3;
        font-size: 25px;
    }
    li{
        list-style-type: none;
        margin: 0 2vw;
        font-size: 3vh;
        margin-top: 35px;
    }
    ul{
        margin: 0;
        padding: 0;
        display: flex;
    }
    footer{
        margin-top: 50px;
        width: 100%;
        height: 100px;
        background-color: #110002;
        color: #fcfcfc;
    }
    p{
        font-family: Raleway light;
        text-align: center;
    }
    #submit{
        background-color: #aab2bd;
        border-color: #aab2bd;
        border-style: hidden;
        border-radius: 3px;
        transition: 112ms ease-in-out;
    }
    #submit:hover{
        /*box-shadow: #bce6d4 1px 1px 12px 2px;*/
        background-color: #bce6d4;
    }

</style>
<body>
<nav>
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Pakketten</a></li>
        <li><a href="overons.php">OverOns</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</nav>
    <h1>Contact Us</h1>
    <form action="contact.php">
        <input type="text" placeholder="Naam" name="naam" required><br>
        <input type="text" placeholder="E-Mail" name="email" required><br>
            <select>
                <option>Soliciteren</option>
                <option>Klacht</option>
                <option>Vraag</option>
                <option>Overige</option>
            </select><br>
        <textarea rows="20" cols="60" placeholder="We Luisteren"></textarea>
        <br><input type="submit" name="submitter" id="submit">
    </form>
<footer>
    <div id="footing">
        <br><br><p id="footinfo"> © Copyright 2019 ROC Tilburg |
            Kasteeldreef, 3512 KJ Utrecht |
            Tel: +31306590005 |
            K.V.K. nr. 32084974 |
            BTW nr.NL170452785B01</p>
    </div>
</footer>
</body>
</html>
