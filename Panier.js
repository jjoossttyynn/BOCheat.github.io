let panier = [];

function ajouterAuPanier(id, nom, prix) {
    let produitExistant = panier.find(p => p.id === id);
    if (produitExistant) {
        produitExistant.quantite++;
    } else {
        panier.push({ id, nom, prix, quantite: 1 });
    }

    miseAJourPanier();
}
function miseAJourPanier() {
    document.getElementById('panier-count').textContent = panier.reduce((total, produit) => total + produit.quantite, 0);
    let panierItems = document.getElementById('panier-items');
    panierItems.innerHTML = ''; 
    if (panier.length === 0) {
        panierItems.innerHTML = '<li>Aucun produit dans le panier</li>';
    } else {    
        panier.forEach(produit => {
            panierItems.innerHTML += `<li>${produit.nom} x${produit.quantite} - ${produit.prix.toFixed(2)} €</li>`;
        });
    }

    let total = panier.reduce((total, produit) => total + produit.prix * produit.quantite, 0);
    document.getElementById('panier-total-amount').textContent = total.toFixed(2);
}


function viderPanier() {
    panier = [];
    miseAJourPanier();
}
