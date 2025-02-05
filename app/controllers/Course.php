<?php

class Course extends Controller{
    private $CourseModel;

    public function __construct()
    {
        $this->CourseModel = $this->model('Cour');
    }

    public function index()
    {
        $data = ['Courses'=>$this->CourseModel->getAllCourses()];
        $this->view('Course/index',$data);
    }
    public function addCourse(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'titre' => trim($_POST['titre']),
                'description' => trim($_POST['description']),
                'content' => isset($_POST['checkbox']) ? $_POST['content'] : null,
                'vedeo' => !isset($_POST['checkbox']) && isset($_FILES['contentVedeo']) ? $_FILES['contentVedeo'] : null,
                'categorieId' => $_POST['categorieId'],
//                'tags' => null,
                'price' => $_POST['price'],
                'enseignat_id' => $_POST['idUser']
            ];
            // Validate required fields
            if (empty($data['titre']) || empty($data['description']) || empty($data['categorieId']) || empty($data['price']) || empty($data['enseignat_id'])) {
                echo "Error: All fields are required.";
                return;
            }

            if($this->CourseModel->insertCours($data)){
                echo "course inserted";
            }
            else{
                echo "Text course not inserted";
            }
            }
        else{
            $category = $this->CourseModel->getCategories();
            $tags = $this->CourseModel->getTags();
            $data = ['categories' => $category,'tags'=>$tags];
            $this->view('Course/AddCourse',$data);
        }
    }
}