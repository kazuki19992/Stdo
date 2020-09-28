<?php
// 必要ファイルを読み込む
require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

$dbh = get_db_connect();

$subject_data['period'] = $_POST['row'] - 1;
$subject_data['weekday'] = $_POST['columm'] - 1;
$subject_data['user_id'] = $_POST['account_id'];
$subject_data['subject_name'] = $_POST['subject-name'];
$subject_data['classroom'] = $_POST['classroom'];
$subject_data['color'] = $_POST['subject-color'];

setSchedule($dbh, $subject_data);

header('Location: '.SITE_URL.'index.php');