<?php
class Evento
{
    private $id; 
    private $nome;
    private $local;
    private $organizador;
    private $participante;
    private $data;
   
    
   /* public function __construct($local,$organizador,$participante,$data,$nome)
    {
        $this->local = $local;
        $this->organizador = $organizador;
        $this->participante = $participante;
        $this->data = $data;
        $this->nome = $nome;
    }*/
    public function getId()
    {
        return $this->id;
    }

    public function getLocal()
    {
        return $this->local;
    }

    public function getOrganizador()
    {
        return $this->organizador;
    }

    public function getParticipante()
    {
        return $this->participante;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLocal($local)
    {
        $this->local = $local;
    }

    public function setOrganizador($organizador)
    {
        $this->organizador = $organizador;
    }

    public function setParticipante($participante)
    {
        $this->participante = $participante;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    
    
}

