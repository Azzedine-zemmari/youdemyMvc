<?php

class Tag
{
private  $db;
public function __construct()
{
    $this->db = new Database();
}
public function getAllTags(){
    $this->db->query("select * from tags");
   return  $this->db->resultSet();
}
    public function delete($id){
        $this->db->query("delete from tags where idtag = :id ");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function addTag($tag){
        $this->db->query("insert into tags(nom) values(:nom)");
        $this->db->bind(":nom",$tag);
        return $this->db->execute();
    }
}