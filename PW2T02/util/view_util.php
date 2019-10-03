<?php
function fieldNotEmpty($fields=array()){
    foreach ($fields as $field){
        if (isset($field) && trim($field)==''){
            return false;
        }
    }
    return true;
}