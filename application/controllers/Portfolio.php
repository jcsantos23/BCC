<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends Application {

    public function index() {
        
        $records = $this->transactions->all();
        if (isset($_POST['formSubmit'])) {
            $varName = $_POST['pname'];
        }
        //prime the table class
        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class="table-right-game">',
            'cell_start' => '<td class="player">',
            'cell_alt_start' => '<td class="player">'
        );
        
        $this->table->set_template($parms);
        $this->table->set_heading('DateTime', 'Player', 'Series', 'Transaction');

        foreach ($records as $row) {
            //if ($activityPlayer == $playerName) {
                $this->table->add_row($row->DateTime, $row->Player, $row->Series, $row->Trans);
            //}
            //else {
                //$this->table->add_row($row->A, $row->B, $row->C, $row->D);
            //}
        }
        $this->data['ptable'] = $this->table->generate();

        
        $recordsCollections = $this->collections->all();
                
        //prime the table class
        $this->load->library('table'); 
        $parms2 = array(
            'table_open' => '<table class="table-right-game">',
            'cell_start' => '<td class="player">',
            'cell_alt_start' => '<td class="player">'
        );
        
        $this->table->set_template($parms2);
        $this->table->set_heading('Piece', 'Player', 'DateTime');

        foreach ($recordsCollections as $row) {
            $this->table->add_row($row->Piece, $row->Player, $row->Datetime);
        }

        //finally! generate the table
        //$rows = $this->table->make_columns($cells, 3);
        $this->data['ptable2'] = $this->table->generate();        
        $this->data['pagebody'] = 'portfolio';
        $this->render();
    }
}
