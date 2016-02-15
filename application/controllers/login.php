<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends Application {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->data['pagebody'] = 'login';
        $this->session->set_userdata('username','Mickey');
        $this->data['username'] = $this->session->userdata('username');
        $this->render();
    }

}