<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Players
 *
 * @author JL
 */
class Players extends MY_Model{
    function __construct() {
        //parameter: 'tableName','orderByTableColumn
        parent::__construct('players','Player');
    }
    
    // add an item to an order
    function getPlayer(){
        $query = $this->db->query('SELECT Player FROM players');
      
        return $query->result_array();
    }
}
