<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>StDo 学生のためのスケジュール帳</title>
    <link rel="shortcut icon" href="./IMG/favicon.png" type="image/png">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="./css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- fontawesome(アイコン) -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
    <script src="https://kit.fontawesome.com/38159bab1f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen and (min-width: 1024px)">

    <!-- スマホ用 -->
    <link rel="stylesheet" href="./CSS/style_mobile.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./css/HamburgerMenu.css">

    <!-- GitHubボタン -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- マテリアルアイコン -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
        $(document).ready(function(){
            $('.tooltipped').tooltip();
        });
        $(document).ready(function(){
            $('.modal').modal();
        });
        $(document).ready(function(){
            $('.datepicker').datepicker({
                monthsFull:  ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
                monthsShort: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
                weekdaysFull: ["日曜日", "月曜日", "火曜日", "水曜日", "木曜日", "金曜日", "土曜日"],
                weekdaysShort:  ["日", "月", "火", "水", "木", "金", "土"],
                weekdaysLetter: ["日", "月", "火", "水", "木", "金", "土"],
                labelMonthNext: "翌月",
                labelMonthPrev: "前月",
                labelMonthSelect: "月を選択",
                labelYearSelect: "年を選択",
                today: "今日",
                clear: "クリア",
                close: "閉じる",
                format: "yyyy-mm-dd",
            });
        });
    </script>
</head>