<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html>
<title>Stripe Recurring Payment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<body>
<br>
<div class="row w3-row-padding">
  <div class="col-md-2"></div>
  <div class="col-md-8 w3-third w3-margin-bottom">
  <?php if(isset($_GET['success']) && $_GET['success']==1){ ?>
  <div class="form-group alert alert-success"> <strong>Success!</strong> Payment has done successfully.</div>
  <?php } ?>
  </div>
  <div class="col-md-2"></div>
</div>
<div class="row w3-row-padding">
<div class="col-md-2"></div>
<div class="col-md-4 w3-third w3-margin-bottom">
  <ul class="w3-ul w3-border w3-center w3-hover-shadow">
    <li class="w3-black w3-xlarge w3-padding-32">Yearly</li>
    <li class="w3-padding-16">
    	<b>$1000</b>
    	<br><br>
    	<b>One time payment</b>
    	<br><br>
      	<h2 class="w3-wide">$1000/<small>per year</small></h2>
    </li>
    <li class="w3-light-grey w3-padding-24">
      <form action="charge.php" method="post">
		<input type="hidden" name="amount" value="1000">
		<input type="hidden" name="type" value="yearly">
		  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		          data-key="<?php echo $stripe['publishable_key']; ?>"
		          data-description="Access for a year"
		          data-amount="100000"
		          data-locale="auto"></script>
		</form> 
    </li>
  </ul>
</div>

<div class="col-md-4 w3-third w3-margin-bottom">
  
  <ul class="w3-ul w3-border w3-center w3-hover-shadow">
    <li class="w3-green w3-xlarge w3-padding-32">Monthly</li>
    <li class="w3-padding-16"><b>$200</b>
    	<br><br><b>One time payment</b>
    	<br><br><b>For the first month</b>
    	<br><br><h2 class="w3-wide">$100/<small>per month</small></h2>
    	<b>Note: From next month it will be recurring subscription of $100/month</b>
    </li>
    <li class="w3-light-grey w3-padding-24">
		<form action="charge.php" method="post">
		<input type="hidden" name="amount" value="200">
		<input type="hidden" name="type" value="monthly">
		<input type="hidden" name="recurring" value="100">
		<input type="hidden" name="type" value="monthly">
		  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		          data-key="<?php echo $stripe['publishable_key']; ?>"
		          data-description="Access for a year"
		          data-amount="20000"
		          data-locale="auto"></script>
		</form>    	
    </li>
  </ul>
</div>
<div class="col-md-2"></div>
</div>

</body>
</html> 


