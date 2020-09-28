<%@ page contentType="text/html; charset=UTF-8"%>
<div id="all-task-modal" class="modal">
        <div class="modal-content">
            <h4 class="orange-title">タスク一覧</h4>
            <div class="col s12">
                <h5 class="blue-title">すべてのタスク</h5>
            </div>
            <!-- ココにタスク -->
            <% if(taskname[0].equals("-1")){ %>
                    <p>タスクはありません</p>
            <% }else{ %>
                <% for(int i = 0; i < task_count; i++){%>
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
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-red btn-flat"><i class="fas fa-times"></i> 閉じる</a>
        </div>
    </div>