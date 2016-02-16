<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends Application {
    
    function __construct() {
        parent::__construct();
    }
    
    //login function for storing session log in name
    function login() {
        $this->data['pagebody'] = 'login';
        $credential = $this->input->post('username');
        $this->session->set_userdata('username', $credential);
        $this->data['username'] = $credential;
        $this->render();
    }

    //logout function to reset session
    function logout() {
        $this->data['pagebody'] = 'login';
        $this->session->set_userdata('username', '');
        $this->render();
    }

}