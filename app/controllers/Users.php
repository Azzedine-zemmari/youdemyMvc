<?php

class Users extends  Controller{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'role' => trim($_POST['role']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'Role_err' => ''
            ];

            // field Validation
            if(empty($data['name'])){
                $data['name_err'] = 'name is required';
            }
            if(empty($data['email'])){
                $data['email_err'] = 'email is required';
            }
            if(empty($data['password'])){
                $data['password_err'] = 'password is required';
            }
            elseif($data['password'] < 6){
                $data['password_err'] = 'password is required';

            }
            if(empty($data['role'])){
                $data['Role_err'] = 'Role is required';
            }

            // check if theres no error

            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['Role_err'])){
                if($this->userModel->register($data)){
                    header("Location: ".URLROOT."/Users/login");
                }
            }
            else{
                $this->view('Users/register',$data);
            }
        }
        else{
            $data = [
                'name' => '',
                'email' => '',
                'password'=>'',
                'role' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'Role_err' => ''
            ];
            $this->view('Users/register',$data);
        }
    }
    public function login(){
        echo "this is  the login";
    }
}