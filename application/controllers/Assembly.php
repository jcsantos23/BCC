<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application {

    public function index() {
        
        $records = $this->collections->all();
        
        foreach ($records as $row){
           echo $row->Token;
        }
          
        $this->data['pagebody'] = 'assembly';
        $this->render();
    }
}
