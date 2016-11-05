<?php require_once 'config.php';
    require_once'function.php';

if(isset($_POST['user_id'])){

    $req = $pdo->prepare("DELETE FROM info_etu WHERE id = ?");
    $req->execute($_POST['user_id']);
    echo 'deleted';

}else{
    echo 'pas ok';
}
