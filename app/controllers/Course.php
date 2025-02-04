<?php

class Course extends Controller{
    private $CourseModel;

    public function __construct()
    {

    }

    public function index()
    {
        $data = [];
        $this->view('Course/index',$data);
    }
}