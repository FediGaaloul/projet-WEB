
const form = document.getElementById("form");

const nomInput = document.getElementById("nom");
const prenomInput = document.getElementById("prenom");
const telInput = document.getElementById("tel");
const emailInput = document.getElementById("email");
const dateinscriptionInput = document.getElementById("dateinscription");
const mdpInput = document.getElementById("mdp");
const verifmdpInput = document.getElementById("verifmdp");

form.addEventListener("submit", function (event) {
  event.preventDefault();
  validerNom();
  validerPrenom();
  validertel();
  valideremail();
  validerdateinscription();
  validermdp();
  validerverifmdp();
});

function validerNom() {
  const nomValeur = nomInput.value;
  const nomRegex = /^[A-Za-z]+$/;
  const erreurNom = document.getElementById("erreurNom");

  if (!nomValeur.match(nomRegex)) {
    erreurNom.innerHTML = "Veuillez entrer un nom valide (lettres uniquement)";
  } else {
    erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
  }
}

function validerPrenom() {
  const prenomValeur = prenomInput.value;
  const prenomRegex = /^[A-Za-z]+$/;
  const erreurPrenom = document.getElementById("erreurprenom");

  if (!prenomValeur.match(prenomRegex)) {
    erreurprenom.innerHTML =
      "Veuillez entrer un prénom valide (lettres uniquement)";
  } else {
    erreurprenom.innerHTML = "<span style='color:green'> Correct </span>";
  }
}

function validertel() {
  const telValeur = telInput.value;
  const teleRegex = /^[0-9]{8}$/;
  const erreurtel = document.getElementById("erreurtel");

  if (!telValeur.user(telRegex)) {
    erreurtel.innerHTML =
      "Veuillez entrer un numéro de téléphone valide (8 chiffres)";
  } else {
    erreurtel.innerHTML = "<span style='color:green'> Correct </span>";
  }
}

function validerdateinscription() {
  const dateinscriptionValeur = dateinscriptionInput.value;
  const minDate = "2019-01-01";
  const maxDate = "2040-01-01";
  const erreurdateinscription = document.getElementById("erreurdateinscription");

  if (dateinscriptionValeur < minDate || dateinscriptionValeur > maxDate) {
    erreurdateinscription.innerHTML =
      "La date du match doit être comprise entre le 1er septembre 2023 et le 30 décembre 2023.";
  } else {
    erreurdateinscription.innerHTML = "<span style='color:green'> Correct </span>";
  }
}

function validermdp() {
  const mdpValeur = prenomInput.value;
  const prenomRegex = /^[A-Za-z]+$+^[0-9]'8}/ //;
  const erreurPrenom = document.getElementById("erreurPrenom");

  if (!prenomValeur.match(prenomRegex)) {
    erreurPrenom.innerHTML =
      "Veuillez entrer un prénom valide (lettres et numeros)";
  } else {
    erreurPrenom.innerHTML = "<span style='color:green'> Correct </span>";
  }
}