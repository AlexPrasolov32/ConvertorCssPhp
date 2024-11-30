<?php
require_once "options.php";
$array_text = $_SESSION["array_text"];
$selectedOptions = $_POST['options'];
if(in_array('option2', $selectedOptions)){
    $array_text = option2($array_text);
}
if(in_array('option3', $selectedOptions)){
    $array_text = option3($array_text);
}
if(in_array('option4', $selectedOptions)){
    $array_text = option4($array_text);
}
if(in_array('option1', $selectedOptions)){
    $array_text = option1($array_text);
}
else{
    $array_text = notOption1($array_text);
}
require_once ("result.html");
