<?php

$servername = "089607.nl.mysql";
$username = "089607_nl89607beroeps";
$password = "89607Admin1";
$dbname = "089607_nl89607beroeps";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT spelnaam, spelbeschrijving, spelprijs FROM spellen";
$result = $conn->query($sql);

// Verwerk de gegevens
$games = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $games[] = $row;
    }
}

// Sluit de database-verbinding
$conn->close();

// Stuur de gegevens naar de webpagina als JSON
header('Content-Type: application/json');
echo json_encode($games);
?>