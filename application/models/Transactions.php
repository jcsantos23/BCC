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
class Transactions extends MY_Model2{
    function __construct() {
        //constructor
        parent::__construct('transactions', 'DateTime','Player');
    }
    
    //gets the transaction history of the players
    function getTrans($player) {
        $query = $this->db->query('SELECT Player, DateTime, Series, Trans FROM transactions WHERE Player = "' . $player . '"');

        return $query->result_array();
    }
}
