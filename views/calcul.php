<?php
session_start();

function isActionAllowed($actionName, $timeLimitInSeconds) {
    // Vérifier si l'action a déjà été demandée précédemment
    if (isset($_SESSION[$actionName.'_timestamp'])) {
        $currentTime = time();
        $previousTime = $_SESSION[$actionName.'_timestamp'];

        // Calculer la différence entre l'heure actuelle et l'heure de l'action précédente
        $timeDifference = $currentTime - $previousTime;

        // Vérifier si le délai est dépassé
        if ($timeDifference <= $timeLimitInSeconds) {
            // L'action n'est pas autorisée, car le délai n'est pas écoulé
            return false;
        }
    }

    // Enregistrer le nouveau timestamp pour l'action demandée
    $_SESSION[$actionName.'_timestamp'] = time();

    // L'action est autorisée, car le délai est écoulé ou c'est la première fois que l'action est demandée
    return true;
}

// Exemple d'utilisation pour valider un compte
$timeLimitInSeconds = 60; // Temps limite en secondes (ici, 1 minute)
$actionName = 'validation_compte';

if (isActionAllowed($actionName, $timeLimitInSeconds)) {
    // Autoriser la validation du compte (votre code pour valider le compte ici)
    echo "Compte validé avec succès!";
} else {
    // Le délai n'est pas encore écoulé, rediriger ou afficher un message d'erreur
    echo "Délai d'attente non écoulé, veuillez réessayer plus tard.";
}
?>

