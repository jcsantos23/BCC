<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index() {

        $this->createGameSummary();
        $this->createGameStatus();
        $this->createPlayerSummary();

        $this->data['pagebody'] = 'welcome';
        $this->render();
    }

    //Creates Gameplay summary
    function createGameSummary() {
        $botseries11 = 0;
        $botseries13 = 0;
        $botseries26 = 0;
        $records = $this->Collections->all();
        foreach ($records as $row) {
            if (strpos($row->Piece, '11') !== false) {
                $botseries11++;
            } if (strpos($row->Piece, '13') !== false) {
                $botseries13++;
            } if (strpos($row->Piece, '26') !== false) {
                $botseries26++;
            }
        }
        //prime the table class
        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class="right-top">', 'cell_start' => '<td class="player">', 'cell_alt_start' => '<td class="player">');
        $this->table->set_template($parms);
        $this->table->set_heading('Series 11', 'Series 13', 'Series 26');
        $this->table->add_row($botseries11, $botseries13, $botseries26);
        $this->data['bot'] = $this->table->generate();
    }

    function createGameStatus() {
        $botseries11 = 0;
        $botseries13 = 0;
        $botseries26 = 0;
        $randbot = 0;
        $records = $this->Transactions->all();
        foreach ($records as $row) {
            if ($row->Series == '11') {
                $botseries11++;
            } if ($row->Series == '13') {
                $botseries13++;
            } if ($row->Series == '26') {
                $botseries26++;
            } if ($row->Series == '11') {
                $randbot++;
            }
        }
        //prime the table class
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

        //prime the table class
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
