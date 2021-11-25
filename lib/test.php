<?php 
require '../vendor/autoload.php';
use Paymob\Paymob;

/*test create intent function */
$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
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
echo $app->intent->create('',$body);
/*test list intent function */
$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
echo $app->intent->list('');

/*test retrive intent function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
echo $app->intent->retrieve('');

/*test void function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
$body=array($payment_reference="14394788",
                );
echo $app->payment_reference->void('',$body);

/*test refund function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
$body=array($payment_reference="14394788",
             $amount="300"
            );
echo $app->payment_reference->refund('',$body);


/*test capture function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
$body=array($payment_reference="14394788",
             $amount="300"

            );
echo $app->payment_reference->capture('',$body);


/* test list customer */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
echo $app->customer->list('');

/*test retrive customer function */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
echo $app->customer->retrieve('');

/* test token_pay */

$secret_key="skt_a67ba5b0a9cfb19e37a685f9216ebf456ddc63aa9706d21c370571269689191b";
$app=new Paymob($secret_key);
$body=array($client_secret = "ckl_f0390954c1cbed9ac8e7f86cd2902ea69",
            $token = "e29ac6d6676da32f28c7fe5a1a111694978f14ea686915f42fa53e93",
            $customer_id= "c26e2788-d367-4789-9b68-c431943b1d9a",
            $method= "card-moto",
            $payment_method_id= 1599970
            );
echo $app->paytoken->create('',$body);

