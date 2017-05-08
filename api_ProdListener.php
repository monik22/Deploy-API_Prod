#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function deployBackendPackage($request)
{
	echo "\nRecieved Request: Installing API package...\n";
	shell_exec('sh installAPI.sh'); 
	echo "Success!\n";
}

function requestProcessor($request)
{
  echo "Request Received".PHP_EOL;
  var_dump($request);
  echo '\n' . 'End Message';
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "APIqa":
      return deployBackendPackage($request);	
  }
}

$server = new rabbitMQServer("deployRabbitServer.ini","apiProd");

$server->process_requests('requestProcessor');
exit();
?>