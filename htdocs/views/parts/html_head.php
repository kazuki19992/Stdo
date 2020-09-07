<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>StDo 学生のためのスケジュール帳</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/png">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="./css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- fontawesome(アイコン) -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
    <script src="https://kit.fontawesome.com/38159bab1f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen and (min-width: 721px)">

    <!-- スマホ用 -->
    <link rel="stylesheet" href="./css/style_mobile.css" media="screen and (max-width: 720px)">
    <link rel="stylesheet" type="text/css" href="./css/HamburgerMenu.css">
    <link rel="stylesheet" href="./css/calender.css">
    <link rel="stylesheet" href="./css/view-table.css">

    <!-- GitHubボタン -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- マテリアルアイコン -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="./js/clock.js"></script>
    <script src="./js/subject.js"></script>
    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
        $(document).ready(function() {
            $('.tooltipped').tooltip();
        });
        $(document).ready(function() {
            $('.modal').modal();
        });
        $(document).ready(function() {
            $('.datepicker').datepicker();
        });
        $(document).ready(function() {
            $('.tabs').tabs();
        });
        $(document).ready(function() {
            $('.sidenav').sidenav();
        });
    </script>
</head>