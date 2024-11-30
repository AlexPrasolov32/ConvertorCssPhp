<?php
session_start();
require_once "toArray.php";
require_once "CheckCheckboxes.php";
if (isset($_POST['options'])) {
    if (isset($_FILES['fileUpload'])) {
        try{
            $text = readCSSFile($_FILES['fileUpload']);
            if(isset($text)){
                $array_text = toArray($text);
                if (count($array_text) != 0) {
                    if (!Option34Check()) {
                        $_SESSION["errorInput"] = "Недопустим выбор третьего и четвёртого варианта одновременно";
                        header("Location: upload.php");
                    } else {
                        $_SESSION["array_text"] = $array_text;
                        require("result.php");
                    }
                }
            }else{
                $_SESSION["errorInput"] = "Файл пустой";
                header("Location: upload.php");
            }
        }catch (Exception $e){
            $_SESSION["errorInput"] = "Файл не является текстовым";
            header("Location: upload.php");
        }


    } else {
        $_SESSION["errorInput"] = "Необходимо загрузить файл";
        header("Location: upload.php");
    }
}
else{
    $_SESSION["errorInput"] = "Должен быть выбран хотя бы один пункт";
    header("Location: upload.php");}