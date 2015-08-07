<?php

class indexController extends baseController {

    public function index() {
        /*** set a template variable ***/
            $this->registry->template->welcome = 'Welcome to Kami Barut-Wanayo MVC';

        /*** load the index template ***/
            $this->registry->template->show('index');
    }

}

?>
