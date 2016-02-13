<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application {

    public function index() {

        $records = $this->collections->all();

        foreach ($records as $row) {
            //echo '<img src="./data/'.$row->Piece.'.jpeg"></img>';
            //echo $row->Piece;
            $cells[]=$this->parser->parse('cell',(array) $row, true);
        }

        //prime the table class
        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class="bot-assembly">',
            'cell_start' => '<td class="bot-image">',
            'cell_alt_start' => '<td class="bot-image">'
        );
        $this->table->set_template($parms);

        //finally! generate the table
        $rows = $this->table->make_columns($cells, 3);
        $this->data['atable'] = $this->table->generate($rows);
        
        $this->data['pagebody'] = 'assembly';
        $this->render();
    }

}
