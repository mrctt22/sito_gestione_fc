<!DOCTYPE html>
<html>

<head>
    <title>Elenco Record da MySQL</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <?php
    include 'config.php';

    // Connessione al database
    $conn = mysqli_connect($host, $username, $password, $database);

    // Verifica connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Query per recuperare i record
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Visualizzazione dei record in una tabella HTML
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Cognome</th><th>Telefono</th><th>Dettagli</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['cognome'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "<td><a href='dettagli_cliente.php?id=" . $row['id'] . "'>Dettagli</a></td>"; // Bottone che reindirizza alla pagina con l'id del record
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nessun risultato trovato";
    }

    // Chiudi connessione
    $conn->close();
    ?>
    <p>
        <button onclick="history.back()">Indietro</button>
    </p>
    <p>
        <button onclick="window.location.href='index.html'">Home</button>
    </p>
</body>

</html>