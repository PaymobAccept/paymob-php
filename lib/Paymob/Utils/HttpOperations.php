<?php 
namespace Paymob\Utils;
trait HttpOperations
{
    public function create($cls=null, $secret_key, $body=[])
    {
        // create resource
        // param secret_key: Paymob's secret key
        // param body: body to send request
        $request = new HttpRequest($cls,'post',$secret_key);
        $request = $request->request($body);
        return $request;

        
    }
}
