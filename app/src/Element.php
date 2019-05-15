<?php

namespace App\src;
class Single{
	private $data = array();

	public function __construct($options=""){
		$this->setNewDataClass($options);
	}

	public function setNewDataClass($options){
		foreach ($options as $key => $value){
			$method = 'set'.ucfirst($key);
			if (is_callable(array($this,$method))){
				$this->$method($value);
			} else {
				$this->data[$key] = $value;
			}
		}
	}

	public function setNameOfTheItem($value){
		$this->data['name'] = stroupper($value);
		return $this->data['name']; 
	}

	private function setWeight($value){
		if ($value >= "100"){
			$value = "This item is too heavy - sorry - exceeded weight of maximum 99 kg";
		}
		$this->data['weight'] = strtoupper($value);
		return $this->data['weight'];
	}

	public function __set($key, $value){
      	$method = 'set' . ucfirst($key);
      	if (is_callable(array($this, $method))){
      		$this->$method($value);
      	} else {
      		$this->data[$key] = $value;
      	}
	}

	public function __get($key){
		return $this->data[$key];
	}
	public function dump(){
		var_dump($this);
	}
}
class Element extends Single{
	protected $parameter;

	protected $id;

    private   $data = [
	    		"quantity" => 1,
	    		"price" => 0.00,
	    		"tax" => 0.00	
	          ];

	private   $single;          

	public function __construct($parameter){		
	    $this->parameter = array_merge($this->data, $parameter);	
        $this->setId($this->parameter);

        $this->parameter = array_merge($this->parameter, ["id" => $this->id]);
        $this->single = new Single($this->parameter);    
        return $this->single;
	}

	public function update($variation){
		//$this->single->quantity = 3;
		$this->parameter = array_merge($this->parameter, $variation);
		$this->single = new Single($this->parameter);
		return $this->single;
	}

	public function setId($data){
		$tranData = Array();
		$ignoreKey = "quantity";
        foreach ($data as $key => $value){
        	if  ($key == $ignoreKey){

        	}else{
       			$transData[$key] = $value;
        	}
        }

        $this->id = sha1(serialize($transData));
	}

	public function getId(){
		return $this->id;
	}

    public function __get($key){
      return $this->single->$key;
    }

    public function __set($key, $value){
      $this->single->$key = $value;
      return $this->single;
    }

    public function data(){
    	return $this->parameter;
    }

	public function dump(){
		var_dump($this);
	}

}		