<!-- ログインページ -->
<?php
require('./views/html_head.php')
?>
<body id="login_body">
    <div id="content">
        <h4 id="green-title">おかえりなさい</h4>
        <div id="login-left">
            <br>
            <h5 id="blue-title">アカウントを持っていない場合は？</h5>
            <p>はじめまして。アカウントを持っていない方は<a href="./signup.html">こちら</a>でアカウント登録が可能です。<BR>
            アカウント登録を行うとNU-Calの各機能にアクセスすることが可能です。</p>
        </div>
        <div id="right">
            <form action="" method="POST">
                <input type="hidden" name="mode" value="login">
                <p>学生番号とパスワードを入力してログインしてください。</p>
                <div class="input-field">
                    <input id="account_id" type="text" class="validate" name="std_id">
                    <label for="account_id">学生番号</label>
                </div>
                <?php
                if($errs['std_id'] !== null){
                    echo '<i class="fas fa-exclamation-triangle"></i>'.$errs['std_id'];
                }
                ?>
                <div class="input-field">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">パスワード</label>
                </div>
                <?php
                if($errs['password'] !== null){
                    echo '<i class="fas fa-exclamation-triangle"></i>'.$errs['password'];
                }
                ?>
                <div id="login_btns">
                    <!-- <a class="waves-effect waves-teal btn-flat grey lighten-2" href="./index.php" id="login_cancel"><i class="fas fa-arrow-circle-left fa-fw"></i></i>キャンセル</a> -->
                    <button class="btn waves-effect waves-light" id="login_btn" type="submit" name="submit">
                        <i class="fas fa-sign-in-alt fa-fw"></i> ログイン
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>