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
        'Home' => '/', 'Portfolio' => '/portfolio', 'Assembly' => '/assembly', 'Login'=> '/signin');

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
        if( $this->session->userdata['username'] == ''){
             //$this->data['logincred'] = $this->parser->parse('signin', $this->data, true);
        }else{
            $this->data['username'] = $this->session->userdata['username'];
            $this->data['logincred'] = $this->parser->parse('signout', $this->data, true);
        }
        //$this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'), true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        
        // finally, build the browser page!
        $this->data['username'] = $this->session->userdata['username'];
        $this->data['data'] = &$this->data;
        $this->parser->parse('template', $this->data);
    }
        
    }

    /* End of file MY_Controller.php */
    /* Location: application/core/MY_Controller.php */
    