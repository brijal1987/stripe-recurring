# Stripe Recurring Payment 

1) This is just stripe demo for recurring payment with different nature.
2) You can use two types of methods for payment with card

-Yearly

	for Example : One time payment needs to take $1000 for 1 year
	
	It will create one time charge of $1000 
	
	
- Monthly

	For Example: You have requirement like need to convert your yearly plan to monthly as different payment.
	
	For first month you need $200 and from the next month you need to charge $100 per month 
	
	It will charge $200 for the first month payment
	
	Then it will create subscription plan for $100/month which will start from next month with 1 month trial based.
	
	

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
