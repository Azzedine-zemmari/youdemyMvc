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
                'tags' => $_POST['tags'],
                'price' => $_POST['price'],
                'enseignat_id' => $_POST['idUser']
            ];
            // Validate required fields
            if (empty($data['titre']) || empty($data['description']) || empty($data['categorieId']) || empty($data['price']) || empty($data['enseignat_id'])) {
                echo "Error: All fields are required.";
                return;
            }
            if ($data['vedeo']) {
                $allowedTypes = ['video/mp4', 'video/webm', 'video/ogg'];
                $maxSize = 800 * 1024 * 1024; // 800MB

                // Validate file type
                if (!in_array($data['vedeo']['type'], $allowedTypes)) {
                    echo "Error: Invalid video format. Allowed formats: MP4, WebM, Ogg.";
                    return;
                }

                // Validate file size
                if ($data['vedeo']['size'] > $maxSize) {
                    echo "Error: File size exceeds the limit of 800MB.";
                    return;
                }

                // Define the upload directory and file path
                $uploadDir = __DIR__ . '/../../public/uploads/';

                $fileExtension = pathinfo($data['vedeo']['name'], PATHINFO_EXTENSION);
                $fileName = uniqid('video_') . '.' . $fileExtension;
                $filePath = $uploadDir . $fileName;

                if (!move_uploaded_file($data['vedeo']['tmp_name'], $filePath)) {
                    echo "Error: Failed to upload the video file.";
                    return;
                }

                $data['vedeo'] = $fileName;
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
    public function search(){
        // think about what route would trigger this method
    }
    public function update($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'titre' => trim($_POST['titre']),
                'description' => trim($_POST['description']),
                'content' => isset($_POST['content']) ? $_POST['content'] : null,
                'vedeo' => isset($_FILES['contentVedeo']) ? $_FILES['contentVedeo'] : null,
                'categorieId' => $_POST['categorieId'],
                'tags' => $_POST['tags'],
                'price' => $_POST['price'],
                'enseignat_id' => $_POST['idUser']
            ];
            // Validate required fields
            if (empty($data['titre']) || empty($data['description']) || empty($data['categorieId']) || empty($data['price']) || empty($data['enseignat_id'])) {
                echo "Error: All fields are required.";
                return;
            }
            if ($data['vedeo']) {
                $allowedTypes = ['video/mp4', 'video/webm', 'video/ogg'];
                $maxSize = 800 * 1024 * 1024; // 800MB

                // Validate file type
                if (!in_array($data['vedeo']['type'], $allowedTypes)) {
                    echo "Error: Invalid video format. Allowed formats: MP4, WebM, Ogg.";
                    return;
                }

                // Validate file size
                if ($data['vedeo']['size'] > $maxSize) {
                    echo "Error: File size exceeds the limit of 800MB.";
                    return;
                }

                // Define the upload directory and file path
                $uploadDir = __DIR__ . '/../../public/uploads/';

                $fileExtension = pathinfo($data['vedeo']['name'], PATHINFO_EXTENSION);
                $fileName = uniqid('video_') . '.' . $fileExtension;
                $filePath = $uploadDir . $fileName;

                if (!move_uploaded_file($data['vedeo']['tmp_name'], $filePath)) {
                    echo "Error: Failed to upload the video file.";
                    return;
                }

                $data['vedeo'] = $fileName;
            }


            if($this->CourseModel->updateCours($data,$id)){
                echo "course updated";
            }
            else{
                echo "course not updated";
            }
        }
        else{
            $cour = $this->CourseModel->getCourById($id);
            $category = $this->CourseModel->getCategories();
            $tags = $this->CourseModel->getTags();
            $data = ['categories' => $category,'tags'=>$tags,'cour' => $cour];
            $this->view('Course/updateCours',$data);
        }
    }
    public function showAllCourses(){
        $data = ['Courses'=>$this->CourseModel->getAllCourses()];
        $this->view('Course/TableCours',$data);
    }
    public function delete($id){
        $this->CourseModel->deleteCourse($id);
    }
    public function Enroll($id){
        $userId = $_POST['user_id'];
        $this->CourseModel->EnrollCourse($id,$userId);
        header("Location: ".URLROOT."/Course/EnrolledCourses");
    }
   public function EnrolledCourses(){
        $Courses = $this->CourseModel->EnrolledCoursesByStudent($_SESSION['user_id']);
//        var_dump($Courses);
//        die();
       $data = ['Courses'=>$Courses];
       $this->view('Pages/MyCourse',$data);
   }
}