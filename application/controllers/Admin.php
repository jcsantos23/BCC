<?php

/**
 * Portfolio page. Shows two tables with user trading actvity and current holdings.
 * 
 * ------------------------------------------------------------------------
 */
class Admin extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        
        $this->parsePlayers();
        $this->data['pagebody'] = 'admin'; //tells it it show this view        
        //Pass these on to the view        
        $this->render();
    }
    function parsePlayers(){
        
        //Dropdown list populated for player selection
        $players = $this->Players->getPlayer();
        $x = array();
        foreach ($players as $player) {
            $x[$player['Player']] = $player['Player'];
        }
        //Parse selected player to a url and redirect it to show info accordingly
        $js = 'id="players" onChange="select_player(this);"';
        $this->data['players'] = form_dropdown('players',$x,$js);
    }
}