<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	/**
	 * Player Portfolio page that tabs recent trading activity and
         * current holdings for a specific player
         * 
	 */
	public function index()
	{
                //Calls for the portfolio view
		$this->load->view('portfolio');
	}
}
