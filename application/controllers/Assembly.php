<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends CI_Controller {

	/**
	 * Bot assembly page for the currently logged in user
         * 
	 */
	public function index()
	{
                //Calls for the assembly view
		$this->load->view('assembly');
	}
}
