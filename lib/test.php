<?php 
require '../vendor/autoload.php';
use Paymob\Paymob;

/*test create function */
$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$base_url="http://127.0.0.1:8000/api/next";
$api_version="v1";
$app=new Paymob($secret_key,$base_url,$$api_version);
$body=array($amount=1000,
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
/*test list function */
$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
echo $app->intent->list('',$secret_key);

/*test retrive function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
echo $app->intent->retrieve('',$secret_key);

/*test void function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
$body=array($payment_reference="14394788",
                );
echo $app->payment_reference->void('',$secret_key,$body);

/*test refund function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
$body=array($payment_reference="14394788",
             $amount="300"
            );
echo $app->payment_reference->refund('',$secret_key,$body);


/*test capture function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
$body=array($payment_reference="14394788",
             $amount="300"

            );
echo $app->payment_reference->capture('',$secret_key,$body);