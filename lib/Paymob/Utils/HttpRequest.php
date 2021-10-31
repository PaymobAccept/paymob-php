<?php

namespace Paymob\Utils;
require __DIR__.'/../../../vendor/autoload.php';
use MonologLogger;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use MonologHandlerStreamHandler;
class HttpRequest
{
    function __construct($secret_key=null, $resource=null,$base_url=null,$api_version=null,$method=null)
    {
        $this->secret_key = $secret_key;
        $this->resource = $resource;
        $this->base_url=$base_url;
        $this->api_version = $api_version;
        $this->method = $method;
        $this->logger = new Logger('next-paymob');
    }
    
    public function next_api_version()
    {
        // Next API version handler.
        //return: str
        return $api_version;
    }

    public function api_base_url()
    {
        //return: str api_next_url
        // $api_next_url = "http://127.0.0.1:8000/api/next";

        return $base_url;
    }
   
    public function resource_to_url($resource)
    {
        // Convert any Resource's classes name to a valid API URL.
        // param resource: str
        // return: str
        $version=$this->next_api_version();
        return "/$version/$resource/";
		
    }

    public function resource_url()
    {
        //Resource URL
        if(empty($resource))
        {
           return "Resource class must have a resource string."; 
        }
        return resource_to_url('->'.$resource);
    }

    public function auth_header()
    {
        return "Token $this->secret_key";
    }

    public  function full_url()
    {
        $url=$this->api_base_url().$this->resource_url($this->resource);
        return $url;
    }

    public function agent_headers()
    {
        // var_dump($this->logger);die();
        // $this->logger->pushHandler(new StreamHandler(__DIR__.'/Log.php', Logger::DEBUG));
        
        // $this->logger->warning('This is a log warning! ^_^ ');
    
        $user_agent= [
            "sdk_api_version"=> $this->next_api_version(),
            "sdk_language"=> "PHP",
            "sdk_authority"=> "Paymob",
            "sdk_request_client"=> "Paymob PHP SDK". $this->next_api_version()
        ];
        $paymob_sdk_agent=[
            'sdk_lang_version'=>phpversion(),
            'sdk_platform'=>PHP_OS,
            'sdk_underlying_sys_info'=>php_uname("a")

        ];
        $user_agent_header = [
            "User-Agent"=> json_encode($user_agent),
            "X-Paymob-SDK-Agent"=> json_encode($paymob_sdk_agent),
        ];
        return $user_agent_header;
        // foreach ($user_agent_header as $header => $value) {
        //     echo "$header: $value <br />\n";
        // }
    }
    public function request_headers()
    {
        $headers=$this->agent_headers();
        $headers["Authorization"] = $this->auth_header();
        $headers["Content-Type"] = 'application/json';
        return $headers;
    }
    
    public function request($body=[])
    {

        $url=$this->full_url();
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSH_COMPRESSION, true);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => $this->request_headers(),
            CURLOPT_POSTFIELDS => json_encode($body)
        ));
        $this->logger->info("Sending Request To Paymob, Request URL:$url Request Method $this->method");
        
        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
            die(curl_error($ch));
        }

        // Decode the response
        $responseData = json_decode($response, TRUE);

        // Close the cURL handler
        curl_close($ch);

        // Print the date from the response
        echo $responseData['published'];
    }


    
}