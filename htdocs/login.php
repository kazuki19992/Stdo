<?php

// 必要ファイルを読み込む
require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

session_start();    // セッションを開始する

// ログインしていた場合
// 既にログイン済みならindex.phpにリダイレクト
if(!empty($_SESSION['member'])){
    header('Location: '.SITE_URL.'index.php');
    // var_dump($_SESSION['member']);
    // echo session_id();
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $std_id = get_post('std_id');
    $password = get_post('password');

    $dbh = get_db_connect();    // DB接続
    $errs = array();

    if(!check_words($std_id, 10)){
        $errs['std_id'] = 'ユーザーID欄は必須、10文字以内で入力してください';
    }elseif(!acId_exists($dbh, $std_id)){
        $errs['std_id'] = 'このIDは登録されていません';
    }

    if(!check_words($password, 50)) {
        $errs['password'] = 'パスワードは必須、50文字以内で入力してください';
    }


    // メールアドレスとパスワードが一致するか検証する
    if(!check_words($password, 50)){
        $errs['password'] = 'パスワードは必須、50文字以内で入力してください';
    }elseif(!$member = select_member_acId($dbh, $std_id, $password)){
        $errs['password'] = 'パスワードとログインIDが正しくありません';
    }

    // ログインする
    if(empty($errs)){
        session_regenerate_id(true);        // セッションIDの変更
        // セッションIDが盗まれていた場合
        // なりすましによる不正な操作を防ぐために
        // ログイン直前にセッションIDを切り替える！！

        $_SESSION['member'] = $member;      // ログイン
        header('Location: '.SITE_URL.'index.php');   // 会員ページへリダイレクト
        exit;
    }
}

include_once('./views/login_view.php');     //ビューファイルの読み込み