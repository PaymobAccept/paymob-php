<?php 
namespace Paymob\Accept;
use \Paymob\Utils\PaymentOperations;
class PaymentRefrence  {
    use PaymentOperations;
    private $resource = "PaymentRefrence";

    public function __construct($resource=null)
    {
        $this->resource = $resource;

    }
    
}