<?php

function html_escape($word){
    return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

function get_post($key){
    if(isset($_POST[$key])){
        $var = trim($_POST[$key]);
        return $var;
    }
}

function check_words($word, $length){
    if(mb_strlen($word) === 0){
        return FALSE;
    }elseif(mb_strlen($word) > $length){
        return FALSE;
    }else{
        return TRUE;
    }
}

function code2color($colorCode){
    switch($colorCode){
        case 1:{
            return "red";
            break;
        }case 2:{
            return "deep-orange";
            break;
        }case 3:{
            return "orange";
            break;
        }case 4:{
            return "amber";
            break;
        }case 5:{
            return "yellow";
            break;
        }case 6:{
            return "lime";
            break;
        }case 7:{
            return "light-green";
            break;
        }case 8:{
            return "green";
            break;
        }case 9:{
            return "teal";
            break;
        }case 10:{
            return "cyan";
            break;
        }case 11:{
            return "light-blue";
            break;
        }case 12:{
            return "blue";
            break;
        }case 13:{
            return "indigo";
            break;
        }case 14:{
            return "deep-purple";
            break;
        }case 15:{
            return "purple";
            break;
        }case 16:{
            return "pink";
            break;
        }case 17:{
            return "brown";
            break;
        }case 18:{
            return "grey";
            break;
        }case 19:{
            return "blue-grey";
            break;
        }default:{
            return "white";
            break;
        }
    }
}