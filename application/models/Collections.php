<?php

class Collections extends MY_Model {
    // constructor
    function __construct() {
        //parameter: 'tableName','orderByTableColumn
        parent::__construct('collections','Datetime');
    }
}