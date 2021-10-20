<?php 
namespace Paymob\Utils;
trait HttpOperations
{
    public function create($secret_key=null, $body=[])
    {
        // create resource
        // param secret_key: Paymob's secret key
        // param body: body to send request
        $request = new HttpRequest('post',$secret_key);
        $request = $request->request($body);
        return $request;  
    }

    public function list($secret_key=null)
    {
        $request = new HttpRequest('get',$secret_key);
        $request = $request->request();
        return $request;
    }

    public function retrieve($secret_key=null)
    {
        $request = new HttpRequest('get',$secret_key);
        $request = $request->request();
        return $request;
    }


}
