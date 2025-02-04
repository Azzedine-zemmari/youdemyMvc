<?php

class Course extends Controller{
    private $CourseModel;

    public function __construct()
    {
        $this->CourseModel = $this->model('Cour');
    }

    public function index()
    {
        $data = ['Courses'=>$this->CourseModel];
        $this->view('Course/index',$data);
    }
}