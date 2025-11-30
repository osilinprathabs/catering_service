<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit; }
require_once '../database.php';

$bookings = $pdo->query("SELECT * FROM bookings ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>All Bookings (<?= count($bookings) ?>)</h2>
    <table class="table table-bordered">
        <thead><tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Event</th>
            <th>Guests</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr></thead>
        <tbody>
        <?php foreach ($bookings as $b): ?>
            <tr>
                <td><?= $b['id'] ?></td>
                <td><?= htmlspecialchars($b['name']) ?></td>
                <td><?= htmlspecialchars($b['email']) ?></td>
                <td><?= $b['phone'] ?></td>
                <td><?= $b['event_type'] . ($b['custom_event_name'] ? " ({$b['custom_event_name']})" : "") ?></td>
                <td><?= $b['guests'] ?></td>
                <td><?= date('d M Y', strtotime($b['event_date'])) ?></td>
                <td><span class="badge bg-<?= $b['status']=='Pending'?'warning':($b['status']=='Confirmed'?'success':'secondary') ?>">
                    <?= $b['status'] ?>
                </span></td>
                <td>
                    <a href="update_status.php?id=<?= $b['id'] ?>&status=Confirmed" class="btn btn-sm btn-success">Confirm</a>
                    <a href="update_status.php?id=<?= $b['id'] ?>&status=Completed" class="btn btn-sm btn-info">Complete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>