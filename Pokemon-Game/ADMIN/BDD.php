<?php
try {
    $host = getenv('DB_HOST') ?: 'localhost';
    $dbname = getenv('DB_NAME') ?: 'pokemon';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: 'root';
    
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
    
    error_log('Connexion à la base de données réussie');
} catch (PDOException $e) {
    error_log('Erreur de connexion à la base de données: ' . $e->getMessage());
    die('Une erreur est survenue lors de la connexion à la base de données. Veuillez réessayer ultérieurement.');
}
?>