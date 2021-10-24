# Paymob PHP

The Paymob PHP library provides convenient access to the Paymob API from
applications written in the PHP language. It includes a pre-defined set of
classes for API resources that initialize themselves dynamically from API
responses which makes it compatible with a wide range of versions of the Paymob
API.

## Requirements

PHP 7.2.0 and later.

## Composer

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

## Dependencies

The bindings require the following extensions in order to work properly:

-   [`curl`](https://secure.php.net/manual/en/book.curl.php), although you can use your own non-cURL client if you prefer
-   [`json`](https://secure.php.net/manual/en/book.json.php)
-   [`mbstring`](https://secure.php.net/manual/en/book.mbstring.php) (Multibyte String)

If you use Composer, these dependencies should be handled automatically

## Getting Started

Paymob usage looks like:
   
### Creating an intention

```php
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
     echo $app->intent->create('',$body);
```



### List Of Intentions
```php
    $secret_key="your secret key in paymob account";
    $app=new Paymob($secret_key);
    echo $app->intent->list('');
```

### Retrieve Intention
```php
    $secret_key="your secret key in paymob account";
    $app=new Paymob($secret_key);
    echo $app->intent->retrieve('');

```

### PaymentRefrencs Void
```php
    $secret_key="your secret key in paymob account";
    $app=new Paymob($secret_key);
    $body=array(    $payment_reference="14394788",
                    );
    echo $app->payment_reference->void('',$body);
```

### PaymentRefrencs Refund
```php
    $secret_key="your secret key in paymob account";
    $app=new Paymob($secret_key);
    $body=array( $payment_reference="14394788",
                $amount="300"

                );
    echo $app->payment_reference->refund('',$body);
```

### PaymentRefrencs Capture
```php
    $secret_key="your secret key in paymob account";
    $app=new Paymob($secret_key);
    $body=array( $payment_reference="14394788",
                $amount="300"

                );
    echo $app->payment_reference->capture('',$body);
```
## Legacy Version Support

### PHP 7.2 and later

If you are using PHP 7.2 or later, you should consider upgrading your environment as those versions have been past end of life since September 2017.

## Development

Get [Composer][composer]. For example, on Mac OS:

```bash
brew install composer
```

Install dependencies:

```bash
composer install
```


[composer]: https://getcomposer.org/

