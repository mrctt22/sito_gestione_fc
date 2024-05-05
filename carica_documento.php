<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carica Documento</title>
</head>
<body>

<?php
include 'config.php';

// Verifica id cliente 
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
}

// Imposta cartella di destinazione
$targetDir = "documenti\\".$id."\\"; // percorso della cartella di destinazione

// Verifica se la cartella non esiste già
if (!file_exists($targetDir)) {
    // Crea la cartella
    if (mkdir($targetDir, 0777, true)) {
        echo "La cartella è stata creata con successo.";
    } else {
        echo "Si è verificato un errore durante la creazione della cartella.";
    }
} else

// Verifica se il modulo di caricamento è stato inviato
if (isset($_POST["submit"])) {
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Verifica se il file esiste già
    if (file_exists($targetFile)) {
        echo "Il file esiste già.";
        $uploadOk = 0;
    }

    // Controlla il formato del file
    if(!in_array($fileType, $file_ext)) {
        echo "Estensione file non consentita";
        $uploadOk = 0;
    }

    // Verifica se $uploadOk è stato impostato a 0 a causa di un errore
    if ($uploadOk == 0) {
        echo "Il file non è stato caricato.";
    } else {
        // Prova a caricare il file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "Il file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " è stato caricato nella cartella ".$targetDir;
        } else {
            echo "Si è verificato un errore durante il caricamento del file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " nella cartella ".$targetDir;
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    Seleziona il file da caricare:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Carica Documento" name="submit">
</form>

</body>
</html>