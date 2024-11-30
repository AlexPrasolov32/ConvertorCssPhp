<?php
function Option34Check() :bool
{
    if (isset($_POST['options'])) {
        $selectedOptions = $_POST['options'];
        // Проверяем наличие опций option3 и option4
        $isOption3Checked = in_array('option3', $selectedOptions);
        $isOption4Checked = in_array('option4', $selectedOptions);
        if ($isOption3Checked && $isOption4Checked) {
            return false;
        } else {
            return true;
        }
    }
    else{return true;}
}