<?php
$name=filter_input(INPUT_GET, 'nm');
if (isset($name) && $name!=''){
    $result=array('status' => 1 ,'message'=>'Hello '.$name);
}else{
    $result=array('status' => 0 ,'message'=>'Invalid name');
}
header('Content-type:application/json');
echo json_encode($result);