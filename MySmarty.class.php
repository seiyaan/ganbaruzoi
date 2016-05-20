<?php

include_once("./Smarty/libs/Smarty.class.php");

class MySmarty extends Smarty {
    function __construct($dir=''){
        // $this->Smarty();
        parent::__construct();
        $this->template_dir = 'templates/';
        $this->compile_dir = 'templates_c/';
        $this->left_delimiter = '<!--{';
        $this->right_delimiter = '}-->';
        
        if($dir == ''){
            $this->template_dir = 'templates/';
        }else{
            $this->template_dir = ''.$dir;
        }
    }
    
    function __destruect(){
        return 0;
    }
}
