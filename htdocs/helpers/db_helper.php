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

// 授業を登録する
function setSchedule($dbh, $setScheduleData){
    // 存在判定を行う
    $sql = "SELECT * FROM Subject WHERE (added_user = :user_id) AND (period = :period) AND (weekday = :weekday)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $setScheduleData['user_id']);
    $stmt->bindValue(':period', $setScheduleData['period']);
    $stmt->bindValue(':weekday', $setScheduleData['weekday']);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        // 存在したら

        // 送られてきたデータが空きコマかどうか調べる
        if($setScheduleData['subject_name'] === ''){
            // 空きコマデータだった場合はデータを削除する
            $sql = "DELETE FROM Subject WHERE added_user = :user_id AND period = :period AND weekday = :weekday";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':user_id', $setScheduleData['user_id']);
            $stmt->bindValue(':period', $setScheduleData['period']);
            $stmt->bindValue(':weekday', $setScheduleData['weekday']);
            if($stmt->execute()){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            $sql = "UPDATE Subject SET subject_name = :subject_name, classroom = :classroom, color = :color WHERE added_user = :user_id AND period = :period AND weekday = :weekday";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':subject_name', $setScheduleData['subject_name']);
            $stmt->bindValue(':classroom', $setScheduleData['classroom']);
            $stmt->bindValue(':color', $setScheduleData['color']);
            $stmt->bindValue(':user_id', $setScheduleData['user_id']);
            $stmt->bindValue(':period', $setScheduleData['period']);
            $stmt->bindValue(':weekday', $setScheduleData['weekday']);
            if($stmt->execute()){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }else{
        // 送られてきたデータが空きコマかどうか調べる
        if($setScheduleData['subject_name'] === ''){
            // 空きコマだった場合は何もせずに返す
            return TRUE;
        }else{
            // 存在しなかったら
            $sql = "INSERT INTO Subject (subject_name, classroom, color, period, weekday, added_user) VALUES (:subject_name, :classroom, :color, :period, :weekday, :user_id)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':subject_name', $setScheduleData['subject_name']);
            $stmt->bindValue(':classroom', $setScheduleData['classroom']);
            $stmt->bindValue(':color', $setScheduleData['color']);
            $stmt->bindValue(':user_id', $setScheduleData['user_id']);
            $stmt->bindValue(':period', $setScheduleData['period']);
            $stmt->bindValue(':weekday', $setScheduleData['weekday']);
            if($stmt->execute()){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
}


// タスクリストを取得
function getTaskList($dbh, $user_id){
    $sql = "SELECT * FROM Tasks WHERE (added_user = :user_id) AND (complete IS NULL)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

// タスクリストに登録
function setTaskList($dbh, $taskdata){
    $sql = "INSERT INTO Tasks (taskname, priority, day, period, memo, added_user) VALUES (:taskname, :priority, :day, :period, :memo, :added_user)";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':taskname', $taskdata['name']);
    $stmt->bindValue(':priority', $taskdata['priority']);
    $stmt->bindValue(':day', $taskdata['day']);
    $stmt->bindValue(':period', $taskdata['period']);
    $stmt->bindValue(':memo', $taskdata['memo']);
    $stmt->bindValue(':added_user', $taskdata['user']);

    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

// タスク完了
function completeTask($dbh, $taskid){
    $date = date('Y-m-d H:i:s');
    $sql = "UPDATE Tasks SET complete = :date WHERE id = :task_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':task_id', $taskid);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
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
