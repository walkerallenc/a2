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
  <h2>user information page</h2>
</div>
<br>




  <form method='GET' action='search.php'> 
     <div class="h_two">
       <img src='images/acwturtle_sm.jpg' alt='turtle'>
     </div> 
<?php if($errors): ?>
  <div class='alert alert-danger'>
    <ul>
      <?php foreach($errors as $error): ?>
	<li><?=$error?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php elseif($form->isSubmitted()): ?>
  <div class="h_two">
  <div class="alert <?=$alertType?>" role="alert"></div>
      <?php if (isset($_GET['securitycheck'])): ?>
         <?php $login=$_GET['securitycheck'] ?>
   	   <?php foreach($login as $loginchecked => $usrchecked): ?>
             <?php if (is_array($authorizationResults)): ?>
   	          <?php foreach($authorizationResults as $userlogin => $usr): ?>
                    <div class="h_two">
                       <img src='<?=$usr['picture']?>'><br>
                       Logged in user: <?=$usr['name']?><br>
                       Account #: <?=$usr['accountnumber']?><br>
                       Level: <?=$usr['level']?><br> 
                       <?=$usr['description']?><br>
                     </div>  
                     <div class="h_two">             
                       <input type='submit' text='Shop' class='/css/acw.css'><br>
                     </div>
                  <?php endforeach; ?>
         <?php elseif(!is_array($authorizationResults)): ?>
                 <div class="h_two">
                    Login failed!
                 </div>  
         <?php endif; ?>
       <?php endforeach; ?>
    <?php endif; ?>
  <div class="alert <?=$alertType?>" role="alert"></div>
  </div>
  <?php endif; ?>
  </form>
  <br>
  <br>
  <br>
  <br>
</body>
</html>