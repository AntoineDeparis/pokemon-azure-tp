<?php
function logConnectionAttempt($pseudo, $success) {
    $logDir = getenv('HOME') . '/LogFiles/';
    
    if (!file_exists($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $logFile = $logDir . 'pokemon-app-logs.txt';

    $currentDateTime = date('Y-m-d H:i:s');
    $userIP = $_SERVER['REMOTE_ADDR'];

    $status = $success ? "Connexion réussie" : "Échec de la connexion";

    $logEntry = "/*              *\\\n" .
                "----- " . $pseudo . " -----\n" .
                "Date de connexion : $currentDateTime\n" .
                "IP : $userIP\n" .
                "Statut : $status\n" . 
                "----- [Login] -----\n\n"
                ;

    file_put_contents($logFile, $logEntry, FILE_APPEND);
    
    error_log("Connexion utilisateur: $pseudo - Statut: $status");
}