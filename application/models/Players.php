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
        parent::__construct('players','Player');
    }
    
    //Gets the names of all the players
    function getPlayer(){
        $query = $this->db->query('SELECT Player FROM players');
      
        return $query->result_array();
    }
}
