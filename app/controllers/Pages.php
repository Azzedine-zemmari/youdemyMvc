<?php

class Pages extends Controller{
    public function index(){
        $data = ['title'=>'welcome'];
        $this->view('Pages/index',$data);
    }
    public function about(){
        echo '<h1>About us</h1>';
    }
}