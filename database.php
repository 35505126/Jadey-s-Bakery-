<?php
$dsn  = 'mysql:host=127.0.0.1;dbname=jadeys_bakery;charset=utf8mb4';
$user   = 'username';
$pass   = 'password';
$charset= 'utf8mb4';

$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
  http_response_code(500);
  echo "Database connection failed.";
  exit;
}
