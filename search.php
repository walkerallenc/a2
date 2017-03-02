<?php require('processSearchFormCriteria.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment 2</title>
	<meta charset='utf-8'>
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
	<link href='../acw.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="/css/acw.css" /> 
</head>

<div class="h_one">
  <h1>Online Jewelry Store</h1>
</div>
<div class="h_two">
  <h2>jewelry search page</h2>
</div>
<br>


<div class="h_two">
  <img src='images/acwturtle_sm.jpg' alt='turtle'>
  <h2>Jewelry Selection Criteria</h2>
</div>
<br />

<form method='GET' action='search.php'>   
<!-- Trick to makes it so that if no checkboxes are selected, we still receive $_GET data -->
<!--<input type='hidden' name='alwaysPost' value='0'>-->
<?php $jcategory="";?>
<?php $results1="";?>
<?php $results2="";?>
<div class="h_two">
  <label for='jcategory'>Select which category of jewelry you're looking for</label>
  <br>
  <select class="h_one" name="jcategory" id='jcategory'>
    <option value='choose'>Choose one...</option>
    <option value='ring' <?php if($jcategory == 'ring') echo 'SELECTED'?>>Ring</option>
    <option value='earring' <?php if($jcategory == 'earring') echo 'SELECTED'?>>Earring</option>
    <option value='bracelet' <?php if($jcategory == 'bracelet') echo 'SELECTED'?>>Bracelet</option>
    <option value='necklace' <?php if($jcategory == 'necklace') echo 'SELECTED'?>>Necklace</option>
  </select>
  <br>
  <br>
  <br>
  <label for='description' class="h_one">Description</label><br>
  <input type='text' name='description' id='description' value='<?=sanitize($description)?>'>
  <br>
  <label for='caseSensitivity'>Case sensitivity on </label>
  <input type='checkbox' name='caseSensitive[]' id='caseSensitivity' value='caseon' <?php if(strstr($results2, 'caseon')) echo 'CHECKED'?>> Yes
  <br>
  <input type='submit' text='submit search' class='acw.css'>
  <br>
</div>

<?php if (isset($_GET['jcategory'])): ?>
  <?php if (is_array($jewelry)): ?>

<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!--check for invalid entry errors          -->
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

<?php if($errors): ?>
  <div class='alert alert-danger'>
    <ul>
      <?php foreach($errors as $error): ?>
        <li><?=$error?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php elseif($form->isSubmitted()): ?>

<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!--if entry validations passed             -->
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

    <div class="h_two">
      <div class="alert <?=$alertType?>" role="alert"></div>
        <?php foreach($jewelry as $category => $jewelry): ?>
          <div>
            <img src='<?=$jewelry['picture']?>'><br>
            Category: <?=$jcategory?><br>
            Metal: <?=$jewelry['metal']?><br>
     	    Dollar amount: <?=$jewelry['price']?>
	  </div>
         <?php endforeach; ?>
       <div class="alert <?=$alertType?>" role="alert"></div>
     </div>
   <?php elseif(!is_array($jewelry)): ?>
     <div class="h_two">
        Searched item not found!
     </div> 
   <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>
  <br>
  <br>
  <br>
</form>
</body>

</html>