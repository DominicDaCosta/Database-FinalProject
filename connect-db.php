<?php
// Database credentials
$username = 'qdl2pqs'; 
$password = 'B@con@vocado!';
$host = 'mysql01.cs.virginia.edu';
$dbname = 'qdl2pqs';
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    // Connect to the database using PDO
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    // DB Security -PDO statements
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    
    // Example of fetching data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Example of password verification using password_verify
    if ($user && password_verify($password, $user['password'])) {
        // Authentication successful
        echo "Authentication successful";
    } else {
        // Authentication failed
        echo "Authentication failed";
    }
} catch (PDOException $e) {
    $error_message = $e->getMessage();        
    echo "<p>An error occurred while connecting to the database: $error_message </p>";
} catch (Exception $e) {
    $error_message = $e->getMessage();
    echo "<p>Error message: $error_message </p>";
}
?>
