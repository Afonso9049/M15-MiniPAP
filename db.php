<?php
// Database configuration
$dbHost = 'localhost'; // Endereço do servidor MySQL
$dbName = 'loginsystem'; // Nome do banco de dados
$dbUser = 'root'; // Nome de usuário do MySQL
$dbPass = ''; // Senha do MySQL

// Attempt database connection using PDO
try {
    $con = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}