<?php

function get_db_connect(){

    try{
        $dsn = DSN;
        $user = DB_USER;
        $password = DB_PASSWORD;

        $dbh = new PDO($dsn, $user, $password);

    }catch(PDOException $e){
        echo($e->getMessage());
        die();
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}


// アカウントが存在するか確認
function acId_exists($dbh, $user_id){

    $sql = "SELECT COUNT(id) FROM User where user_id = :user_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);    // 結果を配列で取得する
    if($count['COUNT(id)'] > 0){
        //件数を判定
        return TRUE;
    }else{
        return FALSE;
    }
}

function insert_member_student($dbh, $ac_id, $password){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO User (user_id, password, role, createdAt) ";
    $sql .= "VALUE (:account_id, :password, :role, '{$date}')";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':account_id', $ac_id, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':role', null, PDO::PARAM_STR);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

// IDとパスワードが一致するか調べる
function select_member_acId($dbh, $user_id, $password){

    $sql = 'SELECT * FROM User WHERE user_id = :user_id LIMIT 1'; // アカウントのIDが一致するレコードをさがす
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $data['password'])){
            // パスワードを検証する

            // 役職を文字列で取得
            $role_id = $data['role'];
            if($role_id !== null){
                $data['role'] = get_role($dbh, $role_id);
                // 役職から記事閲覧レベルを取得
                $data['view_level'] = role_to_view_range($dbh, $role_id);
            }
            login_time($dbh, $data['id']);
            return $data;   // 会員データを渡す
        }else{
            return FALSE;
        }
        return FALSE;
    }
}

// 最終ログイン時間を変更
function login_time($dbh, $id){
    $date = date('Y-m-d H:i:s');
    $sql = "UPDATE User SET lastLogin='{$date}' WHERE id='{$id}'";
    $stmt = $dbh->prepare($sql);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

// 役職(属性)IDから属性名を取得
function get_role($dbh, $role_id){
    $sql = 'SELECT role FROM role WHERE role_id = :role_id LIMIT 1';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':role_id', $role_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($data['role'])){
            return $data['role'];
        }else{
            return FALSE;
        }
    }
}

// 役職(属性)IDからnews_wikiの閲覧レベルを取得
function role_to_view_range($dbh, $role_id){
    $sql = "SELECT view_level FROM role WHERE role_id = :role_id LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':role_id', $role_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($data['view_level'])){
            return $data['view_level'];
        }else{
            return FALSE;
        }
    }
}

// カレンダーを取得する
function getSchedule($dbh, $user_id){
    $sql = "SELECT * FROM Subject WHERE added_user = :user_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

// ユーザーidからアカウント名を取得
function uid2ac_name($dbh, $user_id){
    $sql = "SELECT account_name FROM Account WHERE id = :user_id LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($data['account_name'])){
            return $data['account_name'];
        }else{
            return FALSE;
        }
    }
}

function post_store($dbh){
    if(isset($_FILES['img'])){
        $img = $_FILES['img'];
        $err = array();
        $type =exif_imagetype($img['tmp_name']);
        if($type !== IMAGETYPE_JPEG && $type !== IMAGETYPE_PNG){
            $err['pic'] = '対象ファイルはjpgまたはpngのみです。';

        }elseif($img['size'] > 10240000){
            $err['pic'] = 'ファイルサイズは10MB以下にしてください！';

        }else{
            $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
            $new_img = md5(uniqid(mt_rand(), true)).'.'.$extension;
            move_uploaded_file($img['tmp_name'], './IMG/'.$new_img);
        }
        $img_path = "./IMG/".$new_img;
    }
    
    $date = date('Y-m-d H:i:s');
    if($_POST['is_koriyama_true'] === "on"){
        $is_koriyama = TRUE;
    }else{
        $is_koriyama = FALSE;
    }

    $store_name = $_POST['store_name'];

    $discription = "私は、".$_POST['cuisine']."を食べました。<BR>".$_POST['kanso'];
    $sql = "INSERT INTO data (img_path, store_name, contributor, date, genre, is_koriyama, discription) VALUE ('{$img_path}', '{$store_name}', '{$_SESSION['member']['id']}', '{$date}', '{$_POST['genre']}', '{$is_koriyama}', '{$discription}')";
    $dbh -> query($sql);
}