<?php

    // Load the model and view
    class Controller {
        public $smarty;
        public $tpl_dir = APPROOT . '/views/templates/';

        protected function __construct() {
            $this->smarty = new Smarty();

            $this->userModel = $this->model('User');
        }

        public function model($model) {
            // require model file
            require_once '../app/models/' . $model . '.php';
            
            // init model
            return new $model();
        }
        
        // Load the view if file exists
        public function view($view) {
            $this->smarty->assign('tpl_dir', $this->tpl_dir);
            
            if($this->smarty->templateExists($this->tpl_dir . $view . '.tpl')) {
                $this->smarty->display($this->tpl_dir . $view . '.tpl');
            } else {
                header('HTTP/1.0 404 Not Found');
                $this->smarty->display($this->tpl_dir . '404.tpl');
            }
        }
    }