<?php

class Categorie extends  Controller
{
private $CategoryModel;
public function __construct()
{
    $this->CategoryModel = $this->model('Category');
}
public function insertCategory(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $this->CategoryModel->addCategory($_POST['category']);
        echo "category added successfully";
    }
    else{
        $this->view('Pages/Admin/AddCategory');
    }

}
public function showAllCategory(){
    $Category = $this->CategoryModel->showCategory();
    $data = ['Category'=>$Category];
    $this->view('Pages/Admin/CategoryTable',$data);
}
public function deleteCategory($id){
    if($this->CategoryModel->deleteCategory($id)){
        header("Location: ".URLROOT."/Categorie/showAllCategory");
    }

}
}