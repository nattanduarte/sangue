<?php
include_once '../model/Hemocentro.php';
include_once '../dao/HemocentroDAO.php';

extract($_POST);

$hemocentro = new Hemocentro($nome,$endereco,$telefone);


$hemocentroDAO = new HemocentroDAO();
$hemocentroDAO->adicionar($hemocentro);