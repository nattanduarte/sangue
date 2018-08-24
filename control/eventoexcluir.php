<?php

include_once '../model/Evento.php';
include_once '../dao/EventoDAO.php';

$id = $_POST['id'];


$eventoDAO = new EventoDAO();
$eventoDAO->excluir($id);