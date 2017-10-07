<?php
class Categorias extends model{
    public function getLista(){
        $array = array();
        $sql = $this->db->query("SELECT * FROM categorias");
        $sql = $sql->fetchAll();
        if($sql && count($sql)){
            return $sql;
        }
        return $array;
    }

    public function getTags($nivel){
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM tag_name WHERE nivel = ?");
        $sql->execute(array($nivel));
        $sql = $sql->fetchAll();
        if($sql && count($sql)){
            return $sql;
        }
        return $array;
    }
}