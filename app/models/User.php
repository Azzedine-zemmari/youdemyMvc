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
        $_SESSION['user_role'] = $user->role;
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
    public function getAllEnseignants(){
        $this->db->query("select * from users where role = :role");
        $this->db->bind(":role",'Enseignant');
        return $this->db->resultSet();
    }
    public function validateEnseignant($id){
        $this->db->query("update users set status = :status where id = :id");
        $this->db->bind(":status",'active');
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function desactivateEnseignant($id){
        $this->db->query("update users set status = :status where id = :id");
        $this->db->bind(":status",'desactive');
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function topthreeTeachers(){
        $this->db->query("SELECT u1.name, COUNT(favoris.cours_id) AS enrolle_count
        FROM users u1
        JOIN cours ON cours.enseignantid = u1.id
        JOIN favoris ON favoris.cours_id = cours.idcours
        GROUP BY u1.id
        ORDER BY enrolle_count DESC
        LIMIT 3;");
        return $this->db->resultSet();
    }
    public function CourCount()
    {
        $this->db->query("select count(*) as total from cours");
        return $this->db->single();
    }
}