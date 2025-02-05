<?php

class Cour
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCourses()
    {
        $this->db->query("SELECT cours.*,category.nom AS CategoryName,users.name AS Enseignant,
       STRING_AGG(tags.nom, ', ') AS tags
FROM cours
left JOIN category ON category.idCategory = cours.categoryid
left JOIN users ON users.id = cours.enseignantid
left JOIN cours_tags ON cours.idcours = cours_tags.cours_id
left JOIN tags ON tags.idtag = cours_tags.tag_id
GROUP BY cours.idcours, category.nom, users.name");
        return $this->db->resultSet();
    }

    public function getCategories(){
        $this->db->query('select * from category ');
        return $this->db->resultSet();
    }
    public function getTags(){
        $this->db->query("select * from tags");
        return $this->db->resultSet();
    }
    public function insertCours($data){
        if(isset($data['content'])){
            $field = "contenu";
            $value = $data['content'];
            $type = "text";
        }
        else if(isset($data['vedeo'])){
            $field = "vedeo";
            $value = $data['vedeo'];
            $type = "vedeo";
        }
        else{
            return false;
        }
        try{
            $this->db->beginTransaction();
            $this->db->query("insert into cours(titre,description,$field,categoryid,enseignantid,datecreation,type,price) 
            values(:titre,:description,:$field,:categoryId,:enseignantId,:dateCreation,:type,:price)");
            $this->db->bind(":titre",$data['titre']);
            $this->db->bind(":description",$data['description']);
            $this->db->bind(":$field",$value);
            $this->db->bind(":categoryId",$data['categorieId']);
            $this->db->bind(":enseignantId",$data['enseignat_id']);
            $this->db->bind(":dateCreation", date('Y-m-d H:i:s'));
            $this->db->bind(":type",$type);
            $this->db->bind(":price",$data['price']);

            if(!$this->db->execute()){
                throw new Exception("Failed to insert the cour");
            }

                $lastId = $this->db->lastInsertId('cours_idcours_seq');
                foreach ($data['tags'] as $tag){
                    $this->db->query("insert into cours_tags(cours_id,tag_id) values (:cours_id,:tag_id)");
                    $this->db->bind(":cours_id",$lastId);
                    $this->db->bind(":tag_id",$tag);
                    if (!$this->db->execute()) {
                        throw new Exception("Failed to insert tag with ID: $tag");
                    }
                }

                $this->db->commit();
                return true;
        }catch (Exception $e){
            $this->db->rollBack();
            echo "Error".$e->getMessage();
            return false;
        }


    }
    public function searchCourse($search){
        $this->db->query("select * from cours where titre like :search");
        $this->db->bind(":search",'%'.$search.'%');
        $this->db->resultSet();
    }

    public function getCourById($id){
        $this->db->query("select * from cours WHERE idcours = :id ");
        $this->db->bind(":id",$id);
        return  $this->db->single();
    }
        public function updateCours($data, $id) {
            $type = isset($data['content']) ? 'text': 'vedeo';
            $this->db->query("UPDATE cours 
                  SET titre = :titre, 
                      description = :description, 
                      contenu = :contenu, 
                      vedeo = :vedeo, 
                      categoryid = :categoryId, 
                      enseignantid = :enseignantId, 
                      datecreation = :dateCreation, 
                      type = :type, 
                      price = :price 
                  WHERE idcours = :id");

            $this->db->bind(":titre", $data['titre']);
            $this->db->bind(":description", $data['description']);
            $this->db->bind(":contenu", isset($data['content']) ? $data['content'] : null);
            $this->db->bind(":vedeo", isset($data['vedeo']) ? $data['vedeo'] : null);
            $this->db->bind(":categoryId", $data['categorieId']);
            $this->db->bind(":enseignantId", $data['enseignat_id']);
            $this->db->bind(":dateCreation", date('Y-m-d H:i:s'));
            $this->db->bind(":type", $type); // 'text' or 'vedeo'
            $this->db->bind(":price", $data['price']);
            $this->db->bind(":id", $id);

           return $this->db->execute();
            }
public function deleteCourse($id){
        $this->db->query("delete from cours where idcours = :id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
}
}
