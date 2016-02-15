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
        'Home' => '/', 'Portfolio' => '/portfolio', 'Assembly' => '/assembly');

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'Bot Card Collector';
    }

    /**
     * Render this page
     */
    function render() {
        
        
        $cred = $this->session->userdata['username'];
        if ($cred !== '') {
            $this->data['username'] = $this->session->userdata['username'];
            $this->data['credential'] = $this->parser->parse('signout', $this->data, true);
        } else {
            $this->data['credential'] = $this->parser->parse('signin', $this->data, true);
        }
        $this->data['username'] = $this->session->userdata['username'];
        
        //$this->data['menubar'] = build_menu_bar($this->choices);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
