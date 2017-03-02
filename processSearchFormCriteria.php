<?php

require('tools.php');
require('Form.php');
require('ToolsACW.php');
require('Warehouse.php');

use DWA\Form;
use DWA\ToolsACW;
use DWA\Warehouse;


# Instantiate the objects we'll need
$warehouse = new DWA\Warehouse('jewelryJSON.json');
$form = new DWA\Form($_GET);

$errors = [];
$description="";
$caseSensitive=false;

############### Check if form was submitted ##################
if($form->isSubmitted()) {

$jcategory = '';
if(isset($_GET['jcategory'])) 
    {
      $jcategory = $_GET['jcategory'];
      if($jcategory == 'choose') 
          {
           $alertType = 'alert-danger';
           $results = 'Please choose a .';
          }
      else 
          {
           $alertType = 'alert-info';
           $results = 'You chose '.$jcategory;
                $jewelry = $warehouse->getByCategory($jcategory, $caseSensitive);
                $haveResults = (count($jewelry) == 0) ? false : true;
                return $jewelry;
          }
    }

##############################################################
#    # Remove trailing comma
#    $results = rtrim($results, ', ');
#    #dump($results);
#}
    $description = $form->get('description', $default = ''); # String
    $description = $form->sanitize($description); # Clean input
    $caseSensitive = $form->isChosen('caseSensitive'); # Boolean
    $errors = $form->validate(
        [
            'description' => 'alpha:5'
        ]
    );
}

 if($errors)
     $jewelry = [];
 else  
   {
     if($description!='') 
        {
         $jewelry = $warehouse->getByCategory($description, $caseSensitive);
         $haveResults = (count($jewelry) == 0) ? false : true;
         return $jewelry;
        }
   }




