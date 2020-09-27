<?php

// 必要ファイルを読み込む
require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');
require_once('./helpers/error_helper.php');



if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $password = get_post('pass');
    $ac_id = get_post('ac_id');
    $dbh = get_db_connect();    // DB接続
    $errs = array();

    // 入力値のバリデーション
    if(!check_words($ac_id, 10)){
        $errs['ac_id'] = 'アカウントIDは必須、10文字以内です';
    }
    if($password === ""){
        $errs['pass'] = 'パスワードを入力してください';
    }

    if(acId_exists($dbh, $ac_id)){
        $errs['ac_id'] = '入力されたID('.$ac_id.')は既に登録されています';
    }



    // エラーがなければデータを挿入
    if(empty($errs)){
        if(insert_member_student($dbh, $ac_id, $password)){
            // データの挿入
            // header($location);  //ログイン画面へ遷移
            header('Location: '.SITE_URL.'login.php');
            exit;
        }
        $errs['password'] = '登録に失敗しました';
    }
}

include_once('./views/signup_view.php');    //ビューファイルの読み込み