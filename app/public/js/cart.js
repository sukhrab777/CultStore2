// Fonction qui affiche dynamiquement les produits dans le panier
function afficherContenuPanier() {
    // On récupère le panier depuis le localStorage (ou un objet vide si rien n'est stocké)
    const cart = JSON.parse(localStorage.getItem('cart')) || {};

    // On sélectionne la div dans laquelle on veut afficher le contenu du panier
    const divContenu = document.getElementById('cart-content');

    // On vide cette div avant d'afficher les nouveaux éléments
    divContenu.innerHTML = '';

    // Si le panier est vide, on affiche un message et on quitte la fonction
    if (Object.keys(panier).length === 0) {
        divContenu.innerHTML = '<p>Votre panier est vide.</p>';
        return;
    }

    // Sinon, on parcourt les produits présents dans le panier
    for (const [id, product ] of Object.entries(cart)) {
        // Pour chaque produit, on crée un élément <div> pour afficher ses infos
        const ligne = document.createElement('div');

        // On insère dans cette div les informations du produit et un bouton "Supprimer"
        ligne.innerHTML = `
            <p><strong>${product.name}</strong> - ${product.prix} € x ${produit.quantite}</p>
            <button class="supprimer" data-id="${id}">Supprimer</button>
        `;//Description price, stock, picture,

        // On ajoute cette div dans le panier affiché à l’écran
        divContenu.appendChild(ligne);
    }

    // On ajoute un événement "click" à chaque bouton "Supprimer"
    document.querySelectorAll('.supprimer').forEach(bouton => {
        bouton.addEventListener('click', () => {
            // Quand on clique sur "Supprimer", on supprime le produit du localStorage
            supprimerDuPanier(bouton.dataset.id);

            // Puis on réaffiche le panier mis à jour
            afficherContenuPanier();

            // Et on met à jour le compteur (dans le header par exemple)
            majAffichagePanier();
        });
    });
}

// Fonction qui supprime un produit du panier (dans le localStorage)
function supprimerDuPanier(id) {
    // On récupère le panier actuel
    const panier = JSON.parse(localStorage.getItem('panier')) || {};

    // On supprime le produit dont l'id est passé en paramètre
    delete panier[id];

    // On sauvegarde le nouveau panier dans le localStorage
    localStorage.setItem('panier', JSON.stringify(panier));
}

// Si on est bien sur la page qui contient la div #contenu-panier
// (donc la page panier), alors on affiche le contenu du panier au chargement
if (document.getElementById('contenu-panier')) {
    afficherContenuPanier();
}
