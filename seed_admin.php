<?php
// seed_admin.php  (run once, then delete)
require_once 'database.php';

$username = 'OsilinPrathab';
$email    = 'osilinprathab@gmail.com';
$password = 'admin123';   // change after first login!

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    "INSERT INTO admins (username, email, password) 
     VALUES (?, ?, ?) 
     ON DUPLICATE KEY UPDATE password = VALUES(password)"
);
$stmt->execute([$username, $email, $hash]);

echo "Admin seeded! Login: <strong>$username</strong> / <code>$password</code><br>";
echo "Hash: <code>$hash</code><br>";
?>