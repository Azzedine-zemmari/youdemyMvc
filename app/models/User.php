<?php

class User{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getUsers(){
        $this->db->query("select * from users");
        return $this->db->resultSet();
    }
    public function register($data){
        $this->db->query("insert into users(name,email,password,status,role) values(:name,:email,:password,:status,:role)");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":password",$data['password']);
        $this->db->bind(":status",'wait');
        $this->db->bind(":role",$data['role']);


        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }
}