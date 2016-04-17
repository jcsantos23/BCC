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
        $this->botserver->get_token();
        
        //gets which cards the player has
        $card_count = $this->Collections->get_cards($this->session->userdata('username'));
        $card_count = $this->Collections->sort_cards($card_count);

        //counts the amount of cards of each type the player has
	$top_cards = [];
	$mid_cards = [];
	$bot_cards = [];
        
        if (!is_null($this->input->post('buyCards')))
            {
		$team = 'b06';
		$token = $this->session->userdata('token');
		$player = $this->session->userdata('username');
		$top = $_POST['TopPieces'];
		$middle = $_POST['MiddlePieces'];
		$bottom = $_POST['BottomPieces'];
		$dataArray = array("team" => $team, "token" => $token, "player" => $player, "top" => $top, "middle" => $middle, "bottom" => $bottom);
		$handle = $this->botserver->php_post($dataArray, "/sell");
			// print_r($_POST['TopPieces']); die();
            }
            
        if (count($card_count) > 0)
            {
                foreach ($card_count as $key => $value)
                    {
			if (substr($value['card'], -1) == "0")
                            {
				$top_cards[$key] = $value;
                            }
                            else if (substr($value['card'], -1) == "1")
                            {
				$mid_cards[$key] = $value;
                            }
                            else if (substr($value['card'], -1) == "2")
                            {
				$bot_cards[$key] = $value;
                            }
                    }
            }

        //displays data back out
	$this->data['topcards'] = $top_cards;
	$this->data['midcards'] = $mid_cards;
	$this->data['botcards'] = $bot_cards;
        
        //puts it into the view
        $this->render();
    }

}
