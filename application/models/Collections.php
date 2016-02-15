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
                            "elevenc0" => 0, "elevenc1" => 0, "elevenc2" => 0,
                            "thirteenc0" => 0, "thirteenc1" => 0, "thirteenc2" => 0,
                            "thirteend0" => 0, "thirteend1" => 0, "thirteend2" => 0,
                            "twentysixh0" => 0, "twentysixh1" => 0, "twentysixh2" => 0);

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
                    case "13c-0":
                        $card_array["thirteenc0"] += 1;
                        break;
                    case "13c-1":
                        $card_array["thirteenc1"] += 1;
                        break;
                    case "13c-2":
                        $card_array["thirteenc2"] += 1;
                        break;
                    case "13d-0":
                        $card_array["thirteend0"] += 1;
                        break;
                    case "13d-1":
                        $card_array["thirteend1"] += 1;
                        break;
                    case "13d-2":
                        $card_array["thirteend2"] += 1;
                        break;
                    case "26h-0":
                        $card_array["twentysixh0"] += 1;
                        break;
                    case "26h-1":
                        $card_array["twentysixh1"] += 1;
                        break;
                    case "26h-2":
                        $card_array["twentysixh2"] += 1;
                        break;
                }
            }
            return $card_array;
        }
    }

}
