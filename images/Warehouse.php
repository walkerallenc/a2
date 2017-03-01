<?php

namespace DWA;

class Warehouse {


    /**
	* Properties
	*/
    private $jewelryItems;


    /**
	*
	*/
    public function __construct($jsonPath) {

        $jewelryJson = file_get_contents($jsonPath);
        $this->jewelryItems = json_decode($jewelryJson, true);
    }


    /**
	* Getter for $jewelry property
	*/
    public function getAll() {
        return $this->jewelryItems;
    }


    /**
	*
	*/
    public function getByCategory(string $category, $caseSensitive = false) 
      {
        $filteredJewelry = [];
        foreach($this->jewelryItems as $thisCategory => $jewelrycat) 
         {
           if($caseSensitive) 
           {
               $match = $thisCategory == $jewelrycat;
           }
           else 
           {
               $match = strtolower($thisCategory) == strtolower($category);
           }
            if($match) 
                $filteredJewelry[] = $jewelrycat;
        }
        return $filteredJewelry;
    }





} # end of class
