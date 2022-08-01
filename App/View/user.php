<?php
/** @var string $content */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=0.8, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Профиль пользователя</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/Resources/Css/Reset.css">
    <link rel="stylesheet" type="text/css" href="/Resources/Css/custom.css">
</head>
<body style="background-color: #1e1e2e">

<nav class="asd navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a style="color: white; margin-left: 40px" class="navbar-brand" href="#">Простава 24</a>

    </div>
</nav>

<div class="container-s">
    <div class="navbar-s">
        <div class="bloc1-navbar">
            <hr>
            <div class="bloc1-navbar-a">
                <a href="/user/"  style="margin-top: 30px"  class="admin-navbar-a">Пользователь</a>
                <a href="/logout/"  style="margin-top: 30px"  class="admin-navbar-a">Выход</a>
            </div>
        </div>
    </div>



    <?= $content ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript"></script>

</body>
</html>