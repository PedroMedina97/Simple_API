<?php

class User extends Connect
{
    public function getAll()
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "SELECT * FROM usuarios";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "SELECT * FROM usuarios WHERE id= $id";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(String $nombre)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "INSERT INTO usuarios (id, nombre) VALUES(null, '$nombre');";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Update(int $id, String $nombre)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "UPDATE usuarios SET nombre = '$nombre' WHERE id= '$id';";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Delete(int $id)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "DELETE FROM usuarios WHERE id= '$id';";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}