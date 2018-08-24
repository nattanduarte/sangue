<?php

include_once '../model/Hemocentro.php';
include_once '../dao/HemocentroDAO.php';

$id = $_POST['id'];


$hemocentroDAO = new HemocentroDAO();
$hemocentroDAO->excluir($id);