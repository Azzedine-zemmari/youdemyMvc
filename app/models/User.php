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
    public function login($email,$password){
        $this->db->query("select * from users where email = :email");
        $this->db->bind(":email",$email);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if(password_verify($password,$hashedPassword)){
            return $row;
        }
        else{
            return false;
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        header("Location: ".URLROOT."/Pages/index");
    }

    public function findByEmail($email){
        $this->db->query("select * from users where email = :email");
        $this->db->bind(":email",$email);
        $this->db->single();
        if($this->db->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}