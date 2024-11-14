<?php
include 'db.php';

// nambah task baru
if (isset($_POST['add'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    $conn->query($sql);
}

// edit task
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $sql = "UPDATE tasks SET task='$task' WHERE id=$id";
    $conn->query($sql);
}

// hapus task
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM tasks WHERE id=$id");
}

// ambil semua task
$result = $conn->query("SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>To-Do List</h1>

    <form method="POST" action="">
        <input type="text" name="task" placeholder="Tambah tugas baru..." required>
        <button type="submit" name="add">Tambah</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Waktu Dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="task" value="<?php echo $row['task']; ?>">
                        <button type="submit" name="edit">Edit</button>
                    </form>
                </td>
                <td><?php echo $row['created_at']; ?></td>
                <td><a href="?delete=<?php echo $row['id']; ?>">Hapus</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
