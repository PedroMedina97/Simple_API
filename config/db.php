<?php

class Connect{
    protected $db;

    protected function Connection(){
        try {
            $connect = $this->db = new PDO("mysql:local=localhost;dbname=vialsref_vials","root","");
            return $connect;
        } catch (Exception $e) {
            print "¡Error Database! ". $e->getMessage();-"<br>";
            die();
        }
    }

        public function set_names(){
            return $this->db->query("SET NAMES utf8");
        }
}