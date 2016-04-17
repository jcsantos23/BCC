<?php

Class User extends MY_Model {
    function login($username, $password) {
        $this->db->select('player, password');
        $this->db->from('players');
        $this->db->where('player', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    //check if user exists
    function checkUser($username) {
        $this->db->select('player, password');
        $this->db->from('players');
        $this->db->where('player', $username);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    function insertUser($data){
        $this->db->insert('players',$data);
    }
    
    
}