<?php
include_once '../dao/UsuarioDAO.php';
$nome=$_GET['nome'];

$usuarioPDO= new UsuarioDAO();
$usuarios= $usuarioPDO->listar($nome);

session_start();
$_SESSION['usuarios']=$usuarios;

header('Location: /sangue/view/usuariolistar.php');