<?php

class Tags extends Controller
{
    private $tagModel;
    public function __construct()
    {
        $this->tagModel = $this->model('Tag');
    }
    public function showTag(){
        $Tags = $this->tagModel->getAllTags();
        $data = ['Tags'=>$Tags];
        $this->view('/Pages/Admin/TagsTable',$data);
    }
    public function deleteCategory($id){
        if($this->tagModel->delete($id)){
            header("Location: ".URLROOT."/Tags/showTag");
        }

    }
    public function inserTag(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->tagModel->addTag($_POST['tag']);
            echo "tag added successfully";
        }
        else{
            $this->view('Pages/Admin/AddTag');
        }

    }

}