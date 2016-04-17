<?php

/**
 * Assembly page to assemble the bot.
 * 
 * ------------------------------------------------------------------------
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Application {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->data['error-message'] = "";
        $this->validate();
        $this->data['pagebody'] = 'login';

        //puts it into the view
        $this->render();
    }

    public function validate() {

        //Login submit button onClick
        if (!is_null($this->input->post('login'))) {

            //Checks if fields are not empty
            if (!empty($this->input->post('username')) && !empty($this->input->post('password'))) {

                //Saves posts
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                //Checks if username exists in the dbs
                if ($this->Players->exists($username)) {

                    //Username exists - Gets record from dbs
                    $exist = $this->Players->get($this->input->post('username'));

                    //Checks if password matches
                    $valid = password_verify($password, $exist->password);

                    //When the password is validated
                    if ($valid) {
                        $this->session->role = $exist->role;
                        $this->session->username = $username;
                        $this->session->response = "Login successful! Welcome, " . $username;
                        redirect('');
                    } else {
                        $this->session->response = "Wrong password. Try again";
                    }
                } else {
                    //Username does not exist
                    $this->data['error-message'] = "Invalid username.";
                }
            } else {
                $this->data['error-message'] = "Please enter a username and/or password";
            }
        }
    }

}
