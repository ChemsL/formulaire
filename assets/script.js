

// Fonction pour basculer la classe 'active' et mettre à jour les liens de navigation


// Exécution initiale
var originalLinksContent = document.querySelector('.navLinks').innerHTML;

// Ajouter un écouteur d'événements pour le clic sur le menu burger
var burgerMenu = document.querySelector('.burger-menu');
burgerMenu.addEventListener('click', toggleMenu);

// Écouteur d'événements pour redimensionner la fenêtre
window.addEventListener('resize', updateNavLinks);


