# Paymob PHP

The Paymob PHP library provides convenient access to the Paymob API from
applications written in the PHP language. It includes a pre-defined set of
classes for API resources that initialize themselves dynamically from API
responses which makes it compatible with a wide range of versions of the Paymob
API.

## Documentation

-   [`docs`](https://docs.paymob.com/docs)


## Installation

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require paymob/paymob-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('../vendor/autoload.php');
```

After installation run the command
```bash
 composer dump-autoload
 ```
  then
  ```bash
     composer update
   ```
## Supported Languages

### PHP 7.2 and later

If you are using PHP 7.2 or later, you should consider upgrading your environment as those versions have been past end of life since September 2017.

## Prerequest

## Sample Intention Creation 

Paymob usage looks like:
   
### Creating an Intention

```php
$secret_key="skl_***";
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
```
### List Of Intentions
```php
    $secret_key="skl_***";
    $app=new Paymob($secret_key);
    echo $app->intent->list('');
```
