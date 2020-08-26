let Task_id = -1;
let now_taskname = "null";
let now_deadline = "null";
let now_task_period = -1;
let now_task_priority = -1;
let now_task_memo = "null";


function selected_task(edit_Task_id, edit_task_name, edit_task_deadline_now, edit_task_period_now, edit_task_priority_now, edit_task_memo_now){
    Task_id = edit_Task_id;
    now_taskname = edit_task_name;
    now_deadline = edit_task_deadline_now;
    now_task_period = edit_task_period_now;
    now_task_priority = edit_task_priority_now;
    now_task_memo = edit_task_memo_now;


    // POST送信するデータ
    post_edit_task_id = document.getElementById('task_id_hidden');
    post_edit_task_name_now = document.getElementById('task_name_now');
    post_edit_task_deadline_now = document.getElementById('task_deadline_now');
    post_edit_task_period_now = document.getElementById('task_period_now');
    post_edit_task_priority_now = document.getElementById('task_priority_now');
    post_edit_task_memo_now = document.getElementById('task_memo_now');

    // value属性に当てはめる
    post_edit_task_id.value = getTaskId();
    post_edit_task_name_now.value = getTaskName();
    post_edit_task_deadline_now.value = getDeadline();
    post_edit_task_period_now.value = getPeriod();
    post_edit_task_priority_now.value = getPriority();
    post_edit_task_memo_now.value = getMemo();

    // 表示するデータ
    display_target_taskname = document.getElementById('edit-target-taskname');
    display_target_memo = document.getElementById('edit-target-memo');

    display_target_taskname.innerHTML = getTaskName();
    display_target_memo.innerHTML = dispGetMemo();

    console.log('columm:'+column);
    console.log('row:'+row);
}

function getTaskId(){
    console.log('TaskId:'+Task_id);
    return Task_id;
}

function getTaskName(){
    console.log('TaskName:'+now_taskname);
    return now_taskname;
}

function getDeadline(){
    console.log('Deadline:'+now_deadline);
    return now_deadline;
}

function getPeriod(){
    console.log('Period:'+now_task_period);
    return now_task_period;
}

function getPriority(){
    console.log('Priority:'+now_task_priority);
    return now_task_priority;
}

function getMemo(){
    console.log('Memo:'+now_task_memo);
    return now_task_memo;
}

function dispGetMemo(){
    if(now_task_memo === void 0 || now_task_memo === "null" || now_task_memo == null || now_task_memo === ''){
        return "メモはありません";
    }else{
        return now_task_memo;
    }
}