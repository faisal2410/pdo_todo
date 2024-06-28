<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $pdo = getPDO();
    $sql = "UPDATE tasks SET completed = :completed WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':completed' => isset($_POST['completed']) ? 1 : 0,
        ':id' => $_POST['id']
    ]);
}

header('Location: index.php');
exit;
