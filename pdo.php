<pre>
<?php

$dns = 'mysql:host=localhost;dbname=test';
$user = 'root';
$pwd = 'nalvac0560456';



try {

    $pdo = new PDO ($dns, $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    echo 'connexiion  ok';
}catch (PDOException $e) {
    echo 'error:' . $e->getMessage();
}

$userInfo = [
    'firstname' => 'jean',
    'lastname' => 'gonou',
    'email' => 'jean@gmail.com',
    'password' => '123',
];

    //$statement = $pdo->prepare('INSERT INTO user VALUES (DEFAULT, "ADAME", "HOUNON", "adam@gmail.com", "1234")');

    //$statement->execute();

    //$statement = $pdo->query('INSERT INTO user VALUES (DEFAULT, "ADAME2", "HOUNON2", "adam@gmail.com", "1234")');

    /*$statement = $pdo->prepare('INSERT INTO user VALUES (DEFAULT, ?, ?, ?, ?)');

    $statement->execute([$userInfo['firstname'], $userInfo['lastname'], $userInfo['email'], $userInfo['password']]);


    $statement->bindValue(1, $userInfo['firstname']);
    $statement->bindValue(2, $userInfo['lastname']);
    $statement->bindValue(3, $userInfo['email']);
    $statement->bindValue(4, $userInfo['password']);

    $statement->execute();

    $statement->bindParam(':firstname', $userInfo['firstname']); //$userInfo['firstname'] est une référence
    $statement->bindParam(':lastname', $userInfo['lastname']);
    $statement->bindParam(':email', $userInfo['email']);
    $statement->bindParam(':password', $userInfo['password']);*/

    /*$user = [
        'firstname' => 'jacques',
        'lastname' => 'dupont',
        'password' => 123
      ];
      
      
      $statement = $pdo->prepare("INSERT INTO user (firstname, lastname, password) VALUES (:firstname, :lastname, :password)");
      $statement->execute($user);*/

      $stm = $pdo->prepare('SELECT * FROM user WHERE id=:id');

      $stm->bindValue(':id', 1);

      $stm->execute();

      $user = $stm->fetch();

      print_r($user);



?>

</pre>