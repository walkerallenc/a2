<?php

require('Security.php');
require('Form.php');
require('ToolsACW.php');

use DWA\Security;
use DWA\Form;
use DWA\ToolsACW;


# Instantiate the objects we'll need
$security = new DWA\Security('UsersJSON.json');

$form = new DWA\Form($_GET);

$errors = [];
$description="";
$caseSensitive=false;

############### Check if form was submitted ##################
if($form->isSubmitted()) 
   {
##############################################################
############### Process user #################################
##############################################################
   $userlogin = '';
   if(isset($_GET['userlogin'])) 
     {
       $userlogin = $_GET['userlogin'];
       $authorizationResults=[];
       $alertType = 'alert-info';
       #$userlogin = 'You chose '.$userlogin;
       $authorizationResults = $security->getUser($userlogin, $caseSensitive);
       $usercount = (count($authorizationResults) == 0) ? false : true;
       return $authorizationResults;
     }
}




