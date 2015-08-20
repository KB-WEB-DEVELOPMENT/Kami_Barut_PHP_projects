<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        //echo Hash::create('sha256', 'Kami', HASH_PASSWORD_KEY);
        //echo Hash::create('sha256', 'Kami2', HASH_PASSWORD_KEY);
        $this->view->title = 'Home';
        $this->view->render('index/index');
    }
    
}

?>
