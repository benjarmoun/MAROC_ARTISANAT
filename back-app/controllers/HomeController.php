<?php

class HomeController{
    
    public function index($page,$res){
        $res->$page();
    }

}