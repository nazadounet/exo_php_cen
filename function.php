<?php require_once 'config.php';

    function debug($variable)
    {
        echo '<pre>' . print_r($variable, true) . '</pre>';
    }