<div id="all-task-modal" class="modal">
        <div class="modal-content">
            <h4 class="orange-title">タスク一覧</h4>
            <div class="col s12">
                <h5 class="blue-title">すべてのタスク</h5>
            </div>
            <!-- ココにタスク -->
            <?php if($task_list === NULL){ ?>
                    <p>タスクはありません</p>
            <?php }else{ ?>
                <?php for($i = 0; $i < count($task_list); $i++){?>
                    <a class="modal-trigger table-card-a" href="#task-detail-modal" onclick="selected_task(<?php echo $task_list[$i]['id'] ?>, '<?php echo $task_list[$i]['taskname'] ?>', '<?php echo $task_list[$i]['day']?>', <?php echo $task_list[$i]['period'] ?>, <?php echo $task_list[$i]['priority'] ?>, '<?php echo $task_memo[$i]['memo'] ?>')">
                        <div class="view-card lighten-1 waves-effect waves-<?php echo $task_priority_color[(int)$task_list[$i]['priority']-1] ?>">
                            <span class="view-color <?php echo $task_priority_color[(int)$task_list[$i]['priority']-1] ?>"></span>
                            <span class="view-data">
                                <div class="view-subject"><?php echo $task_list[$i]['taskname'] ?></div>
                                <div class="view-subject-task <?php echo $task_priority_color[(int)$task_list[$i]['priority']-1] ?>-text"><?php echo $task_priority[(int)$task_list[$i]['priority']-1] ?></div>
                                <div class="view-subject-data">- <?php echo $task_list[$i]['day'] ?> <?php echo $task_list[$i]['period'] ?>限</div>
                            </span>
                        </div>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-red btn-flat"><i class="fas fa-times"></i> 閉じる</a>
        </div>
    </div>