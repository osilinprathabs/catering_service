<?php
session_start();
if (!isset($_SESSION['admin_id'])) exit;
require_once '../database.php';

$id = (int)$_GET['id'];
$status = $_GET['status'];

$pdo->prepare("UPDATE bookings SET status = ? WHERE id = ?")->execute([$status, $id]);
header("Location: bookings.php");