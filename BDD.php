<?php
try {
    $host = getenv('DB_HOST') ?: 'localhost';
    $dbname = getenv('DB_NAME') ?: 'pokemon';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: 'root';
    
    // Options PDO avec configuration SSL pour Azure MySQL
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_SSL_CA => true,          // Activer SSL
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false  // Ne pas vérifier le certificat du serveur
    ];
    
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password, $options);
    
    error_log('Connexion à la base de données réussie');
} catch (PDOException $e) {
    error_log('Erreur de connexion à la base de données: ' . $e->getMessage());
    die('Une erreur est survenue lors de la connexion à la base de données. Veuillez réessayer ultérieurement.');
}
?>
