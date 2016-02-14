<?php

class Collections extends MY_Model {
    // constructor
    function __construct() {
        //parameter: 'tableName','pk'
        parent::__construct('collections', 'Token', 'Player', 'Piece', 'Datetime');
    }
    
    function get_cards($current_player) {
        $collection = $this->db->get_where('collections', array('Player' => $current_player))->result_array();
        return $collection;
    }
    
    function sort_cards($collection) {
        $card_array = array("elevena0" => 0, "elevena1" => 0, "elevena2" => 0,
                            "elevenb0" => 0, "elevenb1" => 0, "elevenb2" => 0,
                            "elevenc0" => 0, "elevenc1" => 0, "elevenc2" => 0);

        if (!empty($collection)) {
            foreach ($collection as $card) {
                switch ($card['Piece']) {
                    case "11a-0":
                        $card_array["elevena0"] += 1;
                        break;
                    case "11a-1":
                        $card_array["elevena1"] += 1;
                        break;
                    case "11a-2":
                        $card_array["elevena2"] += 1;
                        break;
                    case "11b-0":
                        $card_array["elevenb0"] += 1;
                        break;
                    case "11b-1":
                        $card_array["elevenb1"] += 1;
                        break;
                    case "11b-2":
                        $card_array["elevenb2"] += 1;
                        break;
                    case "11c-0":
                        $card_array["elevenc0"] += 1;
                        break;
                    case "11c-1":
                        $card_array["elevenc1"] += 1;
                        break;
                    case "11c-2":
                        $card_array["elevenc2"] += 1;
                        break;
                }
            }
            return $card_array;
        }
    }
}