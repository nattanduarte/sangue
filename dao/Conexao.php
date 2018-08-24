<?php

class Conexao
{
   static function connect(){
        $pdo= new PDO('mysql:host=localhost; dbname=bdsistema','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

