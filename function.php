<?php require_once 'config.php';

    function debug($variable)
    {
        echo '<pre>' . print_r($variable, true) . '</pre>';
    }


    if(isset($_GET['id'])){
        var_dump($_GET['id']);
        $req = $pdo->prepare("DELETE FROM info_etu WHERE id= ?");
        $req->execute($_GET['id']);
        echo 'ok';
    }else{
        echo 'pas ok';
    }