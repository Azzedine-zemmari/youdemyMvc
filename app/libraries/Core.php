<?php

class Core{
    protected  $curentController = 'Pages';
    protected  $currentMethod = 'index';
    protected  $params = [];

    public function __construct()
    {
       $url = $this->getUrl();
       if(!empty($url)){
           if(file_exists('../app/controllers/'.$url[0].'.php')){
               // if exists set as controller
               $this->curentController = $url[0];
               // unset the index 0 from the url array
               unset($url[0]);
           }
       }
       // require the controller
        require_once "../app/controllers/".$this->curentController.".php";

       // instance the controller
        $this->curentController = new $this->curentController;

        //check if there's a method
        if(isset($url[1])){
            // check if the method exists in the controller
            if(method_exists($this->curentController,$url[1])){
                $this->currentMethod = $url[1];
                // unset the index 1 from the url array
                unset($url[1]);
            }
        }
        // check the parameter
        $this->params =$url ? array_values($url) : [];

        call_user_func_array([$this->curentController,$this->currentMethod],$this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = explode('/',$url);
            return $url;
        }
    }

}