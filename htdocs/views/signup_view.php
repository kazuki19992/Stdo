<?php
    require('./views/html_head.php');
?>



<body>
    <div id="content">
        <h4 class="green-title">アカウント登録</h4>
        <p>はじめまして。このページでアカウント登録が可能です。</p>
        <form action="" method="POST">
            <div class="row">
                <h5 class="blue-title">アカウント設定</h5>
                <div class="input-field col s12">
                    <input id="ac_id" type="text" class="validate" name="ac_id">
                    <label for="ac_id">アカウントID(20字以内)</label>
                    <?php
                        if(isset($errs['ac_id'])){
                            $errmsg['ac_id'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['ac_id'].'</p>';
                            echo $errmsg['ac_id'];
                        }
                    ?>
                </div>
                <div class="input-field col s12">
                    <input id="pass" type="password" class="validate" name="pass">
                    <label for="pass">ログインパスワード</label>
                    <?php
                        if(isset($errs['pass'])){
                            $errmsg['pass'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['pass'].'</p>';
                            echo $errmsg['pass'];
                        }
                    ?>
                </div>
            </div>

            <div id="login_btns">
                <a class="waves-effect waves-teal btn-flat grey lighten-2" href="./index.php" id="login_cancel">
                    <i class="fas fa-arrow-circle-left fa-fw"></i>キャンセル
                </a>
                <button class="btn waves-effect waves-light" type="submit" name="submit">
                    <i class="fas fa-check fa-fw"></i>確定
                </button>
            </div>
        </form>
    </div>
    <script src="./JS/signup_functions.js"></script>
</body>
</html>