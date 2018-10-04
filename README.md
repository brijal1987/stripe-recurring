# Stripe Recurring Payment 

1) This is just stripe demo for recurring payment with different nature.
2) You can use two types of methods for payment with card
	- 

## Use

Just download code and setup to your root folder

Run command Composer Update

Find "config.php" in your root

Just change
"SECRET_KEY_STRIPE" and "PUBLISHABLE_KEY_STRIPE"

You can Enable/Disable SSL as per your need 
//Disabling SSL Certificates verification, If you have certificate then true or comment this
\Stripe\Stripe::setVerifySslCerts(false);

Have a fun with Stripe Recurring!!!