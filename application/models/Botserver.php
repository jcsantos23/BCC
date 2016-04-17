<?php

class Botserver extends MY_Model {
  function __construct() {
      parent::__construct();
  }
  function php_post($data, $url_route)
  {
      $url = "http://botcards.jlparry.com/".$url_route;
      // use key 'http' even if you send the request to https://...
      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($data)
          )
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      // if ($result === FALSE) { /* Handle error */ }
//        print_r($result);
//        die();
      return $result;
  }
  function php_get($url_route){
    $url = "http://botcards.jlparry.com/".$url_route;
    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'method'  => 'GET',
            'header' => 'Accept-language: en\r\n'
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
  }
  function get_token()
  {
    $dataArray = array("team" => "A21", "name" => "Unknown","password" => "tuesday");
    $handle = $this->botserver->php_post($dataArray, "/register");
    $agent = new SimpleXMLElement($handle);
    if($agent->getName() == "error"){
      if(!IS_NULL($this->session->userdata('token'))){
        return $this->session->userdata('token');
      }
    }
    else{
      $this->session->set_userdata('token',(String)$agent->token);
      return $agent->token;
    }
  }
  function get_state(){
    $handle = $this->botserver->php_get("/status");
    $status = new SimpleXMLElement($handle);
    return $status->state;
  }
  function get_round(){
    $handle = $this->botserver->php_get("/status");
    $status = new SimpleXMLElement($handle);
    return $status->round;
  }
  function get_transactions(){
    //$handle = $this->botserver->php_get('/data/transactions');
    $CsvString = $this->botserver->php_get("/data/transactions");
    $Data = str_getcsv($CsvString, "\n"); //parse the rows
    $rows = [];
    $transactions = [];
    foreach($Data as $Row)
    {
        $rows[] = str_getcsv($Row, ",");
    }
    if (count($rows) > 1 )
    {
        foreach ($rows as $row)
        {
            if ($row[2] == "b06")
            {
                $transactions[] = $row;
            }
        }
    }
    return $transactions;
    //$transactions = new SimpleXMLElement($handle);
    //return $handle;
  }
  function xml2array($xml){
    $array = (array)$xml;
    if (count($array) == 0) {
      $array = (string)$xml;
    }
    if (is_array($array)) {
      //recursive Parser
      foreach ($array as $key => $value){
        if (is_object($value)) {
          if(strpos(get_class($value),"SimpleXML")!==false){
            $array[$key] = SimpleXML2Array($value);
          }
        } else {
          $array[$key] = SimpleXML2Array($value);
        }
      }
    }
    return $array;
  }
  function insertBuyTransaction($data){
    $cardpack = new SimpleXMLElement($data);
    $datetime = $cardpack->certificate[0]->datetime;
    $player = $cardpack->certificate[0]->player;
    insertTransaction($datetime, $player, 'x', 'buy');
  }
  function insertTransaction($datetime, $player, $series, $trans){
    $data = array(
      'datetime' => $datetime,
      'player' => $player,
      'series' => $series,
      'trans' => $trans
    );
    $this->db->insert($data);
  }
  function get_collection(){
    $CsvString = $this->botserver->php_get("/data/certificates");
    $Data = str_getcsv($CsvString, "\n"); //parse the rows
    $rows = [];
    $equity = [];
    $collection = [];
    foreach($Data as $Row)
    {
      $rows[] = str_getcsv($Row, ",");
    }
    if (count($rows) > 1 )
    {
      foreach ($rows as $row)
      {
        if ($row[2] == "b06")
        {
          $collection[] = array("Player" => strtolower($row[3]), "Piece" => $row[1], "Token" => $row[0], "Datetime" => $row[4]);
        }
      }
    }
    return $collection;
  }
}
?>
