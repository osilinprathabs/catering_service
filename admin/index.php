<?php
// admin/index.php
session_start();
require_once '../database.php';
require_once '../csrf.php';   // <-- CSRF helper

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ---- CSRF CHECK ----
    if (!CSRF::validate($_POST['csrf_token'] ?? '')) {
        $error = 'Invalid CSRF token!';
    } else {
        $login    = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($login === '' || $password === '') {
            $error = 'Please fill all fields.';
        } else {
            $stmt = $pdo->prepare(
                "SELECT id, username, email, password 
                   FROM admins 
                  WHERE username = ? OR email = ?"
            );
            $stmt->execute([$login, $login]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['admin_id']    = $admin['id'];
                $_SESSION['admin_name']  = $admin['username'];
                $_SESSION['admin_email'] = $admin['email'];

                // Regenerate CSRF token for logged-in user
                CSRF::generate($admin['id']);

                header('Location: dashboard.php');
                exit;
            } else {
                $error = 'Invalid login or password!';
            }
        }
    }
}

// Generate token for form (guest)
CSRF::generate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - RD Catering</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#f8f9fa}.login-card{max-width:400px;margin:100px auto}</style>
</head>
<body>
<div class="login-card">
    <div class="card shadow">
        <div class="card-body p-4">
            <h4 class="text-center mb-4">Admin Login</h4>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST">
                <?= CSRF::input() ?>
                <div class="mb-3">
                    <input type="text" name="login" class="form-control"
                           placeholder="Username or Email" required autofocus>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control"
                           placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>