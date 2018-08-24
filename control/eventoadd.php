<?php
include_once '../model/Evento.php';
include_once '../dao/EventoDAO.php';

extract($_POST);

$evento = new Evento($nome,$local,$organizador,$participante,$data);


$eventoDAO = new EventoDAO();
$eventoDAO->adicionar($evento);