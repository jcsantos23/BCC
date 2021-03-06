<?php
/**
 * Assembly page to assemble the bot.
 * 
 * ------------------------------------------------------------------------
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application {
    
    function __construct(){
		parent::__construct();
	}

    public function index() {
        $this->data['pagebody'] = 'assembly';
        
        //gets which cards the player has
        $card_count = $this->Collections->get_cards($this->session->userdata('username'));
        $card_count = $this->Collections->sort_cards($card_count);

        //counts the amount of cards of each type the player has
	$top_cards = array('11a-' => $card_count['elevena0'],
                           '11b-' => $card_count['elevenb0'],
			   '11c-' => $card_count['elevenc0'],
                           '13c-' => $card_count['thirteenc0'],
                           '13d-' => $card_count['thirteend0'],
                           '26h-' => $card_count['twentysixh0']);
        
	$mid_cards = array('11a-' => $card_count['elevena1'],
   			   '11b-' => $card_count['elevenb1'],
   		           '11c-' => $card_count['elevenc1'],
                           '13c-' => $card_count['thirteenc1'],
                           '13d-' => $card_count['thirteend1'],
                           '26h-' => $card_count['twentysixh1']);

	$bot_cards = array('11a-' => $card_count['elevena2'],
   			   '11b-' => $card_count['elevenb2'],
   		           '11c-' => $card_count['elevenc2'],
                           '13c-' => $card_count['thirteenc2'],
                           '13d-' => $card_count['thirteend2'],
                           '26h-' => $card_count['twentysixh2']);

        //displays data back out
	$this->data['topcards'] = $top_cards;
	$this->data['midcards'] = $mid_cards;
	$this->data['botcards'] = $bot_cards;
        
        //puts it into the view
        $this->render();
    }

}
