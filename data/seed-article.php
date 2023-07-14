<?php

$articles = json_decode(file_get_contents('./articles.json'), true);

$dns = 'mysql:host=localhost;dbname=blog';
$user = 'root';
$passWord = 'nalvac0560456';


try {

    $pdo = new PDO($dns, $user, $passWord, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo 'connexion ok';
    
}catch(Exception $e) {
    echo $e->getMessage();
}


$stm = $pdo->prepare('
    INSERT INTO article 
    (title, image, content, category) 
    VALUES 
    (:title, :image, :content, :category)
');

foreach ($articles as $article) {
    $stm->bindValue(':title', $article['title']);
    $stm->bindValue(':image', $article['image']);
    $stm->bindValue(':content', $article['content']);
    $stm->bindValue(':category', $article['category']);
    $stm->execute();
}