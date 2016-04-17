<?php

class Gamestatus extends MY_Model {

    //Setting variables
    protected $series = array();
    protected $collection = array();
    protected $players = array();
    protected $transactions = array();
    protected $total_cards;
    protected $cards_left;
    protected $collection_info = array();
    protected $equity_info = array();

    //GameStatus Constructor
    function _construct() {
        parent::_construct();
        $this->update_gamestatus();
    }

    function update_gamestatus() {
        //Reset variables to defaults
        $this->total_cards = 0;
        $this->cards_left = 0;
        //Setup necessities
        if ($this->session->userdata('username')) {
            $current_player = $this->session->userdata('username');
        } else {
            $current_player = "no_player";
        }
        //Update players
        $this->players = $this->db->get('players')->result_array();
        //Setup players array to hold equity information
        for ($x = 0; $x < count($this->players); $x++) {
            $this->players[$x]['Equity'] = 0;
        }
        //Update series
        $this->series = $this->db->get('series')->result_array();
        //Manipulate data on series information to generate card information
        for ($x = 0; $x < count($this->series); $x++) {
            $this->series[$x]['Used'] = 0;
            $this->total_cards = $this->total_cards + $this->series[$x]['Frequency'];
        }
        $this->cards_left = $this->total_cards;
        //Update collection
        //$this->collection = $this->db->get('collections')->result_array();
        $this->collection = $this->botserver->get_collection();
        //Manipulate collection data to create player and series information
        foreach ($this->collection as $record) {
            $this->cards_left = $this->cards_left - 1;
            $coll_series = intval(substr($record['Piece'], 0, 2));
            $piece_part = intval(substr($record['Piece'], 4, 1));
            $serieskey = array_search($coll_series, array_column($this->series, 'Series'));
            $this->series[$serieskey]['Used'] = $this->series[$serieskey]['Used'] + 1;
            $playerkey = strtolower(array_search($record['Player'], array_column($this->players, 'Player')));
            $this->players[$playerkey]['Equity'] += 1;
            if (strtolower($record['Player']) == strtolower($current_player)) {
                if (empty($this->collection_info[$coll_series])) {
                    $this->collection_info[$coll_series] = 1;
                } else {
                    $this->collection_info[$coll_series] = $this->collection_info[$coll_series] + 1;
                }
            }
        }
        //Update transactions
        $this->transactions = $this->botserver->get_transactions();
        //$this->transactions = array_map('str_getcsv', $this->transactions);
        /*
          $csv = array_map('str_getcsv', file($this->transactions));
          array_walk($csv, function(&$a) use ($csv) {
          $a = array_combine($csv[0], $a);
          });
          array_shift($csv); # remove column header
          $this->transactions = $csv;
         */
        //$this->transactions = $this->db->get('transactions')->result_array();
    }

    //Returns an array with information about players
    function get_players() {
        return $this->players;
    }

    //Returns an array with information about card series
    function get_series() {
        return $this->series;
    }

    //Returns an array with information about card collections
    function get_collection() {
        return $this->collection;
    }

    function get_total_cards() {
        return $this->total_cards;
    }

    function get_cards_left() {
        return $this->cards_left;
    }

    function get_collection_info() {
        return $this->collection_info;
    }

    function get_transactions() {
        return $this->transactions;
    }

}
