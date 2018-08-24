<?php
include_once '../dao/Conexao.php';
include_once '../model/Evento.php';

class EventoDAO
{

    function excluir($id)
    {
        try {
            $pdo = Conexao::connect();
            $stmt = $pdo->prepare('DELETE from evento where id = :id');
            $stmt->execute(array(
                ':id' => $id
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
     function adicionar($evento)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'INSERT evento (nome,local,organizador,participante,data) VALUES 
            (:nome,:local,:organizador,:participante,:data)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome' => $evento->getNome(),
                ':local' => $evento->getLocal(),
                ':organizador' => $evento->getOrganizador(),
                ':participante' => $evento->getParticipante(),
                ':data' => $evento->getData()
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function listar($nome)
    {
        $nome = '%' . $nome . '%';
        try {
            $pdo = Conexao::connect();
            $sql = 'SELECT * FROM evento where nome like :nome';
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' => $nome
            ));
            
            $eventos = array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $evento = new Evento();
                $evento->setId($linha['id']);
                $evento->setNome($linha['nome']);
                $evento->setLocal($linha['local']);
                $evento->setOrganizador($linha['organizador']);
                $evento->setParticipante($linha['participante']);
                $evento->setData($linha['data']);            
                $eventos[]= $evento;
            }
           
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
        return  $eventos;
    }
}

