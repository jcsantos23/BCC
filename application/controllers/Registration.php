<?php

/**
 * Assembly page to assemble the bot.
 * 
 * ------------------------------------------------------------------------
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends Application {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->data['error-message'] = "";
        $this->signup();
        $this->data['pagebody'] = 'registration';

        //puts it into the view
        $this->render();
    }

    public function signup() {

        if (!is_null($this->input->post('signup'))) {
            if (!empty($this->input->post('username')) && !empty($this->input->post('password'))) {

                if ($this->Players->exists($this->input->post('username'))) {
                    $this->data['error-message'] = "Username exists";
                } else {
                    $data = array(
                        'Player' => $this->input->post('username'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        
                        //set Peanuts value initially to 0
                        'Peanuts' => "0",
                        
                        //set the default role to regular player which is 0
                        'role' => "0"
                    );
                    $this->Players->add($data);

                    $this->session->response = "Registration Complete!! Welcome, ".$this->input->post('username');
                    $this->session->username = $this->input->post('username');
                    
                    redirect('');
                }
            } else {
                $this->data['error-message'] = "Please enter a username and/or password";
            }
        }
    }

}
