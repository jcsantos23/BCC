<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;    // identifier for our content
    protected $choices = array(// our menu navbar
        'Home' => '/', 'Portfolio' => '/portfolio', 'Assembly' => '/assembly', 'Login' => '/signin');

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'Bot Card Collector';
        $this->errors = array();
        $this->data['pageTitle'] = 'welcome';
    }

    /**
     * Render this page
     */
    function render() {
        $this->data['display'] = "";
        if (!empty($this->session->userdata('response'))) {
            $this->data['display'] = $this->session->userdata('response');
            $this->session->unset_userdata('response');
        }

        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

        if (!empty($this->session->userdata('username'))) {
            if ($this->session->userdata('role') == 99) {
                $this->data['navigation'] = $this->parser->parse('navigation_admin', array(), true);
                $this->logout();
            } else {
                $this->data['navigation'] = $this->parser->parse('navigation_user', array(), true);
                $this->logout();
            }
        } else {
            $this->data['navigation'] = $this->parser->parse('navigation_def', array(), true);
        }
        $this->data['data'] = &$this->data;
        $this->parser->parse('template', $this->data);
    }

    function logout() {

        //Logout button onClick
        if (!is_null($this->input->post('logout'))) {
            $this->session->sess_destroy();
            redirect('');
        }
    }

}

/* End of file MY_Controller.php */
    /* Location: application/core/MY_Controller.php */
    