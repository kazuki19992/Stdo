<!-- modal -->
<div id="new-task-modal" class="modal">
    <form action="./calendar" method="POST">
        <input type="hidden" name="mode" value="new-task">
        <input type="hidden" name="account_id" value="<?php echo $user['id']; ?>">
        <div class="modal-content">
            <div class="row">
                <div class="col s12">
                    <h4 class="green-title">新規タスク登録</h4>
                </div>
                <div class="input-field col s12">
                    <input id="task_name" type="text" class="validate" name="taskname" required>
                    <label for="task_name">タスク名を入力</label>
                </div>
                <div class="col s12">
                    <h5 class="orange-title">期限</h5>
                </div>
                <div class="col s5">
                    <label for="deadline-day">締切を選択</label>
                    <input type="text" id="deadline-day" class="datepicker" placeholder="締切日" name="deadline" required>
                </div>
                <div class="input-field col s7">
                    <select name="period" required>
                        <option value="" disabled selected>期限を選択してください</option>
                        <option value="1">1限 (09:00 - 10:30)</option>
                        <option value="2">2限 (10:40 - 12:10)</option>
                        <option value="3">3限 (13:00 - 14:30)</option>
                        <option value="4">4限 (14:40 - 16:10)</option>
                        <option value="5">5限 (16:20 - 17:50)</option>
                        <option value="6">6限 (18:00 - 19:30)</option>
                    </select>
                </div>

                <div class="input-field col s12">
                    <h5 class="orange-title">優先度</h5>
                    <select name="priority" required>
                    <option value="" disabled selected>重要度を選択</option>
                    <option value="1">重要度：最大</option>
                    <option value="2">重要度：大</option>
                    <option value="3">重要度：中</option>
                    <option value="4">重要度：小</option>
                </select>
                </div>
                <div class="col s12">
                    <h5 class="orange-title">メモ</h5>
                </div>
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="memo"></textarea>
                    <label for="textarea1">メモを入力</label>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-red btn-flat"><i class="fas fa-times fa-fw"></i> キャンセル</a>
            <button class="waves-effect waves-light btn" type="submit"><i class="fas fa-check fa-fw"></i> 適用</button>
        </div>
    </form>
</div>