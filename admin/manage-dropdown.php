<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit; }
require_once '../database.php';

$type = $_GET['type'] ?? 'country';
$options = $pdo->prepare("SELECT * FROM dropdown_options WHERE type = ? ORDER BY value");
$options->execute([$type]);
$options = $options->fetchAll();

if ($_POST) {
    $value = trim($_POST['value']);
    if ($value) {
        $pdo->prepare("INSERT INTO dropdown_options (type, value) VALUES (?, ?) ON DUPLICATE KEY UPDATE value = value")
            ->execute([$type, $value]);
    }
    header("Location: ?type=$type");
}
?>
<!DOCTYPE html>
<html>
<head><title>Manage <?= ucfirst($type) ?></title><link href="../css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<div class="container mt-4">
    <h3>Manage <?= ucfirst($type) ?></h3>
    <form method="POST" class="input-group mb-3">
        <input type="text" name="value" class="form-control" placeholder="Add new <?= $type ?>" required>
        <button class="btn btn-primary">Add</button>
    </form>
    <ul class="list-group">
        <?php foreach($options as $opt): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= htmlspecialchars($opt['value']) ?>
                <a href="delete.php?id=<?= $opt['id'] ?>&type=<?= $type ?>" class="text-danger">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="mt-3">
        <a href="?type=country" class="btn btn-sm btn-outline-primary">Country</a>
        <a href="?type=state" class="btn btn-sm btn-outline-primary">State</a>
        <a href="?type=city" class="btn btn-sm btn-outline-primary">City</a>
        <a href="?type=event_name" class="btn btn-sm btn-outline-primary">Event Name</a>
    </div>
</div>
</body>
</html>