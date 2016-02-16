<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Application {
    function __construct() {
        parent::__construct();
    }
    //-------------------------------------------------------------
    //  Stores session as user logged in
    //-------------------------------------------------------------
    function index() {
        $this->data['pagebody'] = 'login'; // choosing to use login view
        $this->render();
    }
    function login() {
        $this->data['pagebody'] = 'login';
        $credential = $this->input->post('username');
        $this->session->set_userdata('username', $credential);
        $this->data['username'] = $credential;
        $this->render();
    }
    function logout() {
        $this->data['pagebody'] = 'login';
        
        $this->session->set_userdata('username', '');
        $this->render();
    }
}