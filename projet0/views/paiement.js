function validateForm() {
    var nomCarte = document.getElementById('nom_carte').value;
    var numCarte = document.getElementById('n_carte').value;
    var dateExpiration = document.getElementById('d_expiration').value;
    var cryptogramme = document.getElementById('Cryptogramme').value;
    if (nomCarte.trim() === '') {
        alert('Veuillez saisir le nom sur la carte.');
        return false;
    }

    if (numCarte.length !== 16 || isNaN(numCarte)) {
        alert('Veuillez saisir un numéro de carte valide.');
        return false;
    }
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth() + 1; 

    if (dateExpiration.length !== 4 || isNaN(dateExpiration) || dateExpiration.substring(0, 2) > 12 || dateExpiration.substring(0, 2) < currentMonth || dateExpiration.substring(2) < currentYear % 100) {
        alert('Veuillez saisir une date d\'expiration valide.');
        return false;
    }
    if (cryptogramme.trim() === '') {
        alert('Veuillez saisir le cryptogramme visuel.');
        return false;
    }
    return true;
    
}