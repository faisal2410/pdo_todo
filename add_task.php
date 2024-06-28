<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title'])) {
    $pdo = getPDO();
    $sql = "INSERT INTO tasks (title) VALUES (:title)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title' => $_POST['title']]);
}

header('Location: index.php');
exit;
