# Paymob PHP
=======

#Installation

   `composer require paymob/paymob_next_sdk`
   
   After installation run the command `composer dump-autoload` then `composer update` 

How to use sdk?

  Example
    creating an intention
     Code:
     
     
     require '../vendor/autoload.php';
     use Paymob\Paymob;
     $secret_key="your secret key in paymob account";
     $app=new Paymob($secret_key);
     $body=array(   $amount=1000,
                    $currency="EGP",
                    $payment_methods=["card", "kiosk"],
                    $billing_data=[
                        "apartment"=> "803",
                        "email"=> "claudette09@exa.com",
                        "floor"=> "42",
                        "first_name"=> "Clifford",
                        "street"=> "Ethan Land",
                        "building"=> "8028",
                        "phone_number"=> "+86(8)9135210487",
                        "shipping_method"=> "PKG",
                        "postal_code"=> "01898",
                        "city"=> "Jaskolskiburgh",
                        "country"=> "CR",
                        "last_name"=> "Nicolas",
                        "state"=> "Utah",
                    ],
                    $delivery_needed=False,);
     echo $app->intent->create('',$secret_key,$body);
 
>>>>>>> 4e2c8829275141695ec61dcf385d27d5b55b1c3c
