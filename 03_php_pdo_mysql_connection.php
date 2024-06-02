<?php

$hostname = 'localhost';
$db = 'characters';
$user = 'root'; 
$password = ''; 

$dsn = "mysql:host=$hostname;dbname=$db;charset=UTF8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $user, $password, $options);

    if ($pdo) {
        echo "Connected to the $db database successfully!";

        // $sql = 'SELECT * FROM names';
        // $statement = $pdo->query($sql);
        // $names = $statement->fetchAll(PDO::FETCH_ASSOC);

        // echo '<pre>';
        // print_r($names);
        // echo '</pre>';

    }
} catch (PDOException $e) {
    echo $e->getMessage();
}