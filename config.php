<?php
$pdo = new PDO('mysql:host=localhost;dbname=Exo_php_cen;', 'root', 'root');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 