<?php
include_once '../model/Hemocentro.php';
include_once '../dao/HemocentroDAO.php';

extract($_GET);
$hemocentros = Array();

$hemocentroDAO = new HemocentroDAO();
 $hemocentros=$hemocentroDAO->listar($nome);
session_start();
$_SESSION['hemocentros'] = $hemocentros;
header('Location: /sangue/view/hemocentrolistar.php');