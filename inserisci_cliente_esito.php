<!DOCTYPE html>
<html>

<head>
	<title>Inserimento nuovo cliente</title>
</head>

<body>
	<center>
		<?php
		include 'config.php';

		$conn = mysqli_connect($host, $username, $password, $database);

		// Check connection
		if ($conn === false) {
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

		// Taking all values from the form data(input)
		$nome = $_REQUEST['nome'];
		$cognome = $_REQUEST['cognome'];
		$indirizzo = $_REQUEST['indirizzo'];
		$telefono = $_REQUEST['telefono'];

		// Performing insert query execution
		$sql = "INSERT INTO cliente VALUES (null, '$nome', 
			'$cognome','$indirizzo','$telefono')";

		if (mysqli_query($conn, $sql)) {
			echo "<h3>Nuovo cliente salvato con successo!</h3>";

			echo nl2br("\n$nome\n $cognome\n $indirizzo\n $telefono");
		} else {
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}

		// Close connection
		mysqli_close($conn);
		?>

		<p>
			<button onclick="history.back()">Indietro</button>
		</p>
		<p>
			<button onclick="window.location.href='index.html'">Home</button>
		</p>
	</center>
</body>

</html>