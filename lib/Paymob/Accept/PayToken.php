<?php 
namespace Paymob\Accept;
use Paymob\Utils\HttpOperations;
class PayToken  {
    use HttpOperations;
    public $resource = "intention/confirm-moto";

    public function __construct($resource=null)
    {
        $this->resource = $resource;
    }
   
    
}