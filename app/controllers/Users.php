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
            if($this->userModel->findByEmail($data['email'])){
                $data['email_err'] = 'email is already taken';
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
                $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
                if($this->userModel->register($data)){
                    header("Location: ".URLROOT."/users/login");
                }
            }
            else{
                $this->view('users/register',$data);
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
            $this->view('users/register',$data);
        }
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'email' => trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];
            if(empty($data['email'])){
                $data['email_err'] = 'email is required';
            }
            if(empty($data['password'])){
                $data['password_err'] = 'password is required';
            }
            elseif(strlen($data['password'] < 6)){
                $data['password_err'] = 'password is required';

            }

            if(empty($data['email_err']) && empty($data['password_err'])){
                $isLoggedIn = $this->userModel->login($data['email'],$data['password']);
                if($isLoggedIn){
                    $this->userModel->createUserSession($isLoggedIn);
                }
            }else{
                $this->view('users/login',$data);
            }
        }
        else{
            $data = [
                'email' => '',
                'password'=>'',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('users/login',$data);
        }}
}