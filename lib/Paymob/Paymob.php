<?php 
declare(strict_types=1);
namespace Paymob;
use Paymob\Accept\Intention;
use Paymob\Accept\Customer;
use Paymob\Accept\PaymentRefrence;

class Paymob
{
    private $secret_key;
    private $api_version;
    private $base_url;

    function __construct($secret_key=null,$api_version=null,$base_url=null)
    {
        $this->secret_key = $secret_key;
        $this->base_url= $base_url;
        $this->api_version =$api_version;
        $this->intent=new Intention();
        $this->customer=new Customer();
        $this->payment_reference=new PaymentRefrence();
    }
    
    
}


