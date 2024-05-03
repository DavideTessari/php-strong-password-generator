<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali. -->

<?php
session_start();
include 'functions.php';

if (isset($_GET['length'])) {
    $passwordLength = intval($_GET['length']);
    if ($passwordLength >= 8 && $passwordLength <= 32) {
        $generatedPassword = generatePassword($passwordLength);
        $_SESSION['generated_password'] = $generatedPassword;
        header("Location: show_password.php"); 
        exit();
    } else {
        $_SESSION['error_message'] = "La lunghezza della password deve essere compresa tra 8 e 32 caratteri.";
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password Sicure</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h2>Generatore di Password Sicure</h2>
        <form action="index.php" method="GET">
            <label for="length">Lunghezza della password:</label>
            <input type="number" id="length" name="length" min="8" max="32" required>
            <button type="submit">Genera Password</button>
        </form>
    </div>
</body>
</html>


