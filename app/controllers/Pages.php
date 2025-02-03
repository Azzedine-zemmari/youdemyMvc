<?php

class Pages extends Controller{
    private $postModel;
    public function __construct()
    {
        $this->postModel = $this->model('User');
    }

    public function index(){
        $users = $this->postModel->getUsers();
        $data = ['title'=>'welcome','users'=>$users];
        $this->view('Pages/index',$data);
    }
    public function about(){
        echo '<h1>About us</h1>';
    }
}