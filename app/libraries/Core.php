<?php

class Core{
    protected  $curentController = 'Pages';
    protected  $currentMethod = 'index';
    protected  $params = [];

    public function __construct()
    {
       print_r( $this->getUrl());
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = explode('/',$url);
            return $url;
        }
    }

}