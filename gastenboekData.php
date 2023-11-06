<?php

    function validateDataInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $replace = array('{name}', '{message}');
    $values = array('', '');
    if(isset($_POST['add'])) {
        validateDataInput($_POST['name'], $_POST['message']);
    }
    $template = file_get_contents('index.php');
    echo str_replace($replace, $values, $template);

?>