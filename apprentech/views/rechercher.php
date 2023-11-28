<?php
include_once '../controller/coursC.php';

$coursC = new coursC();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['searchTerm'])) {
    $term = $_GET['searchTerm'];
    $results = $coursC->recherchercours($term);
    // Affichez les résultats comme vous le souhaitez
}
?>

<!-- Le formulaire de recherche -->
<form action="recherchercours.php" method="GET">
    <label for="searchTerm">Recherche par titre :</label>
    <input type="text" name="searchTerm" id="searchTerm">
    <button type="submit">Rechercher</button>
</form>