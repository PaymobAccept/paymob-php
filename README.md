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
   
   #Creating an intention

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
     echo $app->intent->create('',$secret_key,$body);
```


## Legacy Version Support

### PHP 7.2 and later

If you are using PHP 7.2 or later, you should consider upgrading your environment as those versions have been past end of life since September 2017.

## Custom Request Timeouts

_NOTE:_ We do not recommend decreasing the timeout for non-read-only calls (e.g. charge creation), since even if you locally timeout, the request on Paymob's side can still complete. 

To modify request timeouts (connect or total, in seconds) you'll need to tell the API client to use a CurlClient other than its default. You'll set the timeouts in that CurlClient.

```php
// set up your tweaked Curl client
$curl = new \Stripe\HttpClient\CurlClient();
$curl->setTimeout(10); // default is \Stripe\HttpClient\CurlClient::DEFAULT_TIMEOUT
$curl->setConnectTimeout(5); // default is \Stripe\HttpClient\CurlClient::DEFAULT_CONNECT_TIMEOUT

echo $curl->getTimeout(); // 10
echo $curl->getConnectTimeout(); // 5

// tell Stripe to use the tweaked client
\Stripe\ApiRequestor::setHttpClient($curl);

// use the Stripe API client as you normally would
```

## Custom cURL Options (e.g. proxies)

Need to set a proxy for your requests? Pass in the requisite `CURLOPT_*` array to the CurlClient constructor, using the same syntax as `curl_stopt_array()`. This will set the default cURL options for each HTTP request made by the SDK, though many more common options (e.g. timeouts; see above on how to set those) will be overridden by the client even if set here.

```php
// set up your tweaked Curl client
$curl = new \Stripe\HttpClient\CurlClient([CURLOPT_PROXY => 'proxy.local:80']);
// tell Stripe to use the tweaked client
\Stripe\ApiRequestor::setHttpClient($curl);
```

Alternately, a callable can be passed to the CurlClient constructor that returns the above array based on request inputs. See `testDefaultOptions()` in `tests/CurlClientTest.php` for an example of this behavior. Note that the callable is called at the beginning of every API request, before the request is sent.

### Configuring a Logger

The library does minimal logging, but it can be configured
with a [`PSR-3` compatible logger][psr3] so that messages
end up there instead of `error_log`:

```php
\Stripe\Stripe::setLogger($logger);
```

### Accessing response data

You can access the data from the last API response on any object via `getLastResponse()`.

```php
$customer = $stripe->customers->create([
    'description' => 'example customer',
]);
echo $customer->getLastResponse()->headers['Request-Id'];
```

### SSL / TLS compatibility issues

Stripe's API now requires that [all connections use TLS 1.2](https://stripe.com/blog/upgrading-tls). Some systems (most notably some older CentOS and RHEL versions) are capable of using TLS 1.2 but will use TLS 1.0 or 1.1 by default. In this case, you'd get an `invalid_request_error` with the following error message: "Stripe no longer supports API requests made with TLS 1.0. Please initiate HTTPS connections with TLS 1.2 or later. You can learn more about this at [https://stripe.com/blog/upgrading-tls](https://stripe.com/blog/upgrading-tls).".

The recommended course of action is to [upgrade your cURL and OpenSSL packages](https://support.stripe.com/questions/how-do-i-upgrade-my-stripe-integration-from-tls-1-0-to-tls-1-2#php) so that TLS 1.2 is used by default, but if that is not possible, you might be able to solve the issue by setting the `CURLOPT_SSLVERSION` option to either `CURL_SSLVERSION_TLSv1` or `CURL_SSLVERSION_TLSv1_2`:

```php
$curl = new \Stripe\HttpClient\CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1]);
\Stripe\ApiRequestor::setHttpClient($curl);
```

### Per-request Configuration

For apps that need to use multiple keys during the lifetime of a process, like
one that uses [Stripe Connect][connect], it's also possible to set a
per-request key and/or account:

```php
$customers = $stripe->customers->all([],[
    'api_key' => 'sk_test_...',
    'stripe_account' => 'acct_...'
]);

$stripe->customers->retrieve('cus_123456789', [], [
    'api_key' => 'sk_test_...',
    'stripe_account' => 'acct_...'
]);
```

### Configuring CA Bundles

By default, the library will use its own internal bundle of known CA
certificates, but it's possible to configure your own:

```php
\Stripe\Stripe::setCABundlePath("path/to/ca/bundle");
```

### Configuring Automatic Retries

The library can be configured to automatically retry requests that fail due to
an intermittent network problem:

```php
\Stripe\Stripe::setMaxNetworkRetries(2);
```

[Idempotency keys][idempotency-keys] are added to requests to guarantee that
retries are safe.

### Request latency telemetry

By default, the library sends request latency telemetry to Stripe. These
numbers help Stripe improve the overall latency of its API for all users.

You can disable this behavior if you prefer:

```php
\Stripe\Stripe::setEnableTelemetry(false);
```

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

