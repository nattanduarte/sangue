<!DOCTYPE >
<html>
<head>
<meta charset="UTF-8" />
<title>Buscar evento</title>
</head>
<body>
	<form action="/sisvenda/control/eventobuscar.php" method="post">
		<label for="nome">Nome: </label> 
		<input type="text" name="nome" /> <input
			type="submit" />
	</form>
	<table border="1">
		<tr>
			<td>Id</td>
			<td>Nome</td>
			<td>Local</td>
			<td>Organizador</td>
			<td>Participante</td>
			<td>Data</td>
		</tr>
<?php
include_once '../model/Evento.php';
session_start();
if (isset($_SESSION['eventos'])) {
    $eventos = $_SESSION['eventos'];
    foreach ($eventos as $p) {
        echo "<tr>";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNome() . "</td>";
        echo "<td>" . $p->getLocal() . "</td>";
        echo "<td>" . $p->getOrganizador() . "</td>";
        echo "<td>" . $p->getParticipante() . "</td>";
        echo "<td>" . $p->getData() . "</td>";      
        echo "</tr>";
    }
    unset($_SESSION['eventos']);
}
?>
</table>
</body>
</html>

