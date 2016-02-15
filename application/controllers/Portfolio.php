<?php

/**
 * Portfolio page. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * ------------------------------------------------------------------------
 */
class Portfolio extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //------------------------------------------------------------

    function index($user = null) {
        $this->data['pagebody'] = 'portfolio'; // this is the view we want shown
        
        if ($user == null) {
            $user = $this->session->userdata('username');
        }
        
        //Trading Activities
        $transaction = $this->Transactions->getTrans($user);
        $trans = array();

        foreach ($transaction as $record) {
            $trans[] = $record;
        }
        $this->data['transactions'] = $trans;
        //$this->data['debug'] = print_r($query->result_array(), true); 

        //Holdings
        $card_count = $this->Collections->get_cards($user);
        $card_counts = $this->Collections->sort_cards($card_count);
        $this->data['cards'] = $card_counts;

        //Dropdown select player
        $players = $this->Players->getPlayer();
        $p = array();
        foreach ($players as $player) {
            $p[$player['Player']] = $player['Player'];
        }
        //Parse selected player to the url and redirect it
        $js = 'id="players" onChange="select_player(this);"';
        $this->data['players'] = form_dropdown('players', $p, $user,$js);
        
        
        //Pass these on to the view
        
        $this->render();
    }


}