// Récupérer le formulaire et le spinner par leur identifiant
const formGroup = document.querySelector('.formGroup');
const contactForm = document.getElementById('contactForm');
const spinner = document.getElementById('spinner');

// Ajouter un événement de soumission du formulaire
contactForm.addEventListener('submit', function (event) {
    // Empêcher l'envoi du formulaire par défaut
    event.preventDefault();

    // Cacher le message d'erreur
    formGroup.style.display = 'none';

    // Cacher le formulaire
    contactForm.style.display = 'none';

    // Afficher le spinner
    spinner.style.display = 'block';

    // Envoyer le formulaire après un court délai (pour simuler l'envoi)
    setTimeout(function () {
        
        // Envoyer le formulaire
        if (contactForm.submit()) {
            // Afficher le message d'erreur après l'envoi (à titre de démonstration)
            formGroup.style.display = 'block';
        } else {
            // N'afficher pas le message d'erreur après si l'envoi n'est toujours en cours
            formGroup.style.display = 'none';
        }
        

        
    }, 1500); // Vous pouvez ajuster le délai (en millisecondes) selon vos besoins
});