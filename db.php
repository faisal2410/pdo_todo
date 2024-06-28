<?php
function getPDO()
{
    try {
        $pdo = new PDO('sqlite:todo_app.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Could not connect to the database: " . $e->getMessage());
    }
}

// Create the tasks table if it doesn't exist
try {
    $pdo = getPDO();
    $sql = "CREATE TABLE IF NOT EXISTS tasks (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                completed INTEGER NOT NULL DEFAULT 0
            )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("Could not create table: " . $e->getMessage());
}
