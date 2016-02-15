<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application {

    public function index() {

        $this->data['pagebody'] = 'assembly';
        
        
        $card_count = $this->Collections->get_cards($this->session->userdata('username'));
        $card_count = $this->Collections->sort_cards($card_count);

	$top_cards = array('Eleven-A' => $card_count['elevena0'],
                           'Eleven-B' => $card_count['elevenb0'],
			   'Eleven-C' => $card_count['elevenc0']);
        
	$mid_cards = array('Eleven-A' => $card_count['elevena1'],
   			   'Eleven-B' => $card_count['elevenb1'],
   		           'Eleven-C' => $card_count['elevenc1']);

	$bot_cards = array('Eleven-A' => $card_count['elevena2'],
   			   'Eleven-B' => $card_count['elevenb2'],
   		           'Eleven-C' => $card_count['elevenc2']);

	$this->data['topcards'] = $top_cards;
	$this->data['midcards'] = $mid_cards;
	$this->data['botcards'] = $bot_cards;
        
        $this->render();
    }

}
