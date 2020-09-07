let column = 1;
let row = 1;
let season = 1;
let week = ['月曜', '火曜', '水曜', '木曜', '金曜', '土曜', '日曜'];
let subject_name = "null";
let subejct_color = "null";

function selected(selected_row, selected_columm, selected_season, selected_subject, selected_color){
    columm = selected_columm;
    row = selected_row;
    season = selected_season;
    subject_name = selected_subject;
    subejct_color = selected_color;
    modal_row = document.getElementById('selected_row');
    modal_columm = document.getElementById('selected_columm');
    modal_season = document.getElementById('selected_season');
    modal_row_display = document.getElementById('selected_row_registed');
    modal_subject_name = document.getElementById('selected_subject_name');
    modal_selected_week_registed = document.getElementById('selected_week_registed');
    modal_selected_color_registed = document.getElementById('selected_color_registed');

    modal_row.value = get_row();
    modal_columm.value = get_columm();
    modal_season.value = get_season();
    modal_row_display.innerHTML = get_row();
    modal_subject_name.innerHTML = get_subject_name();
    modal_selected_week_registed.innerHTML = get_week(columm);
    modal_selected_color_registed.innerHTML = getColor();

    console.log('columm:'+column);
    console.log('row:'+row);
}

function get_row(){
    console.log('get_row:'+row);
    return row;
}

function get_columm(){
    console.log('get_columm:'+columm);
    return columm;
}

function get_season(){
    if(season == 1){
        console.log("前期("+season+")");
    }else if(season == 2){
        console.log("後期("+season+")");
    }else{
        console.log("学期不正値("+season+")");
    }
    return season;
}

function get_subject_name(){
    console.log('Subject_name:'+subject_name);
    return subject_name;
}

function get_week(columm){
    console.log('week:'+week[columm - 1]);
    return week[columm - 1];
}

function getColor(){
    console.log('Color:'+subejct_color);
    return subejct_color;
}