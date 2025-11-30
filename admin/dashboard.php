<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit; }
require_once '../database.php';

// Fetch counts
$bookings = $pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();
$pending = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status='Pending'")->fetchColumn();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">RD Catering Admin</span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3"><div class="card text-white bg-primary"><div class="card-body"><h5>Total Bookings</h5><h3><?= $bookings ?></h3></div></div></div>
        <div class="col-md-3"><div class="card text-white bg-warning"><div class="card-body"><h5>Pending</h5><h3><?= $pending ?></h3></div></div></div>
    </div>
    <div class="mt-4">
        <a href="manage-dropdown.php" class="btn btn-success">Manage Dropdowns</a>
        <a href="bookings.php" class="btn btn-info">View All Bookings</a>
    </div>
</div>
</body>
</html>