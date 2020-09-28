<?php

require_once('./config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

session_start();
if($_SESSION['member'] === null){
    header('Location: '.SITE_URL.'login.php');
    exit();
}
$user = $_SESSION['member'];

$dbh = get_db_connect();

// 今日の曜日
$today_e = date('w');
$next_e = $today_e == 6 ? 1 : $today_e + 1;

// スケジュールデータ
$schedule = getSchedule($dbh, $user['id']);

// 各配列の初期化
$calendar_data = [];
for($i = 0; $i < 6; $i++){
    for($j = 0; $j < 6; $j++){
        $calendar_data[$i][$j]['subject'] = '空きコマ';
        $calendar_data[$i][$j]['color'] = null;
        $calendar_data[$i][$j]['classroom'] = '';
    }
}
// var_dump($schedule);

if($schedule !== null){
    for($i = 0; $i < count($schedule); $i++){
        $tmp = $schedule[$i];
        $calendar_data[$tmp['weekday']][$tmp['period']]['id'] = $tmp['id'];
        $calendar_data[$tmp['weekday']][$tmp['period']]['subject'] = $tmp['subject_name'];
        $calendar_data[$tmp['weekday']][$tmp['period']]['color'] = code2color($tmp['color']);
        $calendar_data[$tmp['weekday']][$tmp['period']]['classroom'] = $tmp['classroom'];
    }
}


// タスクデータの取得
$task_list = [];


// var_dump($calendar);

require('./views/index_view.php');
?>