<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index() {

        $this->createGameStatus();
        $this->createPlayerSummary();
        $this->data['pagebody'] = 'welcome';
        $this->render();
    }

    function createGameStatus() {
        //table to display status of game 
        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class="right-bot">', 'cell_start' => '<td class="player">', 'cell_alt_start' => '<td class="player">');
        $this->table->set_template($parms);
        $this->table->set_heading('Game Status: ACTIVE');
        $this->table->add_row('');
        $this->table->add_row('Game Summary - Known Bots:');
        $this->table->add_row('');
        $this->table->add_row('Series 11: Basic House Bot (20 Peanuts)');
        $this->table->add_row('Series 13: Advanced House Bot (50 Peanuts)');
        $this->table->add_row('Series 26: Supreme Omega Overlord House Bot (200 Peanuts)');
        $this->data['bot'] = $this->table->generate();
    }

    //Creates Player's gameplay summary
    function createPlayerSummary() {
        $records = $this->Players->all();

        //Prime the table class to display player info. Wasn't sure what equity was though...
        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class="table-right-game">',
            'cell_start' => '<td class="player">',
            'cell_alt_start' => '<td class="player">'
        );

        $this->table->set_template($parms);
        $this->table->set_heading('Player', 'Peanuts', 'Equity');

        foreach ($records as $row) {
            $this->table->add_row($row->Player, $row->Peanuts);
        }

        //Generate the table
        $this->data['wtable'] = $this->table->generate();
    }

}
