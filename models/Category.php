<?php

class Category extends Connect
{
    public function getAll()
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "SELECT * FROM categorias";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "SELECT * FROM categorias WHERE id= $id";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(String $nombre)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "INSERT INTO categorias (id, nombre) VALUES(null, '$nombre');";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Update(int $id, String $nombre)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "UPDATE categorias SET nombre = '$nombre' WHERE id= '$id';";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Delete(int $id)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "DELETE FROM categorias WHERE id= '$id';";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}