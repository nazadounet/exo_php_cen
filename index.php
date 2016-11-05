<?php require_once 'config.php';
    require 'function.php';

    if(!empty($_POST)){

        $errors = array();

        if(empty($_POST['firstname'])){
            $errors['firstname'] = "Veuillez entrer un nom";
        }
        if(empty($_POST['lastname'])){
            $errors['lastname'] = "Veuillez entrer un prénom";
        }
        if(empty($_POST['email'])){
            $errors['email'] = "Veuillez entrer une adresse email valide";
        }
        if(empty($_POST['cursus'])){
            $errors['cursus'] = "Veuillez votre cursus";
        }

        $req = $pdo->prepare('SELECT * FROM info_etu');
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);

        if($user['email'] == $_POST['email'])//si variable $user est vide alors l'email n'est pas deja pris.
        {
            $errors['email'] = "Cet email existe deja!";
        }

        if(empty($errors)){

            $req  = $pdo->prepare("INSERT INTO info_etu SET firstname = ?, lastname = ?, email = ? , cursus = ?, competence = ?");
            $req->execute([$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['cursus'], $_POST['competence']]);
        }

    }
debug($errors);

$req = $pdo->prepare("SELECT * FROM info_etu");
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Starter Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">

    </head>

    <br/>
    <body>
        <header>

        </header>

        <div class="container">

            <form action="" method="post">

                <div class="form-inline">
                    <div class="form-group" style="margin-left: 70px;">
                        <label  class="col-sm-2 control-label" for="">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="firstname" placeholder="Votre nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label" for="">Prénom</label>
                        <div class="col-sm-10">
                            <input style="margin-left: 13px;" type="text" class="form-control" name="lastname" placeholder="Votre prénom">
                        </div>
                    </div>
                </div>
                <br/>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Cursus</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cursus" placeholder="L3 CDNL, L3 Info-com...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Spécialité</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="competence" placeholder="Développeur, graphiste...">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Valider</button>
                        </div>
                    </div>
                </div>
            </form>

            <div>

                <?php if(!empty($datas)):?>


                    <table class="table table-hover">
                        <tr>
                            <td> <strong> id </strong> </td>
                            <td> <strong> Nom </strong> </td>
                            <td> <strong> Prénom </strong> </td>
                            <td> <strong> Email </strong> </td>
                            <td> <strong> Cursus </strong> </td>
                            <td> <strong> Spécialité </strong> </td>
                            <td></td>
                        </tr>
                <?php foreach($datas as $data): ?>
                        <tr>
                            <td><?= $data['id']; ?></td>
                            <td><?= $data['firstname']; ?></td>
                            <td><?= $data['lastname']; ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= $data['cursus']; ?></td>
                            <td><?= $data['competence']; ?></td>
                            <td>
                                <form method="post" action="delete.php" >
                                    <input type="hidden" name="user_id" value= <?= $data['id']; ?> >
                                    <input type="submit" name="Submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                <?php endforeach?>
                    </table>


                <?php endif; ?>

            </div>

        </div><!-- /.container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
