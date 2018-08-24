<?php
include_once '../model/Evento.php';
include_once '../dao/EventoDAO.php';

extract($_POST);
$eventos = Array();

$eventoDAO = new EventoDAO();
$eventos = $eventoDAO->listar($nome);
session_start();
$_SESSION['eventos'] = $eventos;
header('Location: /sangue/view/eventolistar.php');