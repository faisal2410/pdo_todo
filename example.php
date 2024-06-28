<?php
try {
    // Create a new PDO instance
    $pdo = new PDO('sqlite:example.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create a table
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY,
        name TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE
    )");

    // Insert data
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->execute([':name' => 'John Doe', ':email' => 'john.doe@example.com']);

    // Select data
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo $user['name'] . ' - ' . $user['email'] . '<br>';
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
