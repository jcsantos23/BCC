<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application {

    public function index() {
        $this->data['pagebody'] = 'assembly';
        $this->render();
    }
}
