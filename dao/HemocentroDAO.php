<?php
include_once '../dao/Conexao.php';
include_once '../model/Hemocentro.php';

class HemocentroDAO
{

    function excluir($id)
    {
        try {
            $pdo = Conexao::connect();
            $stmt = $pdo->prepare('DELETE from hemocentro where id = :id');
            $stmt->execute(array(
                ':id' => $id
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
     function adicionar($hemocentro)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'INSERT hemocentro (nome,endereco,telefone) VALUES (:nome,:endereco,:telefone)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome' => $hemocentro->getNome(),
                ':endereco' => $hemocentro->getEndereco(),
                ':telefone' => $hemocentro->getTelefone()
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
            $sql = 'SELECT * FROM hemocentro where nome like :nome';
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' => $nome
            ));
            
            $hemocentros = array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $hemocentro = new Hemocentro($linha['nome'],$linha['endereco'],$linha['telefone']);
                $hemocentro->setId($linha['id']);
                $hemocentros[]= $hemocentro;
            }
           
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
       return $hemocentros;
    }
}

