<?php

class Product extends Connect
{
    public function getAll()
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "SELECT * FROM productos";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $connect = parent::Connection();
        parent::set_names();
        $sql = "SELECT * FROM productos WHERE id= $id";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(int $cat_id, String $nombre, String $descripcion, float $precio, float $stock){
        $connect = parent::Connection();
        parent::set_names();
        $sql = "INSERT INTO productos(id, categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) VALUES(null, '$cat_id', '$nombre', '$descripcion', '$precio', '$stock', null, 'CURDATE()', null);";
        $sql = $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}