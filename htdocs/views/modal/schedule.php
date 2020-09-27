<div id="schedule-modal" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="col s12">
                    <h4 class="blue-title">講義・時間割管理</h4>
                </div>
                <div class="col s2">
                    <h4>月</h4>
                    <?php
                    $row = 1;
                    $columm = 1;
                    for($row = 1; $row <= 6; $row++){
                        if($calendar_data === null){
                    ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '空きコマ','white')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <span class="view-color-empty"></span>
                            <span class="view-data">
                            <div class="view-subject-table">空きコマ</div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data">クリックで設定</div>
                        </span>
                        </div>
                    </a>

                    <?php }else{ ?>
                    <?php   $tmp_data = $calendar_data[$columm - 1][$row - 1]; ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '<?php echo $tmp_data['subject']; ?>','<?php echo $tmp_data['color']; ?>')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <?php if($tmp_data['subject'] === "空きコマ"){ ?>
                            <span class="view-color-empty"></span>
                            <?php }else{ ?>
                            <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                            <?php } ?>
                            <span class="view-data">
                            <div class="view-subject-table"><?php echo $tmp_data['subject']; ?></div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data"><?php echo $tmp_data['classroom']; ?></div>
                        </span>
                        </div>
                    </a>
                    <?php
                    }
                }
                    ?>
                </div>
                <div class="col s2">
                    <h4>火</h4>
                    <?php
                    $row = 1;
                    $columm = 2;
                    for($row = 1; $row <= 6; $row++){
                        if($calendar_data === null){
                    ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '空きコマ','white')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <span class="view-color-empty"></span>
                            <span class="view-data">
                            <div class="view-subject-table">空きコマ</div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data">クリックで設定</div>
                        </span>
                        </div>
                    </a>

                    <?php }else{ ?>
                    <?php   $tmp_data = $calendar_data[$columm - 1][$row - 1]; ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '<?php echo $tmp_data['subject']; ?>','<?php echo $tmp_data['color']; ?>')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <?php if($tmp_data['subject'] === "空きコマ"){ ?>
                            <span class="view-color-empty"></span>
                            <?php }else{ ?>
                            <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                            <?php } ?>
                            <span class="view-data">
                            <div class="view-subject-table"><?php echo $tmp_data['subject']; ?></div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data"><?php echo $tmp_data['classroom']; ?></div>
                        </span>
                        </div>
                    </a>
                    <?php
                    }
                }
                    ?>
                </div>
                <div class="col s2">
                    <h4>水</h4>
                    <?php
                    $row = 1;
                    $columm = 3;
                    for($row = 1; $row <= 6; $row++){
                        if($calendar_data === null){
                    ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '空きコマ','white')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <span class="view-color-empty"></span>
                            <span class="view-data">
                            <div class="view-subject-table">空きコマ</div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data">クリックで設定</div>
                        </span>
                        </div>
                    </a>

                    <?php }else{ ?>
                    <?php   $tmp_data = $calendar_data[$columm - 1][$row - 1]; ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '<?php echo $tmp_data['subject']; ?>','<?php echo $tmp_data['color']; ?>')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <?php if($tmp_data['subject'] === "空きコマ"){ ?>
                            <span class="view-color-empty"></span>
                            <?php }else{ ?>
                            <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                            <?php } ?>
                            <span class="view-data">
                            <div class="view-subject-table"><?php echo $tmp_data['subject']; ?></div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data"><?php echo $tmp_data['classroom']; ?></div>
                        </span>
                        </div>
                    </a>
                    <?php
                    }
                }
                    ?>

                </div>
                <div class="col s2">
                    <h4>木</h4>
                    <?php
                    $row = 1;
                    $columm = 4;
                    for($row = 1; $row <= 6; $row++){
                        if($calendar_data === null){
                    ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '空きコマ','white')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <span class="view-color-empty"></span>
                            <span class="view-data">
                            <div class="view-subject-table">空きコマ</div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data">クリックで設定</div>
                        </span>
                        </div>
                    </a>

                    <?php }else{ ?>
                    <?php   $tmp_data = $calendar_data[$columm - 1][$row - 1]; ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '<?php echo $tmp_data['subject']; ?>','<?php echo $tmp_data['color']; ?>')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <?php if($tmp_data['subject'] === "空きコマ"){ ?>
                            <span class="view-color-empty"></span>
                            <?php }else{ ?>
                            <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                            <?php } ?>
                            <span class="view-data">
                            <div class="view-subject-table"><?php echo $tmp_data['subject']; ?></div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data"><?php echo $tmp_data['classroom']; ?></div>
                        </span>
                        </div>
                    </a>
                    <?php
                    }
                }
                    ?>

                </div>
                <div class="col s2">
                    <h4>金</h4>
                    <?php
                    $row = 1;
                    $columm = 5;
                    for($row = 1; $row <= 6; $row++){
                        if($calendar_data === null){
                    ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '空きコマ','white')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <span class="view-color-empty"></span>
                            <span class="view-data">
                            <div class="view-subject-table">空きコマ</div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data">クリックで設定</div>
                        </span>
                        </div>
                    </a>

                    <?php }else{ ?>
                    <?php   $tmp_data = $calendar_data[$columm - 1][$row - 1]; ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '<?php echo $tmp_data['subject']; ?>','<?php echo $tmp_data['color']; ?>')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <?php if($tmp_data['subject'] === "空きコマ"){ ?>
                            <span class="view-color-empty"></span>
                            <?php }else{ ?>
                            <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                            <?php } ?>
                            <span class="view-data">
                            <div class="view-subject-table"><?php echo $tmp_data['subject']; ?></div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data"><?php echo $tmp_data['classroom']; ?></div>
                        </span>
                        </div>
                    </a>
                    <?php
                    }
                }
                    ?>

                </div>
                <div class="col s2">
                    <h4>土</h4>
                    <?php
                    $row = 1;
                    $columm = 6;
                    for($row = 1; $row <= 6; $row++){
                        if($calendar_data === null){
                    ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '空きコマ','white')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <span class="view-color-empty"></span>
                            <span class="view-data">
                            <div class="view-subject-table">空きコマ</div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data">クリックで設定</div>
                        </span>
                        </div>
                    </a>

                    <?php }else{ ?>
                    <?php   $tmp_data = $calendar_data[$columm - 1][$row - 1]; ?>
                    <a class="modal-trigger table-card-a" href="#edit-subject-modal" onclick="selected(<?php echo $row; ?>, <?php echo $columm; ?>, 1, '<?php echo $tmp_data['subject']; ?>','<?php echo $tmp_data['color']; ?>')">
                        <div class="view-card lighten-1 waves-effect waves">
                            <?php if($tmp_data['subject'] === "空きコマ"){ ?>
                            <span class="view-color-empty"></span>
                            <?php }else{ ?>
                            <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                            <?php } ?>
                            <span class="view-data">
                            <div class="view-subject-table"><?php echo $tmp_data['subject']; ?></div>
                            <div class="view-subject-task-empty"></div>
                            <div class="view-subject-data"><?php echo $tmp_data['classroom']; ?></div>
                        </span>
                        </div>
                    </a>
                    <?php
                    }
                }
                    ?>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-red btn-flat"><i class="fas fa-times"></i> 閉じる・キャンセル</a>
            <a onclick="M.toast({html: '<i class=\'fas fa-check fa-fw\'></i> 時間割は正常に登録されました'})" class="modal-close waves-effect waves-light btn"><i class="fas fa-check fa-fw"></i> 適用</a>
        </div>
    </div>