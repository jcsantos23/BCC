<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    public function index() {

        $records = $this->players->all();

        //prime the table class
        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class="table-right-game">',
            'cell_start' => '<td class="player">',
            'cell_alt_start' => '<td class="player">'
        );
        
        $this->table->set_template($parms);
        $this->table->set_heading('Player', 'Equity', 'Cash');

        foreach ($records as $row) {
            $this->table->add_row($row->Player, $row->Peanuts);
        }

        //finally! generate the table
        //$rows = $this->table->make_columns($cells, 3);
        $this->data['wtable'] = $this->table->generate();

        $this->data['pagebody'] = 'welcome';
        $this->render();
    }

}
