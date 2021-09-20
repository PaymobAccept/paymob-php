<?php 
namespace Paymob\Accept;
use Paymob\Utils\HttpOperations;
class Customer  {
    use HttpOperations;
    public $resource = "customer";

    public function __construct($resource=null)
    {
        $this->resource = $resource;
    }
    
}