<?php
error_reporting(1);
ini_set('display_errors', 1);
require 'vendor/autoload.php';
use Paydirectly\Exceptions\RESTfulException;

$params = json_decode(file_get_contents('sampleData.text'),true);
try {
	$paydirectly = new \Paydirectly\Paydirectly(
array(
  'merchant_id'=>'HyuNMmX9cThGm5tRGz1JMZSG7DCDjd',
  'secret_key'=>
  'WUdtL0cxMFcwTjlHZVpHOWxNQlB3MmozU25DRzF2ZDZkUmkwUjdtNzFBSkdMdWVKc0JMYldqNDM5OGtobG9NcGRrcThDWG1wTWxob0doMVlEdnFCL0hBQWUreHpHNUlOVGt3UGN0dlVFZHlpNVZqZWRwTDhySVJOdnNuNmNKVjQ=',
  'client_handler'=>'guzzle'
));
    
  $response = $paydirectly->post('orders/create-checkout', $params);
  print_r($response);
} catch (RESTfulException $e) {
   echo $e->getErrorCode();
   echo $e->getMessage();
   echo $e->getErrorList();
   exit;
}
?>