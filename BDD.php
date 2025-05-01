<?php
try {
    $host = getenv('DB_HOST') ?: 'localhost';
    $dbname = getenv('DB_NAME') ?: 'pokemon';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: 'root';
    
    echo "Tentative de connexion à: $host, base $dbname avec l'utilisateur $user<br>";
    
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_SSL_CA => true,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
    ];
    
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password, $options);
    
    echo "Connexion réussie à la base de données!";
    error_log('Connexion à la base de données réussie');
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
    error_log('Erreur de connexion à la base de données: ' . $e->getMessage());
    die();
}
?>
