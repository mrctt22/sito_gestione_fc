<!DOCTYPE html>
<html lang="en">

<head>
	<title>Inserimento nuovo cliente</title>
</head>

<body>
	<center>
		<h1>Inserimento nuovo cliente</h1>
		<form action="inserisci_cliente_esito.php" method="post">

			<p>
				<label for="nome">Nome:</label>
				<br>
				<input type="text" name="nome" id="nome">
			</p>

			<p>
				<label for="cognome">Cognome:</label>
				<br>
				<input type="text" name="cognome" id="cognome">
			</p>

			<p>
				<label for="telefono">Telefono:</label>
				<br>
				<input type="text" name="telefono" id="telefono">
			</p>

			<input type="submit" value="Inserisci">

		</form>

		<p>
			<button onclick="history.back()">Indietro</button>
		</p>
		<p>
			<button onclick="window.location.href='index.html'">Home</button>
		</p>
	</center>
</body>


</html>