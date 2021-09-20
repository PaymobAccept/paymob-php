<?php 
namespace Paymob\Accept;
use \Paymob\Utils\HttpOperations;
class Intention  {
    use HttpOperations;
    private $resource = "intention";

    public function __construct($resource=null)
    {
        $this->resource = $resource;

    }
    
}