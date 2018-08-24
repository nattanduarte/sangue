<?php
include_once '../model/Usuario.php';
include_once '../dao/Conexao.php';

class UsuarioDAO
{
    public function listar($nome){
        $nome= "%".$nome."%";
        try{
        $pdo= Conexao::connect();
        $sql="Select id, email, nome, idade, login, endereco FROM usuario where nome like :nome";
        $consulta= $pdo->prepare($sql);
        $consulta->execute(array(
            ':nome'=>$nome
        ));
        $usuarios= Array();
        while($linha= $consulta->fetch(PDO::FETCH_ASSOC)){
            $usuario= new Usuario();
            $usuario->setId($linha['id']);
            $usuario->setEmail($linha['email']);
            $usuario->setNome($linha['nome']);
            $usuario->setIdade($linha['idade']);
            $usuario->setLogin($linha['login']);
            $usuario->setEndereco($linha['endereco']);
            $usuarios[]=$usuario;
        }
        }catch (PDOException $e){
            echo "Error: " .$e->getMessage();
        }
        return $usuarios;
    }
    
    public function adicionar($cliente)
    {
        try {
            $pdo= Conexao::connect();
            $sql= 'INSERT usuario(email,nome, idade, login, senha, endereco) VALUES(:email,:nome,:idade,:login,:senha, :endereco)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':email'=> $cliente->getEmail(),
                ':nome'=> $cliente->getNome(),
                ':endereco'=> $cliente->getEndereco(),
                ':idade'=> $cliente->getIdade(),
                ':login'=> $cliente->getLogin(),
                ':senha'=> $cliente->getSenha()
            ));
        }catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
       }
    
    public function excluir($id)
    {
        try {
            $pdo = Conexao::connect();
            $stmt = $pdo->prepare('DELETE from usario where id= :id');
            $stmt->execute(array(
                ':id' => $id
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

