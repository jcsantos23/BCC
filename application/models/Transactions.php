<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transactions
 *
 * @author JL
 */
class Transactions extends MY_Model{
    function __construct() {
        //parameter: 'tableName','orderByTableColumn
        parent::__construct('transactions','Player');
    }
}
