<?php
// Database connection
$host = 'localhost';
$dbname = 'attendance_system';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get saved files
    $query = "SELECT name, uploaded_at FROM uploaded_files ORDER BY uploaded_at DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($files);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
