<div id="edit-subject-modal" class="modal">
    <form action="./set_subject.php" method="POST">
        <input type="hidden" name="mode" value="subject_set">
        <input type="hidden" id="selected_row" name="row" value="">
        <input type="hidden" id="selected_columm" name="columm" value="">
        <input type="hidden" id="selected_season" name="season" value="">
        <input type="hidden" name="account_id" value="<?php echo $user['id']; ?>">
        <div class="modal-content">
            <h4 class="green-title">講義登録・変更</h4>
            <h5 class="orange-title">現在の登録内容</h5>
            <p class="card-p">講義名：<span id="selected_subject_name"></span></p>
            <p class="card-p"><span id="selected_week_registed"></span> <span id="selected_row_registed"></span>限</p>
            <p class="card-p">カラー：<span id="selected_color_registed"></span></p>

            <hr>
            <h5 class="orange-title">講義を変更</h5>
            <div class="row">
                <div class="col s12">
                    <h6 class="blue-title">講義情報登録</h6>
                </div>
                <div class="input-field col s6">
                    <input id="subject_name" type="text" class="validate" name="subject-name">
                    <label for="subject_name">講義名を入力</label>
                </div>
                <div class="input-field col s6">
                    <input id="classroom_name" type="text" class="validate" name="classroom">
                    <label for="classroom_name">教室を入力</label>
                </div>
                <div class="input-field col s12">
                    <select name="subject-color">
                    <option value="" disabled selected>講義カラーを選択</option>
                    <option value="1" data-icon="./img/color/1.png">レッド</option>
                    <option value="2" data-icon="./img/color/2.png">ディープオレンジ</option>
                    <option value="3" data-icon="./img/color/3.png">オレンジ</option>
                    <option value="4" data-icon="./img/color/4.png">アンバー</option>
                    <option value="5" data-icon="./img/color/5.png">イエロー</option>
                    <option value="6" data-icon="./img/color/6.png">ライム</option>
                    <option value="7" data-icon="./img/color/7.png">ライトグリーン</option>
                    <option value="8" data-icon="./img/color/8.png">グリーン</option>
                    <option value="9" data-icon="./img/color/9.png">ティール</option>
                    <option value="10" data-icon="./img/color/10.png">シアン</option>
                    <option value="11" data-icon="./img/color/11.png">ライトブルー</option>
                    <option value="12" data-icon="./img/color/12.png">ブルー</option>
                    <option value="13" data-icon="./img/color/13.png">インディゴ</option>
                    <option value="14" data-icon="./img/color/14.png">ディープパープル</option>
                    <option value="15" data-icon="./img/color/15.png">パープル</option>
                    <option value="16" data-icon="./img/color/16.png">ピンク</option>
                    <option value="17" data-icon="./img/color/17.png">ブラウン</option>
                    <option value="18" data-icon="./img/color/18.png">グレー</option>
                    <option value="19" data-icon="./img/color/19.png">ブルーグレー</option>
                </select>
                    <label>講義カラー</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-red btn-flat"><i class="fas fa-times"></i> キャンセル</a>
            <button onclick="M.toast({html: '<i class=\'fas fa-check fa-fw\'></i> \'授業名\'は正常に更新されました'})" class="modal-close waves-effect waves-light btn" type="submit"><i class="fas fa-check fa-fw"></i> 更新</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('selected_row').value = get_row();
    document.getElementById('selected_columm').value = get_columm();
    document.getElementById('selected_row_registed') = get_row();
</script>