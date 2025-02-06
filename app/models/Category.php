<?php

class Category{
    private $db ;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function addCategory($category){
        $this->db->query("insert into category(nom) values(:nom)");
        $this->db->bind(":nom",$category);
        return $this->db->execute();
    }
    public function showCategory(){
        $this->db->query("select * from category");
        return $this->db->resultSet();
    }
    public function deleteCategory($id){
        $this->db->query("delete from category where idcategory = :idcategory ");
        $this->db->bind(":idcategory",$id);
        return $this->db->execute();
    }
}