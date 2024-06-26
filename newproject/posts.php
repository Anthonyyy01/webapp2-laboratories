<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="post">
    <h1>Post Pages</h1>
    <ul id="postList"></ul>
        <?php
require 'config.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $user, $password, $options);

    if ($pdo) {
        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM `posts` WHERE user_id = :id";
        $statement = $pdo->prepare($query);
        $statement->execute([':id' => $_SESSION['user_id']]);

       
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
           
            echo '<li><a href="post.php?id=' . $row['id'] . '">' . $row['title'] . '</li>';
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
    ?>
</div>
</body>

</html>