<?php

class Cour
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllCourses(){
        $this->db->query("select * from cours");
        return $this->db->resultSet();
    }

}