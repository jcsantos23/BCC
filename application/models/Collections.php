<?php

class Collections extends MY_Model {
    // constructor
    function __construct() {
        //parameter: 'tableName','pk'
        parent::__construct('collections','Player');
    }
}