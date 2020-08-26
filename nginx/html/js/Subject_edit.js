let Subject_id = -1;
let Subject_name = "null";
let Subject_edit_day = "1970-01-01"
let Subject_period_today = -1;


function selected_Subject_edit(edit_Subject_id, edit_Subject_name, edit_Subject_day, edit_period_today){
    Subject_id = edit_Subject_id;
    Subject_name = edit_Subject_name;
    Subject_edit_day = edit_Subject_day;
    Subject_period_today = edit_period_today;


    // POST送信するデータ
    post_Subject_id = document.getElementById('edit_Subject_id');
    post_Subject_edit_day = document.getElementById('edit_Subject_today');
    post_edit_Subject_name_hidden = document.getElementById('edit_Subject_name_hidden');
    post_edit_Subject_period_today = document.getElementById('edit_Subject_period_today');

    // value属性に当てはめる
    post_Subject_id.value = getSubjectId();
    post_Subject_edit_day.value = getSubjectDay();
    post_edit_Subject_name_hidden.value = getSubjectName();
    post_edit_Subject_period_today.value = getSubjectPeriod();

    // 表示するデータ
    display_Subject_name = document.getElementById('display_Subject_name');

    display_Subject_name.innerHTML = getSubjectName();
}

function getSubjectId(){
    console.log('SubjectId:'+Subject_id);
    return Subject_id;
}

function getSubjectPeriod(){
    console.log('getSubjectPeriod: '+Subject_period_today+'限');
    return Subject_period_today;
}

function getSubjectDay(){
    console.log('getSubjectDay: '+Subject_edit_day);
    return Subject_edit_day;
}

function getSubjectName(){
    console.log('Subject_name:'+Subject_name);
    return Subject_name;
}