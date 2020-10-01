<?php
require('./views/parts/html_head.php');
?>
<body>
    <?php
    require('./views/parts/nav_menu.php');
    ?>
    <div id="content">
        <div id="left">
            <div class="left-up row">
                <?php
                require('./views/parts/calendar_top.php');
                ?>
                <div class="clock-outer col s6">
                    <div class="clock-inner">
                        <p class="clock_date"><span id="clock_year"></span>年<span id="clock_month"></span>月<span id="clock_day"></span>日 <span id="clock_week"></span>曜日</p>
                        <p class="clock_time"><span id="clock_hour"></span>:<span id="clock_min"></span><span id="clock_sec"></span></p>
                        <!-- <%-- デバッグ用 --%> -->
                        <!-- <p class="clock_date">セッション情報<br><?php echo 'DB_ID: '.$user['id'].', ユーザーID: '.$user['user_id']; ?></p> -->
                    </div>
                </div>
            </div>


            <div class="left-down row">
                <div class="col s12">
                    <h5 class="green-title">時間割/タスク管理</h5>
                </div>

                <a class="waves-effect waves-light modal-trigger col s6" href="#new-task-modal">
                    <div id="top-new-task" class="waves-effect waves-light hoverable">
                        <div class="top-new-task-inner">
                            <i class="far fa-calendar-plus fa-6x"></i><br> 新規タスク
                        </div>
                    </div>
                </a>

                <a class="waves-effect waves-light modal-trigger col s6" href="#all-task-modal">
                    <div id="top-all-task" class="waves-effect waves-light hoverable">
                        <div class="top-all-task-inner">
                            <i class="fas fa-tasks fa-3x"></i><br> すべての未完タスク
                        </div>
                    </div>
                </a>

                <a class="waves-effect waves-light modal-trigger col s6" href="#schedule-modal">
                    <div id="top-edit-class" class="waves-effect waves-light hoverable">
                        <div class="top-edit-class-inner">
                            <i class="fas fa-chalkboard fa-3x"></i><br> 時間割の確認・管理
                        </div>
                    </div>
                </a>

            </div>
        </div>


    <!-- 以下、ビュー -->
        <div id="right">
            <div class="row">
                <div class="col s12">
                    <h5 class="orange-title">ビュー</h5>
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#multi-view">マルチ</a></li>
                        <li class="tab col s3"><a href="#schedule-view">スケジュール</a></li>
                        <li class="tab col s3"><a href="#task-view">タスク</a></li>
                        <li class="tab col s3"><a href="#view-settings">ビュー設定</a></li>
                    </ul>
                </div>
                <div id="multi-view" class="col s12">
                    <div class="row">
                        <div class="col s6">
                            <div class="col s8">
                                <h6 class="green-title">スケジュール</h6>
                            </div>
                            <div class="col s4">
                                <a class="btn-flat grey lighten-2 waves-effect waves-orange modal-trigger" href="#exchange_subject-modal" style="margin-top:5%;margin-left: auto;margin-right: 5px;"><i class="fas fa-exchange-alt"></i> 振替</a>
                            </div>

                            <!-- ここに時間割をのせる -->
                            <?php
                            if($today_e == 0){
                                // 日曜日の場合
                            ?>
                                <p class="col s12">今日の授業はありません</p>
                            <?php }else{ ?>
                            <?php for($row = 0; $row < 6; $row++){
                                $tmp_data = $calendar_data[$today_e - 1][$row];
                                    if($tmp_data['subject'] === "空きコマ"){
                            ?>
                            <div class="view-card-empty">
                            <?php }else{ ?>
                            <a class="modal-trigger table-card-a" href="#subject-detail-modal" onclick="selected_Subject_edit(<?php echo $tmp_data['id']; ?>, '<?php echo $tmp_data['subject'] ?>', '<%= today_full %>', <%= row+1 %>)">
                            <div class="view-card lighten-1 waves-effect waves">
                            <?php } ?>
                                <div class="view-num"><?php echo $row + 1; ?></div>
                                <?php
                                if($tmp_data['subject'] === "空きコマ"){ ?>
                                    <span class="view-color-empty"></span>
                                <?php }else{ ?>
                                    <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                                <?php } ?>
                                <span class="view-data">
                                    <div class="view-subject"><?php echo $tmp_data['subject'] ?></div>
                                    <div class="view-subject-task-empty red-text"></div>
                                    <div class="view-subject-data"></div>
                                </span>
                                <span class="view-classroom"><?php echo $tmp_data['classroom'] ?></span>
                            </div>
                            <?php
                                if($tmp_data['subject'] !== "空きコマ"){}else{ ?>
                            </a>
                            <?php }
                            }
                            }
                            ?>
                        </div>
                        <div class="col s6">
                            <h6 class="orange-title">タスク</h6>
                            <!-- ココにタスク -->
                            <?php if($cnt_task >= 6 && $cnt_task !== 0){ ?>
                                <?php for($i = 0; $i < 6; $i++){?>
                                    <!-- <a class="modal-trigger table-card-a" href="#task-detail-modal" onclick="selected_task(<?php $task_list[$i]['id']?>, '<%=taskname[i]%>', '<%=task_deadline[i]%>', <%=task_period[i]%>, <%=task_priority[i]%>, '<%=task_memo[i]%>')">
                                        <div class="view-card lighten-1 waves-effect waves-<%= task_priority_color[task_priority[i]-1] %>">
                                            <span class="view-color <%= task_priority_color[task_priority[i]-1] %>"></span>
                                            <span class="view-data">
                                                <div class="view-subject"><%= taskname[i] %></div>
                                                <div class="view-subject-task-empty red-text"></div>
                                                <div class="view-subject-data">- <%= task_deadline[i] %> <%= task_period[i] %>限</div>
                                            </span>
                                        </div>
                                    </a> -->
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
                            <?php }else if($cnt_task === 0){ ?>
                                    <p>タスクはありません</p>
                            <?php }else{ ?>
                                <?php for($i = 0; $i < $cnt_task ; $i++){ ?>
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
                    </div>
                </div>

                <div id="schedule-view" class="col s12">
                    <div class="row">
                        <div class="col s6">
                            <h6 class="green-title">スケジュール(今日)</h6>

                            <!-- ここに時間割をのせる -->
                            <?php
                            if($today_e == 0){
                                // 日曜日の場合
                            ?>
                                <p class="col s12">今日の授業はありません</p>
                            <?php }else{ ?>
                            <?php for($row = 0; $row < 6; $row++){
                                $tmp_data = $calendar_data[$today_e - 1][$row];
                                    if($tmp_data['subject'] === "空きコマ"){
                            ?>
                            <div class="view-card-empty">
                            <?php }else{ ?>
                            <a class="modal-trigger table-card-a" href="#subject-detail-modal" onclick="selected_Subject_edit(<?php echo $tmp_data['id']; ?>, '<?php echo $tmp_data['subject'] ?>', '<%= today_full %>', <%= row+1 %>)">
                            <div class="view-card lighten-1 waves-effect waves">
                            <?php } ?>
                                <div class="view-num"><?php echo $row + 1; ?></div>
                                <?php
                                if($tmp_data['subject'] === "空きコマ"){ ?>
                                    <span class="view-color-empty"></span>
                                <?php }else{ ?>
                                    <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                                <?php } ?>
                                <span class="view-data">
                                    <div class="view-subject"><?php echo $tmp_data['subject'] ?></div>
                                    <div class="view-subject-task-empty red-text"></div>
                                    <div class="view-subject-data"></div>
                                </span>
                                <span class="view-classroom"><?php echo $tmp_data['classroom'] ?></span>
                            </div>
                            <?php
                                if($tmp_data['subject'] !== "空きコマ"){}else{ ?>
                            </a>
                            <?php }
                            }
                            }
                            ?>
                        </div>
                        <div class="col s6">
                            <h6 class="orange-title">次の授業日</h6>

                            <!-- ここに時間割をのせる -->
                            <?php
                            if($next_e == 0){
                                // 日曜日の場合
                            ?>
                                <p class="col s12">今日の授業はありません</p>
                            <?php }else{ ?>
                            <?php for($row = 0; $row < 6; $row++){
                                $tmp_data = $calendar_data[$next_e - 1][$row];
                                    if($tmp_data['subject'] === "空きコマ"){
                            ?>
                            <div class="view-card-empty">
                            <?php }else{ ?>
                            <a class="modal-trigger table-card-a" href="#subject-detail-modal" onclick="selected_Subject_edit(<?php echo $tmp_data['id']; ?>, '<?php echo $tmp_data['subject'] ?>', '<%= today_full %>', <%= row+1 %>)">
                            <div class="view-card lighten-1 waves-effect waves">
                            <?php } ?>
                                <div class="view-num"><?php echo $row + 1; ?></div>
                                <?php
                                if($tmp_data['subject'] === "空きコマ"){ ?>
                                    <span class="view-color-empty"></span>
                                <?php }else{ ?>
                                    <span class="view-color <?php echo $tmp_data['color']; ?>"></span>
                                <?php } ?>
                                <span class="view-data">
                                    <div class="view-subject"><?php echo $tmp_data['subject'] ?></div>
                                    <div class="view-subject-task-empty red-text"></div>
                                    <div class="view-subject-data"></div>
                                </span>
                                <span class="view-classroom"><?php echo $tmp_data['classroom'] ?></span>
                            </div>
                            <?php
                                if($tmp_data['subject'] !== "空きコマ"){}else{ ?>
                            </a>
                            <?php }
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div id="task-view" class="col s12">
                    <!-- <div class="row">
                        <div class="col s12">
                            <h6 class="orange-title">タスク</h6>
                        </div>
                        <div class="col s6"> -->
                            <!-- ココにタスク -->
                            <!-- <% if(task_count >= 6){ %>
                                <% for(int i = 0; i < 6; i++){%>
                                    <a class="modal-trigger table-card-a" href="#task-detail-modal" onclick="selected_task(<%=task_id[i]%>, '<%=taskname[i]%>', '<%=task_deadline[i]%>', <%=task_period[i]%>, <%=task_priority[i]%>, '<%=task_memo[i]%>')">
                                        <div class="view-card lighten-1 waves-effect waves-<%= task_priority_color[task_priority[i]-1] %>">
                                            <span class="view-color <%= task_priority_color[task_priority[i]-1] %>"></span>
                                            <span class="view-data">
                                                <div class="view-subject"><%= taskname[i] %></div>
                                                <div class="view-subject-task-empty red-text"></div>
                                                <div class="view-subject-data">- <%= task_deadline[i] %> <%= task_period[i] %>限</div>
                                            </span>
                                        </div>
                                    </a>
                                <% } %>
                            <% }else if(taskname[0].equals("-1")){ %>
                                    <p>タスクはありません</p>
                            <% }else{ %>
                                <% for(int i = 0; i < task_count ; i++){ %>
                                    <a class="modal-trigger table-card-a" href="#task-detail-modal" onclick="selected_task(<%=task_id[i]%>, '<%=taskname[i]%>', '<%=task_deadline[i]%>', <%=task_period[i]%>, <%=task_priority[i]%>, '<%=task_memo[i]%>')">
                                        <div class="view-card lighten-1 waves-effect waves-<%= task_priority_color[task_priority[i]-1] %>">
                                            <span class="view-color <%= task_priority_color[task_priority[i]-1] %>"></span>
                                            <span class="view-data">
                                                <div class="view-subject"><%= taskname[i] %></div>
                                                <div class="view-subject-task-empty red-text"></div>
                                                <div class="view-subject-data">- <%= task_deadline[i] %> <%= task_period[i] %>限</div>
                                            </span>
                                        </div>
                                    </a>
                                <% } %>
                            <% } %>
                        </div>
                        <div class="col s6"> -->
                            <!-- ココにタスク -->
                            <!-- <% if(task_count - 6 >= 6){ %>
                                <% for(int i = 6; i < 12; i++){%>
                                    <a class="modal-trigger table-card-a" href="#task-detail-modal" onclick="selected_task(<%=task_id[i]%>, '<%=taskname[i]%>', '<%=task_deadline[i]%>', <%=task_period[i]%>, <%=task_priority[i]%>, '<%=task_memo[i]%>')">
                                        <div class="view-card lighten-1 waves-effect waves-<%= task_priority_color[task_priority[i]-1] %>">
                                            <span class="view-color <%= task_priority_color[task_priority[i]-1] %>"></span>
                                            <span class="view-data">
                                                <div class="view-subject"><%= taskname[i] %></div>
                                                <div class="view-subject-task-empty red-text"></div>
                                                <div class="view-subject-data">- <%= task_deadline[i] %> <%= task_period[i] %>限</div>
                                            </span>
                                        </div>
                                    </a>
                                <% } %>
                            <% }else if(task_count - 6 < 5 && task_count - 6 > 0){ %>
                                <% for(int i = 6; i < task_count ; i++){ %>
                                    <a class="modal-trigger table-card-a" href="#task-detail-modal" onclick="selected_task(<%=task_id[i]%>, '<%=taskname[i]%>', '<%=task_deadline[i]%>', <%=task_period[i]%>, <%=task_priority[i]%>, '<%=task_memo[i]%>')">
                                        <div class="view-card lighten-1 waves-effect waves-<%= task_priority_color[task_priority[i]-1] %>">
                                            <span class="view-color <%= task_priority_color[task_priority[i]-1] %>"></span>
                                            <span class="view-data">
                                                <div class="view-subject"><%= taskname[i] %></div>
                                                <div class="view-subject-task-empty red-text"></div>
                                                <div class="view-subject-data">- <%= task_deadline[i] %> <%= task_period[i] %>限</div>
                                            </span>
                                        </div>
                                    </a>
                                <% } %>
                            <% } %>
                        </div>
                    </div> -->
                </div>
                <div id="view-settings" class="col s12">
                    <div class="row">
                        <div class="col s6">
                            <h6 class="blue-title">ビュー設定</h6>
                        </div>
                        <div class="col s12">
                            <div class="card blue-grey darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">工事中……</span>
                                    <p>ビュー設定は工事中です！！！もうちょっとまっててね！！</p>
                                </div>
                                <div class="card-action">
                                    <a href="https://twitter.com/intent/tweet?text=@Tech_Kazu%20%E9%96%8B%E7%99%BA%E3%81%8C%E3%82%93%E3%81%B0%E3%81%88%E3%83%BC%EF%BC%81%EF%BC%81%20http://stdo-app.net" class="btn-flat" target="_blank"><i class="fab fa-twitter"></i> 開発者を応援する</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <!-- <%@ include file="modals/new_task.jsp" %> -->
    <?php
    require('./views/modal/schedule.php');
    require('./views/modal/edit_subject.php');
    require('./views/modal/new_task.php');
    require('./views/modal/all_task.php');
    ?>
<!-- 
    <%@ include file="modals/all_task.jsp" %>

    <%@ include file="modals/schedule.jsp" %>

    <%@ include file="modals/task_detail.jsp" %>

    <%@ include file="modals/edit_subject.jsp" %>

    <%@ include file="modals/subject_detail.jsp" %>

    <%@ include file="modals/exchange_subject.jsp" %> -->
</body>

<script src="./JS/show_hide.js"></script>
</html>