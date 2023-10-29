<?php
/* 






$servername = "localhost";
$username = "89607admin";
$password = "89607Admin1";
$dbname = "89607beroeps";

$conn = new mysqli($servername, $username, $password, $dbname);

Query de database

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










*/

// Database-verbinding met SQLite
$dbfile = 'beroeps.db';
$conn = new SQLite3($dbfile);

if (!$conn) {
    die("Kan geen verbinding maken met de database: " . $conn->lastErrorMsg());
}

// Query de database
$sql = "SELECT spelnaam, spelbeschrijving, spelprijs FROM spellen";
$result = $conn->query($sql);

// Verwerk de gegevens
$games = array();
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $games[] = $row;
}

// Sluit de database-verbinding
$conn->close();

// Stuur de gegevens naar de webpagina als JSON
header('Content-Type: application/json');
echo json_encode($games);
?>