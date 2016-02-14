<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends Application {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->data['pagebody'] = 'login';
        $this->render();
        
        $this->load->library( array( 'encrypt', 'form_validation', 'session' ) );
        $this->load->helper( array( 'form' ) );
        $user_credentials['mikey'] = array(
            'user_name' => 'mikey',
        );
        
        $this->form_validation->set_rules( 'user_name', 'username', 'required' );
        $this->form_validation->set_error_delimiters( '<em>','</em>' );
        
        if ( $this->input->post( 'login' ) ) {
        if ( $this->form_validation->run() ) {
            $user_name = $this->input->post( 'user_name' );

            if ( array_key_exists( $user_name, $user_credentials ) ) {
                if ( $user_pass == $this->encrypt->decode( $user_credentials[ $user_name ]['user_pass'] ) ) {
                    die( "User is logged in!" );
                } else {
                    $this->session->set_flashdata( 'message', 'Incorrect user.' );
                    redirect( '/' );
                }
            } else {
                $this->session->set_flashdata( 'message', 'A user does not exist for the username specified.' );
                redirect( '/' );
            }
        }
}
    }

}