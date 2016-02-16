<?php

/**
 * Portfolio page. Shows two tables with user trading actvity and current holdings.
 * 
 * ------------------------------------------------------------------------
 */
class Portfolio extends Application {

    function __construct() {
        parent::__construct();
    }

    function index($user = null) {
        $this->data['pagebody'] = 'portfolio'; //tells it it show this view
        
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

        //Current Holdings
        $cardcount = $this->Collections->get_cards($user);
        $cardcounts = $this->Collections->sort_cards($cardcount);
        $this->data['cards'] = $cardcounts;

        //Dropdown list populated for player selection
        $players = $this->Players->getPlayer();
        $x = array();
        foreach ($players as $player) {
            $x[$player['Player']] = $player['Player'];
        }
        //Parse selected player to a url and redirect it to show info accordingly
        $js = 'id="players" onChange="select_player(this);"';
        $this->data['players'] = form_dropdown('players', $x, $user,$js);
        
        //Pass these on to the view        
        $this->render();
    }
}