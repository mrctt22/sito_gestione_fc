<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli cliente</title>
</head>

<body>

    <?php
    include 'config.php';

    // Verifica se è stato fornito un ID valido
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $conn = mysqli_connect($host, $username, $password, $database);

        // Verifica connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Query per recuperare il record specifico
        $sql = "SELECT * FROM cliente WHERE id = $id"; // Modifica con il nome della tabella MySQL
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Visualizzazione dei dettagli del record
            $row = $result->fetch_assoc();
            echo "<h2>Dettagli cliente</h2>";
            echo "<p>ID: " . $row['id'] . "</p>"; // Modifica con il nome delle colonne nel tuo database
            echo "<p>Nome: " . $row['nome'] . "</p>";
            echo "<p>Cognome: " . $row['cognome'] . "</p>";
            echo "<p>Telefono: " . $row['telefono'] . "</p>";
        } else {
            echo "Nessun risultato trovato per questo ID";
        }

        // Chiudi connessione
        $conn->close();
    } else {
        echo "ID non valido";
    }
    ?>
    <p>
        <button onclick="history.back()">Indietro</button>
    </p>
    <p>
        <button onclick="window.location.href='index.html'">Home</button>
    </p>
</body>

</html>