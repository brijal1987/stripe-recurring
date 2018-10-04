<?php
//include Stripe PHP library
require_once('init.php');


$token  = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];
$type  = $_POST['type'];
$amount  = $_POST['amount'];
$recurring  = isset($_POST['recurring']) ? $_POST['recurring'] : 0;

if($type == 'monthly'){

  $amount = $amount * 100;//convert  amount into cent
  $recurring = $recurring * 100;//convert recurring amount into cent

  //Create plan for payment subsciption
  $plan = \Stripe\Plan::create([
      'currency' => 'usd',
      'interval' => 'month',
      "product" => array(
        "name" => "Monthly Subscription Plan"
      ),
      'nickname' => 'Monthly Subscription Plan',
      'amount' => $recurring,
  ]);

  //Create new customer
  $customer = \Stripe\Customer::create(array(
      'source'   => $token,
      'email'    => $email
  ));

  //Fetch Next month date, from when you have to start subscription
  $today_date = date("Y-m-d");
  $next_month_date = date('Y-m-d', strtotime('+1 month'));
  $timeDiff = abs(strtotime($next_month_date) - strtotime($today_date));

  //Or you can use days as well
  $numberDays = $timeDiff/86400;  // 86400 seconds in one day
  // and you might want to convert to integer
  $numberDays = intval($numberDays);

  //Create charge of one time payment:
  $charge = \Stripe\Charge::create([
      'amount' => $amount,
      'currency' => 'usd',
      'description' => 'First month charge',
       "customer" => $customer
  ]);

  //Create subscription which will start from next month, so basically one month free period
  $subscription = \Stripe\Subscription::create([
      'customer' => $customer->id,
      'items' => [['plan' => $plan]],
      'trial_period_days' => $numberDays
  ]);
}
else if($type == 'yearly'){

  $amount = $amount * 100;//convert  amount into cent

  //Create new customer
  $customer = \Stripe\Customer::create(array(
      'source'   => $token,
      'email'    => $email
  ));

  //Create charge of one time payment:
  $charge = \Stripe\Charge::create([
      'amount' => $amount,
      'currency' => 'usd',
      'description' => 'First month charge',
       "customer" => $customer
  ]);
}
header("Location: index.php?success=1");