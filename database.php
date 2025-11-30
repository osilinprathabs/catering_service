<?php
// database.php
// Database Configuration for RD Catering & Events
// Database Name: rd_cateringandevents

$host = 'localhost';           
$dbname = 'rd_cateringandevents';   
$username = 'root';             
$password = '';               

try { 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
     
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch (PDOException $e) { 
    error_log("Database Connection Failed: " . $e->getMessage());
     
    die("We are experiencing technical difficulties. Please try again later.");
}
?>