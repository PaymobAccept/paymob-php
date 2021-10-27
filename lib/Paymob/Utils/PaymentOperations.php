<?php 
namespace Paymob\Utils;
trait PaymentOperations
{
   
    public function void($secret_key=null, $body=[])
    {
        $request = new HttpRequest('post',$secret_key);
        $request = $request->request($body);
        return $request;
    }

    public function refund($secret_key=null, $body=[])
    {
        $request = new HttpRequest('post',$secret_key);
        $request = $request->request($body);
        return $request;
    }

    public function capture($secret_key=null, $body=[])
    {
        $request = new HttpRequest('post',$secret_key);
        $request = $request->request($body);
        return $request;
    }

}
