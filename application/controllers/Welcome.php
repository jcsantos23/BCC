<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Welcome Page modified as the homepage of the webapp
         * 
	 */
	public function index()
	{
                //Calls for the homepage view
		$this->load->view('homepage');
	}
}
