<?php
/**
*   Request demo class
*   @author nekjine
*/
class Request {
    /**
    * subject of the request
    * @type string
    */
    private $subject = "";
    /**
    * parameters of the request
    * @type mixed[]
    */
    private $data = array();

    public function __construct($q=NULL) {
        $query;

        if($q){
            $query = $q;
        }else{
            $query = $_SERVER["QUERY_STRING"];
        }

        $chunks = explode("&", $query);
        foreach($chunks as $chunk){
            $subchunks = explode("=", $chunk);
            if(count($subchunks)==2){
                $this->data[$subchunks[0]] = $subchunks[1];
            }else{
                $this->data[$subchunks[0]] = "";
            }
        }
    }
    /**
    * returns key parameter of the request
    * @param string $key the key
    * @returns mixed the value, assigned to the key
    */
    public function getParam($key){
        return $this->data[$key];
    }
    /**
    * sets key parameter of the request
    * @param string $key the key
    * @param mixed $value the value
    */
    public function setParam($key, $value){
        $this->data[$key] = $value;
    }
}
?>