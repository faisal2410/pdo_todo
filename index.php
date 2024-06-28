<?php
require 'db.php';

$pdo = getPDO();
$stmt = $pdo->query("SELECT * FROM tasks");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>To-Do List</title>
</head>

<body>
    <h1>To-Do List</h1>
    <form action="add_task.php" method="post">
        <input type="text" name="title" placeholder="New Task">
        <button type="submit">Add</button>
    </form>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <form action="update_task.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <input type="checkbox" name="completed" <?php echo $task['completed'] ? 'checked' : ''; ?> onchange="this.form.submit()">
                </form>
                <?php echo htmlspecialchars($task['title']); ?>
                <form action="delete_task.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>