<?php
// Spajanje na bazu
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=to_do", $username, $password);
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  #echo "Connected successfully";
} catch(PDOException $e) {
  #echo "Connection failed: " . $e->getMessage();
}
?>