<?php

class Pages extends Controller {
    private $users = array();
    
    public function __construct() {
        parent::__construct();
        $this->userModel = $this->model('User');
    }
    
    public function index() {
        $this->users = $this->userModel->getUsers();
        
        $this->view('index');
        
//        $data = [
//            'title' => 'Home page',
//            'users' => $users
//        ];
//        
//        $this->view('pages/index', $data);
    }
    
    public function about() {
        $this->view('about');
    }
    
    public function features() {
        $this->view('features');
    }
    
    public function calendar() {
        require_once APPROOT . '/classes/Calendar.php';
        $calendar = new Calendar();
        
        $this->smarty->assign("title", $calendar->title);
        $this->smarty->assign("prev", $calendar->prev);
        $this->smarty->assign("next", $calendar->next);
        $this->smarty->assign("weeks", $calendar->weeks);
        
        $this->view('calendar');
    }
}