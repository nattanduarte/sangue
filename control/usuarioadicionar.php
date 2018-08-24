<?php
include_once '../model/Usuario.php';
include_once '../dao/UsuarioDAO.php';

$nome= $_GET['nome'];
$idade= $_GET['idade'];
$cpf= $_GET['cpf'];
$login=$_GET['login'];
$endereco= $_GET['endereco'];
$senha= $_GET['senha'];
$email= $_GET['email'];
$usuario = new Usuario();
$usuario->setNome($nome);
$usuario->setIdade($idade);
$usuario->setCpf($cpf);
$usuario->setLogin($login);
$usuario->setEndereco($endereco);
$usuario->setSenha($senha);
$usuario->setEmail($email);
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->adicionar($usuario);
