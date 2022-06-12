<?php
    // Core app class
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];
        
        public function __construct() {
            $url = $this->getUrl();
            
            // we look for a file in controllers, ucwords capitalizes first letter
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // will set a new controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
            
            // require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;
            
            // Check for the second part of url, set as current method
            if(isset($url[1])) {
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }
            
            // Get and set params if exists
            $this->params = $url ? array_values($url) : [];
            
            // Callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
        
        public function getUrl() {
            if(filter_input(INPUT_GET, 'url') !== null) {
                // get url
                $url = rtrim(filter_input(INPUT_GET, 'url'), '/');
                
                // filter variables as string/number
                $url = filter_var($url, FILTER_SANITIZE_URL);
                
                // breaking into an array
                $url = explode('/', $url);
                
                return $url;
            }
        }
    }