<?php
session_start();
require_once "toArray.php";
require_once "CheckCheckboxes.php";
try{
    if (isset($_POST['options'])){
        if(isset($_POST["textarea"])){
            $text = $_POST["textarea"];
            $array_text = toArray($text);
            if (count($array_text) != 0){
                if(!Option34Check()){
                    $_SESSION["errorInput"] = "Недопустим выбор третьего и четвёртого варианта одновременно";
                    header("Location: input.php");
                }
                else{
                    $_SESSION["array_text"] = $array_text;
                    require("result.php");
                }
            }else{
                $_SESSION["errorInput"] = "Введён неверный формат текста";
                header("Location: input.php");
            }
        }else{
            $_SESSION["errorInput"] = "Текст не должен быть пустым";
            header("Location: input.php");
        }
    }
    else{
        $_SESSION["errorInput"] = "Должен быть выбран хотя бы один пункт";
        header("Location: input.php");}

}
catch(Exception $e){
        $_SESSION["errorInput"] = "Введён неверный формат текста, или произошла другая ошибка";
        header("Location: input.php");
}
