<?php //set api key
$stripe = array(
  "secret_key"      => "[SECRET_KEY_STRIPE]",
  "publishable_key" => "[PUBLISHABLE_KEY_STRIPE]"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

//Disabling SSL Certificates verification, If you have certificate then true or comment this
\Stripe\Stripe::setVerifySslCerts(false);