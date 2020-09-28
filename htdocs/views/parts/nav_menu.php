<header>
    <span id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><!--<span></span>--><i class="fas fa-bars fa-fw fa-3x"></i></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <div id="top-margin">
                <!-- <div style="color:#ffffff;">
                    <center>
                        <div id="login_user"> -->
                            <?php
                                // ログイン中か確認する
                                // if(empty($_SESSION['member'])){
                                //     // ログインしていない
                                //     echo('はじめまして！<BR>');
                                //     echo('<a href="signup.php">新規会員登録</a> <a href="login.php">ログイン</a>');
                                // }else{
                                //     $name = html_escape($member['account_name']);
                                //     echo('ようこそ。'.$name.'さん。<BR>');
                                // }
                            ?>
                        <!-- </div> -->
                        <!-- <hr> -->
                    <!-- </center> 
                </div> -->
            </div>
            <p class="nv_cts1" onclick="menu_display_toggle('nv_Link1', 'link1_budge')"><i class="fas fa-user-circle fa-fw"></i> アカウント<span class="badge" id="link1_budge"></span></p>
            <?php
                // ログイン中か確認する
                if(empty($_SESSION['member'])){
                    // ログインしていない
                    echo('<a class="nv_Link1 tooltipped waves-effect waves-light" href="./signup.php" data-position="right" data-tooltip="ここからアカウント登録が可能です(サークル所属の学生/OBのみ)"> <i class="fas fa-user-plus fa-fw"></i> アカウント登録 </a>');
                    echo('<a class="nv_Link1 tooltipped waves-effect waves-light" href="./login.php" data-position="right" data-tooltip="ログインはこちら！"> <i class="fas fa-sign-in-alt fa-fw"></i> ログイン </a>');
                }else{
                    echo('<a class="nv_Link1 tooltipped waves-effect waves-light"" href="./logout.php" data-position="right" data-tooltip="ここからログアウトが可能です"> <i class="fas fa-sign-out-alt fa-fw" data-position="right" data-tooltip="ここからログアウトできます"></i> ログアウト </a>');
                }
            ?>
            <BR>
            <!-- <p class="nv_cts2" onclick="menu_display_toggle('nv_Link2', 'link2_budge')"><i class="fas fa-user-circle fa-fw"></i> サイトについて<span class="badge" id="link1_budge"></span></p>
            <a class="nv_Link2 tooltipped waves-effect waves-light" href="./about.php" data-position="right" data-tooltip="サイトについての情報を掲載しています"> <i class="fas fa-info-circle fa-fw"></i> 当サイトについて </a>
            <a class="nv_Link2 tooltipped waves-effect waves-light" href="https://github.com/kazuki19992/Stdo" target="_blank" rel="noopener noreferrer" data-position="right" data-tooltip="ここから開発に携われます"> <i class="fab fa-github fa-fw"></i> 当サイトのリポジトリ <i class="fas fa-external-link-alt fa-fw"></i></a> -->
        </div>
    </span>
    <a href="./index.php"><span id="title">StDo</span></a>
</header>


<script src="./JS/nav_menu_display.js"></script>
