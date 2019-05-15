<?php
namespace App\Src;

use App\src\Element as Element;
/*
*
*/
class App {

    protected $store;

    protected $id;

    protected $items = [];

	public function __construct(){
		$this->id = 12;
		$this->store = "Un nuovo store";
	}

	public function getStore(){
		return $this->store;
	}

    public function getId(){
        return $this->id;
    }

	public  function add($parameter){

     	$newItem = new Element($parameter);
        if (!$this->has($newItem->getId())){       	
     		$this->items[] = $newItem;
        } else {
        	$this->update($newItem);
        }

	}

    public function update($newItem){
        foreach ($this->items as $item){
          if ($item->getId() == $newItem->getId()){
             $item->quantity  += $newItem->quantity;
          }
        }
    }

    public function getElement($itemId, $variation){
        if (!$this->has($itemId)){
            return false;
        }
        $item = $this->find($itemId);

        return $item->update($variation);
    }

    public function get($itemId){
        if (!$this->has($itemId)){
            return false;
        }
        foreach($this->items as $item){
            if ($item->getId() == $itemId){
                return $item->data();
            }
        }
        return false;
    }

    public function has($itemId){
    	foreach($this->items as $item){
            if ($item->getId() == $itemId){
    			return true;
            }
    	}
    	return false;
    }

    public function find($itemId){
        foreach($this->items as $item){
            if ($item->getId() == $itemId){
                return $item;
            }
        }
    }

    public function dump(){
      var_dump($this);
    }

}