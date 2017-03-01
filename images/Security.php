<?php

namespace DWA;

class Security {


    /**
	* Properties
	*/
    private $users;


    /**
	*
	*/
    public function __construct($jsonPath) {

        $usersJSON = file_get_contents($jsonPath);
        $this->users = json_decode($usersJSON, true);
    }

    /**
	*
	*/
    public function getUser(string $potentialuser, $caseSensitive = false) 
      {
        $authorizedUser = [];
        foreach($this->users as $thisUser => $user) 
         {
           if($caseSensitive) 
           {
               $match = $thisUser == $user;
           }
           else 
           {
               $match = strtolower($thisUser) == strtolower($potentialuser);
           }
            if($match) 
                $authorizedUser[] = $user;
        }
#dump($authorizedUser);
        return $authorizedUser;
    }





} # end of class
