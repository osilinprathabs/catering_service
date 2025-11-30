<?php
// check_connection.php
require_once 'database.php';

echo "<h2>Database Connection Test</h2>";
echo "<p><strong>Time:</strong> " . date('d M Y, h:i:s A') . " IST</p>";
echo "<p><strong>Database:</strong> rd_cateringandevents</p>";

try {
    // Test query
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM bookings");
    $count = $stmt->fetch()['total'];
    echo "<p style='color:green;'>CONNECTED SUCCESSFULLY!</p>";
    echo "<p>Total bookings in database: <strong>$count</strong></p>";
    
    // Test admins
    $admins = $pdo->query("SELECT username FROM admins")->fetchAll(PDO::FETCH_COLUMN);
    echo "<p>Admins: <strong>" . implode(', ', $admins) . "</strong></p>";
    
} catch (Exception $e) {
    echo "<p style='color:red;'>CONNECTION FAILED: " . $e->getMessage() . "</p>";
}
?>