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

function logRegisterAttempt($pseudo, $success) {
    $logDir = getenv('HOME') . '/LogFiles/';
    
    if (!file_exists($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $logFile = $logDir . 'pokemon-app-logs.txt';

    $currentDateTime = date('Y-m-d H:i:s');
    $userIP = $_SERVER['REMOTE_ADDR'];

    $status = $success ? "Inscription réussie" : "Échec de l'inscription";

    $logEntry = "/*              *\\\n" .
               "----- " . $pseudo . " -----\n" .
               "Date d'inscription : $currentDateTime\n" .
               "IP : $userIP\n" .
               "Statut : $status\n" . 
               "----- [Register] -----\n\n";

    file_put_contents($logFile, $logEntry, FILE_APPEND);
    
    error_log("Inscription utilisateur: $pseudo - Statut: $status");
}

function logLogout($pseudo) {
    $logDir = getenv('HOME') . '/LogFiles/';
    
    if (!file_exists($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $logFile = $logDir . 'pokemon-app-logs.txt';

    $currentDateTime = date('Y-m-d H:i:s');
    $userIP = $_SERVER['REMOTE_ADDR'];

    $logEntry = "/*              *\\\n" .
               "----- " . $pseudo . " -----\n" .
               "Date de déconnexion : $currentDateTime\n" .
               "IP : $userIP\n" .
               "Statut : Déconnexion\n" . 
               "----- [Logout] -----\n\n";

    file_put_contents($logFile, $logEntry, FILE_APPEND);
    
    error_log("Déconnexion utilisateur: $pseudo");
}
