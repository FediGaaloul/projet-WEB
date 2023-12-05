const WebSocket = require('ws');

// Création du serveur WebSocket sur le port 8080
const wss = new WebSocket.Server({ port: 8080 });

wss.on('connection', (ws) => {
  console.log('Nouvelle connexion établie.');

  // Écoute des messages envoyés par le client
  ws.on('message', (message) => {
    console.log(`Message reçu : ${message}`);

    // Envoyer un message de confirmation au client
    ws.send('Message reçu par le serveur.');
  });

  // Gérer la déconnexion du client
  ws.on('close', () => {
    console.log('Connexion terminée.');
  });
});

console.log('Serveur WebSocket en cours d\'exécution sur le port 8080.');