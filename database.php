<?php

$dns = 'mysql:host=localhost;dbname=blog';
//$user = 'root';
$user = getenv('USER_DB');
//$pwd = 'nalvac0560456';
$pwd = getenv('USER_PWD');


try {
    $pdo = new PDO ($dns, $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    echo 'Connexion réussie';
}catch (PDOException $e) {
    echo 'error:' . $e->getMessage();
    echo 'connexion echoué';
}

return $pdo;