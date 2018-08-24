<!DOCTYPE >
<html>
<head>
<meta charset="UTF-8" />
<title>Buscar hemocentro</title>
</head>
<body>
	<form action="/sangue/control/hemocentrobuscar.php" method="get">
		<label for="nome">Nome: </label> <input type="text" name="nome" /> <input
			type="submit" />
	</form>
	<table border="1">
		<tr>
			<td>Id</td>
			<td>Nome</td>
			<td>Endereço</td>
			<td>Telefone</td>
		</tr>
<?php
include_once '../model/Hemocentro.php';
session_start();
if (isset($_SESSION['hemocentros'])) {
    $hemocentros = $_SESSION['hemocentros'];
    foreach ($hemocentros as $p) {
        echo "<tr>";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNome() . "</td>";
        echo "<td>" . $p->getEndereco() . "</td>";
        echo "<td>" . $p->getTelefone() . "</td>";
        echo "</tr>";
    }
    unset($_SESSION['hemocentros']);
}
?>
</table>
</body>
</html>

