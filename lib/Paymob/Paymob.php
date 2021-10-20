<?php 
declare(strict_types=1);
namespace Paymob;
use Paymob\Accept\Intention;
use Paymob\Accept\Customer;
use Paymob\Accept\PaymentRefrence;

class Paymob
{
    private $secret_key;

    function __construct($secret_key=null)
    {
        $this->secret_key = $secret_key;
        $this->intent=new Intention();
        $this->customer=new Customer();
        $this->payment_reference=new PaymentRefrence();
    }
    
    
}


