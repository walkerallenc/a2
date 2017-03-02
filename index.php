<?php require('processLoginFormCriteria.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Assignment 2</title>	<title>Checkboxes Example</title>
  <meta charset='utf-8'>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="/css/acw.css" /> 
</head>
<body> 
<div class="h_one">
  <h1>Online Jewelry Store</h1>
</div>
<div class="h_two">
  <h2>login page</h2>
</div>
<br>

<form method='GET' action='userlogin.php'> 
        <div class="h_two">
          <img src='images/acwturtle_sm.jpg' alt='turtle'>
        </div>
        <div class="h_two">
          <!-- Trick to makes it so that if no checkboxes are selected, we still receive $_GET data -->
          <!--<input type='hidden' name='alwaysPost' value='0'>-->

          <?php $login="checkenabled"; ?> 
          <?php $userlogin=""; ?> 

          <label  for='userlogin' class="h_one">User login</label><br>
          <input type='text' name='userlogin' id='userlogin' value='<?=sanitize($userlogin)?>'><br>
          <input type='radio' name='securitycheck[]' id='securitycheck' value='checkenabled' <?php if(strstr($login, 'checkenabled')) echo 'CHECKED'?>> Enable security<br>
          <input type='radio' name='securitycheck[]' id='securitycheck' value='checkdisabled' > Disable security<br>
          <input type='submit' class='/css/acw.css'><br>
        </div>  
</form>
<?php if($errors): ?>
  <div class='alert alert-danger'>
    <ul>
      <?php foreach($errors as $error): ?>
        <li><?=$error?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php elseif($form->isSubmitted()): ?>
  <div class="alert <?=$alertType?>" role="alert"></div>
     <?php if (isset($_GET['securitycheck'])): ?>
        <?php $login=$_GET['securitycheck'] ?>

<!-- remove unused code from here -->

    <?php endif; ?>
<?php endif; ?>
</body>

</html>