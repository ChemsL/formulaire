function toggleMenu() {
    var navLinks = document.querySelector('.navLinks');
    navLinks.classList.toggle('active');
    
    updateNavLinks();
}

// Fonction pour mettre à jour les liens de navigation en fonction de la largeur de l'écran
function updateNavLinks() {
    var navLinks = document.querySelector('.navLinks');
    var linksContainer = document.querySelector('.navLinks');
    var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    if (screenWidth <= 768) {
        // En mode mobile, afficher uniquement les icônes
        if (navLinks.classList.contains('active')) {
            linksContainer.innerHTML = `
                <a href="../controllers/controller-signin.php"><i class="bi bi-box-arrow-left"></i></a>
                <a href="../controllers/controller-profile.php"><i class="bi bi-person-circle"></i></a>
                <a href="../controllers/controller-historique.php"><i class="bi bi-clock-history"></i></a>
                <a href="../controllers/controller-trajet.php"><i class="bi bi-plus-lg"></i></a>
            `;
        } else {
            // Restaurer le contenu original
            linksContainer.innerHTML = originalLinksContent;
        }
    }
}

// Fonction pour basculer la classe 'active' et mettre à jour les liens de navigation


// Exécution initiale
var originalLinksContent = document.querySelector('.navLinks').innerHTML;

// Ajouter un écouteur d'événements pour le clic sur le menu burger
var burgerMenu = document.querySelector('.burger-menu');
burgerMenu.addEventListener('click', toggleMenu);

// Écouteur d'événements pour redimensionner la fenêtre
window.addEventListener('resize', updateNavLinks);

function confirmDelete() {
    // Affiche une boîte de dialogue pour demander confirmation
    var result = confirm('Voulez-vous réellement supprimer ce trajet ?');

    // Si l'utilisateur clique sur "OK", le formulaire sera soumis
    // Sinon, le formulaire ne sera pas soumis
    return result;
}
