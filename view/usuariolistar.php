<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form action="/sangue/control/usuariobuscar.php">
		<label for="nome">Nome</label>
		<input type="text" name="nome">
		<input type="submit">
	</form>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Endereco</td>
			<td>Email</td>
			<td>Nome</td>
			<td>Idade</td>
			<td>Login</td>
		</tr>
		<?php 
		  include_once '../model/Usuario.php';
		  session_start();
		  if(isset($_SESSION['usuarios'])){
		      $usuarios=$_SESSION['usuarios'];
		      foreach ($usuarios as $u){
		          echo "<tr>";
		          echo "<td>".$u->getId() ."</td>";
		          echo "<td>".$u->getEndereco() ."</td>";
		          echo "<td>".$u->getEmail() ."</td>";
		          echo "<td>".$u->getNome() ."</td>";
		          echo "<td>". $u->getIdade()."</td>";
		          echo "<td>".$u->getLogin() ."</td>";
		          echo "</tr>";
		      }
		      unset($_SESSION['usuarios']);
		  }
		 
		?>
	</table>
</body>
</html>
<?php
