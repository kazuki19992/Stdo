<?php
require_once('./config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');
require_once('./helpers/error_helper.php');

$dbh = get_db_connect();

// タスクデータを受け取る
$taskdata['user'] = $_POST['account_id'];
$taskdata['name'] = $_POST['taskname'];
$taskdata['day'] = $_POST['deadline'];
$taskdata['period'] = $_POST['period'];
$taskdata['priority'] = $_POST['priority'];
$taskdata['memo'] = $_POST['memo'];

// 入力処理を行う
if(setTaskList($dbh, $taskdata)){
    header('Location: '.SITE_URL);
}else{
    // エラーページへ遷移
    $msg = "システムエラーが発生しました。";
    $detail = "タスクの登録に失敗しました。";
    err_jmp(0, $msg, SITE_URL, 234, $detail);
}
