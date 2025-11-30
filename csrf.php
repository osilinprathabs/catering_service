<?php
// csrf.php
class CSRF {
    private static $token_name = 'csrf_token';

    public static function generate($user_id = null) {
        global $pdo;
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', time() + 1800); // 30 min

        $stmt = $pdo->prepare(
            "INSERT INTO csrf_tokens (token, user_id, expires_at) 
             VALUES (?, ?, ?)"
        );
        $stmt->execute([$token, $user_id, $expires]);

        $_SESSION[self::$token_name] = $token;
        return $token;
    }

    public static function get() {
        return $_SESSION[self::$token_name] ?? null;
    }

    public static function validate($token) {
        global $pdo;
        if (!$token) return false;

        $stmt = $pdo->prepare(
            "SELECT * FROM csrf_tokens 
             WHERE token = ? AND expires_at > NOW()"
        );
        $stmt->execute([$token]);
        $row = $stmt->fetch();

        if ($row) {
            // delete after use (one-time token)
            $pdo->prepare("DELETE FROM csrf_tokens WHERE token = ?")
                ->execute([$token]);
            return true;
        }
        return false;
    }

    public static function input() {
        $token = self::get() ?: self::generate($_SESSION['admin_id'] ?? null);
        return '<input type="hidden" name="' . self::$token_name . '" value="' . htmlspecialchars($token) . '">';
    }
}
?>