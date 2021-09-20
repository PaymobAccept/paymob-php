<?php 
require '../vendor/autoload.php';
use Paymob\Paymob;

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
$body=array(    $amount=1000,
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