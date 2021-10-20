<?php 
namespace Paymob\Accept;
use \Paymob\Utils\HttpOperations;
class PaymentRefrence  {
    use HttpOperations;
    private $resource = "PaymentRefrence";

    public function __construct($resource=null)
    {
        $this->resource = $resource;

    }
    
}